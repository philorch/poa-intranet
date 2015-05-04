<? include("ssl.php"); ?>
<html>
<head>
<title>The Philadelphia Orchestra Intranet</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript">
<!--

function formcheck(){
if (document.reservations.lastname.value==''){alert('Please enter a last name to search on.');document.reservations.lastname.focus();return false};
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

<body style="margin: 0; bgcolor: #FFFFFF; font-family:Arial, Helvetica, sans-serif" onLoad="MM_preloadImages('images/buttonup.gif')">
<!-- New Heaader Begins -->
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
            <td bgcolor="#232323" height="78"><p style="font-size:24px; color:#FFF; font-family:Arial, Helvetica, sans-serif; margin-left: 100px;">LOGIN FOR USER APPLICATION </p></td>
          </tr>
          <tr bgcolor="#d4d4d4" height="7px">
            <td height="7px"><img src="https://intranet.philorch.org/phonelist/grey-spacer.jpg" width="3" height="7"></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr><td>&nbsp;</td></tr>
          <tr>
            <td> <form action="userapp_loading.php" method="post">
    <table width="600" border="0" cellpadding="0" cellspacing="0" style="margin-left:100px;" >
        <tr>
          <td><p style="font-family:Arial, Helvetica, sans-serif;">
            Username:<font face="Arial,Helvetica,sans-serif"  color="black" size=1>
              <input name=username type="test" class="fieldtext" size=50 maxlength=30>
            </font> </p></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><p style="font-family:Arial, Helvetica, sans-serif;">
            Password:    
            <font face="Arial,Helvetica,sans-serif"  color="black" size=1>
              <input name=password type="password" class="fieldtext" size=50 maxlength=30>
            </font></p></td>
          </tr>

        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><font size=1>
              <input name="submit" type="submit" class="fieldtext" value="Log in">
          </font></td>
        </tr>
    </table>

  </form></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
 </table >
<!-- New Header Ends -->




<!--<table width="725" border="0" cellspacing="0" cellpadding="0" height="229">
  <tr> 
    <td width="180"><img src="images/heading1.gif" width="180" height="144"></td>
    <td colspan="5"><img src="images/heading2.gif" width="620" height="144"></td>
  </tr>
  <tr> 
    <td width="180" bgcolor="#000000">&nbsp;</td>
    <td rowspan="11" width="33">&nbsp;</td>
    <td width="158">&nbsp;</td>
    <td width="71">&nbsp;</td>
    <td width="358">&nbsp;</td>
    <td width="1" rowspan="10">&nbsp;</td>
  </tr>
  <tr> 
    <td width="180" bgcolor="#000000" align="center" valign="top" height="60"><img src="images/eschenbach1.jpg" width="93" height="93" align="middle"></td>
    <td rowspan="10" align="center" valign="top" height="105" colspan="3"> 
      <h1><font face="Arial, Helvetica, sans-serif" color="#32603f">LOGIN FOR USER APPLICATION </font></h1>
 
 <form action="userapp_loading.php" method="post">
    <table width="700" border="0" cellpadding="0" cellspacing="0" >
        <tr>
          <td width="350"><div align="right"><font face="Arial,Helvetica,sans-serif" color="black" size=2>
              Username:
          </font></div></td>
          <td><font face="Arial,Helvetica,sans-serif"  color="black" size=1>
            <input name=username type="test" class="fieldtext" size=15 maxlength=20>
          </font></td>
        </tr>
        <tr>
          <td width="350"><div align="right"><font face="Arial,Helvetica,sans-serif"  color="black" size=2>
              Password:
          </font></div></td>
          <td><font face="Arial,Helvetica,sans-serif"  color="black" size=1>
            <input name=password type="password" class="fieldtext" size=15 maxlength=15>
          </font></td>
        </tr>

        <tr>
          <td colspan="2"><div align="center"><font size=1>
              <input name="submit" type="submit" class="fieldtext" value="Log in">
          </font></div></td>
        </tr>
    </table>

  </form>




    </td>
  </tr>
  <tr> 
    <td width="180" bgcolor="#000000" height="7">&nbsp;</td>
  </tr>
  <tr> 
    <td width="180" bgcolor="#000000" align="center" valign="top"><img src="images/eschenbach2.jpg" width="93" height="93" align="middle"></td>
  </tr>
  <tr> 
    <td width="180" bgcolor="#000000">&nbsp;</td>
  </tr>
  <tr> 
    <td width="180" bgcolor="#000000" align="center" valign="top"><img src="images/eschenbach3.jpg" width="93" height="93" align="middle"></td>
  </tr>
  <tr> 
    <td width="180" bgcolor="#000000">&nbsp;</td>
  </tr>
  <tr> 
    <td width="180" bgcolor="#000000">&nbsp;</td>
  </tr>
  <tr> 
    <td width="180" bgcolor="#000000">&nbsp;</td>
  </tr>
  <tr> 
    <td width="180" bgcolor="#000000">&nbsp;</td>
  </tr>
  <tr> 
    <td width="180" bgcolor="#000000"> 
      <p><font size="1" face="Arial, Helvetica, sans-serif" color="#FFFFFF">&copy; 
        The Philadelphia Orchestra<br>
        <a href="mailto:webmaster">Contact: Webmaster</a></font></p>
    </td>
    <td width="1">&nbsp;</td>
  </tr>
</table>-->
</body>
</html>
