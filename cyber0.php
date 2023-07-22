<body> 
</body>
<?php
$ip=$_SERVER['REMOTE_ADDR'];
$user= gethostbyaddr($_SERVER['REMOTE_ADDR']);
echo $ip;
//include "net2.php";
$host="localhost";
$name = "55509";
$pass = "kitale";
$dbname = "cyberdb";
$dbi = mysqli_connect($host, $name,$pass,$dbname) or
die("I cannot connect to the database. Error :" . mysqli_error());
mysqli_select_db($dbi,$dbname); 

$sql = "INSERT INTO logs (user,dat,tim) VALUES ('$user',CURDATE(),CURTIME())";

echo $sql ;
$result= mysqli_query($dbi,$sql);
//echo "done";
?>


<?php
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

?>