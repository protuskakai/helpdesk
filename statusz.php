 
<?php



include "net.php";
//include "kisheader1.htm";

// Get the values posted from the Form in comments.php
$refno = $_GET["refno"];
echo "<title>RVR IT HELPDESK REPORT</title>";

$sql = "select * from problems  where refno='$refno'";
$result = mysqli_query($dbi,$sql); // or die ("no entry " . mysqli_error());
$data = mysqli_fetch_array($result);
$email=$data['email'];    
$stat=strtolower($data['status']); 


if ($stat=='closed')
{
$result = mysqli_query($dbi," select *,sdate-dat as py from problems where refno='$refno' order by id desc ");
}
if ($stat=='open')
{
$result = mysqli_query($dbi," select *,curdate()-dat as py from problems where  refno='$refno' order by id desc");
}
if ($stat=='pending')
{
$result = mysqli_query($dbi," select *,curdate()-dat as py from problems where  refno='$refno' order by id desc");
}

$stat2=ucfirst($stat);
 
  $n=0;
        $data = mysqli_fetch_array($result);

 
 $days=$data['sdate']-$data['dat'];
  $n++;
 $j=strtoupper($data['sprovider']) ;
 echo "<table width='50%' border='0' cellspacing='0' cellpadding='1' bordercolor='#3CE0ED'  align=center>";
      echo "\n\n<tr bgcolor='#3CD0EE'>\n" 
           ."<tr bgcolor='#3CE0ED'>\n<td><b>Ref No.</b></td>\n<td><b>$data[refno]</b> </td>\n</tr>"
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
            ."<tr bgcolor='#3CE0ED'>\n<td><b>Updated by</b></td>\n<td>$j </td>\n</tr>"
            ."<tr bgcolor='#CCE0EE'>\n\n</tr>"
            ."" 
            ."</tr>";                 
 echo "<br> <a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''><img src='back2.gif' width='47' height='16' border='0' alt=''></a>"    //include "kisfooter.htm";
?>

