<html>
<head>
<title>The Philadelphia Orchestra Intranet.</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript">
<!--
function redirect_page(){
window.location='human_resources.html';
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}
//-->
</script>
</head>

<body style="margin: 0;" bgcolor="#FFFFFF" text="#000000" link="#32603f" vlink ="#32603f" alink="#32603f"  onLoad="MM_preloadImages('images/buttonup.gif')">

<!--NEW HEADER Begins-->

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr bgcolor="#232323">
          <td><img src="https://intranet.philorch.org/phonelist/dark-grey-spacer.jpg" width="3" height="28"></td></tr>


  <tr bgcolor="#eeeeee">
            <td height="115"><a href="https://intranet.philorch.org"><img src="https://intranet.philorch.org/sites/default/files/logo-octaves_0.png" width="200" height="50" style="margin-left: 100px"></a></td>
          </tr>
          
<tr bgcolor="#d4d4d4" height="7px">
            <td height="7px"><img src="https://intranet.philorch.org/phonelist/grey-spacer.jpg" width="3" height="7"></td>
          </tr>
          <tr>
            <td bgcolor="#232323" height="78"><p style="font-size:24px; color:#FFF; font-family:Arial, Helvetica, sans-serif; margin-left: 100px;">IT NEW USER FORM: SUBMITTED</p></td>
          </tr>
          <tr bgcolor="#d4d4d4" height="7px">
            <td height="7px"><img src="https://intranet.philorch.org/phonelist/grey-spacer.jpg" width="3" height="7"></td>
          </tr>
          <tr><td>&nbsp;</td></tr>
 </table >
<!--NEW HEADER Ends-->

<!--New Formatted Content Table Begins-->
<table border="0" cellspacing="0" cellpadding="0" width="90%" style="margin-left:100px;">
              <tr><td><table width="100%" cellpadding="0" cellspacing="0">
	
	<tr>
		<td bgcolor="#FFFFFF" scope="col"><div align="left">
		<table width="100%" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td valign="top" scope="col">
			<table width="100%" cellpadding="0" cellspacing="5">
			<tr>
				<td height="279" valign="top" scope="col">

<?php

//Check if the page is being opened from view list page.
// It sends teh application no.

$str = $_SERVER['QUERY_STRING'];
 parse_str($str,$output);
