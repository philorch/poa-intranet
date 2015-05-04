<?php

$LDAP_NAME[0]           = "Util's LDAP Server";
$LDAP_SERVER[0]         = "10.2.0.47";
$LDAP_ROOT_DN[0]        = "DC=org";
$FILTER[0]              = "(|(sn=$common*)(giventname=$common*))";

$justthese = array("ou", "sn", "givenname"", "mail");

//If no server chosen set it to 0
if(!$SERVER_ID)
  $SERVER_ID=0;

$user = 'CN=Footprints,CN=Users,DC=rpac,DC=org';
$pass = 'support';
  
//Create Query
$ldap_query = "cn=$common";

//Connect to LDAP
$connect_id = ldap_connect($LDAP_SERVER[$SERVER_ID]);

if($connect_id)
  {
  //Authenticate
  $bind_id = ldap_bind($connect_id, $user, $pass);
  
  //Perform Search
  $search_id = ldap_search($connect_id, $LDAP_ROOT_DN[$SERVER_ID], $ldap_query);
  
  //Assign Result Set to an Array
  $result_array = ldap_get_entries($connect_id, $search_id);
  }
else
  {
  //Echo Connection Error
  echo "Could not connect to LDAP server: $LDAP_SERVER[$SERVER_ID]";
  }
  
//Sort results if search was successful
if($result_array)
  {
  for($i=0; $i<count($result_array); $i++)
    {
    $format_array[$i][0] = strtolower($result_array[$i]["cn"][0]);
    $format_array[$i][1] = $result_array[$i]["dn"];
    $format_array[$i][2] = strtolower($result_array[$i]["givenname"][0]);
    $format_array[$i][3] = strtolower($result_array[$i]["sn"][0]);
    $format_array[$i][4] = strtolower($result_array[$i]["mail"][0]);
    }

  //Sort array
  sort($format_array, "SORT_STRING");

  for($i=0; $i<count($format_array); $i++)
    {
    $cn = $format_array[$i][0];
    $dn = $format_array[$i][1];
    $fname = ucwords($format_array[$i][2]);
    $lname = ucwords($format_array[$i][3]);
    $email = $format_array[$i][4];

    if($dn && $fname && $lname && $email)
      {
      $result_list .= "<A HREF=\"ldap://$LDAP_SERVER[$SERVER_ID]/$dn\">$fname $lname</A>";
      $result_list .= " &lt;<A HREF=\"mailto:$email\">$email</A>&gt;<BR>\n";
      }
    elseif($dn && $cn && $email)
      {
      $result_list .= "<A HREF=\"ldap://$LDAP_SERVER[$SERVER_ID]/$dn\">$cn</A>";
      $result_list .= " &lt;<A HREF=\"mailto:$email\">$email</A>&gt;<BR>\n";     
      }
    }
  }
else
  {
  echo "Result set empty for query: $ldap_query";
  }
  
//Close Connection
ldap_close($connect_id);

//Make Form
echo "<CENTER><FORM ACTION=\"$PHP_SELF\" METHOD=\"GET\">";
echo "Search in:<SELECT NAME=\"SERVER_ID\">";

//Loop Through and Create SELECT OPTIONs
for($i=0; $i<count($LDAP_NAME); $i++)
  echo "<OPTION VALUE=\"$i\">".$LDAP_NAME[$i]."</OPTION>";

echo "</SELECT><BR>";
echo "Search for:<INPUT TYPE=\"text\" NAME=\"common\">";
echo "<INPUT TYPE=\"submit\" NAME=\"lookup\" VALUE=\"go\"><BR>";
echo "(You can use * for wildcard searches, ex. * Stanley will find all Stanleys)<BR>";
echo "</FORM></CENTER>";

//Echo Results
if($result_list)
  {
  echo "<CENTER><TABLE BORDER=\"1\" CELLSPACING=\"0\" CELLPADDING=\"10\"
        BGCOLOR=\"#FFFFEA\" WIDTH=\"450\"><TR><TD>$result_list</TD></TR>
        </TABLE></CENTER>";
  }
else {

  echo "No Results";
  }
  
?>
