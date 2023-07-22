<?php

include "net2.php";

$yr= $_GET["yr"];
$mon= $_GET["mon"];
$day= $_GET["day"];
$reg= $_GET["reg"];
$dat=$yr."-".$mon."-".$day;
//echo " select tcode as 'Ref No', dat as 'Date', nam as 'Name',accno as 'Connection No.',ind  as 'Error Ind',telno as 'Tel No', amt as 'Amount' from mpesa where $fld like '%$dat%' order by accno asc"; 
$sql = "SELECT max(mdat) as 'Date',nam as 'Name',reg as 'Region',accno as 'Connection No',telno as 'Telno' FROM  mpesa where reg='$reg' and mdat<'$dat' and ( ind is null) and accno not in (select accno from mpesa where mdat>='$dat' and accno is not null) group by reg,accno,telno,nam"; 
$result = mysqli_query($dbi,$sql);              
$fields = mysqli_num_fields( $result);

//echo "SELECT reg,accno,max(mdat) as datt,nam,telno  FROM  mpesa where reg='$reg' and mdat<'$dat' and ( ind is null) and accno not in (select accno from mpesa where mdat>='$dat' and accno is not null) group by reg,accno,telno,nam"; 


for ($i = 0; $i < $fields; $i++) 
{ 
 //  $header .= mysqli_field_name( $result, $i) . "\t";
   
}
//echo $header;

$data="";
//$header="Ref No.". "\t";
$header="Date". "\t";
$header.="Name". "\t";
$header.="Region". "\t";

$header.="Connection No.". "\t";
//$header.="Err Ind.". "\t";
$header.="Tel No.". "\t";
//$header.="Amount". "\t";
//echo $header;
//die("ddd");
$gy=" ";

$n=0;
while($row = mysqli_fetch_row( $result)) {
    $line = '';
    foreach($row as $value)
     {     
     $n=$n+1;                                       
        if ((!isset($value)) OR ($value == "")) 
        {       
           	switch ($n)
        	{
	case 3:
	//	  $value = "\'".$value;
		break;
	case 4:
	//	  $value = "\'".$value;
		break;
	case 5:
		//	  $value = "\'".$value;
		break;
	}
        
            $value = "\t";
        } else {
       //   $value = str_replace('"', '""', $value);
            $value ='"' . $value . '"' . "\t";
        }
     
        
        $line .= $value;
    }
    $data .= trim($line)."\n";
}
$data = str_replace("\r","",$data); 

if ($data == "")
 {
    $data = "\n(0) Records Found!\n";     
    }

header("Content-type: application/xx-msdownload");
header("Content-Disposition: attachment; filename=extraction.xls");
header("Pragma: no-cache");
header("Expires: 0");
print "$header\n$data"; 
?> 
