

<?php
   include "header.htm";
echo "<b>ICT Staff Login</b>"
?>


<table width="100%"   bgcolor='#ADD1B9'  border="0" cellspacing="5" cellpadding="0"  bordercolor="#008080">


<form method="post" action="status1.php">

<tr>
<td>
Login to manage logged calls</td>
</tr>
<tr>
	<td>User ID</td>
	<td><input type="text" size="40" name="username1" ></td>
</tr>
<tr>
	<td>Password</td>
	<td><input type="password" size="40" name="password1"></td>
</tr>
<br><br>
<tr>
<td><input type="submit" value="Submit">                             <input type="reset"></td>
</tr>
</table>
<?php
 echo "<br> <a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''><img src='back2.gif' width='47' height='16' border='0' alt=''></a>"  ;  
   include "footer.htm";
?>
