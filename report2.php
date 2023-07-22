<?php


  include "net.php";
       // Get the values posted from the Form in comments.php
       
        $telno= ucfirst(strtolower($_POST["telno"]));   
        $snam = ucfirst(strtolower($_POST["snam"]));
        $fnam = ucfirst(strtolower($_POST["fnam"]));
        $email = strtolower($_POST["email"]);
        $dept = strtoupper($_POST["dept"]);
       //$address = ucfirst(strtolower($_POST["address"]));
        $reg = ucfirst(strtolower($_POST["reg"]));
        $problem =$_POST["problem"];
        $urgency = ucfirst(strtolower($_POST["urgency"]));
        $descp = $_POST["descp"];
     //   $ext = ucfirst(strtolower($_POST["ext"]));
    
             
   include "header.htm";    
if (!$fnam)
{
 die ( "First Name  not given -<a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''><img src='back2.gif' width='47' height='16' border='0' alt=''></a>");
}   
if (!$snam)
{
   die ( "Surname  not given -<a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''><img src='back2.gif' width='47' height='16' border='0' alt=''></a>");
}   
if (!$dept)
{
 die ( "Dept.  not given -<a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''><img src='back2.gif' width='47' height='16' border='0' alt=''></a>");
} 

if (!$reg)
{
  die ( "Region  not given -<a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''><img src='back2.gif' width='47' height='16' border='0' alt=''></a>");
}   

  if (!$telno)
{
  die ( "Tel. No.  not given -<a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''><img src='back2.gif' width='47' height='16' border='0' alt=''></a>");
}

if (!$email)
{
 die ( "Email address  not given -<a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''><img src='back2.gif' width='47' height='16' border='0' alt=''></a>");
}
if (!$problem)
{
  die ( "Problem Area  not given -<a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''><img src='back2.gif' width='47' height='16' border='0' alt=''></a>");
}

if (!$descp)
{
 die ( "Descrption  not given -<a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''><img src='back2.gif' width='47' height='16' border='0' alt=''></a>");
}

if (!$urgency)
{
 die ( "Level of Urgency  not given -<a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''><img src='back2.gif' width='47' height='16' border='0' alt=''></a>");
}   


if (! strstr($email,'@'))
{

  die ( "Invalid email address -<a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''><img src='back2.gif' width='47' height='16' border='0' alt=''></a>");
}
if (! strstr($email,'.'))
{
  die ( "Invalid email address  -<a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''><img src='back2.gif' width='47' height='16' border='0' alt=''></a>");
}


$descp=str_replace("'","",$descp);
$fnam=str_replace("'","",$fnam);
$snam=str_replace("'","",$snam);
//$descp=str_replace("'","",$descp);

//echo $descp;
$sql = "INSERT INTO problems (fnam,dept,reg,telno,email,problem,descp,urgency,snam,status,dat,tim) VALUES ('$fnam','$dept','$reg','$telno','$email','$problem','$descp','$urgency','$snam','open',CURDATE(),CURTIME())";

//echo $sql;
//$result = mysql_query($sql,$dbi) or die ( "no connection". mysql_error() );
$result= mysqli_query($dbi,$sql);
$sql = "select max(id) as idd from problems   ";
//$result = mysql_query($sql,$dbi) or die ("no entry " . mysql_error());
//echo $sql;
$result2= mysqli_query($dbi,$sql);
$data = mysqli_fetch_array($result2);
$fff=$data['idd'];

     $chq =  sprintf("%04d",$fff);
     $chq2=$chq;
 //   echo $fff;
   $sql = "update  problems   set refno='$chq2'  where id='$fff'";
 //  echo $sql;
$result = mysqli_query($dbi,$sql);  // or die ("no entry " . mysqli_error());
     echo "Dear User,";
     echo "<br>";
      echo "<center> Your call has been logged and one of the NZOWASCO ICT staff will contact you shortly. <b>Your reference Number is: $chq.</b> Please quote this reference number in any correspondence.";
$subj="NZOWASCO IT HELPDESK REF NO:  $chq2 : $problem";
$body=" Dear User,\r\n Your call has been logged and one of the NZOWASCO ICT staff will contact you shortly. Your reference Number is: $chq . Please quote this reference number in any correspondence.  ( go to http://192.168.1.2/helpdesk/statusz.php?refno=$chq2 for details)";
ini_set("SMTP","mail.nzoiawater.or.ke");
//ini_set("SMTP","riftvalleyrailways.com.com");
ini_set("smtp_port","25");
ini_set("smtp_username","pkakai@nzoiawater.or.ke");
ini_set("smtp_password","kakai@2016");
$to = "$email";
//$body = "rretretretrtrtr";
$headers = "From:ict@nzoiawater.or.ke";
//$pr=mail($to,$subject,$body,$headers)  or die ( "not send" ) ;
$rt=@mail($to,$subj,$body,$headers); //or die ( "***" ) ;

$to = "pkakai@nzoiawater.or.ke";
//$body = "rretretretrtrtr";
$headers = "From:$email";
//$pr=mail($to,$subject,$body,$headers)  or die ( "not send" ) ;
$subj="NZOWASCO ICT HELPDESK REF NO:  $chq2 : $reg: $problem problem  ( $urgency )";
//$urgency
$body2=" This is to notify you that  there is a call for you on the helpdesk from $fnam $snam which reads:  $descp  .  Please go to http://192.168.1.2/helpdesk/statusz.php?refno=$chq2 for more details.  ";

//if ($sprovider)
//{
 $rt2=@mail("pwasike@nzoiawater.or.ke,pkakai@nzoiawater.or.ke",$subj,$body2,$headers);  //or die ( "***" ) ;
 
 
 $to = "pwasike@nzoiawater.or.ke";
//$body = "rretretretrtrtr";
$headers = "From:$email";
//$pr=mail($to,$subject,$body,$headers)  or die ( "not send" ) ;
$subj="NZOWASCO ICT HELPDESK REF NO:  $chq2 : $reg: $problem problem  ( $urgency )";
//$urgency
$body2=" This is to notify you that  there is a call for you on the helpdesk from $fnam $snam which reads:  $descp  .  Please go to http://192.168.1.2/helpdesk/statusz.php?refno=$chq2 for more details.  ";

//if ($sprovider)
//{
 $rt2=mail("pkakai@nzoiawater.or.ke",$subj,$body2,$headers);  //or die ( "***" ) ;
//}
//echo "An email with the above details has been sent to your account $to.";
  //    echo "</table>";    
 //      echo "<br> <a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''><img src='back2.gif' width='47' height='16' border='0' alt=''></a>" ; 
       include "footer.htm";
?>
