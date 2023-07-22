 <body>
 
 </body>
<?php



$host="localhost";
$name = "88846";
$pass = "kitale";
$dbname = "rvr";

$dbi = mysql_connect($host, $name,$pass) or
     die("I cannot connect to the database. Error :" . mysql_error());
mysql_select_db($dbname,$dbi); 
////include "kisheader1.htm";
$username1 = $_COOKIE["username1"];
$password1 = $_COOKIE["password1"];

// Get the values posted from the Form in comments.php
$stat = $_GET["stat"];
echo "<title>RVR IT HELPDESK REPORT</title>";
if ($stat=='closed')
{
$result = mysql_query(" select *,datediff(sdate,dat) as py from problems where status='$stat' order by id desc ",$dbi);
}
if ($stat=='open')
{
$result = mysql_query(" select *,datediff(curdate(),dat) as py from problems where status='$stat' order by id desc ",$dbi);
}
if ($stat=='pending')
{
$result = mysql_query(" select *,datediff(curdate(),dat) as py from problems where status='$stat' order by id  desc",$dbi);
}

$stat2=ucfirst($stat);

echo " <b>Calls $stat2 </b> Report &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
echo "<a href='excel.php?stat=$stat'>Export to Excel</a>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
echo "<a href='status3b.php?stat=$stat'>Vertical View</a>";
 
