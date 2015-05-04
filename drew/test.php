<?php

//
$person = $_SERVER['QUERY_STRING'];

// using ldap bind
$ldaprdn  = 'CN=Footprints,CN=Users,DC=rpac,DC=org';     // ldap rdn or dn
$ldappass = 'support';  // associated password
$server = '10.2.0.47';

// connect to ldap server
$ldapconn = ldap_connect("$server")
    or die("Could not connect to LDAP server.");

if ($ldapconn) {

    // binding to ldap server
    $ldapbind = ldap_bind($ldapconn, $ldaprdn, $ldappass);

    // verify binding
    if ($ldapbind) {
        echo "LDAP bind successful...";
    } else {
        echo "LDAP bind failed...";
    }
}

// $ds is a valid link identifier for a directory server

// $person is all or part of a person's name, eg "Jo"

$dn = "DC=org";
$filter="(|(sn=$person*)(givenname=$person*))";
$justthese = array("ou", "sn", "givenname", "mail");

$sr=ldap_search($ldapbind, $dn, $filter, $justthese);

$info = ldap_get_entries($ldapbind, $sr);

echo $info["count"]." entries returned\n";

?>

