<?php

include "net2.php";

$dat1= $_GET['dat1'];
$dat2= $_GET['dat2'];


//echo " select tcode as 'Ref No', dat as 'Date', nam as 'Name',accno as 'Connection No.',ind  as 'Error Ind',telno as 'Tel No', amt as 'Amount' from mpesa where $fld like '%$dat%' order by accno asc"; 
$sql = "select tcode as 'Ref No',dat as 'Date',nam as 'Name',accno as 'Connection No',ind  as 'Error Ind',telno as 'Tel No',amt as 'Amount',reg as 'Region' from mpesa where  mdat<='$dat2' and mdat>='$dat1' order by reg,mdat,accno desc"; 
//echo $sql;
//die ("dddd");

   $result = mysqli_query($dbi,$sql);              
$fields = mysqli_num_fields( $result);

//echo $fields;

//foreach ($fields as $f)
 //{ 
 //echo "<br>Field name: ".$fields; 
 //}

for ($i = 0; $i < $fields; $i++) 
{ 
  // $header .= mysql_field_name( $result, $i) . "\t";
}
$data="";
$header="Ref No.". "\t";
$header.="Date". "\t";
$header.="Name". "\t";
$header.="Connection No.". "\t";
$header.="Err Ind.". "\t";
$header.="Tel No.". "\t";
$header.="Amount". "\t";
$header.="Region". "\t";
//echo $header;
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
