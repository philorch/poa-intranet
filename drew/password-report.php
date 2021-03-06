<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set("memory_limit","104M");

if ( !$_SERVER['QUERY_STRING'] ) {
        print "Please provide email address in the URL<br><br>";
        print "For example: <b>./password-report.php?kimmelcenter.org</b><br><br>\n";
}
else {
        $domain = $_SERVER['QUERY_STRING'];

        if ( $domain == "kimmelcenter.org" || $domain == "rpac.org" ) {
		$LDAP['bind']['host'] = '172.16.2.208';
		$LDAP['bind']['port'] = '389';
		$LDAP['bind']['username'] = 'CN=Footprints,CN=Users,DC=rpac,DC=org';
		$LDAP['bind']['password'] = 'support';
		$LDAP['basedn'] = 'DC=rpac,DC=org';
		$LDAP['usersdn'] = ''.$LDAP['basedn'];
        }
        else if ( $domain == "philorch.org" || $domain == "ticketphiladelphia.org" ) {
		$LDAP['bind']['host'] = '10.2.0.20';
		$LDAP['bind']['port'] = '389';
		$LDAP['bind']['username'] = 'CN=Footprints,CN=Users,DC=philorch,DC=org';
		$LDAP['bind']['password'] = 'support';
		$LDAP['basedn'] = 'DC=philorch,DC=org';
		$LDAP['usersdn'] = ''.$LDAP['basedn'];
        }
        else if ( $domain == "curtis.edu" ) {
		$LDAP['bind']['host'] = '10.3.0.2';
		$LDAP['bind']['port'] = '389';
		$LDAP['bind']['username'] = 'CN=Footprints,CN=Users,DC=curtis,DC=edu';
		$LDAP['bind']['password'] = 'support';
		$LDAP['basedn'] = 'DC=curtis,DC=edu';
		$LDAP['usersdn'] = ''.$LDAP['basedn'];
        }
        else if ( $domain == "operaphila.org" || $domain == "sharedservices.org" || $domain == "paballet.org" ) {
		$LDAP['bind']['host'] = '10.2.0.230';
		$LDAP['bind']['port'] = '389';
		$LDAP['bind']['username'] = 'CN=Footprints,CN=Users,DC=rpac,DC=org';
		$LDAP['bind']['password'] = 'support';
		$LDAP['basedn'] = 'DC=sharedservices,DC=org';
		$LDAP['usersdn'] = ''.$LDAP['basedn'];
        }
        else {
		$LDAP['bind']['host'] = '172.16.2.208';
		$LDAP['bind']['port'] = '389';
		$LDAP['bind']['username'] = 'CN=Footprints,CN=Users,DC=rpac,DC=org';
		$LDAP['bind']['password'] = 'support';
		$LDAP['basedn'] = 'DC=rpac,DC=org';
		$LDAP['usersdn'] = 'CN=Users,'.$LDAP['basedn'];
	}
}

$MAIL['helpdesk']['name']  = "Andrew Tsen";
$MAIL['helpdesk']['email'] = "atsen@kimmelcenter.org";

##################################################################################################################################
##################################################################################################################################
##################################################################################################################################
##################################################################################################################################

// connect to ldap server
$ldap_error = "";
$ldapconn = ldap_connect($LDAP['bind']['host'], $LDAP['bind']['port']) or $ldap_error = ("Could not connect to LDAP server.");
$option1 = ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3) or die ("Could not set ldap protocol");
$option2 = ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0) or die ("Could not set option referrals");
$option3 = ldap_set_option($ldapconn, LDAP_OPT_SIZELIMIT, 5000) or die ("Max Reached");

// binding to ldap server
if(!$ldap_error) {
  $ldapbind = ldap_bind($ldapconn, $LDAP['bind']['username'], $LDAP['bind']['password']) or $ldap_error = ("LDAP bind failed...");
}

