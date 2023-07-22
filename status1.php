<?php
session_start();


   $username1 =$_POST["username1"];
    $password1 = $_POST["password1"];

include "net.php";

$sql = "select * from users where userid='$username1' and pswrd='$password1'";
//$result = mysql_query($sql,$dbi);  

$result= mysqli_query($dbi,$sql);
if (!$result)
{


 //or die ("no entry " . mysql_error());
   echo "no entry ". mysql_error();
    echo "<br><br><br> <a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''><img src='back2.gif' width='47' height='16' border='0' alt=''></a>"  ;
   include "footer.htm";
   die ("!");
 }
 
$data = mysqli_fetch_array($result);


if (($data['userid'] == $username1  ) && ($data['pswrd'] ==$password1))
{
//$username=urlencode(
   setcookie ( "username1",$username1,time()+3600);
   setcookie ( "password1",$password1,time()+3600);
   //echo "<br> <a href='accept.php'>Accepted</a></br>";
 //  include "kisheader2.htm";
 //  echo "<b>Topic of the month:</b>";
  $grp=$data['grp'];
 } else
 {
 
 echo "Access denied:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
   die ("<a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''> Back</a>");

 }
 
//$_SESSION["username1"] =$username1;
//$_SESSION["password1"] = $password1;
 
?>
<?php


include "header.htm";


if (!$password1)
{


 echo "Access denied:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
     die ("<a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''> Back</a>");
}

if (!$username1)
{


 echo "Access denied:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
     die ("<a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''> Back</a>");

}

if ($grp=='admin')
{

echo "<br><a href='addusers.php'>Add users</a><br><br>";


}

?>


<table width="100%" border="0" cellspacing="0" cellpadding="0"  align=center  >
<th  align=left>
<b>Manage logged calls</b></th>
 <br>
<tr>
	<td bgcolor="#ADD1B9" >&nbsp;</td>
</tr>
<tr bgcolor="#ADD1B9"><td><font color=red><b>Reports</b></font></td></tr>
<tr><td bgcolor="#ADD1B9" ><br></td></tr>
<tr><td bgcolor="#ADD1B9" ><br></td></tr>
<tr align=justify>
<td bgcolor="#ADD1B9" ><b><a href="status3.php?stat=open" target="_blank">Open</a> | <a href="status3.php?stat=closed"  target="_blank">Closed</a> | <a href="status3.php?stat=pending"  target="_blank">Pending</a> | Calls Analysis :<a href="ptk.php">&nbsp;1. Summary</a>&nbsp;&nbsp;&nbsp;<a href="ptkd.php" target="_blank">2. Detailed</a>&nbsp; | <a href="rate3.php">Helpdesk Service Ratings</a>   </b>
</tr>
<tr><td bgcolor="#ADD1B9" ><br></td></tr>
<tr><td bgcolor="#ADD1B9" ><br></td></tr>
<tr><td><br></td></tr>
<tr>
<form method="post" action="status2.php">
<tr bgcolor="#ADD1B9"><td><br></td></tr>
<tr bgcolor="#ADD1B9"><td><font color=red><b>Updates</b></font></td></tr>
<tr><td bgcolor="#ADD1B9" ><br></td></tr>
<tr><td bgcolor="#ADD1B9" ><br></td></tr>
<tr align=justify>
<td bgcolor="#ADD1B9"><b>Update call no.<input type="text" name="refno"><input type="submit" value="Submit"> </td>
</tr>
<tr><td bgcolor="#ADD1B9" ><br></td></tr>
<tr><td bgcolor="#ADD1B9" ><br></td></tr>
</form>
</td>
</tr>

</table>

<?php

 echo "<br><br><br> <a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''><img src='back2.gif' width='47' height='16' border='0' alt=''></a>"  ;
  include "footer.htm";
?>
