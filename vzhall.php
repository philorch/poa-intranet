<html>
<head>
<title>Verizon Hall Live Stream (UDP)</title>
</head>
<body bgcolor=black text=white>
<br>
<br>
<center>
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
</center>
</body>
</html>

