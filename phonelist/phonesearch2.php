<?PHP

/*
'< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >
'< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >
'< - -                                                                                 - - >
'< - -  Created By: George Goehring                                                    - - >
'< - -  Date: 2003.04.23                                                               - - >
'< - -  Project Name: Basic LDAP Login                                                 - - >
'< - -                                                                                 - - >
'< - -                                                                                 - - >
'< - -  I P D G 3  I n c.                                                              - - >
'< - -                                                                                 - - >
'< - -                ()                                                               - - >
'< - -                /       Helping Developers and Programmers Find Resources        - - >
'< - -  ()     __------                                                                - - >
'< - -   \   <=__----_  \     We offer resources for ASP, C/C++, CSS, CGI, Delphi,     - - >
'< - -    \        /  \  \    DHTML, Java, JavaScript, .NET, Perl, PHP, Visual Basic,  - - >
'< - -    -----------  \  \   XML, Zope, databases, networking and many others.        - - >
'< - -   /           \  \  \                                                           - - >
'< - -  /             \  |  | We also have source code, tutorials, book reviews,       - - >
'< - - (   I P G D 3   ) |  ) contest, forums and other computer Q&A. Consulting       - - >
'< - -  \             /  |  | is also available.                                       - - >
'< - -   \           /  /  /                                                           - - >
'< - -    -----------  /  /   Developing Products to fit all your computer needs as    - - >
'< - -    /    __  \  /  /    well as giving you the tools to build future business    - - >
'< - -   /   <=__----   /     today.                                                   - - >
'< - -  ()       ------                                                                - - >
'< - -                \       For more information please visit our website for        - - >
'< - -                ()      details.                                                 - - >
'< - -                                                                                 - - >
'< - - www.ipdg3.com - iamtgo3@ipdg3.com                                               - - >
'< - -                                                                                 - - >
'< - - Book Reviews - http://www.ipdg3.com/bookreview.php                              - - >
'< - - Chatroom -http://www.ipdg3.com/chatroom.php                                     - - >
'< - - Forums - http://pub52.ezboard.com/binteractivepsybertechnologydevelopersgroup   - - >
'< - - Online Gear - http://www.cafeshops.com/ipdg3                                    - - >
'< - - Links - http://www.ipdg3.com/links.php                                          - - >
'< - - Source Code - http://www.ipdg3.com/sourcecode.php                               - - >
'< - - Tutorials - http://www.ipdg3.com/tutorial.php                                   - - >
'< - - Contest - http://www.ipdg3.com/contest.php                                      - - >
'< - - ORB - http://www.ipdg3.com/orb.php                                              - - >
'< - -                                                                                 - - >
'< - -     IIIIIIIIII   PPPPPPPPP    DDDDDDDD       GGGGGG       333333                - - >
'< - -     IIIIIIIIII   PPPP   PPP   DDDDDDDDD    GGGGGGGGGG   3333333333              - - >
'< - -        IIII      PPPP   PPP   DDDD   DDD   GGGG    GG   3333  3333              - - >
'< - -        IIII      PPPP   PPP   DDDD   DDD   GGGG               3333              - - >
'< - -        IIII      PPPPPPPPP    DDDD   DDD   GGGG  GGGG      33333                - - >
'< - -        IIII      PPPP         DDDD   DDD   GGGG  GGGG         3333              - - >
'< - -        IIII      PPPP         DDDD   DDD   GGGG    GG   3333  3333              - - >
'< - -     IIIIIIIIII   PPPP         DDDDDDDDD    GGGGGGGGGG   3333333333              - - >
'< - -     IIIIIIIIII   PPPP         DDDDDDD        GGGGGG       333333                - - >
'< - -                                                                                 - - >
'< - -                    __ __                                                        - - >
'< - -  W e  W o u l d   (  '  )                                                       - - >
'< - -                >>>-\ - /-->                                                     - - >
'< - -                     \ /    to Hear From You...                                  - - >
'< - -                      '                                                          - - >
'< - -                                                                                 - - >
'< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >
'< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >
*/

if ($_REQUEST['option']) {
  switch ($_REQUEST['option']) {
    case "login":
       if ($_REQUEST['lastname'])  {
         $lastname = trim($_REQUEST['lastname']);

         mylogin($lastname);
       } else {
         echo "You neglected to fill out the form<br> please use the back button to fill in reqired info.<br><br>\n
               \n";
       }
                 break;
      default:
          echo "Please go back and select another page this one may be down.<br><br>
                \n";
          break;
  }
} else {
  echo "If you have reached this page in error please <a href='phone-lists'>Click Here</a>.\n";
  exit;
}

