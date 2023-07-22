<?php

include "header.htm";
echo "<br>";
echo "<b>Defaulters List</b>";
echo "<br>";

?>
<form method="post" action="def.php">
<tr><td><br></td><td></td><td></td></tr>


<td>Cutoff Date :   Year </td>
<td>
<select name="yr" size="1">
<option value=""></option>

	<option value="2016">2016</option>
	<option value="2017">2017</option>
	
</select>
</td>
</tr>
<tr>
 Month</td>
<td>
<select name="mon" size="1">
<option value=""></option>
  
	   <option value="01">Jan</option>
   	<option value="02">Feb</option>
	   <option value="03">Mar</option>
		<option value="05">Apr</option>
		<option value="05">May</option>
		<option value="06">Jun</option>
		<option value="07">Jul</option>
		<option value="08">Aug</option>
		<option value="09">Sep</option>
		<option value="10">Oct</option>
		<option value="11">Nov</option>
	   <option value="12">Dec</option>
</select>



</tr>

<tr>
<td>Day</td>
<td>
<select name="day" size="1">
<option value=""></option>
  
  
  <?php
   
   for ($i = 1; $i <= 31; $i++) 
   {
   
     $s=$i;
   if ( $i<10)
   {
     $s='0'.$i;
    
   }
    echo    "<option value='$s'>$s</option>";
}

   
?>
	   
   
</select>



</tr>


<tr>
 <td>Region</td>
<td>
	
	<select name="reg" size="1">
<option value=""></option>

	<option value="Bungoma">Bungoma</option>
	<option value="Kimilili">Kimilili</option>
		<option value="Kitale">Kitale</option>
   	<option value="Webuye">Webuye</option>

</select>
	
	</td>

</tr>


<input type="submit"   value="Query">
</form>
</table>

<?php
 echo "<br> <a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''><img src='back2.gif' width='47' height='16' border='0' alt=''></a>" ;
 include "footer.htm";
?>
