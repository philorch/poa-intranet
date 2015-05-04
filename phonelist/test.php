<?
if ( $_SERVER["QUERY_STRING"] ) {
	print "$_REQUEST[option]<br>\n";
	print "$_REQUEST[domain]<br>\n";
	print "$_REQUEST[lastname]<br>\n";

	$server = '10.2.0.20';
	$username = 'footprints';
	$passwrod = 'support';

	$ldap = @ldap_connect("ldap://$server",389) or die("Could not connect to the LDAP server, $server.");
	ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

	if ( $ldap ) {
		// This does a bind operation on the directory
		$bind_results = @ldap_bind($ldap, $username, $password) or die("Could not bind to the server <b>$server</b>!");
		print "$bind_results\n";

		// string filter
		$filter="(sn=" . $lastname . "*)";

		// array attributes
		$nds_stuff = array("sn", "givenname", "telephonenumber",  "facsimiletelephonenumber", "department", "mail");

		// This performs the search for a specified filter on the directory with 
		// the scope of LDAP_SCOPE_SUBTREE
		$results = ldap_search($ldap, $dn, $filter, $nds_stuff, "0 attrsonly" );
		//$results = ldap_search($ldap, $dn, $filter, $nds_stuff);

		// This function is used to simplify reading multiple entries from the result
		$info = ldap_get_entries($ldap, $results);

		// For Searching OU
		if ( $dn1 ) {
			$results1 = ldap_search($ldap, $dn1, $filter, $nds_stuff, "0 attrsonly" );
			$info1 = ldap_get_entries($ldap, $results1);
		}
		if ( $dn2 ) {
			$results2 = ldap_search($ldap, $dn2, $filter, $nds_stuff, "0 attrsonly" );
			$info2 = ldap_get_entries($ldap, $results2);
		}
	}

	print "results\n";
















}
else {
	print "empty query string!<br>\n";
}




?>