$appno = $output['appno'];
//print ("APPNO= $appno");
$FORM_TYPE='DISPLAY';
PrintForm($FORM_TYPE,$appno);
print(" </font> </td> </tr>");
    
 print("<tr> <td >&nbsp;</td>
  </tr>  <tr> <td>
      <!--<p><font size=\"1\" face=\"Arial, Helvetica, sans-serif\" color=\"#FFFFFF\">&copy;
        The Philadelphia Orchestra<br>
        <a href=\"mailto:webmaster\">Contact: Webmaster</a></font></p>-->
    </td>
   </tr>
</table >
</body>
</html>");

// Function that creates the form page.
// Three states of form:
// 1. New Form: To enter new data.
// 2. Validation form: Form with data and validation error
// 3. Query Form: Form which displays previous user data, opened from view list.

Function PrintForm($form_type,$dsp_application_no) {

      $Link = mysql_connect ("localhost", "sadb","buendia100");
      $dResult = mysql_db_query ("app", "select * from user_app where application_no='$dsp_application_no'", $Link);
      $dRow = mysql_fetch_array($dResult);

      if ($form_type == 'DISPLAY') { // Fetch data from database to display.
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
         $dsubmitted_by=$dRow[submitted_by];
         $dapproved_by=$dRow[approved_by];
         $dsubmitted_on=$dRow[submitted_on];
         $dapproved_on=$dRow[approved_on];
         $dsubmitby_email=$dRow[submitby_email];
       }
     // This form calls itself on submit.
 
      print(" <form name='pronunlist' method='post'>
      <br /><br />
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
      </table >
      <table >  <tr>
        <td width='22%'> <font face='Arial, Helvetica, sans-serif' size='2'> User Location</font> </td> 
	<td  width= '15%'><font face='Arial, Helvetica, sans-serif' size='2'> New Hardware </font></td>
        <td  width= '15%'><font face='Arial, Helvetica, sans-serif' size='2'> New Phone </font></td>
        <td  width= '15%'><font face='Arial, Helvetica, sans-serif' size='2'> New Position</font></td>
	<td><font face='Arial, Helvetica, sans-serif' size='2'>  If not new position, give previous user name</font> </td>
      </tr><tr><td> <font face='Arial, Helvetica, sans-serif' size='2'>");

    $Result = mysql_db_query ("app", "select * from location order by loc_code", $Link);
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
   if (dnew_position == 'N' ) { print ("CHECKED");}
   print("></font></td>
   <td> <input type='text' name='prev_user_name' size='40' maxlength='50' value='$dprev_user_name'>  </td>
   </tr></table ><br /><br />");

   // Do ldap search to find out the email groups.


   //$ldap_host = "ldap://POAGC02.philorch.org/";
   $ldap_host = "ldap://poafs01.philorch.org/";
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

   $rowCnt = 4; // show 6 columns
   print("<p style='font-family:Arial, Helvetica, sans-serif; font-size:14px;'><b>Please check off all email groups</b></p>");
   print("<table > ");
   $email_groups = $_POST[email_group];
   $cnt = 0; 
   for($i = 0; $i<$info["count"]; $i++)
   {
       for($j = 0; $j<$info[$i]["count"]; $j++)
     {
      if ($rowCnt % 4 == 0) { if ( $rowCnt <> 4 ) { print ("</tr>"); } print ("<tr>"); }
      
      $data = $info[$i][$j];
      $dataval= $info[$i][$data][0];
      print ("<td><font face=\"Arial, Helvetica, sans-serif\" size=\"2\">");  
      print ("<input type='checkbox' name='email_group[]'  value = '$dataval'");
      $is_checked = 0; 
      $cnt = 0;     
      
     if (count($email_groups) > 0)  {     
      while ($cnt <= count($email_groups)) {
       if ($email_groups[$cnt] == $dataval) {$is_checked = 1; break; }
       $cnt += 1; }
      } //end if
   else {
    if ($form_type == 'DISPLAY')  {//if displaying previous user's data, get assigned email groups. 
    $Result_email = mysql_db_query ("app", "select * from user_email_groups where application_no='$dsp_application_no' and trim(group_code) =trim('$dataval')", $Link);
   $Row1 = mysql_fetch_array($Result_email);
   if (mysql_numrows($Result_email) > 0)  {$is_checked = 1;}              
   } 
   } // end of else
     if ($is_checked == 1){print (" checked "); }
     print("> $dataval </font></td> ");     
     $rowCnt += 1;  }
  }
 print ("</table >");
 print("<br /><br />
        <table >  <tr> <td><font face='Arial, Helvetica, sans-serif' size='2'>  Artsoft Access: Yes <INPUT TYPE='radio' NAME='artsoft_access'  VALUE='Y' ");
 if ($dartsoft_access  == 'Y' ) { print ("CHECKED");}
  print("> No <INPUT TYPE='radio' NAME='artsoft_access' VALUE='N'");
 if ($dartsoft_access == 'N'  || $dartsoft_access <> 'N' ) { print ("CHECKED");}
  print("></font> </td></tr><tr >
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
    print("<p style='font-family:Arial, Helvetica, sans-serif; font-size:14px;'><b>Please check off all Department applications needed </b></p>");
    print("<table > ");
    while ($Row1 = mysql_fetch_array($Result))
     {
     if ($rowCnt%5== 0) { if ($rowCnt <> 5) { print ("</tr>"); } print ("<tr>"); }
      print ("<td><font face=\"Arial, Helvetica, sans-serif\" size=\"2\"> <input type='checkbox' name='dept_app[]'  value = '$Row1[app_code]'");
      $is_checked = 0;
      $cnt = 0;
    
     if (count($applications) > 0) {
      while ($cnt < count($applications)) {
       if ($applications[$cnt] == $Row1[app_code]) {$is_checked = 1; break; }
       $cnt += 1; }
      }
     else {
      if ($form_type == 'DISPLAY')  {     //@@@
    $Result_apps = mysql_db_query ("app", "select * from user_dept_apps where application_no='$dsp_application_no'  and trim(dept_app)=trim('$Row1[app_code]')",$Link);   
     $Rowa = mysql_fetch_array($Result_apps);
       if (mysql_numrows($Result_apps) > 0)  {$is_checked = 1;}              
       } // end for if form_type=DISPLAY
     }   
      if ($is_checked == 1){print (" checked "); }

      print ("> $Row1[application]</font></td>");
      $rowCnt += 1;
     }
      print ("</table >");

     print("<table width='800'>
            <tr>  <td width='20%'> <font face='Arial, Helvetica, sans-serif' size='2'> Other Applications: </font></td>
            <td> <input type='text' name='other_dept_app' size='60' maxlength='80' value='$dother_dept_app'> </td></tr>
            </table > <br /><br />");

// List Printers to give access to.


$filter = "cn=*";
	//$base_dn = "CN=POAGC02,OU=Domain Controllers,DC=philorch,DC=org";
	$base_dn = "CN=POAFS01,OU=Domain Controllers,DC=philorch,DC=org";
	$connect = @ldap_connect( $ldap_host, $ldap_port);
	$bind = @ldap_bind($connect,"CN=" . $username . ",CN=Users,DC=PHILORCH,DC=org", $password);
	$nds_stuff = array("printShareName");
	$read = @ldap_search($connect, $base_dn, $filter,$nds_stuff);
	$info = @ldap_get_entries($connect, $read);

	print("<p style='font-family:Arial, Helvetica, sans-serif; font-size:14px;'>  <b> Please check off the printers needed:</b></p>");
	print("<table> ");
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


/*
print("<br /><br /><table><tr><td><p style='font-family:Arial, Helvetica, sans-serif; font-size:14px;'>Comments: $dcomments");
 if ($dcomments <> ""){print ("$dcomments");}
else { print("No Comments");}

print("</p></td></tr></table>");*/


  print("<br /><br /> <table width='800'>
         <tr> <td><font face='Arial, Helvetica, sans-serif' size='2'> Submitted By</font> </td>
         <td>  <input type='text' name='submitted_by' size='20' maxlength='80' value='$dsubmitted_by'> </td>");
 
 if ($form_type == 'DISPLAYtmp')  {
  print("<td><font face='Arial, Helvetica, sans-serif' size='2'> Approved By</font> </td>
      <td>  <input type='text' name='approved_by' size='20' maxlength='80' value='$dapproved_by'> </td>");}
  print("</tr><tr> <td width='15%'><font face='Arial, Helvetica, sans-serif' size='2'> Submitted On <font> </td>
         <td><input type='text' name='submitted_on' size='20' value=" );
       
  if ($dsubmitted_on <> ""){print ("'$dsubmitted_on' > ");} 
  else {
         $stDate = getdate();
         $stmm = $stDate["mon"];
         if ($stmm < 10) {$stmm = '0' . $stmm;}
         $stdy = $stDate["mday"];
         if ($stdy < 10) {$stdy = '0' . $stdy;}
         $fdate =  $stDate["year"]. "-" .  $stmm . "-" . $stdy;
         print ("'$fdate'>");
   }
       
   print("</td>");
  if ($form_type == 'DISPLAY tmp')  {
   print("<td width='15%'><font face='Arial, Helvetica, sans-serif' size='2'> Approved On <font> </td> <td><input type='text'  name='approved_on' size=20  readonly value = " );
        if ($dapproved_on <>""){print ("'$dapproved_on' >");}
        else {
         $stDate = getdate();
         $stmm = $stDate["mon"];
         if ($stmm < 10) {$stmm = '0' . $stmm;}
         $stdy = $stDate["mday"];
         if ($stdy < 10) {$stdy = '0' . $stdy;}
         $fdate =  $stDate["year"]. "-" .  $stmm . "-" . $stdy;
         print ("'$fdate'>");
        }
   print("</td>");
 }
 print("</tr>
 <tr> <td width='15%'><font face='Arial, Helvetica, sans-serif' size='2'> Email Address<font> </td>
     <td>  <input type='text' name='submitby_email' size='20' maxlength='80' value='$dsubmitby_email'> </td></tr>
 <tr><td></td> <td>  <input type='Submit' border='0' name='Submit' value='Submit' disabled> </td></tr>
 </table >
 <br /><br />
 </form> ");
 mysql_close ($Link);
}

 
?>
</td>
              </tr>
          </table>
          </td>
        </tr>
      </table>
    </div></td>
  </tr>
  <tr>
    <th bgcolor="#FFFFFF" scope="col"><div align="left">
    </div></th>
  </tr>
  <tr>
    <th bgcolor="#FFFFFF" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th bgcolor="#FFFFFF" scope="col"></th>
  </tr>
</table></td></tr></table>

<!--New Formatted Content Table Ends-->