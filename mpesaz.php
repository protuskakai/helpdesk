<head>
<script>
function printform()
{

  window.print();

}




</script>
</head>
<body> 

<?php
$ip=$_SERVER['REMOTE_ADDR'];
//include "net2.php";
// $mon=$_GET['mon'];
  $dbhost="192.168.1.2";
 $dbuser= "55509";
$dbpass = "kitale";
$dbname = "mpesa";
$dbi  = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("I cannot connect to the database. Error :" . mysql_error());;

$fld = $_GET['list'];

$fld1 = str_replace(" ", ",", $fld);
$fld1="(0".$fld1.")";
//echo $fld1;
//$dat = $_GET['dat'];
//$qry= $fld.":".$dat;
//$fs=substr($dat, 0, 1);
//if ($fld=="telno" )
//{
  //if ($fs=="0")
 // {
   //     $dat=substr($dat, 1); 
//  }
//}
//$dat = str_replace(" ","%",$dat); 

//i//f(!$dat)
//{
// die ( "No value given!   <a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''><img src='back2.gif' width='47' height='16' border='0' alt=''></a>");
//}
//$sql = "INSERT INTO logs (ip,qry,dat,tim) VALUES ('$ip','$qry',CURDATE(),CURTIME())";

echo "<input type='submit'  value='Print' onclick='javascript:window.print()'>";
//$result= mysqli_query($dbi,$sql);
echo "<title>NZOWASCO ICT HELPDESK - MPESA QUERIES</title>";
$result = mysqli_query($dbi," select * from mpesa where seq in $fld1 order by mdat, left(accno,1),accno, seq desc ");
//echo " select * from mpesa where $fld like '%$dat%' order by mdat, left(accno,1),accno, seq desc ";
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
 echo " <b> MPESA Report   </b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp<br><br>";
 //echo "<a href='excel_mpesa.php?dat=$dat&fld=$fld'>Export to Excel</a>";
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
 $seq= $data['seq'];
  echo "\n\n<tr bgcolor='#CCD0EE'>\n" 
           ."<td width=10%> $n</td>\n"
           ."<td onclick='additem($seq)'><a href='#'>$data[tcode]</a></td>\n"
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
//echo "	<table><td><td>&nbsp;&nbsp;&nbsp;<a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''><img src='back2.gif' width='47' height='16' border='0' alt=''></a></td></tr></table>";

?>