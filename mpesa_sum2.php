<body> 
</body>
<?php


include "net2.php";


//$fld = $_POST['fld'];
//$dat = $_POST['dat'];

//echo " fld=$fld=$dat";
echo "<title>MPESA SUMMARY FOR</title>";
$result = mysqli_query($dbi," SELECT COUNT(SEQ) AS cnt,mdat,sum(ktl) as tktl,sum(wby) as twby,sum(bgm) as tbgm,sum(kml) as tkml,sum(mlb) as tmlb,sum(kwn) as tkwn from mx group by mdat  ");
//echo " select * from mpesa where '$fld' like '%$dat%' order by seq desc ";
//echo " select sum(amt) as 'amtt',left(accno,1) as 'regg'  from mpesa where dat like '%$dat%' and SUBSTR('ind',1,1)= '*' group by left(accno,1) ";
//echo " select sum(amt), as amtt,left(accno,1) as regg  from mpesa where dat like '%$dat%' group by left(accno,1) ";


echo " <b>MPESA SUMMARY FOR </b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp<br><br>";
echo "<a href='excel_mpesa_sum.php'>Export to Excel</a>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
//echo "<a href='status3b.php?stat=$stat'>Vertical View</a>";
 

    echo "<table width='70%' border='0' align='center'>\n" 
         ."<tr bgcolor='#CCE0EE'>\n" 
      //   ."<td width=10%> No.</td>\n"
           ."<td>Date</td>\n"
         ."<td>Kitale</td>\n"
         ."<td>Webuye</td>\n"
          ."<td>Bungoma</td>\n"
           ."<td>Kimilili</td>\n"
             ."<td>Malaba</td>\n"
              ."<td>Unknown</td>\n"
               ."<td>Grand Total</td>\n"
                 ."<td>Entries</td>\n"
      ."" 
        ."</tr>"; 
        $n=0;
                $tot=0;
         while ($data = mysqli_fetch_array($result))
 {
 

    $ktl=number_format($data['tktl'],2);
    $wby=number_format($data['twby'],2);
    $bgm=number_format($data['tbgm'],2);
    $kml=number_format($data['tkml'],2);
    $mlb=number_format($data['tmlb'],2);
    $kwn=number_format($data['tkwn'],2);
    $tot=$data['tktl']+$data['twby']+$data['tbgm']+$data['tkml']+$data['tmlb']+$data['tkwn'];
   $tot=number_format($tot,2);  
    echo "\n\n<tr bgcolor='#CCD0EE'>\n" 
        ."<td width=10%>$data[mdat]</td>\n"
         ."<td align=right> <a href='mpesa_det.php?dat=$data[mdat]&reg=Kitale'> $ktl</a>   </td>\n"
         ."<td align=right> <a href='mpesa_det.php?dat=$data[mdat]&reg=Webuye'> $wby</a> </td>\n"
         ."<td align=right> <a href='mpesa_det.php?dat=$data[mdat]&reg=Bungoma'> $bgm</a> </td>\n"
         ."<td align=right> <a href='mpesa_det.php?dat=$data[mdat]&reg=Kimilili'>$kml</a>   </td>\n"
         ."<td align=right><a href='mpesa_det.php?dat=$data[mdat]&reg=Malaba'> $mlb</a> </td>\n"
         ."<td align=right> <a href='mpesa_det.php?dat=$data[mdat]&reg=Unknown'> $kwn</a></td>\n"
      //    ."<td align=right>  $tot</td>\n"

         ."<td align=right>  $tot</td>\n"
                ."<td align=right>$data[cnt]</td>\n"
   ."</tr>"; 
   
   
 }  
   
echo "</table>";
echo "	<table><td><td>&nbsp;&nbsp;&nbsp;<a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''><img src='back2.gif' width='47' height='16' border='0' alt=''></a></td></tr></table>";
?>