if ($stat=='closed')
{
    echo "<table width='100%' border='0' align='center'>\n" 
         ."<tr bgcolor='#CCE0EE'>\n" 
         ."<td> No.</td>\n"
         ."<td>Ref No.</td>\n"
         ."<td>Request Date/Time</td>\n"
         ."<td>User Name</td>\n"
         ."<td>Dept</td>\n"
         ."<td>Region</td>\n"
     
         ."<td>Email Address</td>\n"
         ."<td>Tel No./Ext</td>\n"
         ."<td>Problem Area</td>\n"
         ."<td>Description</td>\n"   
         ."<td>Urgency</td>\n"
         ."<td>Solution</td>\n"
         ."<td>Date/Time resolved</td>\n"
         ."<td>Technician</td>\n"
         ."<td>Open Days</td>\n"          
      ."" 
        ."</tr>"; 
        $n=0;
         while ($data = mysql_fetch_array($result))
 {
 
 $days=$data[sdate]-$data[dat];
  $j=strtoupper($data[sprovider]) ;
  $n++;
  echo "\n\n<tr bgcolor='#CCD0EE'>\n" 
      ."<td> $n</td>\n"
        ."<td>$data[refno] </td>\n"
         ."<td>$data[dat]  $data[tim]</td>\n"
           ."<td>$data[fnam]  $data[snam]</td>\n"
           ."<td>$data[dept] </td>\n"
           ."<td>$data[reg] </td>\n"
           ."<td>$data[email] </td>\n"
           ."<td>$data[telno] Ext $data[ext] </td>\n"
            ."<td>$data[problem]  </td>\n"
            ."<td>$data[descp]  </td>\n"
            ."<td>$data[urgency]  </td>\n"
            ."<td>$data[solution]  </td>\n"
                            ."<td>$data[sdate]  $data[stime]    </td>\n"
                         ."<td>$j </td>\n"
                                  ."<td>$data[py]</td>\n"
       
            ."</tr>"; 
}

}
if ($stat=='open')
{

   echo "<table width='100%' border='0' align='center'>\n" 
     ."<tr bgcolor='#CCE0EE'>\n" 
         ."<td> No.</td>\n"
       ."<td>Ref No.</td>\n"
         ."<td>Request Date/Time</td>\n"
       ."<td>User Name</td>\n"
       ."<td>Dept</td>\n"
         ."<td>Region</td>\n"
     //          ."<td>Number of visits</td>\n"
               ."<td>Email Address</td>\n"
                   ."<td>Tel No./Ext</td>\n"
                       ."<td>Problem Area</td>\n"
                       ."<td>Description</td>\n"   
                        ."<td>Urgency</td>\n"
           //              ."<td>Solution</td>\n"
           //               ."<td>Date/Time resolved</td>\n"
     //                      ."<td>Technician</td>\n"
                             ."<td>Open Days</td>\n"
                            
       //        ."<td>Post Date</td>\n"
          
      ."" 
        ."</tr>"; 
        $n=0;
         while ($data = mysql_fetch_array($result))
 {
 
 $days=$data[sdate]-$data[dat];
  $j=strtoupper($data[sprovider]) ;
  $n++;
  echo "\n\n<tr bgcolor='#CCD0EE'>\n" 
       ."<td>$n</td>\n"
        ."<td>$data[refno] </td>\n"
         ."<td>$data[dat]  $data[tim]</td>\n"
           ."<td>$data[fnam]  $data[snam]</td>\n"
           ."<td>$data[dept] </td>\n"
           ."<td>$data[reg] </td>\n"
           ."<td>$data[email] </td>\n"
           ."<td>$data[telno] Ext $data[ext] </td>\n"
            ."<td>$data[problem]  </td>\n"
            ."<td>$data[descp]  </td>\n"
            ."<td>$data[urgency]  </td>\n"
   //         ."<td>$data[solution]  </td>\n"
   //                             ."<td>$data[sdate]  $data[stime]    </td>\n"
  //                               ."<td>$data[sprovider] </td>\n"
                                  ."<td>$data[py]</td>\n"
       
            ."</tr>"; 
}

}
if ($stat=='pending')
{
    echo "<table width='100%' border='0' align='center'>\n" 
     ."<tr bgcolor='#CCE0EE'>\n" 
       ."<td>No.</td>\n"
       ."<td>Ref No.</td>\n"
         ."<td>Request Date/Time</td>\n"
       ."<td>User Name</td>\n"
       ."<td>Dept</td>\n"
        ."<td>Region</td>\n"
     
        ."<td>Email Address</td>\n"
        ."<td>Tel No./Ext</td>\n"
        ."<td>Problem Area</td>\n"
        ."<td>Description</td>\n"   
        ."<td>Urgency</td>\n"
        ."<td>Solution</td>\n"
               //        ."<td>Date/Time resolved</td>\n"
         ."<td>Technician</td>\n"
        ."<td>Open Days</td>\n"
                            

          
      ."" 
        ."</tr>"; 
        $n=0;
         while ($data = mysql_fetch_array($result))
 {
 
 $days=$data[sdate]-$data[dat];
  $j=strtoupper($data[sprovider]) ;
  $n++;
  echo "\n\n<tr bgcolor='#CCD0EE'>\n" 
    ."<td>$n</td>\n"
        ."<td>$data[refno] </td>\n"
         ."<td>$data[dat]  $data[tim]</td>\n"
           ."<td>$data[fnam]  $data[snam]</td>\n"
           ."<td>$data[dept] </td>\n"
           ."<td>$data[reg] </td>\n"
           ."<td>$data[email] </td>\n"
           ."<td>$data[telno] Ext $data[ext] </td>\n"
            ."<td>$data[problem]  </td>\n"
            ."<td>$data[descp]  </td>\n"
            ."<td>$data[urgency]  </td>\n"
            ."<td>$data[solution]  </td>\n"
          //                  ."<td>$data[sdate]  $data[stime]    </td>\n"
                         ."<td>$j</td>\n"
                                  ."<td>$data[py]</td>\n"
       
            ."</tr>"; 
}



}
echo "	<td>&nbsp;&nbsp;&nbsp;<a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''><img src='back2.gif' width='47' height='16' border='0' alt=''></a></td>";
// echo "<br> <a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''><img src='back2.gif' width='47' height='16' border='0' alt=''></a>"    //include "kisfooter.htm";
?>

