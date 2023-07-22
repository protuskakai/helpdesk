<?php


$host="localhost";
$name = "88846";
$pass = "kitale";
$dbname = "rvr";


$dbi = mysql_connect($host, $name,$pass) or
die("I cannot connect to the database. Error :" . mysql_error());
mysql_select_db($dbname,$dbi); 
//include "kisheader1.htm";

// Get the values posted from the Form in comments.php
$stat = $_GET["stat"];
if ($stat=='closed')
{
$result = mysql_query(" select *,datediff(sdate,dat) as py from problems where status='$stat' order by id desc ",$dbi);
}
if ($stat=='open')
{
$result = mysql_query(" select *,datediff(curdate(),dat) as py from problems where status='$stat' order by id desc",$dbi);
}
if ($stat=='pending')
{
$result = mysql_query(" select *,datediff(curdate(),dat) as py from problems where status='$stat' order by id desc",$dbi);
}
$stat2=ucfirst($stat);
echo " <b>Calls $stat2 </b> Report &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
echo "<a href='excel.php?stat=$stat'>Export to Excel</a>";

echo "<table width='99%' border='0' cellspacing='1' cellpadding='0'   align='center' >";
  $n=0;
         while ($data = mysql_fetch_array($result))
 {
           $days=$data[sdate]-$data[dat];
           $n++;
           $j=strtoupper($data[sprovider]) ;
      echo "\n\n<tr bgcolor='#3CD0EE'>\n " 
           ."<tr bgcolor='#3CE0ED'>\n<td width=40%><b>Ref No.</b></td>\n<td><b>$data[refno]<td   bgcolor='#cCEeED' align='right'>$n </td></b> </td>\n</tr>"
           ."<tr bgcolor='#Ccf0EE'>\n<td><b>Name</b></td>\n<td>$data[fnam]  $data[snam]</td>\n</tr>"
           ."<tr bgcolor='#CCE0EE'>\n<td><b>Dept</b></td>\n<td>$data[dept] </td>\n</tr>"
           ."<tr bgcolor='#CCf0EE'>\n<td><b>Region</b></td>\n<td>$data[reg] </td>\n</tr>"
           ."<tr bgcolor='#CCE0EE'>\n<td><b>Email Address</b></td>\n<td>$data[email] </td>\n</tr>"
           ."<tr bgcolor='#CCf0EE'>\n<td><b>Tel. No./Ext</b></td>\n<td>$data[telno] Ext $data[ext] </td>\n</tr>"
           ."<tr bgcolor='#CCE0EE'>\n<td><b>Problem Area</b></td>\n<td>$data[problem]  </td>\n</tr>"
           ."<tr bgcolor='#Ccf0EE'>\n<td><b>Description</b></td>\n<td>$data[descp]  </td>\n</tr>"
           ."<tr bgcolor='#CCE0EE'>\n<td><b>Level of Urgency</b></td>\n<td>$data[urgency]  </td>\n</tr>"
           ."<tr bgcolor='#CCf0EE'>\n<td><b>Status</b></td>\n<td>$data[status]  </td>\n</tr>"
           ."<tr bgcolor='#CCe0EE'>\n<td><b>Update</b></td>\n<td>$data[solution]  </td>\n</tr>"
           ."<tr bgcolor='#CCf0EE'>\n<td><b>Date/Time reported</b></td>\n<td>$data[dat] $data[tim]   </td>\n</tr>"
           ."<tr bgcolor='#CCE0EE'>\n<td><b>Open Days</b></td>\n<td>$data[py]  </td>\n</tr>"
           ."<tr bgcolor='#CCf0EE'>\n<td><b>Date/Time resolved</b></td>\n<td>$data[sdate]  $data[stime] </td>\n</tr>"
           ."<tr bgcolor='#CCE0eE'>\n<td><b>Updated by</b></td>\n<td>$j </td>\n</tr>"
           ."<tr bgcolor='#CCE0EE'>\n\n</tr>"
           ."" 
       	  ."</tr>"; 
}
 echo "<br> <a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''><img src='back2.gif' width='47' height='16' border='0' alt=''></a>"    //include "kisfooter.htm";
?>

