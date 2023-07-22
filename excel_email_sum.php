<?php

include "net.php";

//$fld= $_GET["fld"];
//$dat= $_GET["dat"];


//echo " select tcode as 'Ref No', dat as 'Date', nam as 'Name',accno as 'Connection No.',ind  as 'Error Ind',telno as 'Tel No', amt as 'Amount' from mpesa where $fld like '%$dat%' order by accno asc"; 
$sql = "" SELECT mdat,sum(ktl) as tktl,sum(wby) as twby,sum(bgm) as tbgm,sum(kml) as tkml,sum(mlb) as tmlb,sum(kwn) as tkwn from mx group by mdat  "; 
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
$header="Date". "\t";
$header.="Kitale". "\t";
$header.="Webuye". "\t";
$header.="Bungoma.". "\t";
$header.="Kimilili". "\t";
$header.="Unknown". "\t";
//$header.="Kimilili". "\t";
//$header.="Tel No.". "\t";
//$header.="Amount". "\t";
//$header.="Region". "\t";
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
