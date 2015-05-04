<?
if ( $_REQUEST['option'] ) {
	switch ( $_REQUEST['option'] ) {
		case "login":
	
		if ( $_REQUEST['lastname'] )  {
			$lastname = trim ( $_REQUEST['lastname'] );
			mylogin($lastname);
		} 
		else {
			echo "You neglected to fill out the form<br> please use the back button to fill in reqired info.<br><br>\n\n";
		}
		break;
	default:
		echo "Please go back and select another page this one may be down.<br><br>\n";
		break;
	}
} else {
	echo "If you have reached this page in error please <a href='/phone-lists'>Click Here</a>.\n";
	exit;
}

function mylogin ( $lastname ) {

	$total = 0;

	if ( $lastname == '*' ) {
		$lastname = '';
	}

	$lastname = stripslashes($lastname);

	if ( $_REQUEST['domain'] == 0 ) {
		$server = "10.2.0.20";
		$username = "CN=Footprints,CN=Users,DC=philorch,DC=org";
		$password = "support";
		$dn = "CN=Users,DC=philorch,DC=org";
		$dn1 = "OU=IPCC,DC=philorch,DC=org";
	}
	else if ( $_REQUEST['domain'] == 1 ) {
		//$server = "172.16.2.201";
		//$server = "172.16.2.208";
		$server = "172.21.12.250";
		$username = "CN=Footprints,CN=Users,DC=rpac,DC=org";
		$password = "support";
		$dn = "CN=Users,DC=rpac,DC=org";
		$dn1 = "OU=Proxy Users,DC=rpac,DC=org";
		$dn2 = "OU=RA Users,DC=rpac,DC=org";
	}
	else {
		//$server = "172.18.11.206";
		//$server = "172.18.10.208";
		$server = "10.2.0.47";
		$username = "CN=Footprints,CN=Users,DC=rpac,DC=org";
		$password = "support";
		$dn = "DC=org";
	}

	// This establishes a connection to a LDAP server on a specified hostname and port.
	$ldap = @ldap_connect("ldap://$server",389) or die("Could not connect to the LDAP server, $server.");

	if ( $ldap ) {
		// This does a bind operation on the directory
		$bind_results = @ldap_bind($ldap, $username, $password) or die("Could not bind to the server <b>$server</b>!");

		// string filter
		$filter="(sn=" . $lastname . "*)";

		// array attributes
		$nds_stuff = array("sn", "givenname", "telephonenumber",  "facsimiletelephonenumber", "department", "mail");

		// This performs the search for a specified filter on the directory with the scope of LDAP_SCOPE_SUBTREE
		//$results = ldap_search($ldap, $dn, $filter, $nds_stuff, "0 attrsonly" );
		$results = ldap_search($ldap, $dn, $filter, $nds_stuff);

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

	// This checks to make sure he bind
	if ( $info["count"] != 0 ) {
		echo "";

		// This loops Through the array
		for ($i=0; $i < $info["count"]; $i++) {
			// This line looks to see if FullName actually has a name if not skip
			//if ($info[$i]["telephonenumber"][0]) {
			if ( $info[$i]["telephonenumber"][0] && $info[$i]["mail"][0] ) {
				// I basically put the results in a table.
				echo "       
				<tr>
				<td valign='center' align='left' bgcolor='#ffffff'><font face='Arial, Helvetica, sans-serif' size='2'>" . $info[$i]["sn"][0] . "&nbsp;&nbsp;&nbsp;</font></td>
				<td valign='center' align='left' bgcolor='#ffffff'><font face='Arial, Helvetica, sans-serif' size='2'>" . $info[$i]["givenname"][0] . "&nbsp;&nbsp;&nbsp;</font></td>
				<td valign='center' align='left' bgcolor='#ffffff'><font face='Arial, Helvetica, sans-serif' size='2'>" . $info[$i]["telephonenumber"][0] . "&nbsp;&nbsp;&nbsp;</font></td>
				<td valign='center' align='left' bgcolor='#ffffff'><a href='mailto:" . $info[$i]["mail"][0] . "'><font face='Arial, Helvetica, sans-serif' size='2' color=black>" . $info[$i]["mail"][0] . "</font></a></td>
				<td valign='center' align='left' bgcolor='#ffffff'><font face='Arial, Helvetica, sans-serif' size='2'>" . $info[$i]["department"][0] . "</font></td>
				</tr>
				";
			}
		}
	}

	// This checks to make sure he bind
	if ( $info1["count"] != 0 ) {
		echo "";

		// This loops Through the array
		for ($i=0; $i < $info1["count"]; $i++) {
			// This line looks to see if FullName actually has a name if not skip
			if ( $info1[$i]["telephonenumber"][0] && $info1[$i]["mail"][0] ) {
				// I basically put the results in a table.
				echo "       
				<tr>
				<td valign='center' align='left' bgcolor='#ffffff'><font face='Arial, Helvetica, sans-serif' size='2'>" . $info1[$i]["sn"][0] . "&nbsp;&nbsp;&nbsp;</font></td>
				<td valign='center' align='left' bgcolor='#ffffff'><font face='Arial, Helvetica, sans-serif' size='2'>" . $info1[$i]["givenname"][0] . "&nbsp;&nbsp;&nbsp;</font></td>
				<td valign='center' align='left' bgcolor='#ffffff'><font face='Arial, Helvetica, sans-serif' size='2'>" . $info1[$i]["telephonenumber"][0] . "&nbsp;&nbsp;&nbsp;</font></td>
				<td valign='center' align='left' bgcolor='#ffffff'><a href='mailto:" . $info1[$i]["mail"][0] . "'><font face='Arial, Helvetica, sans-serif' size='2' color=black>" . $info1[$i]["mail"][0] . "</font></a></td>
				<td valign='center' align='left' bgcolor='#ffffff'><font face='Arial, Helvetica, sans-serif' size='2'>" . $info1[$i]["department"][0] . "</font></td>
				</tr>
				";
			}
		}
	}

	// This checks to make sure he bind
	if ( $info2["count"] != 0 ) {
		echo "";

		// This loops Through the array
		for ($i=0; $i < $info2["count"]; $i++) {
			// This line looks to see if FullName actually has a name if not skip
			if ( $info2[$i]["telephonenumber"][0] && $info2[$i]["mail"][0] ) {
				// I basically put the results in a table.
				echo "       
				<tr>
				<td valign='center' align='left' bgcolor='#ffffff'><font face='Arial, Helvetica, sans-serif' size='2'>" . $info2[$i]["sn"][0] . "&nbsp;&nbsp;&nbsp;</font></td>
				<td valign='center' align='left' bgcolor='#ffffff'><font face='Arial, Helvetica, sans-serif' size='2'>" . $info2[$i]["givenname"][0] . "&nbsp;&nbsp;&nbsp;</font></td>
				<td valign='center' align='left' bgcolor='#ffffff'><font face='Arial, Helvetica, sans-serif' size='2'>" . $info2[$i]["telephonenumber"][0] . "&nbsp;&nbsp;&nbsp;</font></td>
				<td valign='center' align='left' bgcolor='#ffffff'><a href='mailto:" . $info2[$i]["mail"][0] . "'><font face='Arial, Helvetica, sans-serif' size='2' color=black>" . $info2[$i]["mail"][0] . "</font></a></td>
				<td valign='center' align='left' bgcolor='#ffffff'><font face='Arial, Helvetica, sans-serif' size='2'>" . $info2[$i]["department"][0] . "</font></td>
				</tr>
				";
			}
		}
	}

      }
}
//echo "\n</table><br>\n";
//echo "<a href='/phone-lists'>Click here to return to the search.</a>
echo "
</body>
</html>
";
?>
