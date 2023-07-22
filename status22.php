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
$refno = $_POST["refno"];



$sql = "select * from problems where id='$refno'  ";
$result = mysql_query($sql,$dbi) or die ("no entry " . mysql_error());
 $data = mysql_fetch_array($result);

   
    echo "<table width='90%' border='0' align='center'>\n" 
     ."<tr bgcolor='#CCE0EE'>\n" 
       ."<td>Ref No.</td>\n"
       ."<td>User Name</td>\n"
       ."<td>Dept</td>\n"
         ."<td>Region</td>\n"
     //          ."<td>Number of visits</td>\n"
               ."<td>Email Address</td>\n"
                   ."<td>Tel No</td>\n"
                       ."<td>Problem Area</td>\n"
                       ."<td>Description</td>\n"   
                        ."<td>Urgency</td>\n"
                           ."<td>Status</td>\n"  
                             ."<td>Solution</td>\n"  
//               ."<td>Post Date</td>\n"
          
      ."" 
        ."</tr>"; 
    
 
  echo "\n\n<tr bgcolor='#CCD0EE'>\n" 
        ."<td>$data[id] </td>\n"
           ."<td>$data[fnam]  $data[snam]</td>\n"
           ."<td>$data[dept] </td>\n"
           ."<td>$data[reg] </td>\n"
             ."<td>$data[email] </td>\n"
                ."<td>$data[telno] </td>\n"
                   ."<td>$data[problem]  </td>\n"
                      ."<td>$data[descp]  </td>\n"
                         ."<td>$data[urgency]  </td>\n"
                             ."<td>$data[status]  </td>\n"
                         ."<td>$data[solution]  </td>\n"
       
            ."</tr>"; 

?>
<tr>
<form method="post" action="status4.php?refno=<?php echo    "$refno" ?>">
<tr>
	<td>Solution</td>
<td ><textarea type="text" name="solution"   rows="3" cols="50"></textarea></td>	
</tr>
<tr>
<td>Status</td>
<td>
	
<select name="status" size="1">
	<option value=""></option>
	<option value="closed">closed</option>
	<option value="pending">pending</option>
	<input type="submit" value="Submit">
	
</select>
</td>
</tr>

</form>
</td>
</tr>


<?php
 echo "<br> <a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''><img src='back2.gif' width='47' height='16' border='0' alt=''></a>"    //include "kisfooter.htm";
?>

