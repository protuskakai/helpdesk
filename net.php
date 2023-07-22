<?php
$host="localhost";
$name = "55509";
$pass = "kitale";
$dbname = "nzowasco";
$dbi = mysqli_connect($host, $name,$pass,$dbname) or
die("I cannot connect to the database. Error :" . mysql_error());
mysqli_select_db($dbi,$dbname); 
?>