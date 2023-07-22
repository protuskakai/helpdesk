<?php

 include "net.php";

       // Get the values posted from the Form in comments.php
          $snam = ucfirst(strtolower($_POST["snam"]));
          $fnam = ucfirst(strtolower($_POST["fnam"]));
       $userid = $_POST["userid"];
           $pswd = $_POST["pswd"];
             $pswd1 = $_POST["pswd1"];
              $grp = $_POST["grp"];
      
             
   //include "kisheader1.htm";    
   
include "header.htm";


if (!$fnam)
{
 die ( "First Name  not given -<a href='addusers.php?1=$fnam&2=$snam&3=$userid&4=$pswd&5=$pswd1'>Click here to go back</a>");
}   

if (!$snam)
{
 die ( "Surname  not given -<a href='addusers.php?1=$fnam&2=$snam&3=$userid&4=$pswd&5=$pswd1'>Click here to go back</a>");
}   

if (!$userid)
{
 die ( "Userid  not given -<a href='addusers.php?1=$fnam&2=$snam&3=$userid&4=$pswd&5=$pswd1'>Click here to go back</a>");
}   


if (!$pswd)
{
 die ( "Password  not given -<a href='addusers.php?1=$fnam&2=$snam&3=$userid&4=$pswd&5=$pswd1'>Click here to go back</a>");
}   

if ($pswd !=$pswd1)
{
 die ( "Please renter password -<a href='addusers.php?1=$fnam&2=$snam&3=$userid'>Click here to go back</a>");
}   

if ($grp!=$grp)
{
 die ( "Please select group -<a href='addusers.php?1=$fnam&2=$snam&3=$userid'>Click here to go back</a>");
}   


$sql = "select * from users where userid='$userid'";
$result = mysqli_query($dbi,$sql) or die ("no entry " . mysqli_error());
$data = mysqli_fetch_array($result);
$fff=$data['userid'];
 if ($fff) 
 {
 
 die ( "User was already created -<a href='addusers.php?1=$fnam&2=$snam&3=$userid&4=$pswd&5=$pswd1'>Click here to go back</a>");
 
 }
 

$sql = "INSERT INTO users (fnam,snam,userid,pswrd,dat,tim,grp) VALUES ('$fnam','$snam','$userid','$pswd',CURDATE(),CURTIME(),'$grp')";
$result = mysqli_query($dbi,$sql) or die ( "no connection". mysqli_error() );

echo "user successfully created";

      echo "</table>";
      
  
      
      echo "<br> <a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''><img src='back2.gif' width='47' height='16' border='0' alt=''></a>"  ;  //include "kisfooter.htm";
        include "footer.htm";
  
?>


