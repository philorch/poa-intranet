<?php /*?><?
//get access cookie
$accesslevel = $_COOKIE['Access'];
//print ($accesslevel);
//check for valid access
if ($accesslevel < "u" || $accesslevel > "v" )
 {
   print "<B>Unauthorized to open the page. Access level Error:$accesslevel<BR><BR><A HREF=./userapp_login.php>Back</A></B>";
   die("</HTML>");
 }
?><?php */?>

<html>
<head>
<title>The Philadelphia Orchestra Intranet</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript">
<!--

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


function confirmDelete(apno)
{
var agree=confirm("Are you sure you wish to delete?");
if (agree)
  window.location='UserAppDelete1.php?appno=' + apno 
//  return true ;
else
 return false ;
}

//function MM_findObj(n, d) { //v4.01
//  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
//    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
 // if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
//  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
//  if(!x && d.getElementById) x=d.getElementById(n); return x;
//}


//-->
</script>
</head>

<body style="margin: 0; bgcolor: #FFFFFF; font-family:Arial, Helvetica, sans-serif" text="#000000" link="#ef413a" vlink ="#ef413a" alink="#ef413a"  onLoad="MM_preloadImages('images/buttonup.gif')">


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
            <td bgcolor="#232323" height="78"><p style="font-size:24px; color:#FFF; font-family:Arial, Helvetica, sans-serif; margin-left: 100px;">IT NEW USER LIST</p></td>
          </tr>
          <tr bgcolor="#d4d4d4" height="7px">
            <td height="7px"><img src="https://intranet.philorch.org/phonelist/grey-spacer.jpg" width="3" height="7"></td>
          </tr>
          <tr><td>&nbsp;</td></tr>
 </table >
<!--NEW HEADER Ends-->

<table width = "800"  style="margin-left:100px;"> 
<tr><td>&nbsp;</td></tr>
 <tr><td><p style="font-family:Arial, Helvetica, sans-serif;" ><a href='userform.php'>New User</a> | <a href='UserAppList1.php'>View list</a> | <a href='userapp_unloading.php'>Logout</a> </p></td></tr><tr><td>&nbsp;</td></tr>
    <tr> 
    <td > 

<hr size=0>
<br />
<?php
$Link = mysql_connect ("localhost", "sadb","buendia100");
$Query = "SELECT * from user_app, department where department.dept_code = user_app.dept_code ";
$Query .= " order by approved_on, application_no"; //approved_on, last_name";
$Result = mysql_db_query ('app', $Query, $Link);
$totalreturned = mysql_num_rows($Result);
$test = "";
print ($test);
if ($totalreturned == 0)
{
print("<table ><tr><td></td><td align=\"center\"> <font face=\"Arial,Helvetica, san-serif\"> ");
print("List does not have any new user applications. Please try again for  new search </a>.");
print("</font></td></tr>");
}
else
{
print(" <table >");
print ("<tr> <td align=\"left\" > <font face=\"Arial,Helvetica, san-serif\" size='2' color='#32603f' ><b> App No</b> </font></td>");
print ("<td align=\"left\" width=\"12%\"> <font face=\"Arial,Helvetica, san-serif\" size='2'  color='#32603f' > <b>Last Name</b> </font></td>");
print ("<td align=\"left\" width=\"10%\"> <font face=\"Arial,Helvetica, san-serif\" size='2'  color='#32603f' ><b> First Name</b> </font></td>");
print(" <td align=\"left\"width=\"20%\" > <font face=\"Arial, Helvetica, san-serif\" size='2' color='#32603f'> <b>Department</b></font> </td>");
print(" <td align=\"left\" width=\"15%\" > <font face=\"Arial, Helvetica, san-serif\" size='2' color='#32603f'> <b>Title</b> </font> </td>");
print(" <td align=\"left\"width=\"12%\" > <font face=\"Arial, Helvetica, san-serif\" size='2' color='#32603f'><b>Submitted By</b></font> </td>");
print(" <td align=\"left\"> <font face=\"Arial, Helvetica, san-serif\" size='2' color='#32603f'><b>Submitted On</b></font></td></tr>");

while ($Row1 = mysql_fetch_array($Result))
{
print ("<tr>");
print("<form method='post' name='myform' action='UserForm2.php'> <input type='hidden' name='app_no' value='$Row1[application_no]'> ");
print("<td> <font face=\"Arial, Helvetica, san-serif\"  color=\"black\" size='2' >");
if ($Row1[approved_on]==''){print ("* ");}
print ("$Row1[application_no]");
print ("</td>");
print("<td> <font face=\"Arial, Helvetica, san-serif\"  color=\"black\"size='2' >");
print ("$Row1[last_name]");
print ("</td>");
print("<td> <font face=\"Arial, Helvetica, san-serif\"  color=\"black\"size='2' >");
print ("$Row1[first_name]");
print ("</td>");
print("<td> <font face=\"Arial, Helvetica, san-serif\"  color=\"black\"size='2' >");
print ("$Row1[department]");
print ("</td>");
print("<td> <font face=\"Arial, Helvetica, san-serif\"  color=\"black\"size='2' >");
print ("$Row1[title]");
print ("</td>");
print("<td> <font face=\"Arial, Helvetica, san-serif\"  color=\"black\"size='2' >");
print ("$Row1[submitted_by]");
print ("</td>");
print("<td> <font face=\"Arial, Helvetica, san-serif\"  color=\"black\"size='2' >");
print ("$Row1[submitted_on]");
print ("</td>");
print("<input type='hidden' name='del_app_no' value=''>");
print("<td valigh='center'> <input type='submit' name='submit' value='Open' ></td>");
if ($accesslevel == "u") { // HR doesn't have acccess to delete button.
print("<td valign='center'> ");
print ("<input type='button' onclick='return confirmDelete($Row1[application_no])' ");
//print ("onclick=\" <script language=\"javascript\"> 
//var agree=confirm(\"Are you sure you wish to continue?\");
//if (agree)
//{ window.location=\"UserAppDelete1.php?appno=$Row1[application_no]\";}
//</script>\"");
print(" value= 'Delete'>");

}
print ("</form> </tr>");
}
print(" ");
print("<tr><td>&nbsp;</td></tr> <tr><td></td><td> <font face=\"Arial, Helvetica, san-serif\"  color=\"black\"><small>( $totalreturned  Results) </small></td><td></td><td><font color='red'><small> * New applications <small></font> </td> </tr>");
mysql_close ($Link);

}

?>
</table>
<br />
<hr size=0>

      </td>
       </tr>
      <tr><td>&nbsp;</td></tr>
      <tr><td><p style="font-family:Arial, Helvetica, sans-serif;" ><a href='userform.php'>New User</a> | <a href='UserAppList1.php'>View list</a> | <a href='userapp_unloading.php'>Logout</a> </p></td></tr>
  <tr>
 <td width="180" >&nbsp;</td>
  </tr>
  
</table >
</body>
</html>	
