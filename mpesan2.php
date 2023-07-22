<body> 
</body>
<?php
$ip=$_SERVER['REMOTE_ADDR'];
include "net2.php";



$dat1= $_POST['dat1'];
$dat2= $_POST['dat2'];
//$qry= $fld.":".$dat;
//$fs=substr($dat, 0, 1);
//echo $dat1."    ".$dat2;
$dat1 = str_replace("/","-",$dat1); 
$dat2 = str_replace("/","-",$dat2); 
if(!$dat2)
{
 die ( "No value given!   <a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''><img src='back2.gif' width='47' height='16' border='0' alt=''></a>");
}
if(!$dat1)
{
 die ( "No value given!   <a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''><img src='back2.gif' width='47' height='16' border='0' alt=''></a>");
}

echo "<title>NZOWASCO ICT HELPDESK - MPESA QUERIES</title>";
$sql=" select * from mpesa where mdat<='$dat2' and mdat>='$dat1' order by mdat, left(accno,1),accno, seq desc ";
//echo $sql;
$result = mysqli_query($dbi,$sql);

 echo " <b> MPESA Report   ( $dat1  To $dat2 )</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp<br><br>";
 echo "<a href='excel_mpesan.php?dat1=$dat1&dat2=$dat2'>Export to Excel</a>";
 echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
 echo "<table width='70%' border='0' align='center'>\n" 
         ."<tr bgcolor='#CCE0EE'>\n" 
         ."<td width=10%> No.</td>\n"
         ."<td>Ref No.</td>\n"
         ."<td>Date/Time</td>\n"
         ."<td>Name</td>\n"
         ."<td>Region</td>\n"
         ."<td>Connection No.</td>\n"
         ."<td>Amount</td>\n"
         ."<td>Tel No.</td>\n"
        ."<td>Err Ind.</td>\n"
        ."" 
        ."</tr>"; 
        $n=0;
         while ($data = mysqli_fetch_array($result))
 {
 
  $amt=$data['amt'];
  $amt=number_format($amt,2);
  $n++;
  $reg=substr($data['accno'],0,1);
  $regg="UnKnown";
  if ($data['ind']!="*")
  {
  	switch ($reg){
	case "2":
		$regg="Kitale";
		break;
	case "3":
		$regg="Webuye";
		break;
	case "4":
		$regg="Bungoma";
		break;
		case "5":
		$regg="Kimilili";
		break;
		case "6":
		$regg="Malaba";
		break;
	}
  
  }
  
  echo "\n\n<tr bgcolor='#CCD0EE'>\n" 
           ."<td width=10%> $n</td>\n"
           ."<td><a href='mpesa3.php?tcode=$data[tcode]'>$data[tcode]</a></td>\n"
           ."<td>$data[dat]</td>\n"
           ."<td>$data[nam]</td>\n"
           ."<td>$regg</td>\n"
           ."<td><a href='mpesa4.php?accno=$data[accno]'>$data[accno]</a> </td>\n"
           ."<td align=right>$amt</td>\n"
           ."<td><a href='mpesa5.php?telno=$data[telno]'>$data[telno]</a></td>\n"
           ."<td>$data[ind] </td>\n"
           ."</tr>"; 
}
echo "</table>";
echo "	<table><td><td>&nbsp;&nbsp;&nbsp;<a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''><img src='back2.gif' width='47' height='16' border='0' alt=''></a></td></tr></table>";

?>