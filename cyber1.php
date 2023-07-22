<body> 
</body>
<?php
//date_default_timezone_set("Africa/Nairobi");

echo gethostname();
date_default_timezone_set('Africa/Nairobi');
$host="localhost";
$name = "55509";
$pass = "kitale";
$dbname = "cyberdb";
$dbi = mysqli_connect($host, $name,$pass,$dbname) or
die("I cannot connect to the database. Error :" . mysqli_error());
mysqli_select_db($dbi,$dbname); 



$result = mysqli_query($dbi," select * from logs order by  seq desc ");





echo " <b> Calls Report  </b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
//echo "<a href='excel.php?stat=$stat'>Export to Excel</a>";
//echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
//echo "<a href='status3b.php?stat=$stat'>Vertical View</a>";
 

    echo "<table width='60%' border='0' align='center'>\n" 
         ."<tr bgcolor='#CCE0EE'>\n" 
         ."<td width=10%>Seq</td>\n"
         ."<td>User.</td>\n"
         ."<td>Date</td>\n"
         ."<td>Time</td>\n"
           ."<td>Time Used</td>\n"
             
      ."" 
        ."</tr>"; 
        $n=0;
         while ($data = mysqli_fetch_array($result))
 {
 $tim=$data['tim'];
 $time1 = new DateTime($tim);
$time2 = new DateTime(strtotime(time()));
//echo $time2."  ";
$interval = $time1->diff($time2);
$tt= $interval->format('%H:%i:%s'); 
  echo "\n\n<tr bgcolor='#CCD0EE'>\n" 
  //    ."<td width=10%> $n</td>\n"
  
  //strtotime("$data[dat] $data[tim]")
 //  ."<td></td>\n"
    //     ."<td> 1 $tim</td>\n"
    //        ."<td>2  $gg </td>\n"
        ."<td>$data[seq] </td>\n"
         ."<td>$data[user] </td>\n"
           ."<td>$data[dat]  </td>\n"
           ."<td>$data[tim] </td>\n"
          ."<td>$tt </td>\n"
       
            ."</tr>"; 
}


?>

