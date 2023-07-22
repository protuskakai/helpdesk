<?php
include "net.php";
////include "kisheader1.htm";

$dd1 = $_POST["dd1"];
$mm1 = $_POST["mm1"];
$yy1 = $_POST["yy1"];

$dd2 = $_POST["dd2"];
$mm2 = $_POST["mm2"];
$yy2 = $_POST["yy2"];


//$username1 = $_COOKIE["username1"];
//$password1 = $_COOKIE["password1"];


$m1="$dd1-$mm1-$yy1";
$m2="$dd2-$mm2-$yy2";


$m11="$yy1-$mm1-$dd1";
$m22="$yy2-$mm2-$dd2";

//echo $m11;
?>


<br><br><br>

<?php

//$result = mysql_query(" select status,count(id) as 'cnt',problem from problems  where dat between '$m11' and '$m22'  group by problem,status",$dbi);

//if ($stat=='closed')
//{
$result = mysqli_query($dbi," select *,datediff(sdate,dat) as py from problems where  dat between '$m11' and '$m22'  order by id asc ");

//$stat2=ucfirst($stat);
echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b> Calls  for Period $m1  to Period $m2</b><br>";
//echo "<a href='excel4.php?stat=$stat'>Export to Excel</a>";
//echo "<a href='excel4.php>Export to Excel</a>";


    echo "<table width='100%' border='0' align='center'>\n" 
         ."<tr bgcolor='#CCE0EE'>\n" 
         ."<td > No.</td>\n"
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
         ."<td>Status</td>\n"
         ."<td>Date/Time resolved</td>\n"
      //        ."<td>Notified</td>\n"
         ."<td>Technician</td>\n"
         
       
      ."" 
        ."</tr>"; 
        $n=0;
         while ($data = mysqli_fetch_array($result))
 {
 
 


 $days=$data['sdate']-$data['dat'];
  $j=strtoupper($data['sprovider']) ;
  $n++;
  echo "\n\n<tr bgcolor='#CCD0EE'>\n" 
    ."<td>$n</td>\n"
        ."<td>$data[refno] </td>\n"
         ."<td>$data[dat]  $data[tim]</td>\n"
           ."<td>$data[fnam]  $data[snam]</td>\n"
           ."<td><font size=1>$data[dept]</font> </td>\n"
           ."<td>$data[reg] </td>\n"
           ."<td>$data[email] </td>\n"
           ."<td>$data[telno] Ext $data[ext] </td>\n"
            ."<td>$data[problem]  </td>\n"
            ."<td>$data[descp]  </td>\n"
            ."<td>$data[urgency]  </td>\n"
            ."<td>$data[solution]  </td>\n"
              ."<td>$data[status]  </td>\n"
              ."<td>$data[sdate]  </td>\n"
 //                 ."<td>$data[notfemail]  </td>\n"
          //                  ."<td>$data[sdate]  $data[stime]    </td>\n"
                         ."<td>$j</td>\n"
                       
       
            ."</tr>"; 
}


echo "</table>";
echo "	<table><td><td>&nbsp;&nbsp;&nbsp;<a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''><img src='back2.gif' width='47' height='16' border='0' alt=''></a></td></tr></table>";

?>