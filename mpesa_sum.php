<body> 
</body>
<?php


include "net2.php";


//$fld = $_POST['fld'];
$dat = $_POST['dat'];

//echo " fld=$fld=$dat";
echo "<title>MPESA SUMMARY FOR $dat</title>";
$result = mysqli_query($dbi," select *  from mpesa where dat like '%$dat%'  ");
//echo " select * from mpesa where '$fld' like '%$dat%' order by seq desc ";
//echo " select sum(amt) as 'amtt',left(accno,1) as 'regg'  from mpesa where dat like '%$dat%' and SUBSTR('ind',1,1)= '*' group by left(accno,1) ";
//echo " select sum(amt), as amtt,left(accno,1) as regg  from mpesa where dat like '%$dat%' group by left(accno,1) ";


echo " <b>MPESA SUMMARY FOR $dat </b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp<br><br>";
echo "<a href='excel_mpesa.php?dat=$dat'>Export to Excel</a>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
//echo "<a href='status3b.php?stat=$stat'>Vertical View</a>";
 

    echo "<table width='70%' border='0' align='center'>\n" 
         ."<tr bgcolor='#CCE0EE'>\n" 
         ."<td width=10%> No.</td>\n"
         ."<td>Kitale</td>\n"
         ."<td>Webuye</td>\n"
          ."<td>Bungoma</td>\n"
           ."<td>Kimilili</td>\n"
             ."<td>Malaba</td>\n"
              ."<td>Unknown</td>\n"
                 ."<td>Grand Total</td>\n"
      ."" 
        ."</tr>"; 
        $n=0;
        $ktl=0;
        $mlb=0;
        $kml=0;
        $wby=0;
        $bgm=0;
        $kwn=0;
        $tot=0;
         while ($data = mysqli_fetch_array($result))
 {
 
 //$days=$data[sdate]-$data[dat];
 // $j=strtoupper($data[sprovider]) ;
 $amt=$data['amt'];
 // $amt=number_format($amt,2);
  $n++;
  
 $reg=substr($data['accno'],0,1);
  
  $reggg="UnKnown";
 // if ($data['ind']!="*")
 
 if($data['ind']=='*')
{
$kwn=$kwn+$amt;

}
if($data['ind']!='*')

{
 
  $regx=$reg;
//  {
  	switch ($regx){
	case "2":
		$ktl=$ktl+$amt;
		break;
	case "3":
		$wby=$wby+$amt;
		break;
	case "4":
		$bgm=$bgm+$amt;
		break;
		case "5":
		$kml=$kml+$amt;
		break;
		case "6":
		$mlb=$mlb+$amt;
		break;
	}
  
  }
  
  $tot=$tot+$amt;
  
 
}
    $ktl=number_format($ktl,2);
    $wby=number_format($wby,2);
    $bgm=number_format($bgm,2);
    $kml=number_format($kml,2);
    $mlb=number_format($mlb,2);
    $kwn=number_format($kwn,2);
    $tot=number_format($tot,2);  
    echo "\n\n<tr bgcolor='#CCD0EE'>\n" 
         ."<td width=10%>Amounts</td>\n"
         ."<td align=right>  $ktl</td>\n"
         ."<td align=right>  $wby</td>\n"
         ."<td align=right>  $bgm</td>\n"
         ."<td align=right>  $kml</td>\n"
         ."<td align=right>  $mlb</td>\n"
         ."<td align=right>  $kwn</td>\n"
         ."<td align=right>  $tot</td>\n"

   ."</tr>"; 
echo "</table>";
echo "	<table><td><td>&nbsp;&nbsp;&nbsp;<a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''><img src='back2.gif' width='47' height='16' border='0' alt=''></a></td></tr></table>";
//include "kisfooter8.php";
?>