function mylogin($lastname)
{
  //This establishes a connection to a LDAP server on a specified hostname and port.
  $ldap = @ldap_connect("ldaps://apollo.philorch.org/",636) or die("Could not connect to LDAP server.");  // must be a valid LDAP server!

  if ($ldap) {
     //This does a bind operation on the directory
    $bind_results = @ldap_bind($ldap,"cn=ezraw,o=phl_orch", "homey6") or die("Could not log you in please check your UserName and Password and try again.");

    #$bind_results = @ldap_bind($ldap) or die("Could not log you in please check your UserName and Password and try again.");




    //string base_dn
    $dn = "";
    //string filter
    $filter="(sn=" . $lastname . ")";
    //array attributes
    $nds_stuff = array(  "sn","fullname", "telephonenumber",  "facsimiletelephonenumber","ou");

    //This performs the search for a specified filter on the directory with the scope of LDAP_SCOPE_SUBTREE
    $results=ldap_search($ldap, $dn, $filter, $nds_stuff, "0 attrsonly" );

    //This function is used to simplify reading multiple entries from the result
    $info = ldap_get_entries($ldap, $results);

/*    print $info["count"]." entries returned<p>"; */

    echo " <html>
<head>
<title>Octaves - The Philadelphia Orchestra Intranet</title>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
<script language='JavaScript'>
<!--

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.0
  var p,i,x;  if(!d) d=document; if((p=n.indexOf('?'))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && document.getElementById) x=document.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
</head>

<body bgcolor='#FFFFFF' text='#000000' link='#FFFFFF' vlink='#CCCCCC' alink='#666666'>

      <center><h1><font face='Arial, Helvetica, sans-serif' color='#32603f'>Phone List</font></h1></center>
     
        






<table border='0' cellspacing='0' cellpadding='0'>
<tr>
                <td valign='center' align='left' bgcolor='#cccccc'><font size='2'><b>Last Name</b></font></td>
                <td valign='center' align='left' bgcolor='#cccccc'><font size='2'><b>Full Name</b></font></td>
                <td valign='center' align='left' bgcolor='#cccccc'><font size='2'><b>Phone</b></font></td>
                <td valign='center' align='left' bgcolor='#cccccc'><font size='2'><b>Fax&nbsp;&nbsp;&nbsp;</b></font></td>
                <td valign='center' align='left' bgcolor='#cccccc'><font size='2'><b>Department</b></font></td>

                </tr>";

	


    //This checks to make sure he bind
    if ($info["count"] != 0) {
      echo "<h4>Lookup Successful for  " . $lastname . "</h4>";

      //This loops Through the array
      for ($i=0; $i < $info["count"]; $i++) {
        //This line looks to see if FullName actually has a name if not skip
        if ($info[$i]["telephonenumber"][0]) {
        //I basically put the results in a table.




echo "       
         <tr>
                <td valign='center' align='left' bgcolor='#ffffff'><font size='2'>" . $info[$i]["sn"][0] . "</font></td>

                <td valign='center' align='left' bgcolor='#ffffff'><font size='2'>" . $info[$i]["fullname"][0] . "</font></td>
                <td valign='center' align='left' bgcolor='#ffffff'><font size='2'>" . $info[$i]["telephonenumber"][0] . "</font></td>
		<td valign='center' align='left' bgcolor='#ffffff'><font size='2'>" . $info[$i]["facsimiletelephonenumber"][0] . "&nbsp;&nbsp;&nbsp;</font></td>
		<td valign='center' align='left' bgcolor='#ffffff'><font size='2'>" . $info[$i]["ou"][0] . "</font></td>
                </tr>
                


                ";








        }
      }
      echo "</table><br>\n";
    } else {
      //This should error out above but I put it here for good measure
      echo "No records found for  $lastname <br>" ;

    }
    ldap_close($ldap);
  } else {
    echo " The last name <b>$lastname</b> is not valid on this system.<br> Please use the back button and try again.<br><br>\n
          ";
    exit;
  }
}
echo "<a href='./phone-lists'>Click here to return to the search.</a>





      
</body>
</html>




























";

?>
