<body> 
</body>
<?php

$ip=$_SERVER['REMOTE_ADDR'];
 //echo $ip;

include "net.php";



//echo $ip;

echo "<title>Staff Email Addresses</title>";
$result = mysqli_query($dbi," select * from emails order by reg,fnam ");
//echo " select * from mpesa where '$fld' like '%$dat%' order by seq desc ";



echo " <b> Staff Email Addresses  </b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp<br><br>";
echo "<a href='excel_email.php'>Export to Excel</a>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
//echo "<a href='status3b.php?stat=$stat'>Vertical View</a>";
 

    echo "<table width='60%' border='0' align='center'>\n" 
         ."<tr bgcolor='#CCE0EE'>\n" 
         ."<td width=10%> No.</td>\n"
         ."<td>Region</td>\n"
         ."<td>Name</td>\n"
         ."<td>email</td>\n"
      
      ."" 
        ."</tr>"; 
        $n=0;
         while ($data = mysqli_fetch_array($result))
 {
 
 //$days=$data[sdate]-$data[dat];
 // $j=strtoupper($data[sprovider]) ;
  $n++;
  
 echo "\n\n<tr bgcolor='#CCD0EE'>\n" 
      ."<td width=10%> $n</td>\n"
        ."<td>$data[reg]</td>\n"
         ."<td>$data[fnam] $data[lnam]</td>\n"
       //    ."<td></td>\n"
             ."<td>$data[email]</td>\n"
         
            ."</tr>"; 

  
  }
  
  
  





echo "</table>";
echo "	<table><td><td>&nbsp;&nbsp;&nbsp;<a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''><img src='back2.gif' width='47' height='16' border='0' alt=''></a></td></tr></table>";
//include "kisfooter8.php";
?>

