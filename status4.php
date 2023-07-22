<?php

include "net.php";
$username1 = $_COOKIE["username1"];
$password1 = $_COOKIE["password1"];
      
          $status = ucfirst(strtolower($_POST["status"]));
          $sprovider= ucfirst(strtolower($_POST["sprovider"]));
          $solution = $_POST["solution"];
          $refno = ucfirst(strtolower($_GET["refno"]));
   //include "kisheader1.htm";    
if (!$status)
{
 die ( "Status  not given -<a href='status2.php?refno=$refno'>Click here to go back</a>");
}   
if (!$solution)
{
   die ( "Solution  not given -<a href='status2.php?refno=$refno'>Click here to go back</a>");
}   

if (!$sprovider)
{
   die ( "Solution Provider  not given -<a href='status2.php?refno=$refno'>Click here to go back</a>");
}   

$sql = "update problems set solution='$solution',status='$status',sdate=CURDATE(),stime=CURTIME(),sprovider='$sprovider',userid='$username1' where  id='$refno'";
$result = mysqli_query($dbi,$sql) or die ( "no connection". mysqli_error() );
      echo "<center> Record status amended successfully";
      echo "</table>";
      
$sql = "select * from problems  where id='$refno'";
$result = mysqli_query($dbi,$sql)  or die ("no entry " . mysqli_error());
$data = mysqli_fetch_array($result);
$email=$data['email'];    
$status=$data['status']; 
$refno2=$data['refno'];      
$problem=$data['problem'];      
//$sprovider=$data[sprovider];             
 $subj="NZOWASCO ICT HELPDESK REF NO:  $refno2 : $problem";
$body=" Dear User, We are pleased to inform you that the issue you raised vide the above reference has been resolved ( go to http://rvrserver/help/statusz.php?refno=$refno2 for details) . Thank you for using this service.";
//echo "<img src='thanks.bmp' width='163' height='167' border='0' alt=''>";
if ($status=='Closed')
{
//echo $refno;
ini_set("SMTP","mail.nzoiawater.or.ke");
//ini_set("SMTP","riftvalleyrailways.com.com");
ini_set("smtp_port","25");
ini_set("smtp_username","ict");
ini_set("smtp_password","password");
$to = "$email";
//$body = "rretretretrtrtr";
$headers = "From:ict@nzoiawater.or.ke";
//$pr=mail($to,$subject,$body,$headers)  or die ( "not send" ) ;
$rt=mail($to,$subj,$body,$headers) or die ( "Email not send" ) ;
}
     
      
      
      
      echo "<br> <a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''><img src='back2.gif' width='47' height='16' border='0' alt=''></a>"    //include "kisfooter.htm";
?>
