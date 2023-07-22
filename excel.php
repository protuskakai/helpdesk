<?php
$stat = $_GET["stat"];
include "net.php";

if ($stat=='closed')
{
$select = " select refno as 'Ref No', dat as 'Log Date', tim as 'Log Time',fnam as 'First Name',snam as 'Surname',reg as 'Region',email as 'Email Address',telno as 'Tel No',ext as 'Tel Ext',problem as 'Problem Area',descp as 'Description',Urgency,sdate as 'Date Resolved',stime as 'Time resolved',sprovider as 'Technician',datediff(sdate,dat) as 'Open Days',Status from problems where status='$stat' order by id  desc"; 
}
else
{
$select = " select refno as 'Ref No', dat as 'Log Date', tim as 'Log Time',fnam as 'First Name',snam as 'Surname',reg as 'Region',email as 'Email Address',telno as 'Tel No',ext as 'Tel Ext',problem as 'Problem Area',descp as 'Description',Urgency,datediff(curdate(),dat) as 'Open Days',Status from problems where status='$stat' order by id desc"; 
}               
$export = mysqli_query($dbi,$select);
$fields = mysqli_num_fields($export);


for ($i = 0; $i < $fields; $i++) 
{ 
   $header .= mysqli_field_name($export, $i) . "\t";
}


while($row = mysqli_fetch_row($export)) {
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
