<body> 
</body>
<?php

$ip=$_SERVER['REMOTE_ADDR'];
 //echo $ip;

include "net2.php";

$reg = $_POST['reg'];
$dat = $_POST['dat'];
$qry= $fld.":".$dat;
$sql = "INSERT INTO logs (ip,qry,dat,tim) VALUES ('$ip','$qry',CURDATE(),CURTIME())";
$result= mysqli_query($dbi,$sql);
//echo $ip;

echo "<title>MPESA QUERY</title>";
$result = mysqli_query($dbi," select * from mpesa where $fld mdat '$dat'  and reg='$reg' order by mdat,tcode, left(accno,1),accno, seq desc ");
//echo " select * from mpesa where '$fld' like '%$dat%' order by seq desc ";
	switch ($fld){
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

echo " <b> MPESA Report  </b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp<br><br>";
echo "<a href='excel_mpesa.php?dat=$dat&fld=$fld'>Export to Excel</a>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
//echo "<a href='status3b.php?stat=$stat'>Vertical View</a>";
 
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
 
 //$days=$data[sdate]-$data[dat];
 // $j=strtoupper($data[sprovider]) ;
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
           ."<td>$data[tcode]</td>\n"
           ."<td>$data[dat]</td>\n"
           ."<td>$data[nam]</td>\n"
           ."<td>$regg</td>\n"
           ."<td>$data[accno] </td>\n"
           ."<td align=right>$amt</td>\n"
           ."<td>$data[telno]</td>\n"
           ."<td>$data[ind] </td>\n"
           ."</tr>"; 
}

echo "</table>";
echo "	<table><td><td>&nbsp;&nbsp;&nbsp;<a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''><img src='back2.gif' width='47' height='16' border='0' alt=''></a></td></tr></table>";
//include "kisfooter8.php";
?>