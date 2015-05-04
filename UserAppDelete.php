<?php
// All delete script goes here.


$str = $_SERVER['QUERY_STRING'];
 parse_str($str,$output);
$appno = $output['appno'];

DeleteUserApp($appno);

print(" <META HTTP-EQUIV=\"refresh\" content=\"2; URL=./UserAppList.php\">");

Function DeleteUserApp($dspappno){
//Delete scripts.

 $Link = mysql_connect ("localhost", "sadb","buendia100");
 $DeleteStmt= "DELETE FROM user_email_groups WHERE application_no=$dspappno";
 $result = mysql_db_query('app',$DeleteStmt,$Link);
 $DeleteStmt= "DELETE FROM user_dept_apps WHERE application_no=$dspappno";
 $result = mysql_db_query('app',$DeleteStmt,$Link);
 $DeleteStmt= "DELETE FROM user_printers WHERE app_no=$dspappno";
 $result = mysql_db_query('app',$DeleteStmt,$Link);
 $DeleteStmt= "DELETE FROM user_app WHERE application_no=$dspappno";
 $result = mysql_db_query('app',$DeleteStmt,$Link);


}



?>

