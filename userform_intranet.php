<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>The Philadelphia Orchestra Association Intranet</title>
<script language="JavaScript">
<!--
	function redirect_page() {
		window.location='intranet_hr.html';
	}
</script>
</head>
<body>
<table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" >
	<tr>
	  <td bgcolor="#2e2e2e">&nbsp;</td>
  </tr>
	<tr style=" background-image:url(images/NewOctavesRedesigned/background-image.jpg);background-repeat:repeat-x;">
		<td background="images/NewOctavesRedesigned/background-image.jpg"  scope="col" align="left"><table width="850" cellpadding="0" cellspacing="0" align="center"><tr><td><img src="images/NewOctavesRedesigned/octaves2-logo.jpg" width="245" height="114" style="m"></td></tr></table></td>
	</tr>
	<tr>
		<td bgcolor="#FFFFFF" scope="col"><div align="left">
		<table width="850px" border="0" align="center" cellpadding="0" cellspacing="0" >
		<tr>
			<td valign="top" scope="col">
			<table width="850px" cellpadding="0" cellspacing="0" align="center">
			<tr>
			  <td height="279" valign="top" scope="col">
			   <p ><strong style="font-size:48px">New User Form</strong><br/>
			    <span style="font-size:18px">(POA / AOM / TP)</span></p>
			    <?
					// Check if the page is being opened from view list page.
					// It sends teh application no.
					$dspUser = $_POST[app_no];

					if ( $dspUser == '' ) { 		// Print the entry form.
						$FORM_TYPE = 'NEW';
					}
					else { 					//Print the previous form of selected user.
						$FORM_TYPE='DISPLAY';
					}

					if ( $_POST['pg_status'] == '' ) {
						PrintForm ( $FORM_TYPE,$dspUser );
					}
					else {
						ProcessForm( $FORM_TYPE,$dspUser );
					}
				print("</font></td></tr>");
    
					if ( $FORM_TYPE == 'DISPLAY' ) {	// Print the links only for authorized users.
						print(" <tr><td>&nbsp;</td></tr> <tr><td><font size=2 face=\"Arial, Helvetica, sans-serif color='#336600' \" ><a href='userform.php'>New User</a> | <a href='UserAppList.php'>View list</a> | <a href='userapp_unloading.php'>Logout</a> </font></td></tr>");
					}

					// Function that creates the form page.
					// Three states of form:
					// 1. New Form: To enter new data.
					// 2. Validation form: Form with data and validation error
					// 3. Query Form: Form which displays previous user data, opened from view list.
					Function PrintForm ( $form_type,$dsp_application_no ) {
						$Link = mysql_connect ("localhost", "sadb","buendia100");
						$dResult = mysql_db_query ("app", "select * from user_app where application_no='$dsp_application_no'", $Link);
						$dRow = mysql_fetch_array($dResult);

						if ( $form_type == 'DISPLAY' ) { // Fetch data from database to display.
							$dapp_no = $dRow[application_no];
							$dfirst_name=$dRow[first_name];
							$dlast_name=$dRow[last_name];
							$ddept_code=$dRow[dept_code];
							$dtitle=$dRow[title];
							$dphone_ext=$dRow[phone_ext];
							$dstart_date=$dRow[start_date];
							$dloc_code=$dRow[loc_code];
							$dnew_hw=$dRow[new_hw];
							$dnew_phone=$dRow[new_phone];
							$dnew_position=$dRow[new_position];
							$dprev_user_name=$dRow[prev_user_name];
							$dartsoft_access=$dRow[artsoft_access];
							$daccess_folder1=$dRow[access_folder1];
							$daccess_folder2=$dRow[access_folder2];
							$daccess_folder3=$dRow[access_folder3];
							$daccess_folder4=$dRow[access_folder4];
							$daccess_folder5=$dRow[access_folder5];
							$daccess_folder6=$dRow[access_folder6];
							$ddept_app=$dRow[dept_app];
							$dother_dept_app=$dRow[other_dept_app];
							$dcomments=$dRow[comments];
							$dsubmitted_by=$dRow[submitted_by];
							$dapproved_by=$dRow[approved_by];
							$dsubmitted_on=$dRow[submitted_on];
							$dapproved_on=$dRow[approved_on];
							$dsubmitby_email=$dRow[submitby_email];
						}

						// If form is posted, get the posted field values.
						// So that we can assign these values to the fields,
						// in case we need to display the validation error.
         if ($_POST[app_no]<>'') {$dapp_no= $_POST[app_no];} 
         if ($_POST[first_name]<>'') {$dfirst_name= $_POST[first_name];}
         if ($_POST[last_name]<>'') {$dlast_name= $_POST[last_name];}
         if ($_POST[dept_code]<>'') {$ddept_code = $_POST[dept_code];}
         if ($_POST[title]<>'') {$dtitle = $_POST[title];}
         if ($_POST[phone_ext]<>'') {$dphone_ext = $_POST[phone_ext];}
         if ($_POST[start_date]<>'') {$dstart_date = $_POST[start_date];}
         if ($_POST[loc_code]<>'') {$dloc_code = $_POST[loc_code];}
         if ($_POST[new_hw]<>'') {$dnew_hw = $_POST[new_hw];}
         if ($_POST[new_phone]<>'') {$dnew_phone = $_POST[new_phone];}
         if ($_POST[new_position]<>'') {$dnew_position = $_POST[new_position];}
         if ($_POST[prev_user_name]<>'') {$dprev_user_name = $_POST[prev_user_name];}
         if ($_POST[artsoft_access]<>'') {$dartsoft_access = $_POST[artsoft_access];}
         if ($_POST[access_folder1]<>'') {$daccess_folder1 = $_POST[access_folder1];}
         if ($_POST[access_folder2]<>'') {$daccess_folder2 = $_POST[access_folder2];}
         if ($_POST[access_folder3]<>'') {$daccess_folder3 = $_POST[access_folder3];}
         if ($_POST[access_folder4]<>'') {$daccess_folder4 = $_POST[access_folder4];}
         if ($_POST[access_folder5]<>'') {$daccess_folder5 = $_POST[access_folder5];}
         if ($_POST[access_folder6]<>'') {$daccess_folder6 = $_POST[access_folder6];}
         if ($_POST[dept_app]<>'') {$ddept_app = $_POST[dept_app];}
         if ($_POST[other_dept_app]<>'') {$dother_dept_app = $_POST[other_dept_app];}
         if ($_POST[comments]<>'') {$dcomments = $_POST[comments];}
         if ($_POST[submitted_by]<>'') {$dsubmitted_by = $_POST[submitted_by];}
         if ($_POST[approved_by]<>'') {$dapproved_by = $_POST[approved_by];}
         if ($_POST[submitted_on]<>'') {$dsubmitted_on = $_POST[submitted_on];}
         if ($_POST[approved_on]<>'') {$dapproved_on = $_POST[approved_on];}
         if ($_POST[submitby_email]<>'') {$dsubmitby_email = $_POST[submitby_email];}
      
     // This form calls itself on submit.
 
      print(" <form name='pronunlist' method='post' action='$_SERVER[PHP_SELF]'>
      <hr size=0>
      <input type='hidden' name='pg_status' value='0'> <input type='hidden' name='app_no' value='$dapp_no'>
      <input type='hidden' name='form_submitting' value='1'>
      <table width='800'>
       <tr>
        <td><font face='Arial, Helvetica, sans-serif' size='2'> First Name </font></td>
        <td><font face='Arial, Helvetica, sans-serif' size='2'> Last Name </font> </td>
        <td><font face='Arial, Helvetica, sans-serif' size='2'> Department </font>   </td>
        <td><font face='Arial, Helvetica, sans-serif' size='2'> Title </font>   </td>
        <td><font face='Arial, Helvetica, sans-serif' size='2'> Phone Ext </font>  </td>
        <td><font face='Arial, Helvetica, sans-serif' size='2'> Start Date </font>  </td>
       </tr>
       <tr>");
       print(" <td><input type='text' name='first_name' size='20' maxlength='30' value='$dfirst_name' > </td>
        <td><input type='text' name='last_name' size='20' maxlength='30' value = '$dlast_name' > </td>
        <td> "); 
    // Populate the department List.
    $Result = mysql_db_query ("app", "select * from department order by department", $Link);
    print(" <select name='dept_code' > <option value='Select'>Select... </option>");
    while ($Row1 = mysql_fetch_array($Result))
    {
     if ( $Row1[dept_code] == $ddept_code) {
      print ("<option value = '$Row1[dept_code]' SELECTED> $Row1[department] </option>");
     } 
     else {
      print ("<option value = '$Row1[dept_code]'> $Row1[department] </option>");
     }     
    }
    print ("</select>");    
    print("</td>
        <td><input type='text' name='title' size='17' maxlength='30' value='$dtitle'> </td>
        <td><input type='text' name='phone_ext' size='8' maxlength='30' value='$dphone_ext'> </td>
        <td><select name='start_date' > <option value = 'Select'>Select...</option>" );     
    // Populate dates in Start Date (A month back to a month ahead)
       $tm = 86400;
       $dys = -30;
       while ( $dys <= 30){
        $stDate = getdate(time() + $tm * $dys);       
        $stmm = $stDate["mon"];
        if ($stmm < 10) {$stmm = '0' . $stmm;} // month in two digits.
        $stdy = $stDate["mday"];
        if ($stdy < 10) {$stdy = '0' . $stdy;}
        $fdate =  $stDate["year"]. "-" .  $stmm . "-" . $stdy; 
        print ("<option value='$fdate'");
        if ($dstart_date == $fdate){print ("selected ");}
        print("> $fdate </option>" );
        $dys += 1;
        }
   print("</select></td> </tr>             
      </table>
      <table>  <tr>
        <td width='22%'> <font face='Arial, Helvetica, sans-serif' size='2'> User Location</font> </td> 
	<td  width= '15%'><font face='Arial, Helvetica, sans-serif' size='2'> New Hardware </font></td>
        <td  width= '15%'><font face='Arial, Helvetica, sans-serif' size='2'> New Phone </font></td>
        <td  width= '15%'><font face='Arial, Helvetica, sans-serif' size='2'> New Position</font></td>
	<td><font face='Arial, Helvetica, sans-serif' size='2'>  If not new position, give previous user name</font> </td>
      </tr><tr><td> <font face='Arial, Helvetica, sans-serif' size='2'>");

    $Result = mysql_db_query ("app", "select * from location order by location", $Link);
    print("<select name='loc_code'> <option value='Select'>Select... </option>");
    while ($Row1 = mysql_fetch_array($Result))
    {
    if ($Row1[loc_code] == $dloc_code) {
     print ("<option value='$Row1[loc_code]' SELECTED> $Row1[location] </option>");
    }
    else {
     print ("<option value = '$Row1[loc_code]'> $Row1[location] </option>");
    }
    }
    print ("</select>");
    print("</font></td><td><font face='Arial, Helvetica, sans-serif' size='2'>Yes
           <INPUT TYPE='radio' NAME='new_hw' VALUE='Y'");
    if ($dnew_hw == 'Y' || $dnew_hw <> 'N' ) { print ("CHECKED");}
    print (" > No <INPUT TYPE='radio' NAME='new_hw' VALUE='N'");
    if ($dnew_hw == 'N' ) { print ("CHECKED");}
    print ("> </font></td><td><font face='Arial, Helvetica, sans-serif' size='2'> Yes <INPUT TYPE='radio' NAME='new_phone' VALUE='Y' ");
   if ($dnew_phone == 'Y'|| $dnew_phone <> 'N' ) { print ("CHECKED");}
   print("> No <INPUT TYPE='radio' NAME='new_phone' VALUE='N'");
   if ($dnew_phone == 'N' ) { print ("CHECKED");}
   print("></font></td>
   <td><font face='Arial, Helvetica, sans-serif' size='2'> Yes <INPUT TYPE='radio' NAME='new_position' VALUE='Y'");
   if ($dnew_position == 'Y'  || $dnew_position <> 'N' ) { print ("CHECKED");}
   print("> No <INPUT TYPE='radio' NAME='new_position' VALUE='N'");
   if ($dnew_position == 'N' ) { print ("CHECKED");}
   print("></font></td>
   <td> <input type='text' name='prev_user_name' size='40' maxlength='50' value='$dprev_user_name'>  </td>
   </tr></table ><hr size=0>");

   // Do ldap search to find out the email groups.

   $ldap_host = "ldap://poafs01.philorch.org/";
   //$ldap_host = "ldap://poagc02.philorch.org/";
   $ldap_port = "389";
   $dn = "OU=Groups,DC=philorch,DC=org";
   $username="footprints";
   $password="support";
   $filter = "(|(cn=*))";
   $nds_stuff = array("displayName");

   $connect = @ldap_connect("$ldap_host",389) or die("Could not connect to POAFS01 LDAP server!");
   $bind_results = @ldap_bind($connect,"CN=" . $username . ",CN=Users,DC=PHILORCH,DC=org", $password);
   $read = ldap_search($connect, $dn, $filter, $nds_stuff);
   $info = ldap_get_entries($connect, $read); 

   print("<b>Please check off the email groups that the new user should be added to:</b><br>");
   print("<table>\n<tr>\n");

   $email_groups = $_POST[email_group];
   $cnt = 0;
   $rowCnt = 3;

   if ( $info["count"] != 0 ) {

         for ( $i = 0; $i < $info["count"]; $i++ ) {
		for ( $j = 0; $j < $info[$i]["count"]; $j++ ) {

			if ( $rowCnt % 3 == 0 ) {
				if ( $rowCnt <> 3 ) {
					print ("</tr>");
				} 
				print ("<tr>");
			}

			$data = $info[$i][$j];
			$dataval = $info[$i][$data][0];

			if ( $dataval == "rpacex02_system_wide" ) {
				break;
			}
			else {
				print ( "<td><font face=\"Arial, Helvetica, sans-serif\" size=\"2\">" );
				print ( "<input type='checkbox' name='email_group[]' value='$dataval'" );
			}

			$is_checked = 0;
			$cnt = 0;

			if ( count( $email_groups ) > 0 ) {
				while ( $cnt <= count ( $email_groups ) ) {
					if ( $email_groups[$cnt] == $dataval ) {
						$is_checked = 1;
						break;
					}
				$cnt += 1;
				}
			} //end if
			else {
				if ( $form_type == 'DISPLAY' )  {	//if displaying previous user's data, get assigned email groups.
					$Result_email = mysql_db_query ("app", "select * from user_email_groups where application_no='$dsp_application_no' and trim(group_code) =trim('$dataval')", $Link );
					$Row1 = mysql_fetch_array($Result_email);
   					if ( mysql_numrows ( $Result_email ) > 0 ) {
						$is_checked = 1;
					}
				}
			} // end of else

			if ( $is_checked == 1 ) {
				print (" checked "); 
			}
		print("> $dataval </font></td> ");
		$rowCnt += 1;
		}
	}
	print "</table>\n";
	print("<hr size=0>
		<table>
		<td valign='baseline' height='1'> <font face='Arial, Helvetica, sans-serif' size='2'> <b>File Rights:</b>Please list the folder names that user will need access to. If needs entire department, list departments.</font> </td> </tr>
 		<tr> <table ><tr>
		<td>1. <input type='text' name='access_folder1' size='40' maxlength='80'  value='$daccess_folder1' > </td>
		<td>2. <input type='text' name='access_folder2' size='40' maxlength='80' value='$daccess_folder2'> </td>
		</tr>
		<tr>
		<td>3. <input type='text' name='access_folder3' size='40' maxlength='80' value='$daccess_folder3'> </td>
		<td>4. <input type='text' name='access_folder4' size='40' maxlength='80' value='$daccess_folder4'> </td>
		</tr>
		<tr>
		<td>5. <input type='text' name='access_folder5' size='40' maxlength='80' value='$daccess_folder5'> </td>
		<td>6. <input type='text' name='access_folder6' size='40' maxlength='80' value='$daccess_folder6'> </td>
		</tr>
		</table >
		</tr>
		</table >");

		$applications = $_POST[dept_app];
		$Result = mysql_db_query ("app", "select * from dept_application order by app_code", $Link);
		$rowCnt =5;
		print("<font size=\"2\" face=\"arial, sans-serif\"><b>Please check off all Department applications needed </b></font>");
		print("<table > ");
		while ( $Row1 = mysql_fetch_array($Result) ) {
			if ( $rowCnt % 5 == 0 ) {
				if ( $rowCnt <> 5 ) {
					print ("</tr>");
				} 
				print ("<tr>");
			}
			print ("<td><font face=\"Arial, Helvetica, sans-serif\" size=\"2\"> <input type='checkbox' name='dept_app[]'  value = '$Row1[app_code]'");
			$is_checked = 0;
			$cnt = 0;

			if ( count($applications) > 0 ) {
				while ( $cnt < count($applications) ) {
					if ( $applications[$cnt] == $Row1[app_code] ) {
						$is_checked = 1; 
						break; 
					}
				$cnt += 1;
				}
			}
			else {
				if ( $form_type == 'DISPLAY' )  {
					$Result_apps = mysql_db_query ("app", "select * from user_dept_apps where application_no='$dsp_application_no'  and trim(dept_app)=trim('$Row1[app_code]')",$Link);
					$Rowa = mysql_fetch_array($Result_apps);
					if ( mysql_numrows($Result_apps) > 0 ) {
						$is_checked = 1;
					}
				} // end for if form_type=DISPLAY
			}

			if ( $is_checked == 1) { 
				print (" checked ");
			}
			print ("> $Row1[application]</font></td>");
			$rowCnt += 1;
		}
	print ("</table >");
	print("<table width='800'>
		<tr>  <td width='20%'> <font face='Arial, Helvetica, sans-serif' size='2'> Other Applications: </font></td>
		<td> <input type='text' name='other_dept_app' size='60' maxlength='80' value='$dother_dept_app'> </td></tr>
		</table > <hr size=0>");

	$filter = "cn=*";
	//$base_dn = "CN=POAGC02,OU=Domain Controllers,DC=philorch,DC=org";
	$base_dn = "CN=POAFS01,OU=Domain Controllers,DC=philorch,DC=org";
	$connect = @ldap_connect( $ldap_host, $ldap_port);
	$bind = @ldap_bind($connect,"CN=" . $username . ",CN=Users,DC=PHILORCH,DC=org", $password);
	$nds_stuff = array("printShareName");
	$read = @ldap_search($connect, $base_dn, $filter,$nds_stuff);
	$info = @ldap_get_entries($connect, $read);

	print("<font face='Arial, Helvetica, sans-serif' size='2'> <b> Please check off the printers needed:</b></font>");
	print("<table > ");
	$printers = $_POST[printer_req];
	$cnt = 0;
	$rowCnt = 3;

	for( $i=0; $i<$info["count"]; $i++) {
		for( $j=0; $j<$info[$i]["count"]; $j++) {
			if ( $rowCnt % 3 == 0 ) {
				if ( $rowCnt <> 3 ) {
					print ("</tr>");
				}
				print ("<tr>");
			}

		$data = $info[$i][$j];
		$dataval = $info[$i][$data][0];
		//$dataval = str_replace("POAGC02-", "", $dataval);

		print ("<td><font face=\"Arial, Helvetica, sans-serif\" size=\"2\">");
		print ("<input type='checkbox' name='printer_req[]'  value = '$dataval'");

		$is_checked = 0;
		$cnt = 0;

		if ( count($printers) > 0 ) {
			while ( $cnt <= count($printers) ) {
				if ( $printers[$cnt] == $dataval ) {
					$is_checked = 1;
					break; 
				}
			$cnt += 1;
			}
		}
		else {
			if ( $form_type == 'DISPLAY') {
				$Result_printer = mysql_db_query ("app", "select * from user_printers where app_no='$dsp_application_no' and trim(printer) =trim('$dataval')", $Link);
				$Rowp = mysql_fetch_array($Result_printer);
				if ( mysql_numrows($Result_printer) > 0 ) {
					$is_checked = 1;
				}
			}
		}

		if ( $is_checked == 1) {
			print (" checked ");
		}

		print("> $dataval </font></td> ");
		$rowCnt += 1;
	}
   }

print ("</table >");
print("<hr size=0> <table width='800'>
	<tr> <td width='10%'><font face='Arial, Helvetica, sans-serif' size='2'> Comments </font> </td>
	<td>  <textarea name='comments' cols='80' rows='4' maxlength='255'>$dcomments </textarea>" );
print (" </td></tr> </table>");
print("<hr size=0> <table width='800'>
	<tr> <td><font face='Arial, Helvetica, sans-serif' size='2'> Submitted By</font> </td>
	<td>  <input type='text' name='submitted_by' size='20' maxlength='80' value='$dsubmitted_by'> </td>");
  	if ($form_type == 'DISPLAY')  {
		print ( "<td><font face='Arial, Helvetica, sans-serif' size='2'> Approved By</font> </td>
			<td>  <input type='text' name='approved_by' size='20' maxlength='80' value='$dapproved_by'> </td>");
	}
print("</tr><tr> <td width='15%'><font face='Arial, Helvetica, sans-serif' size='2'> Submitted On <font> </td>
	<td><input type='text' name='submitted_on' size='20' value=" );

	if ( $dsubmitted_on <> "" ) {
		print ("'$dsubmitted_on' readonly > ");
	}
	else {
		$stDate = getdate();
		$stmm = $stDate["mon"];
		if ( $stmm < 10 ) {
			$stmm = '0' . $stmm;
		}
		$stdy = $stDate["mday"];
		if ( $stdy < 10) {
			$stdy = '0' . $stdy;
		}
		$fdate =  $stDate["year"]. "-" .  $stmm . "-" . $stdy;
		print ("'$fdate' readonly >");
	}

	print("</td>");
	if ( $form_type == 'DISPLAY' ) {
		print ( "<td width='15%'><font face='Arial, Helvetica, sans-serif' size='2'> Approved On <font> </td> <td><input type='text'  name='approved_on' size=20  readonly value = " );
		if ( $dapproved_on <>"" ) {
			print ("'$dapproved_on' readonly >");
		}
		else {
			$stDate = getdate();
			$stmm = $stDate["mon"];
			if ( $stmm < 10 ) {
				$stmm = '0' . $stmm;
			}
			$stdy = $stDate["mday"];
			if ( $stdy < 10 ) {
				$stdy = '0' . $stdy;
			}
			$fdate =  $stDate["year"]. "-" .  $stmm . "-" . $stdy;
			print ("'$fdate' readonly >");
		}
		print("</td>");
	}
	print("</tr>
		<tr> <td width='15%'><font face='Arial, Helvetica, sans-serif' size='2'> Email Address<font> </td>
		<td>  <input type='text' name='submitby_email' size='20' maxlength='80' value='$dsubmitby_email'> </td></tr>
		<tr><td></td> <td>  <input type='Submit' border='0' name='Submit' value='Submit'> </td></tr>
		</table>
		<hr size=0>
		</form>");
	mysql_close ($Link);
   }   
}

// This function is called when the form is submitted. It does form valication.
// If successfully validated, it inserts/updates the record in database.
// If not form is displayed with validation errors.

Function ProcessForm($form_type,$dsp_application_no) {
	$err_index = 0;
	$err_status = 0; //No error occored yet.
	$form_err[$err_index]= 'Errors';
	$err_index += 1;

	if ( $_POST[first_name] == '' ) {
		$form_err[$err_index] = 'First Name is required.';
		$err_index += 1;
		$err_status = 1;
	}

	if ( $_POST[last_name] == '' ) {
		$form_err[$err_index] = 'Last Name is required.';
		$err_index += 1;
		$err_status = 1;
	}

	if ( $_POST[dept_code] == 'Select' ) {
		$form_err[$err_index] = 'Department is required.';
		$err_index += 1;
		$err_status = 1;
	}

	if ( $_POST[title] == '' ) {
		$form_err[$err_index] = 'Title is required.';
		$err_index += 1;
		$err_status = 1;
	}

	if ( $_POST[start_date] == '' || $_POST[start_date] == 'Select' ) {
		$form_err[$err_index] = 'Start Date is required.';
		$err_index += 1;
		$err_status = 1;
	}

	if ( $_POST[new_position] == 'N' ) {
		if ( $_POST[prev_user_name] == '' ) {
			$form_err[$err_index] = 'Previous user name is required if new position is No.';
			$err_index += 1;
			$err_status = 1;
		}
	}

	if ( $_POST[access_folder1] == '' ) {
		$form_err[$err_index] = 'At least one folder access is required.';
		$err_index += 1;
		$err_status = 1;
	}

	if ( $_POST[loc_code] == 'Select' ) {
		$form_err[$err_index] = 'Location is required.';
		$err_index += 1;
		$err_status = 1;
	}

	if ( $_POST[submitted_by] == '' ) {
		$form_err[$err_index] = 'Submiting users name is required.';
		$err_index += 1;
		$err_status = 1;
	}

	if ( $_POST[submitby_email] == '' ) {
		$form_err[$err_index] = 'Submiting users email id is required.';
		$err_index += 1;
		$err_status = 1;
	}
	elseif ( strpos ( $_POST[submitby_email],'@' ) <= 0 || strpos ( $_POST[submitby_email],'.' ) <= 0 ||
		strpos( $_POST[submitby_email],':' ) >= 1 || strpos ( $_POST[submitby_email],';' ) >= 1 ||
		strpos( $_POST[submitby_email],'/' ) >= 1 || strpos ( $_POST[submitby_email],',') >= 1 ) {
		$form_err[$err_index] = 'Enter valid email address for submitting user.';
		$err_index += 1;
		$err_status = 1;
	}

	if ( $form_type == 'DISPLAY' ) {
		if ( $_POST[approved_by] == '' ) {
			$form_err[$err_index] = 'Approving HR users name is required.';
			$err_index += 1;
			$err_status = 1;
		}
		if ( $_POST[approved_on] == '' ) {
			$form_err[$err_index] = 'Approval date is required.';
			$err_index += 1;
			$err_status = 1;
		}
	}

	if ( $err_status == 0 ) { // If no error in filling up data, then insert data into the database.
		if ($form_type == 'NEW') {
			print("<br>New User Form Submitted");
			// Insert record into the database.
			$Link = mysql_connect ("localhost", "sadb","buendia100");
			$InsertStmt= "Insert into user_app (first_name, last_name, dept_code, title, phone_ext, start_date, new_hw, new_phone,
					new_position, prev_user_name, artsoft_access, access_folder1, access_folder2, access_folder3,
					access_folder4, access_folder5, access_folder6,other_dept_app, loc_code, comments, submitted_by, 
					submitted_on, submitby_email) values
					('$_POST[first_name]','$_POST[last_name]','$_POST[dept_code]','$_POST[title]','$_POST[phone_ext]',
					'$_POST[start_date]','$_POST[new_hw]','$_POST[new_phone]', '$_POST[new_position]',
					'$_POST[prev_user_name]','$_POST[artsoft_access]','$_POST[access_folder1]','$_POST[access_folder2]',
					'$_POST[access_folder3]','$_POST[access_folder4]','$_POST[access_folder5]','$_POST[access_folder6]',
					'$_POST[other_dept_app]','$_POST[loc_code]','$_POST[comments]','$_POST[submitted_by]',
					'$_POST[submitted_on]','$_POST[submitby_email]')";

			if ( mysql_db_query ('app',$InsertStmt,$Link) ) {
				// Insert records into detail (user_email_groups) table.
				$Result = mysql_db_query ("app", "select max(application_no) as app_no from user_app", $Link);
				$Row1 = mysql_fetch_array($Result);
				$appno = $Row1[app_no];

				$email_groups = $_POST[email_group];
				$cnt = 0;

				//  print ("appno= $appno grps = " . count($email_groups));
	
				while ( $cnt < count($email_groups) ) {
					$InsertStmt = "Insert into user_email_groups(application_no,group_code) values
							($appno ,' $email_groups[$cnt]')";
					$Result = mysql_db_query('app',$InsertStmt,$Link);
					$cnt += 1;
				}

				$applications = $_POST[dept_app];
				$cnt = 0;
	
				while ($cnt < count($applications) ) {
					$InsertStmt= "Insert into user_dept_apps(application_no,dept_app) values
							($appno ,' $applications[$cnt]')";
      					$Result = mysql_db_query('app',$InsertStmt,$Link);
					$cnt += 1;
				}

				$printers = $_POST[printer_req];
				$cnt = 0;

				while ( $cnt < count($printers) ) {
					$InsertStmt= "Insert into user_printers(app_no,printer) values
						($appno ,'$printers[$cnt]')";
					$Result = mysql_db_query('app',$InsertStmt,$Link);
					$cnt += 1;
				}

				// Send Email to HR and user(manager)
				//
				// Recipients
				//$to =  "CVecchione@kimmelcenter.org, ktomlinson@philorch.org, acooke@philorch.org";
				//$to =  "ktomlinson@philorch.org, TVelykis@philorch.org";
				$to =  "ktomlinson@philorch.org";
				$bcc = "atsen@kimmelcenter.org";
				$subject = "New User Application TO APPROVE\r\n";
				$mailheaders = "From: $_POST[submitby_email] \r\nBcc: $bcc\r\n";
				$msg = "New User Application form has been submitted. Please approve.\r\n";
				$msg .= "User Name:    $_POST[first_name] $_POST[last_name]\r\n";
				$msg .= "Submitted by:    $_POST[submitted_by]\r\n";
				$msg .= "Department:   $_POST[dept_code]\r\n";
				$msg .= "---------------------------------- \r\n";
				$msg .= "Please click on following link to open the application list.  \r\n\r\n";
				$msg .= "https://intranet.philorch.org/UserAppList.php?humanresources";

				// send the mail
				mail($to, $subject, $msg, $mailheaders);

				$to = "$_POST[submitby_email]";
				$subject = "New User Application RECEIVED\r\n";
				$mailheaders = "From: $_POST[submitby_email] \r\n";
				$msg = "Hello $_POST[submitted_by], \r\n";
				$msg .= "\nThank you for submitting a New User Application form online. The form has been sent to HR for approval.\r\n";
				$msg .= "User Name:    $_POST[first_name] $_POST[last_name]\r\n";
				$msg .= "Department:   $_POST[dept_code]\r\n";
				$msg .= "---------------------------------- \r\n";
				$msg .= "Please click on following link to review your submission. Contact Human Resources if you have any questions.\r\n\r\n";
				$msg .= "https://intranet.philorch.org/UserAppView.php?appno=$appno";

				// send the mail
				mail($to, $subject, $msg, $mailheaders);
	
				print("New user application for $_POST[first_name] $_POST[last_name] has been uploaded and notice email has been sent to HR for approval. ");  print ("<br> <a href= \"intranet_hr.html\">Back to HR page </a>");
				print(" <script language='javascript'> setTimeout('redirect_page()',5000)</script>");
				//print(" <script language='javascript'>function redirect_page(){window.location='human_resources.html'; }</script>");
				}
			} // if ($form_type == 'NEW') {
			elseif ($form_type == 'DISPLAY') {  // Means Approver is submitting the form.
				// update the record.
				$Link = mysql_connect ("localhost", "sadb","buendia100");

				// Update all fields except users: first name, last name, submitted by and submitted date.
				$UpdateStmt= "Update user_app set dept_code = '$_POST[dept_code]', title ='$_POST[title]', phone_ext ='$_POST[phone_ext]', start_date='$_POST[start_date]', new_hw='$_POST[new_hw]', new_phone='$_POST[new_phone]', new_position='$_POST[new_position]', prev_user_name='$_POST[prev_user_name]', artsoft_access='$_POST[artsoft_access]', access_folder1='$_POST[access_folder1]', access_folder2='$_POST[access_folder2]', access_folder3='$_POST[access_folder3]', access_folder4='$_POST[access_folder4]', access_folder5='$_POST[access_folder5]', access_folder6='$_POST[access_folder6]',other_dept_app='$_POST[other_dept_app]', loc_code='$_POST[loc_code]',comments = '$_POST[comments]', approved_by = '$_POST[approved_by]', approved_on = '$_POST[approved_on]' where application_no=$dsp_application_no";

				if ( mysql_db_query ( 'app', $UpdateStmt,$Link ) ) {
					 // From child tables, first delete the records and then insert the records.
					$DelStmt = "Delete from user_email_groups where application_no=$dsp_application_no";
					$Result = mysql_db_query('app',$DelStmt,$Link);

					$email_groups = $_POST[email_group];
					$cnt = 0;

					while ( $cnt < count($email_groups) ) {
						$InsertStmt= "Insert into user_email_groups(application_no,group_code) values
							($dsp_application_no ,' $email_groups[$cnt]')";
						$Result = mysql_db_query('app',$InsertStmt,$Link);
						$cnt += 1;
					}

					$DelStmt= "Delete from user_dept_apps where application_no=$dsp_application_no";
					$Result = mysql_db_query('app',$DelStmt,$Link);

					$applications = $_POST[dept_app];
					$cnt = 0;

					while ( $cnt < count($applications) ) {
						$InsertStmt= "Insert into user_dept_apps(application_no,dept_app) values
							($dsp_application_no ,' $applications[$cnt]')";
						$Result = mysql_db_query('app',$InsertStmt,$Link);
						$cnt += 1;
					}

					$DelStmt= "Delete from user_printers where app_no=$dsp_application_no";
					$Result = mysql_db_query('app',$DelStmt,$Link);
					$printers = $_POST[printer_req];

					$cnt = 0;
					while ( $cnt < count($printers) ) {
						$InsertStmt= "Insert into user_printers(app_no,printer) values
							($dsp_application_no ,' $printers[$cnt]')";
						$Result = mysql_db_query('app',$InsertStmt,$Link);
						$cnt += 1;
					}

					// send mail to helpdesk..
					$to = "helpdesk@philorch.org";
					$subject = "APPROVED New User: $_POST[first_name] $_POST[last_name]\r\n";
					$mailheaders = "From: $_POST[approved_by] \r\n";
					$mailheaders .= "CC: $_POST[submitby_email] \r\n";
					$msg = "New User Application form has been approved from Human Resources.\r\n\n";
					$msg .= "Please start the setup process.\r\n";
					$msg .= "New User:    $_POST[first_name] $_POST[last_name]\r\n";
					$msg .= "Submitted By:    $_POST[submitted_by] \r\n";
					$msg .= " Department:   $_POST[dept_code]\r\n";
					$msg .= " Approved By:    $_POST[approved_by]\r\n";
					$msg .= "---------------------------------------\r\n";
					$msg .= "Please click on following link to open the list. \r\n";
					$msg .= "https://intranet.philorch.org/userapp_login.php \r\n";

					// send the mail
					mail($to, $subject, $msg, $mailheaders);

					$to = "$_POST[submitby_email]";
					$subject = "New User Application Approval Confirmation.\r\n";
					$mailheaders = "From: $_POST[submitby_email] ";
					$msg = " $_POST[submitted_by], \r\n";
					$msg .= " The application you submitted has been approved by Human Resources and sent to Helpdesk. \r\n";
					$msg .= "User Name:    $_POST[first_name] $_POST[last_name]\r\n";
					$msg .= "Department:   $_POST[dept_code]\r\n";
					$msg .= "---------------------------------- \r\n";
					$msg .= "Please click on following link to review the application. Contact Human Resources if you have any questions.\r\n\r\n";
					$msg .= "https://intranet.philorch.org/UserAppView.php?appno=$dsp_application_no";

					// send the mail
					mail($to, $subject, $msg, $mailheaders);

					print("New user application for $_POST[first_name] $_POST[last_name] has been approved and  email is sent to HelpDesk. ");
					print("<A HREF=\"./UserAppList.php\"> Back to List </a>");
				}
				else {
					print ("error updating");}
			} //  elseif ($form_type == 'DISPLAY') {
 			mysql_close ($Link);
		}
		else { // if there is any error in filling application form, display form with error messages.
			print ("<font size=1 face=\"Arial, Helvetica, sans-serif\" color='red' >");
			$i = 0;
			while ( $i <= $err_index ) {
				print ($form_err[$i]);
				print ("<br>");
				$i += 1;
			}
			print("</font>");
			PrintForm($form_type,$dspUser);
		}
	}
?></td>
			  </tr>
          </table>
          </td>
        </tr>
      </table>
    </div></td>
  </tr>
  
  

</table>
</body>
</html>
