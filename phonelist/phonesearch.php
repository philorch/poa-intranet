<?
if ( $_REQUEST['option'] ) {
//if ( $_SERVER["QUERY_STRING"] ) {
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
	echo "If you have reached this page in error please <a href='phone-lists'>Click Here</a>.\n";
	exit;
}

function mylogin ( $lastname ) {

	$total = 0;

	if ( $lastname == '*' ) {
		$lastname = '';
	}

	$lastname = stripslashes($lastname);

	if ( $_REQUEST['domain'] == 0 ) {
		//$server = "10.2.0.44";
		$server = "10.2.0.20";
		$username = "CN=Footprints,CN=Users,DC=philorch,DC=org";
		$password = "support";
		$dn = "CN=Users,DC=philorch,DC=org";
		$dn1 = "OU=IPCC,DC=philorch,DC=org";
	}
	else if ( $_REQUEST['domain'] == 1 ) {
		//$server = "172.16.2.201";
		//$server = "10.2.0.37";
		$server = "172.21.12.250";
		$username = "CN=Footprints,CN=Users,DC=rpac,DC=org";
		$password = "support";
		$dn = "CN=Users,DC=rpac,DC=org";
		$dn1 = "OU=Proxy Users,DC=rpac,DC=org";
		$dn2 = "OU=RA Users,DC=rpac,DC=org";
	}
	else {
		//$server = "172.18.11.206";
		//$server = "172.18.10.202";
		$server = "10.2.0.47";
		$username = "CN=Footprints,CN=Users,DC=rpac,DC=org";
		$password = "support";
		$dn = "DC=org";
	}

	// This establishes a connection to a LDAP server on a specified hostname and port.
	$ldap = @ldap_connect("ldap://$server",389) or die("Could not connect to the LDAP server, $server.");
	ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

	if ( $ldap ) {
		// This does a bind operation on the directory
		$bind_results = @ldap_bind($ldap, $username, $password) or die("Could not bind to the server <b>$server</b>!");

		// string filter
		$filter="(sn=" . $lastname . "*)";

		// array attributes
		$nds_stuff = array("sn", "givenname", "telephonenumber",  "facsimiletelephonenumber", "department", "mail");

		// This performs the search for a specified filter on the directory with the scope of LDAP_SCOPE_SUBTREE
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

	echo "<html>
	<head>
	<title>Phone List Results | Octaves</title>
	<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
	<script language='JavaScript'>
	<!--
	function MM_swapImgRestore() { //v3.0
		var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
	}

	function MM_findObj(n, d) { //v4.0
		var p,i,x;
		if ( !d ) d = document;
		if ( ( p = n.indexOf('?') ) > 0 && parent.frames.length ) {
			d = parent.frames[n.substring(p+1)].document;
			n = n.substring(0,p);
		}
		if ( !(x=d[n]) && d.all )
			x=d.all[n]; 
			for ( i=0;!x&&i<d.forms.length;i++ ) 
				x = d.forms[i][n];
			for (i=0;!x&&d.layers&&i<d.layers.length;i++) 
				x = MM_findObj(n,d.layers[i].document);
			if ( !x && document.getElementById ) 
				x = document.getElementById(n);

		return x;
	}

	function MM_swapImage() { //v3.0
		var i,j=0,x,a=MM_swapImage.arguments;
		document.MM_sr=new Array; 
		for(i=0;i<(a.length-2);i+=3)
			if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; 
			if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];
		}
	}
	//-->
	</script>
	</head>

	<body style='margin: 0;'>
		
	 <table width='100%' cellpadding='0' cellspacing='0'><tr bgcolor='#232323'>
          <td><img src='https://intranet.philorch.org/dark-grey-spacer.jpg' width='3' height='28'></td></tr>
          <tr bgcolor='#eeeeee'>
            <td height='115'><a href='https://intranet.philorch.org'><img src='https://intranet.philorch.org/sites/default/files/logo-octaves_0.png' width='200' height='50' style='margin-left: 100px'></a></td>
          </tr>
          <tr bgcolor='#d4d4d4' height='7px'>
            <td height='7px'><img src='https://intranet.philorch.org/phonelist/grey-spacer.jpg' width='3' height='7'></td>
          </tr>
          <tr>
            <td bgcolor='#232323' height='78'><p style='font-size:24px; color:#FFF; font-family:Arial, Helvetica, sans-serif; margin-left: 100px;'>PHONE LIST RESULTS</p></td>
          </tr>
          <tr bgcolor='#d4d4d4' height='7px'>
            <td height='7px'><img src='https://intranet.philorch.org/phonelist/grey-spacer.jpg' width='3' height='7'></td>
          </tr>
          <tr >
            <td >&nbsp;</td>
          </tr>
          <tr>
            <td><table border='0' cellspacing='5' cellpadding='5' width='80%' style='margin-left:100px;'>
              <tr>
                <td valign='center'  bgcolor='#d4d4d4'><p style='font-family:Arial, Helvetica, sans-serif;; font-size:14px;'><strong>Last Name&nbsp;&nbsp;&nbsp;</strong></p></td>
                <td valign='center' bgcolor='#d4d4d4'><p style='font-family:Arial, Helvetica, sans-serif; font-size:14px;'><strong>First Name&nbsp;&nbsp;&nbsp;</strong></p></td>
                <td valign='center'  bgcolor='#d4d4d4'><p style='font-family:Arial, Helvetica, sans-serif; font-size:14px;'><strong>Phone&nbsp;&nbsp;&nbsp;</strong></p></td>
                <td valign='center'  bgcolor='#d4d4d4'><p style='font-family:Arial, Helvetica, sans-serif; font-size:14px;'><strong>Email</strong></p></td>
                <td valign='center' bgcolor='#d4d4d4'><p style='font-family:Arial, Helvetica, sans-serif; font-size:14px;'><strong>Department</strong></p></td>
              </tr>";

	$x = 0;

	if ( $info["count"] != 0 ) {
		echo "";

		// This loops Through the array
		for ($i=0; $i < $info["count"]; $i++) {
			// Add to array to be sorted
			if ( $info[$i]["telephonenumber"][0] && $info[$i]["mail"][0] ) {
				$foobar[$x] = $info[$i]['sn'][0] . "," . $info[$i]['givenname'][0] . "," . $info[$i]['telephonenumber'][0] . "," . $info[$i]['mail'][0] . "," . $info[$i]['department'][0];
				//print "$foobar[$x] <br>";	
				$x++;
			}
		}
	}

	if ( $info1["count"] != 0 ) {
		echo "";

		// This loops Through the array
		for ($i=0; $i < $info1["count"]; $i++) {
			// Add to array to be sorted
			if ( $info1[$i]["telephonenumber"][0] && $info1[$i]["mail"][0] ) {
				$foobar[$x] = $info1[$i]['sn'][0] . "," . $info1[$i]['givenname'][0] . "," . $info1[$i]['telephonenumber'][0] . "," . $info1[$i]['mail'][0] . "," . $info1[$i]['department'][0];
				//print "$foobar[$x] <br>";	
				$x++;
			}
		}
	}

	if ( $info2["count"] != 0 ) {
		echo "";

		// This loops Through the array
		for ($i=0; $i < $info2["count"]; $i++) {
			// Add to array to be sorted
			if ( $info2[$i]["telephonenumber"][0] && $info2[$i]["mail"][0] ) {
				$foobar[$x] = $info2[$i]['sn'][0] . "," . $info2[$i]['givenname'][0] . "," . $info2[$i]['telephonenumber'][0] . "," . $info2[$i]['mail'][0] . "," . $info2[$i]['department'][0];
				//print "$foobar[$x] <br>";	
				$x++;
			}
		}
	}

	sort($foobar);
	foreach ( $foobar as $key => $value ) {
		//print "$value<br>";
		list($last,$first,$phone,$email,$dept) = split(",", $value, 5);
		//print "$last - $first - $phone - $email - $dept<br>";
		echo "       
		<tr >
		<td valign='center' align='left' bgcolor='#ffffff'><font face='Arial, Helvetica, sans-serif' size='2'>" . $last . "&nbsp;&nbsp;&nbsp;</font></td>
		<td valign='center' align='left' bgcolor='#ffffff'><font face='Arial, Helvetica, sans-serif' size='2'>" . $first . "&nbsp;&nbsp;&nbsp;</font></td>
		<td valign='center' align='left' bgcolor='#ffffff'><font face='Arial, Helvetica, sans-serif' size='2'>" . $phone . "&nbsp;&nbsp;&nbsp;</font></td>
		<td valign='center' align='left' bgcolor='#ffffff'><a href='mailto:" . $email . "'><font face='Arial, Helvetica, sans-serif' size='2' color=black>" . $email . "</font></a></td>
		<td valign='center' align='left' bgcolor='#ffffff'><font face='Arial, Helvetica, sans-serif' size='2'>" . $dept . "</font></td>
		</tr>
		";



	}

	
      }
}
echo "\n</table><br>\n";
echo "<p style='margin-left: 100px; font-family:Arial, Helvetica, sans-serif;'><a href='/phone-lists' style='color:#F00'><strong>Click here to return to the search.</strong></a></p><p>&nbsp;</p><p>&nbsp;</p>
</body>
</html>
";
?>
