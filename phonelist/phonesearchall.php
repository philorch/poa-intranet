<?

                if ( $_REQUEST['lastname'] )  {
                        $lastname = trim ( $_REQUEST['lastname'] );
                }
?>
<html>
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

	<body style="margin: 0;">
		
        
        <table width="100%" cellpadding="0" cellspacing="0"><tr bgcolor="#232323">
          <td><img src="https://intranet.philorch.org/dark-grey-spacer.jpg" width="3" height="28"></td></tr>
          <tr bgcolor="#eeeeee">
            <td height="115"><a href="https://intranet.philorch.org"><img src="https://intranet.philorch.org/sites/default/files/logo-octaves_0.png" width="200" height="50" style="margin-left: 100px"></a></td>
          </tr>
          <tr bgcolor="#d4d4d4" height="7px">
            <td height="7px"><img src="https://intranet.philorch.org/phonelist/grey-spacer.jpg" width="3" height="7"></td>
          </tr>
          <tr>
            <td bgcolor="#232323" height="78"><p style="font-size:24px; color:#FFF; font-family:Arial, Helvetica, sans-serif; margin-left: 100px;">PHONE LIST RESULTS</p></td>
          </tr>
          <tr bgcolor="#d4d4d4" height="7px">
            <td height="7px"><img src="https://intranet.philorch.org/phonelist/grey-spacer.jpg" width="3" height="7"></td>
          </tr>
          <tr >
            <td >&nbsp;</td>
          </tr>
          <tr>
            <td><table border="0" cellspacing="5" cellpadding="5" width="80%" style="margin-left:100px;">
              <tr>
                <td valign="center"  bgcolor="#d4d4d4"><p style="font-family:Arial, Helvetica, sans-serif; font-size:14px;"><strong>Last Name&nbsp;&nbsp;&nbsp;</strong></p></td>
                <td valign="center" bgcolor="#d4d4d4"><p style="font-family:Arial, Helvetica, sans-serif; font-size:14px;"><strong>First Name&nbsp;&nbsp;&nbsp;</strong></p></td>
                <td valign="center"  bgcolor="#d4d4d4"><p style="font-family:Arial, Helvetica, sans-serif; font-size:14px;"><strong>Phone&nbsp;&nbsp;&nbsp;</strong></p></td>
                <td valign="center"  bgcolor="#d4d4d4"><p style="font-family:Arial, Helvetica, sans-serif; font-size:14px;"><strong>Email</strong></p></td>
                <td valign="center" bgcolor="#d4d4d4"><p style="font-family:Arial, Helvetica, sans-serif; font-size:14px;"><strong>Department</strong></p></td>
              </tr>
              <?
include("https://intranet.philorch.org/phonelist/phonesearchall2.php?option=login&lastname=$lastname&domain=0");
include("https://intranet.philorch.org/phonelist/phonesearchall2.php?option=login&lastname=$lastname&domain=1");
?>
            </table></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><p style="margin-left: 100px; font-family:Arial, Helvetica, sans-serif;"><a href="/phone-lists" style="color:#F00"><strong>Click here to return to the search.</strong></a></p>
</td>
          </tr>
        </table>
        <br>