$username = $argv[1];
if(!$ldap_error) {
  $search = ldap_search($ldapconn, $LDAP['usersdn'], 'sAMAccountName=*');
  $result = ldap_get_entries($ldapconn, $search);
  $expire = array();
  foreach($result as $key => $value) {
    $userinfo = $value;

    ### will the account expire any time soon?
    if (substr($userinfo['samaccountname'][0], -1) != "\$") {
      $accountExpireTS = bcsub(bcdiv($userinfo['accountexpires'][0], '10000000'), '11644473600');
      $accountExpireDays = floor(($accountExpireTS - time()) / 86400);
      if (($accountExpireDays>= 0) && ($accountExpireDays <= 14)) {
        $expire[$accountExpireDays][$userinfo['samaccountname'][0]] = array("firstName" => $userinfo['givenname'][0], "lastName" => $userinfo['sn'][0], "email" => $userinfo['mail'][0], "foo" => $userinfo['distinguishedname'][0], "expireType" => "account", "manager" => $userinfo['manager'][0]);
      }
    }

    $pwdlastset = $userinfo['pwdlastset'][0];
    $status = array();

    if ($userinfo['useraccountcontrol'][0] == '66048') {
      // Password does not expire
      //continue;
      $accountExpireTS = bcsub(bcdiv($userinfo['accountexpires'][0], '10000000'), '11644473600');
      $accountExpireDays = floor(($accountExpireTS - time()) / 86400);
      $expire[$accountExpireDays][$userinfo['samaccountname'][0]] = array("firstName" => $userinfo['givenname'][0], "lastName" => $userinfo['sn'][0], "email" => $userinfo['mail'][0],  "foo" => $userinfo['distinguishedname'][0], "expireType" => "<font color=red><b>Password Does Not Expire</b></font>", "manager" => $userinfo['manager'][0]);
    }

    if ($pwdlastset === '0') {
      // Password has already expired
      //continue;
      $accountExpireTS = bcsub(bcdiv($userinfo['accountexpires'][0], '10000000'), '11644473600');
      $accountExpireDays = floor(($accountExpireTS - time()) / 86400);
      $expire[$accountExpireDays][$userinfo['samaccountname'][0]] = array("firstName" => $userinfo['givenname'][0], "lastName" => $userinfo['sn'][0], "email" => $userinfo['mail'][0],  "foo" => $userinfo['distinguishedname'][0], "expireType" => "<font color=blue><b><i>Must Change Password @ Next Logon</i></b></font>", "manager" => $userinfo['manager'][0]);
    }

    // Password expiry in AD can be calculated from TWO values:
    // - User's own pwdLastSet attribute: stores the last time the password was changed
    // - Domain's maxPwdAge attribute: how long passwords last in the domain
    $sr = ldap_read($ldapconn, $LDAP['basedn'], 'objectclass=*', array('maxPwdAge'));
    if (!$sr) {
      continue;
    }

    $info = ldap_get_entries($ldapconn, $sr);
    $maxpwdage = $info[0]['maxpwdage'][0];
    if (bcmod($maxpwdage, 4294967296) === '0') {
      continue;
    }

    // Add maxpwdage and pwdlastset and we get password expiration time in Microsoft's
    // time units. Because maxpwd age is negative we need to subtract it.
    $pwdexpire = bcsub($pwdlastset, $maxpwdage);

    // Convert MS's time to Unix time
    $status['expiryts'] = bcsub(bcdiv($pwdexpire, '10000000'), '11644473600');
    $status['expiryformat'] = date('Y-m-d H:i:s', bcsub(bcdiv($pwdexpire, '10000000'), '11644473600'));
    $status['expirydays'] = floor(($status['expiryts'] - time()) / 86400);
    if (($status['expirydays'] >= 0) && ($status['expirydays'] <= 14)) {
      if (substr($userinfo['samaccountname'][0], -1) != "\$") {
        $expire[$status['expirydays']][$userinfo['samaccountname'][0]] = array("firstName" => $userinfo['givenname'][0], "lastName" => $userinfo['sn'][0], "email" => $userinfo['mail'][0],  "foo" => $userinfo['distinguishedname'][0], "expireType" => "<b>Password Expiring Soon</b>");
      }
    }
  }
}

