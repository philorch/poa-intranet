<?
// Don't change this! -- unless we move LDAP server!
//$server = "POAFS01.philorch.org";
//$server = "RPACGC01.rpac.org";
//$server = "172.18.10.202";
//$server = "172.16.2.201";
$server = "10.2.0.47";

// Get FORM Information
$username = trim($_REQUEST['username']);
$password = trim($_REQUEST['password']);

// Set defaults for output
$head = "<link rel=\"stylesheet\" type=\"text/css\" href=\"./silver.css\">";
$head .= "<TITLE>Loading</TITLE>\n";
$head .= "<BODY bgcolor=\"white\"><font color=\"black\"><CENTER>\n";
$auth = "";
$foot =  "</CENTER></font></BODY>\n";


if ( $password == "" ) die ( $head . "<A HREF=\"./userapp_login.php\">Could not log in; check password and login again.</A>" . $foot );

// Connect to LDAP
$ldap = @ldap_connect("ldap://$server",389) or die("Can't connect to LDAP Server, $server!!!");

// Bind or die,output
if ( $ldap ) {

	$bind_result = @ldap_bind($ldap,"CN=" . $username . ",CN=Users,DC=philorch,DC=org", $password);
	if ( $bind_result == 1 ) {
		$auth .= "<center><span class='menuheader'>User $username authenticated</span></center><p>\n";
		$bind_result = 0;
		$container = "CN=Users,DC=philorch,DC=org";
	}
	else {
		$bind_result = @ldap_bind($ldap,"CN=" . $username . ",CN=Users,DC=rpac,DC=org", $password);
		if ( $bind_result == 1 ) {
			$auth .= "<center><span class='menuheader'>User $username authenticated</span></center><p>\n";
			$bind_result = 0;
			$container = "CN=Users,DC=rpac,DC=org";
		}
		else {
			$auth .= "<center>Hm... check your username and password combination<br><br>Is your CAPS lock on?<br><br>\n
				<A HREF=\"./userapp_login.php\">Could not log in; check username/password and login again.</A>";
		}
	}

	// base dn and filter
	//$dn = "$container,DC=rpac,DC=org";
	$dn = "$container";
	$filter = "(|(cn=" . $username . "*))";

	// array setup
	//$nds_stuff = array("title", "sn", "givename", "mail", "groupmembership", "securityEquals");
	//$nds_stuff = array("title", "sn", "givenname", "mail", "memberOf");
	$nds_stuff = array("title", "sn", "givenname", "mail", "memberof");
	//$nds_stuff = array("title", "sn", "givenname", "mail", "cn");

	// search for filter on directory
	$results = @ldap_search($ldap, $dn, $filter, $nds_stuff);

	// multiple entries?
	$info = @ldap_get_entries($ldap, $results);
	$numrecs = $info["count"];
  	//$auth .= $numrecs . " entry(ies) returned<BR>\n";


	// ensure bind
	if ( $info["count"] != 0 ) {

		$y = 0;
		for ( $x=0; $y<$info[$x]["count"]; $y++) {
			$data = $info[$x][$y];
			if ( $data == "mail" ) {
				$email = $info[0]['mail'][0];

				switch ( $email ) {
					case "atsen@kimmelcenter.org":
						$accesslevel = "u";
						$realname = $info[0]['givenname'][0] . " " . $info[0]['sn'][0];
						$y = 1000000;
						break;
					case "JCallinan@philorch.org":
						$accesslevel = "u";
						$realname = $info[0]['givenname'][0] . " " . $info[0]['sn'][0];
						$y = 1000000;
						break;
					case "EWiesner@philorch.org":
						$accesslevel = "u";
						$realname = $info[0]['givenname'][0] . " " . $info[0]['sn'][0];
						$y = 1000000;
						break;
					case "tkuoch@philorch.org":
						$accesslevel = "u";
						$realname = $info[0]['givenname'][0] . " " . $info[0]['sn'][0];
						$y = 1000000;
						break;
					case "tgay@philorch.org":
						$accesslevel = "u";
						$realname = $info[0]['givenname'][0] . " " . $info[0]['sn'][0];
						$y = 1000000;
						break;
					case "jremaley@philorch.org":
						$accesslevel = "u";
						$realname = $info[0]['givenname'][0] . " " . $info[0]['sn'][0];
						$y = 1000000;
						break;
					case "bquzack@philorch.org":
						$accesslevel = "v";
						$realname = $info[0]['givenname'][0] . " " . $info[0]['sn'][0];
						$y = 1000000;
						break;
					case "ktomlinson@philorch.org":
						$accesslevel = "v";
						$realname = $info[0]['givenname'][0] . " " . $info[0]['sn'][0];
						$y = 1000000;
						break;
					default:
						$accesslevel = "z";
						$realname = $info[0]['givenname'][0] . " " . $info[0]['sn'][0];
				}
			}
		}
		setcookie ("Access", $accesslevel, time()+21600);
		//print "Full Name: <B>$realname</B><br>";
		//print "Access Level: <B>$accesslevel</B><br>";
		//	print "Group: <B>$access</B><br>";
	}
}

ldap_close($ldap);

if ( ( $accesslevel < "u" ) || ( $accesslevel > "v" ) )
	die ($head . $auth . "No access permitted for the current user, <B>$realname</B> $access;<BR><A HREF=\"./userapp_unloading.php\">login</A> as a different user.<br><br>or email the <a href='mailto:helpdesk@philorch.org?Subject=Athena Access'>Helpdesk</a> regarding this error message!" . $foot);


print "<HTML>\n<HEAD>\n";
print "<META HTTP-EQUIV=\"refresh\"; content=\"2;URL=./UserAppList.php?$username\">\n";
print "<TITLE>Access Level for $realname is $accesslevel</TITLE>\n";
print "</HEAD>\n";
print $auth . "<B><span class='menuheader'><center>Logging in...</center></span></B>";
