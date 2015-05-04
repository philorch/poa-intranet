<?php
$ldap = ldap_connect('philorch.org');
$username='footprints';
$password='support';

if($bind = ldap_bind($ldap, $username,$password ))
	echo "logged in";
else
	echo "fail";
echo "<br/>done";
?>
