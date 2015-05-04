<?
if ( !$_SERVER['QUERY_STRING'] ) {
	print "Please provide domain name in URL<br><br>";
	print "For example: <b>/mtr.php?host=www.cnn.com</b><br><br>\n";
}
else {
	$foobar = $_SERVER['QUERY_STRING'];
	list($a, $domain) = split("=", $foobar);

	$cmd = "/usr/bin/mtr -r -c 1 $domain";

	$mtr = array();
	exec( $cmd, &$mtr);

	print "<html>\n";
	print "<head>\n<title>$domain MTR result</title>\n";
	print "<b><u>mtr -r -c 1 $domain</u></b><br><hr size=1>\n";
	print "<pre>\n";
	foreach ( $mtr as $v ) {
		print "$v<br>";
	}
	print "</pre>\n";
	print "<hr size=1>\n";

	$cmd = "/usr/bin/mtr -r -c 1 -n $domain";

	$mtr = array();
	exec( $cmd, &$mtr);

	print "<b><u>mtr -r -c 1 -n $domain</u></b><br><hr size=1>\n";
	print "<pre>\n";
	foreach ( $mtr as $v ) {
		print "$v<br>";
	}
	print "</pre>\n";
	print "<hr size=1>\n";

	$cmd = "/usr/bin/tcptraceroute $domain";

	$mtr = array();
	exec( $cmd, &$mtr);

	print "<b><u>Checking Port 80 (http://$domain) -- tcptraceroute $domain</u></b><br><hr size=1>\n";
	print "<pre>\n";
	foreach ( $mtr as $v ) {
		print "$v<br>";
	}
	print "</pre>\n";
	print "<hr size=1>\n";

	$cmd = "/usr/bin/tcptraceroute -n $domain";

	$mtr = array();
	exec( $cmd, &$mtr);

	print "<b><u>Checking Port 80 (http://$domain) -- tcptraceroute -n $domain</u></b><br><hr size=1>\n";
	print "<pre>\n";
	foreach ( $mtr as $v ) {
		print "$v<br>";
	}
	print "</pre>\n";
	print "<hr size=1>\n";



	print "</body>\n";
	print "</html>\n";
}
?>

