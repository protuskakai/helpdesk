<?php



$db = 'c:\payment_auto\yr.mdb';
$conn = new COM('ADODB.Connection');
$conn->Open("DRIVER={Driver Microsoft Access (*.mdb)}; DBQ=$db");


?>