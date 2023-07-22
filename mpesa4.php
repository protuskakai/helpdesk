<body> 
</body>
<?php
$ip=$_SERVER['REMOTE_ADDR'];
 //echo $ip;
include "net2.php";

//if( $_GET['tcode'])
//{
     $tcode = $_GET['accno'];
//}   
//if( $_GET['telno'])  
//{   
//     $telno = $_GET['telno'];
//}     
//if( $_GET['accno'])
//{
//     $accno = $_GET['accno'];
//}     

if($tcode)
{
    $fld="Conection No. :";
    $dat=$tcode;
}

//if($telno)
//{
//    $fld="Mobile No. :";
//    $dat=$telno;
//}


//if($accno)
//{
//    $fld="Connectio No:";
//    $dat=$accno;
//}

//$qry= $fld.":".$dat;
//$fs=substr($dat, 0, 1);
//if ($fld=="telno" )
//{
 // if ($fs=="0")
//  {
  //      $dat=substr($dat, 1); 
//  }

//}
//$dat = str_replace(" ","%",$dat); 



echo "<title>NZOWASCO ICT HELPDESK - MPESA QUERIES</title>";
//$result = mysqli_query($dbi," select * from mpesa where telno='$telno' or  tcode='$tcode' or accno='$accno' order by mdat, left(accno,1),accno, seq desc ");
$result = mysqli_query($dbi," select * from mpesa where accno='$tcode'  order by mdat, left(accno,1),accno, seq desc ");
//echo " select * from mpesa where '$fld' like '%$dat%' order by seq desc ";
//echo "select * from mpesa where telno='$telno' or  tcode='$tcode or accno='$accno' order by mdat, left(accno,1),accno, seq desc";
echo " <b> MPESA Report   ( $fld  $dat )</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp<br><br>";
//echo "<a href='excel_mpesa.php?dat=$dat&fld=$fld'>Export to Excel</a>";
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