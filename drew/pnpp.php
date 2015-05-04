<?php

$conn = mssql_connect( "172.16.2.202", "atsen", "oxymoron" );

if ( $conn ) {

	mssql_select_db("USIprddb", $conn);
	$stmt = mssql_init("sp_TextFileForWebSite", $conn);
	$result = mssql_execute($stmt);
	$arr = mssql_fetch_row($result);

    mssql_close($conn);
}
print "$result\n";

?> 
