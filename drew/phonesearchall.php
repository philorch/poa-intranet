<?

                if ( $_REQUEST['lastname'] )  {
                        $lastname = trim ( $_REQUEST['lastname'] );
                }
?>
<html>
	<head>
	<title>Octaves - The Philadelphia Orchestra Intranet</title>
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

	<body bgcolor='#FFFFFF' text='#000000' link='red' vlink='#CCCCCC' alink='#666666'>
		<center><h1><font face='Arial, Helvetica, sans-serif' color='#990000'>Phone List</font></h1></center>
	<table border='0' cellspacing='3' cellpadding='0' width='80%'>
	<tr>
		<td valign='center' align='left' bgcolor='#cccccc'><font face='Arial, Helvetica, sans-serif' size='2'><b>Last Name&nbsp;&nbsp;&nbsp;</b></font></td>
		<td valign='center' align='left' bgcolor='#cccccc'><font face='Arial, Helvetica, sans-serif' size='2'><b>First Name&nbsp;&nbsp;&nbsp;</b></font></td>
		<td valign='center' align='left' bgcolor='#cccccc'><font face='Arial, Helvetica, sans-serif' size='2'><b>Phone&nbsp;&nbsp;&nbsp;</b></font></td>
		<td valign='center' align='center' bgcolor='#cccccc'><font face='Arial, Helvetica, sans-serif' size='2'><b>Email</b></font></td>
		<td valign='center' align='left' bgcolor='#cccccc'><font face='Arial, Helvetica, sans-serif' size='2'><b>Department</b></font></td>
	</tr>
<?
include("http://octaves.philorch.org/drew/phonesearchall2.php?option=login&lastname=$lastname&domain=0");
include("http://octaves.philorch.org/drew/phonesearchall2.php?option=login&lastname=$lastname&domain=1");
?>
</table><br>
<a href='./intranet_phone.html'>Click here to return to the search.</a>

