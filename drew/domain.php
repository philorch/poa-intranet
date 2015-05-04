<?
$domainnames = array('kimmelcenter.org', 'kimmelcenter.net', 'kimmelcenter.com', 
	'philorch.org', 'philorch.net', 'philorch.com', 
	'ticketphiladelphia.org', 'ticketphiladelphia.net', 'ticketphiladelphia.com', 
	'curtis.edu', 'curtisperforms.org', 'curtisperforms.com', 
	'paballet.org', 'operaphila.org', 'operaphila.com', 'operaphilly.com', 
	'academyofmusic.org', 'academyofmusic.com', 'academyofmusic.net', 
	'theacademyball.org', 'thephiladelphiaorchestra.net', 
	'thephiladelphiaorchestra.org' , 'philadelphiaorchestra.org', 
	'merriamtheater.com', 'merriam-theater.com', 
	'pifa.org', 'tsen.org');
//$domainnames = array('kimmelcenter.org');
sort ( $domainnames );

print "<html>";
print "<head>";
print "<title>Domain Info</title>";
print "</head>";
print "<table border=1 cellpadding=0 cellspacing=0>";
foreach ( $domainnames as $domain ) {
	print "<tr><td align=right bgcolor=c0c0c0><b><u>";
	print "<a target=_new href=http://www.whois.com/whois/$domain>$domain</a></u></b></td></tr>\n";
	print "<tr><td align=left bgcolor=beige>";
	$cmd = "/usr/bin/wget -q --output-document=- http://www.whois.com/whois/$domain";

	exec( $cmd, &$whoisraw);
	foreach ( $whoisraw as $result ) {
		if ( strpos($result, 'div class="whois_result" id="registryData"') ) {
			$output = explode ( "<br>", $result);
			foreach ( $output as $line ) {
				//print "$line <br><br>";
				if ( strpos($line, 'Expir') ) {
					$expiration = $line;
				}
				if ( strpos($line, 'Registrar:') ) {
					$sponsor = $line;
				}
				if ( strpos($line, 'clientTransferProhibited') ) {
					$transferlock = $line;
				}
			}
		}
	}
	print "<font color=red>$expiration</font><br>";
	print "$transferlock<br>";
	print "<i><b>$sponsor</b></i><br>";
	print "</td></tr>";

	unset($trasnferlock);
	unset($expiration);
	unset($sponsor);
}

print "</table>";
?>

