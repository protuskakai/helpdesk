<?php


include "header.htm";
//$fnam = $_GET['1'];
//$snam = $_GET['2'];
//$userid = $_GET['3'];
//$pswd= $_GET['4'];
//$pswd1= $_GET['5'];
?>

<b>Please Enter Details</b> 
<tr>
<form method="post" action="adduser2.php">
<table width="99%" border="0" cellspacing="5" cellpadding="3" bgcolor="#CDDFED" >

	<td  width="20%"> First Name:</td>
	<td><input type="text" size="40" name="fnam" value=""></td>
</tr>
<tr>
	<td>Surname:</td>
	<td><input type="text" size="40" name="snam" value=""></td>
</tr>
<tr>
	<td>userid:</td>
	<td><input type="text" size="40" name="userid" value=""></td>
</tr>

<tr>
<td>userid:</td>
<td>
<select name="grp" size="1">
	<option value=""></option>
	<option value="admin">Admin</option>
	<option value="other"> Other</option>
	
</select>


</td></tr>
<tr>
	<td>Password:</td>
	<td><input type="password" size="40" name="pswd" value=""></td>
</tr>
</tr>
<tr>
	<td>Confirm Password:</td>
	<td><input type="password" size="40" name="pswd1" value=""></td>
</tr>
</tr>

</table><br>

<br>

<input type="submit" value="Submit Request"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset">
<?php

 echo "<br> <a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''><img src='back2.gif' width='47' height='16' border='0' alt=''></a>" ;   //include "kisfooter.htm";
  echo "<br>";
  //echo "<br>";
  //echo "<br>";
include "footer.htm";
 
?>
