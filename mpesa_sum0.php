<?php

include "net.php";
include "header.htm";
//$username1 = $_COOKIE["username1"];
//$password1 = $_COOKIE["password1"];


  echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;<b>MPESA SUMMARY REPORT</b>";
  ?>
  
  
  
 <br><br>


<form method="post" name="report1" action="mpesa_sum.php">


<table width="80%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td>Date (dd/mm/yyyy)</td>
	<td>
<input type="text" name="dat">
</td>
</tr>
</table>
<br>
<br>
&nbsp;&nbsp;&nbsp;<input type="submit" value="Submit Request"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset">




</form>




<?php





echo "<br>";
echo "<br>";
 echo "<br> <a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''><img src='back2.gif' width='47' height='16' border='0' alt=''></a>" ;   //include "kisfooter.htm";

include "footer.htm";
//?>
 
?>

