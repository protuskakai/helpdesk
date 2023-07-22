<?php









$db = 'c:\kwss\gl\gledger.mdb';
//$db = '//rvrserver/RVR/gl/gledger.mdb';
$conn = new COM('ADODB.Connection') or exit('Cannot start ADO.');
//echo $glacc;
// Two ways to connect. Choose one.
$conn->Open("Provider=Microsoft.Jet.OLEDB.4.0;Data Source=C:\payment_auto\yr.mdb;User Id=;Password=kitale;"); //or exit('Cannot open with Jet.');
//$conn->Open("DRIVER={Microsoft Access Driver (*.mdb)}; DBQ=$db"); // or exit('Cannot open with driver.');



$sql = "select * from  bud_users where userid='$username1' and passwd='$password1'     "; 


$rrs = $conn->Execute($sql);

 if ($rrs && !$rrs->EOF && $rrs->fields[0])
{


      $userid=$rrs->Fields['userid']->Value;
      $passwd=$rrs->Fields['passwd']->Value;
              $deptcode=$rrs->Fields['deptcode']->Value;   

   
   }else
   {
   echo "Access denied:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
   die ("<a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''> Back</a>");
   }

?>

<b>Actual/Budets Comparison reports</b> 
<br><br>

<form method="post" action="bud11.php">
<table width="99%" border="0" cellspacing="5" cellpadding="3" bgcolor="#CDDFED" >



<tr>
<td>Period From :   Year </td>
<td with=30%>
<select name="fyr" size="1">
<option value=""></option>
  <option value="2008">2008</option>
	<option value="2009">2009</option>
	<option value="2010">2010</option>
	<option value="2011">2011</option>
		<option value="2012">2012</option>
	
</select>
</td>
</tr>
<tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Month</td>
<td with=30%>
<select name="fmon" size="1">
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
</select>
<tr>

<td><br></td>
</td>
<tr>
<td>Period To :   Year </td>
<td>
<select name="yr" size="1">
<option value=""></option>
   <option value="2008">2008</option>
	<option value="2009">2009</option>
	<option value="2010">2010</option>
	<option value="2011">2011</option>
	<option value="2012">2012</option>
	
</select>
</td>
</tr>
<tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Month</td>
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
</td>
</tr>



<tr>
	
		<td  width="20%">Dept </td>
		<td  width="20%">
<select name="dept" size="1">
<option value=""></option>
<option value="ALL">ALL</option>
  
<?php



 // setcookie ( "username1",$username1,time()+3600);
  //setcookie ( "password1",$password1,time()+3600);

$db = '\\rvr\gl\gledger.mdb';
//$db = '//rvrserver/RVR/gl/gledger.mdb';
$conn = new COM('ADODB.Connection') or exit('Cannot start ADO.');
//echo $glacc;
// Two ways to connect. Choose one.
$conn->Open("Provider=Microsoft.Jet.OLEDB.4.0; Data Source=$db"); //or exit('Cannot open with Jet.');
//$conn->Open("DRIVER={Microsoft Access Driver (*.mdb)}; DBQ=$db"); // or exit('Cannot open with driver.');

if ($username1=='admin')
  {

       $sql = "select dept,deptname from respcodes   group by deptname,dept  "; 
  }else
  {
  $sql = "select dept,deptname from respcodes where dept='$deptcode'  group by deptname,dept  "; 
  
  }
$rs = $conn->Execute($sql);


       while (!$rs->EOF)
 {
 
 $dr=$rs->Fields['dept']->Value;
$cr=$rs->Fields['deptname']->Value;
 echo "<option value=$dr>$cr</option>";
$rs->MoveNext();
}
?>
$rs->Close();
$conn->Close();
$rs = null;
$conn = null;
?>
</select>
</td>
</tr>
<tr>
	<td>From   Acc No:</td>
	<td><input type="text" size="40" name="accf" ></td>
	</tr>
	<tr>
	<td>To  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Acc No:</td>
	<td><input type="text" size="40" name="acct" ></td>
</tr>


</table><br>
<input type="submit" value="Submit Request"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset">
<?php

 echo "<br><br><br> <a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''><img src='back2.gif' width='47' height='16' border='0' alt=''></a>"    //include "kisfooter.htm";
?>
