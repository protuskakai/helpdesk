
<?php


include "net.php";
include "header.htm";

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
echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b> Calls Analysis for Period $m1  to Period $m2</b><br>";

$m11="$yy1-$mm1-$dd1";
$m22="$yy2-$mm2-$dd2";

//echo $m11;
?>


<br><br><br>

<?php

$result = mysqli_query($dbi," select status,count(id) as 'cnt',problem from problems  where dat between '$m11' and '$m22'  group by problem,status");



$x=0;

 

    echo "<table width='30%' border='0' align='center'>\n" 
         ."<tr bgcolor='#CCE0EE'>\n" 
       
       
         ."<td><b>Problem Type</b></td>\n"
             ."<td><b>Status</b></td>\n"
          ."<td><b>No of Calls</b></td>\n"
               ."<td><b>Graph</b></td>\n"
      ."" 
        ."</tr>"; 
        $n=0;
         while ($data = mysqli_fetch_array($result))
 {
 
    $cnt=$data['cnt'] ;
    
      $stat=$data['status'] ;
    $prob=$data['problem'] ;
     $x=$cnt+$x;
  $n++;
  echo "\n\n<tr bgcolor='#CCD0EE'>\n" 
        ."<td>$prob</td>\n"
         ."<td>$stat</td>\n"
        ."<td align=center>$cnt</td>\n"
         ."<td align=left><img src='rate1.JPG' width=$cnt  height='14' border='0' alt=''></td>\n"
          ."" 
       
            ."</tr>"; 
}

echo "<tr bgcolor=#CCD0EE><td><b>Total </b></td><td></td><td align=center><b>$x</b></td><td></td></tr>";



 echo "</table>";
 
 
 $result2 = mysqli_query($dbi," select count(id) as cnt,sum(datediff(sdate,dat)) as py from problems where  dat between '$m11' and '$m22'  and status='closed'   ");
 
 
while ($data = mysqli_fetch_array($result2))
{
      $py=$data['py'] ;
     $cnt=$data['cnt'] ;
    //   $tcnt=$data['tcnt'] ;
     
     $avg=$py/$cnt;
  //    $tdays=$cnt/$tcnt;
     
     echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Average days to close a call = $avg <br><br>";
     
 //       echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Average days to close a call = $avg <br><br>";
}

 

echo "	<td>&nbsp;&nbsp;&nbsp;<a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''><img src='back2.gif' width='47' height='16' border='0' alt=''></a></td>";
include "footer.htm";
?>

