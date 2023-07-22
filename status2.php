<?php


include "net.php";
//include "kisheader1.htm";
$username1 = $_COOKIE["username1"];
$password1 = $_COOKIE["password1"];

// Get the values posted from the Form in comments.php
$refno = $_POST["refno"];

if (!$refno)
{
//$refno = $_GET["refno"];

}

if (!$username1) 
{
  echo "Access denied:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
   die ("<a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''> Back</a>");
}


$sql = "select * from problems where id='$refno'  ";
//echo $sql;
$result = mysqli_query($dbi,$sql) or die ("no entry " . mysqli_error());
 $data = mysqli_fetch_array($result);
if (!$data)
{

echo "No records found ";
    die ("<a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''> Back</a>");

}
   
   $j=strtoupper($data[!$username1]) ;
   echo "<table width='80%' border='0' align='center'>\n" 
 
 //   echo "\n\n<tr bgcolor='#CCD0EE'>\n" 
        ."<tr bgcolor='#DCE0ED'>\n<td><b>Ref No.</b></td>\n<td>$data[refno] </td>\n</tr>"
           ."<tr bgcolor='#CCE0EE'>\n<td><b>Name</b></td>\n<td>$data[fnam]  $data[snam]</td>\n</tr>"
           ."<tr bgcolor='#CCE0EE'>\n<td><b>Dept</b></td>\n<td>$data[dept] </td>\n</tr>"
           ."<tr bgcolor='#CCE0EE'>\n<td><b>Region</b></td>\n<td>$data[reg] </td>\n</tr>"
           ."<tr bgcolor='#CCE0EE'>\n<td><b>Email Address</b></td>\n<td>$data[email] </td>\n</tr>"
           ."<tr bgcolor='#CCE0EE'>\n<td><b>Tel. No./Ext</b></td>\n<td>$data[telno] Ext $data[ext] </td>\n</tr>"
           ."<tr bgcolor='#CCE0EE'>\n<td><b>Problem Area</b></td>\n<td>$data[problem]  </td>\n</tr>"
            ."<tr bgcolor='#CCE0EE'>\n<td><b>Description</b></td>\n<td>$data[descp]  </td>\n</tr>"
            ."<tr bgcolor='#CCE0EE'>\n<td><b>Level of Urgency</b></td>\n<td>$data[urgency]  </td>\n</tr>"
            ."<tr bgcolor='#CCE0EE'>\n<td><b>Status</b></td>\n<td>$data[status]  </td>\n</tr>"
             ."<tr bgcolor='#CCE0EE'>\n<td><b>Update</b></td>\n<td>$data[solution]  </td>\n</tr>"
             ."<tr bgcolor='#CCE0EE'>\n<td><b>Date reported</b></td>\n<td>$data[dat]  </td>\n</tr>"
             ."<tr bgcolor='#CCE0EE'>\n<td><b>Time reported</b></td>\n<td>$data[tim]  </td>\n</tr>"
             ."<tr bgcolor='#CCE0EE'>\n<td><b>Date resolved</b></td>\n<td>$data[sdate]  </td>\n</tr>"
                   ."<tr bgcolor='#CCE0EE'>\n<td><b>Updated by</b></td>\n<td>$j </td>\n</tr>"
        ."" 
            ."</tr>"; 
       // if ($data[sdate] != '0000-00-00')
          if ($data['status'] == 'Closed')
        {
         echo " <a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''><img src='back2.gif' width='47' height='16' border='0' alt=''></a>";    //include "kisfooter.htm";
        die (" ");
        
        }
            

?>
<tr>
<form method="post" action="status4.php?refno=<?php echo    "$refno" ?>">
<tr>
	<td><b>Update</b></td>
<td ><textarea type="text" name="solution"   rows="3" cols="50"></textarea></td>	
</tr>

<tr>
<td><b>Status</b></td>
<td>
	
<select name="status" size="1">
	<option value=""></option>
	<option value="closed">Closed</option>
	<option value="pending">Pending</option>	
	
</select>

</td>


<tr>
<td><b>Solved By</b></td>
<td>
	
<select name="sprovider" size="1">
<option value=""></option>
  
<?php
// echo  "dddddd";
include "net.php";

$result = mysqli_query($dbi,"select *  from users order by snam ");
 while ($data = mysqli_fetch_array($result))
 {
   

    echo "<option value='$data[snam] $data[fnam]'>$data[snam] $data[fnam]</option>";
  
}
?>


</select>

</tr>
<tr><td><input type="submit" value="Submit"></td></tr>
</form>
</td>
</tr>

</table>
<?php

 echo " <a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''><img src='back2.gif' width='47' height='16' border='0' alt=''></a>"    //include "kisfooter.htm";
?>

