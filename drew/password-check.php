<?

if ( !$_SERVER['QUERY_STRING'] ) {
	print "Please provide email address in the URL<br><br>";
	print "For example: <b>./password-check.php?user@kimmelcenter.org</b><br><br>\n";
}
else {
	$username = $_SERVER['QUERY_STRING'];
	list($user, $domain) = split("@", $username);

	print "<html>\n";
	print "<head>\n<title>$user's Password</title>\n";

	if ( $domain == "kimmelcenter.org" || $domain == "rpac.org" ) {
		$ldap_server = "172.16.2.208";
		$ldap_dn = "DC=rpac,DC=org";
		$auth_user = "CN=footprints,CN=Users,DC=rpac,DC=org";
		$password = "support";
	}
	else if ( $domain == "philorch.org" || $domain == "ticketphiladelphia.org" ) {
		$ldap_server = "10.2.0.20";
		$ldap_dn = "DC=philorch,DC=org";
		$auth_user = "CN=footprints,CN=Users,DC=philorch,DC=org";
		$password = "support";
	}
	else if ( $domain == "curtis.edu" ) {
		$ldap_server = "10.3.0.2";
		$ldap_dn = "DC=curtis,DC=edu";
		$auth_user = "curtis.edu/Users/Footprints";
		$password = "support";
		$curtis = 1;
	}
	else if ( $domain == "operaphila.org" || $domain == "sharedservices.org" || $domain == "paballet.org" ) {
		$ldap_server = "10.2.0.230";
		$ldap_dn = "DC=sharedservices,DC=org";
		$auth_user = "CN=footprints,CN=Users,DC=rpac,DC=org";
		$password = "support";
	}
	else {

	}


	//$result = exec("/usr/bin/ldapsearch -h '$ldap_server' -LLL -D '$auth_user' -w '$password' -b '$ldap_dn' '(sn=$user)' |grep -i pwdLastset");
	//$result = exec("/usr/bin/ldapsearch -LLL -h '$ldap_server' -D '$auth_user' -w '$password' -b '$ldap_dn' '(cn=$user)'", $foobar);

	if ( $curtis != 1 ){
		$result = exec("/usr/bin/ldapsearch -LLL -h '$ldap_server' -D '$auth_user' -w '$password' -b '$ldap_dn' '(&(mailNickname=$user)(cn=$user))'", $foobar);
	}
	else {
		//print "Curtis - $curtis\n";
		// ldapsearch -LLL -h 10.3.0.2 -D "curtis.edu/Users/Andrew Tsen" -w "1missGW" -b "DC=curtis,DC=edu" '(sn=tsen)'
		$result = exec("/usr/bin/ldapsearch -LLL -h '$ldap_server' -D '$auth_user' -w '$password' -b '$ldap_dn' '(mail=$username)'", $foobar);
	}

	//print_r($foobar);
	//print_r(array_values($foobar));

	foreach ( $foobar as $value ) {
		//print "$value<br>\n";
		if ( strstr($value, 'pwdLastSet') ) {
			$lastchanged = $value;
		}

		if ( strstr($value, 'accountExpires') ) {
			$expired = $value;
		}
	}

	list( $garbage, $lastdate) = split(":", $lastchanged);
	list( $garbage1, $expireddate) = split(":", $expired);

	//print "$lastdate<br>\n";

	print "User <b>$username</b> last changed his/her password on: <b>";
	print convert_AD_date($lastdate);
	print "</b><br>\n";
	print "Expiration Date: <b>";
	print convert_AD_date($expireddate);
	print "</b><br>\n";

	print "<hr size=1>\n";
	print "<center><h1><u>Full LDAP Info</u></h1></center>\n";
	print "<b><font face=verdana,arial size=2>\n";
	foreach ( $foobar as $value ) {
		print "$value<br>\n";
	}
	print "</font></b>\n";

}


//// Do not modify below this line ////
	// Convert the LDAP timestamp to human readable format
	function convert_AD_date ($ad_date) {

		if ($ad_date == 0) {
			return '0000-00-00';
		}

		$secsAfterADEpoch = $ad_date / (10000000);
		$AD2Unix=((1970-1601) * 365 - 3 + round((1970-1601)/4) ) * 86400;

		// Why -3 ?
		// "If the year is the last year of a century, eg. 1700, 1800, 1900, 2000,
		// then it is only a leap year if it is exactly divisible by 400.
		// Therefore, 1900 wasn't a leap year but 2000 was."

		$unixTimeStamp=intval($secsAfterADEpoch-$AD2Unix);
		$myDate = date("Y-m-d H:i:s", $unixTimeStamp); // formatted date

		return $myDate;
	}
?>
