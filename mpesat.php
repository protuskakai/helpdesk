<body> 
</body>
<?php
$ip=$_SERVER['REMOTE_ADDR'];
include "net2.php";
$fld = $_GET['fld'];
$dat = $_GET['dat'];
$qry= $fld.":".$dat;
$fs=substr($dat, 0, 1);
if ($fld=="telno" )
{
  if ($fs=="0")
  {
        $dat=substr($dat, 1); 
  }
}
$dat = str_replace(" ","%",$dat); 

if(!$dat)
{
 die ( "No value given!   <a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''><img src='back2.gif' width='47' height='16' border='0' alt=''></a>");
}
$sql = "INSERT INTO logs (ip,qry,dat,tim) VALUES ('$ip','$qry',CURDATE(),CURTIME())";
$result= mysqli_query($dbi,$sql);
echo "<title>NZOWASCO ICT HELPDESK - MPESA QUERIES</title>";
$result = mysqli_query($dbi," select * from mpesa where $fld like '%$dat%' order by mdat, left(accno,1),accno, seq desc ");
switch ($fld)
	 {
	case "telno":
		$fl="Tel No. :";
		break;
	case "accno":
		$fl="Connection No:";
		break;
	case "dat":
		$fl="Date:";
		break;
		case "nam":
		$fl="Name:";
		break;
	}
echo "<table width=70%  align=center><tr><td><a href='excel_mpesa.php?dat=$dat&fld=$fld'>Export to Excel</a></td></tr></table>";
 //echo " <b> MPESA Report   ( $fld : $dat )</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp<br><br>";
 //echo "<a href='excel_mpesa.php?dat=$dat&fld=$fld'>Export to Excel</a><BR><br>";
 // echo "";
echo "<table width=70%  align=center><tr><td><a href='mpesapdf.php?dat=$dat&fld=$fld'>Export to PDF</a></td></tr></table>";
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
        mnp();
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
   $seq= $data['seq'];
    
  echo "\n\n<tr bgcolor='#CCD0EE'>\n" 
           ."<td width=10%> $n</td>\n"
           ."<td   onclick='additem($seq)'><a href='#'>$data[tcode]</a></td>\n"
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

<?php
function  mnp()
{


 include "hh.php";
   
   
   



}


?>