<?php

include "header.htm";
echo "<br>";
echo "<b>Query MPESA Payments</b>";
echo "<br>";

?>
<form method="post" action="mpesan2.php">
<tr><td><br></td><td></td><td></td></tr>
<?php
 include "datepicker";
?>

<input type="submit"   value="Query">
</form>
</table>

<?php
 echo "<br> <a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''><img src='back2.gif' width='47' height='16' border='0' alt=''></a>" ;
 include "footer.htm";
?>
