<html>
<head>
<title>Verizon Hall Stream (UDP)</title>
</head>
<body style="margin: 0; bgcolor: #FFFFFF; font-family:Arial, Helvetica, sans-serif">
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
            <td bgcolor="#232323" height="78"><p style="font-size:24px; color:#FFF; font-family:Arial, Helvetica, sans-serif; margin-left: 100px;">LISTEN LIVE</p></td>
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

<p>&nbsp;</p><p>VLC Browser Plugin Required - <a href="mailto:helpdesk@phillyartshelp.org">e-mail</a> Helpdesk for assistance</p><p>&nbsp;</p>
<?
//$ip = $_GET['ip'];
//$port = $_GET['port'];
$ip = '239.255.1.1';
$port = 1234;
if ( isset ( $_SERVER['HTTP_USER_AGENT'] ) && ( strpos ( $_SERVER['HTTP_USER_AGENT'], 'MSIE' ) !== false ) ) {
?>
        <OBJECT classid="clsid:9BE31822-FDAD-461B-AD51-BE1D1C159921"
                codebase="http://downloads.videolan.org/pub/videolan/vlc/latest/win32/axvlc.cab"
                width="920" height="600" id="vlc" events="True" target="udp://@<?=$ip;?>:<?=$port;?>">
                <param name="Src" value="udp://@<?=$ip;?>:<?=$port;?>" />
                <param name="ShowDisplay" value="True" />
                <param name="AutoLoop" value="True" />
                <param name="AutoPlay" value="True" />
        </OBJECT>
<?
}
else {
?>
        <embed type="application/x-vlc-plugin"
                name="video1" autoplay="yes" loop="yes" width="920" height="600" target="udp://@<?=$ip;?>:<?=$port;?>" />
<?
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
</body>
</html>
