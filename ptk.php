<?php

include "net.php";
include "header.htm";
$username1 = $_COOKIE["username1"];
$password1 = $_COOKIE["password1"];


  echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;<b>Calls Analysis</b>";
  ?>
  
  
  
 <br><br>


<form method="post" name="report1" action="ptk2.php">


<table width="40%" border="0" cellspacing="0" cellpadding="0">
<tr>
	<td>

 &nbsp;&nbsp;&nbsp; Period From </td>
  
	
	
<?php	
   echo "<td><select name='dd1' size='1'>";
	echo "<option value='Day'>Day</option>";
	echo "<option value=''></option>";
	for ($i=1; $i<=31; $i++)
	
	for ($i=1; $i<=31; $i++)
	
	
	 
	{
	$j=strlen($i);
     if ($j==1)
	   {
	     $x="0"."$i";
	   }else
	   {
	   $x="$i";
	   }
     echo "<option value='$x'>$x</option>";
	}	

	 echo "</select></td>";
	?>


<td><select name="mm1" size="1">
<option value="Month">Month</option>

<option value=""></option>
  
	   <option value="01">Jan</option>
   	<option value="02">Feb</option>
	   <option value="03">Mar</option>
		<option value="04">Apr</option>
		<option value="05">May</option>
		<option value="06">Jun</option>
		<option value="07">Jul</option>
		<option value="08">Aug</option>
		<option value="09">Sep</option>
		<option value="10">Oct</option>
		<option value="11">Nov</option>
	   <option value="12">Dec</option>
</select></td>
	
<td>		<select name="yy1" size="1">
<option value="Year">Year</option>
<option value=""></option>
<option value="2017">2017</option>
	<option value="2018">2018</option>
	<option value="2019">2019</option>
	
</select></td>


</tr>


<tr><td>&nbsp;&nbsp;</td></tr>

<tr><td>



&nbsp;&nbsp;&nbsp; Period To</td>



<?php	
   echo "<td><select name='dd2' size='1'>";
	echo "<option value='dd'>Day</option>";
	echo "<option value=''></option>";
	for ($i=1; $i<=31; $i++)
	
	
	 
	{
	$j=strlen($i);
     if ($j==1)
	   {
	     $x="0"."$i";
	   }else
	   {
	   $x="$i";
	   }
     echo "<option value='$x'>$x</option>";
	}	
	 echo "</select></td>";
	?>

<td>
<select name="mm2" size="1">
<option value="Month">Month</option>

<option value=""></option>
  
	   <option value="01">Jan</option>
   	<option value="02">Feb</option>
	   <option value="03">Mar</option>
		<option value="04">Apr</option>
		<option value="05">May</option>
		<option value="06">Jun</option>
		<option value="07">Jul</option>
		<option value="08">Aug</option>
		<option value="09">Sep</option>
		<option value="10">Oct</option>
		<option value="11">Nov</option>
	   <option value="12">Dec</option>
</select></td>
	
	<td>	<select name="yy2" size="1">
<option value="Year">Year</option>
<option value=""></option>
<option value="2017">2017</option>

	
</select></td>



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

