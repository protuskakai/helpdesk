<?php

include "net2.php";
//$fld = $_POST['fld'];
$yr = $_POST['yr'];
$reg = $_POST['reg'];
$mon = $_POST['mon'];
$day = $_POST['day'];
$dat=$yr."-".$mon."-".$day;

echo "<title>NZOWASCO ICT HELPDESK - DEFAUTERS</title>";
//$result = mysqli_query($dbi,"SELECT * FROM lastpayments2 where ind is null and accno not in (select accno from newpayments where accno is not null) order by accno,mdat desc  ");
$result = mysqli_query($dbi,"SELECT reg,accno,max(mdat) as datt,nam,telno  FROM  mpesa where reg='$reg' and mdat<'$dat' and ( ind is null) and accno not in (select accno from mpesa where mdat>='$dat' and accno is not null) group by reg,accno,telno,nam");
//echo "SELECT reg,accno,nam,tel,max(mdat) as datt FROM  mpesa where mdat<'$dat' and ( ind is null) and accno not in (select accno from mpesa where mdat>='$dat' and accno is not null) group by reg,accno,nam,tel";
//$result = mysqli_query($dbi,"SELECT reg,accno,max(mdat) as datt FROM  mpesa where mdat<'$dat' and ( ind is null) and accno not in (select accno from mpesa where mdat>='$dat' and accno is not null) order by accno,mdat desc");
//echo  "SELECT reg,accno,max(mdat),nam,telno as datt FROM  mpesa where mdat<'$dat' and ( ind is null) and accno not in (select accno from mpesa where mdat>='$dat' and accno is not null) group by reg,accno,telno,nam";
	
echo " <b>DEFAULTING CUSTOMERS   (Cutoff Date : $dat )</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp<br><br>";
echo "<a href='excel_def.php?yr=$yr&mon=$mon&day=$day&reg=$reg'>Export to Excel</a>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
//echo "<a href='status3b.php?stat=$stat'>Vertical View</a>";
 echo "<table width='70%' border='0' align='center'>\n" 
         ."<tr bgcolor='#CCE0EE'>\n" 
         ."<td width=10%> No.</td>\n"
       //  ."<td>Ref No.</td>\n"
         ."<td>Last Payment Date</td>\n"
         ."<td>Name</td>\n"
         ."<td>Region</td>\n"
         ."<td>Connection No.</td>\n"
       //  ."<td>Amount</td>\n"
         ."<td>Tel No.</td>\n"
      //  ."<td>Err Ind.</td>\n"
        ."" 
        ."</tr>"; 
        $n=0;
         while ($data = mysqli_fetch_array($result))
 {
 $n=$n+1;

  echo "\n\n<tr bgcolor='#CCD0EE'>\n" 
           ."<td width=10%> $n</td>\n"
      //     ."<td>$data[tcode]</td>\n"
           ."<td>$data[datt]</td>\n"
           ."<td>$data[nam]</td>\n"
           ."<td>$data[reg]</td>\n"
           ."<td>$data[accno] </td>\n"
         //  ."<td align=right>$amt</td>\n"
           ."<td>$data[telno]</td>\n"
        //   ."<td>$data[ind] </td>\n"
           ."</tr>"; 
}
echo "</table>";
echo "	<table><td><td>&nbsp;&nbsp;&nbsp;<a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''><img src='back2.gif' width='47' height='16' border='0' alt=''></a></td></tr></table>";
//include "kisfooter8.php";
?>