### sort the array
ksort($expire);
foreach($expire as $key => $value) {
  ksort($value);
  $expire[$key] = $value;
}


$admin_message  = "<html>\r\n";
$admin_message .= "<head>\r\n";
$admin_message .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n";
$admin_message .= "<style>\r\n";
$admin_message .= "div {font-family: tahoma,verdana,arial;font-size: 11px;color: #38465A;}\r\n";
$admin_message .= "td {font-family: tahoma,verdana,arial;font-size: 11px;color: #38465A;}\r\n";
$admin_message .= "a {color: #38465A;}\r\n";
$admin_message .= ".dt {background-color: #DDE1E8;color: #556988;font-weight: bold;padding-left: 4px;}\r\n";
$admin_message .= ".dt1 {background-color: #F1F3F6;}\r\n";
$admin_message .= ".dt2 {background-color: #F8F9FA;}\r\n";
$admin_message .= "</style>\r\n";
$admin_message .= "<title>Password expiration report for ".date("m/d/Y g:m:s A")."</title>\r\n";
$admin_message .= "</head>\r\n";
$admin_message .= "<body>\r\n";
$admin_message .= "<div>\r\n";
$admin_message .= "Passwords and/or accounts of the following users are about to expire (<font color=red>or expiration disabled</font>):<br>\r\n";
$admin_message .= "<br>\r\n";
$admin_message .= "<table border=\"0\" cellspacing=\"1\" cellpadding=\"2\" width=\"100%\">\r\n";
$admin_message .= "<tr>\r\n";
$admin_message .= "<td class=\"dt\" valign=\"top\"><b>User name</b></td>\r\n";
$admin_message .= "<td class=\"dt\" valign=\"top\"><b>Name</b></td>\r\n";
$admin_message .= "<td class=\"dt\" valign=\"top\"><b>Email</b></td>\r\n";
#$admin_message .= "<td class=\"dt\" valign=\"top\"><b>Directory Location</b></td>\r\n";
$admin_message .= "<td class=\"dt\" valign=\"top\"><b>Account/Password Status</b></td>\r\n";
$admin_message .= "</tr>\r\n";
foreach($expire as $days => $user) {
  foreach($user as $username => $userdata) {
    $dt = ($dt == 1) ? 2 : 1;
#    $admin_message .= "<tr class=\"dt".$dt."\"><td>".strtolower($username)."</td><td>".trim($userdata['firstName']." ".$userdata['lastName'])."</td><td><a href=\"password-check.php?".strtolower($userdata['email'])."\">".strtolower($userdata['email'])."</a></td><td>".trim($userdata['foo'])."</td><td>".$userdata['expireType'].": ".$days." day(s) </td></tr>\r\n";
    $admin_message .= "<tr class=\"dt".$dt."\"><td>".strtolower($username)."</td><td>".trim($userdata['firstName']." ".$userdata['lastName'])."</td><td><a href=\"https://intranet.philorch.org/drew/password-check.php?".strtolower($userdata['email'])."\">".strtolower($userdata['email'])."</a></td><td>".$userdata['expireType'].": ".$days." day(s) </td></tr>\r\n";
  }
}
$admin_message .= "</table>\r\n";
$admin_message .= "<br>\r\n";
//$admin_message .= $MAIL['helpdesk']['name']."<br />\r\n";
$admin_message .= "</div>\r\n";
$admin_message .= "</body>\r\n";
$admin_message .= "</html>\r\n";

$to       = trim($MAIL['helpdesk']['name']." <".$MAIL['helpdesk']['email'].">");
$subject  = "Password Expiration Report";
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: ".trim($MAIL['helpdesk']['name']." <".$MAIL['helpdesk']['email'].">")."\r\n";
//mail($to, $subject, $admin_message, $headers);
//mail('atsen@kimmelcenter.org', $subject, $admin_message, $headers);
print "$admin_message";

?>
