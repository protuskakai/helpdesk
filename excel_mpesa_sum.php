<?php
include "net2.php";
//$fld= $_GET["fld"];
//$dat= $_GET["dat"];
//echo " select tcode as 'Ref No', dat as 'Date', nam as 'Name',accno as 'Connection No.',ind  as 'Error Ind',telno as 'Tel No', amt as 'Amount' from mpesa where $fld like '%$dat%' order by accno asc"; 
$sql = "SELECT mdat as 'date' ,sum(ktl) as 'tktl',sum(wby) as 'twby',sum(bgm) as 'tbgm',sum(kml) as 'tkml',sum(mlb) as 'tmlb',sum(kwn) as 'tkwn',sum(ktl+wby+bgm+kml+mlb+kwn) as 'tot' from mx where mdat like '%2%' group by mdat"; 

   $result = mysqli_query($dbi,$sql);
$fields = mysqli_num_fields($result);
//echo $fields;
$header="";
if(!$fields)
 {
   die (mysqli_error()); 
  } 
$data="";
 $header .= " Date" . "\t";
 $header .=  "Kitale" . "\t";
 $header .=  "Webuye" . "\t";
 $header .=  "Bungoma" . "\t";
 $header .=  "Kimilili" . "\t";
 $header .=  "Malaba" . "\t";
 $header .=  "Unknown" . "\t";
 $header .=  "Total" . "\t";
 //$header .=  "name" . "\t";

for ($i = 0; $i < 8; $i++) 
{

 //echo $fields;
 // echo  mysqli_field_name($result, $i) ;
 // $header .= mysqli_field_name($result, $i) . "\t";
 //echo mysqli_field_name($result,1);
}


while($row = mysqli_fetch_row($result)) {
    $line = '';
    foreach($row as $value) {                                            
        if ((!isset($value)) OR ($value == "")) {
            $value = "\t";
        } else {
            $value = str_replace('"', '""', $value);
            $value = '"' . $value . '"' . "\t";
        }
        $line .= $value;
    }
    $data .= trim($line)."\n";
}
$data = str_replace("\r","",$data); 

//if ($data == "")
// {
//    $data = "\n(0) Records Found!\n";     
//}

header("Content-type: application/xx-msdownload");
header("Content-Disposition: attachment; filename=extraction.xls");
header("Pragma: no-cache");
header("Expires: 0");
print "$header\n$data"; 
?> 
