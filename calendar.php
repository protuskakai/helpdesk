<?php
//echo $_SESSION['mon'];
  

if(isset($_GET['val']))
{
 $val=$_GET['val'];
$yr=$_GET['yr'];
$mon=$_GET['mon'];
 if($val=='b')
 {
     if($mon>1)
    {
        $mon=$mon-1;
     }else
        {
           $mon=12;
            $yr=$yr-1;
        }
//   $_SESSION['mon']=$_SESSION['mon']-1;
  // echo $mon;
 //  $_SESSION['yr']=$_SESSION['yr']-1;
  }else
  {
//   $_SESSION['mon']=$_SESSION['mon']+1;
    if($mon<=11)
    {
        $mon=$mon+1;
     }else
        {
           $mon=1;
            $yr=$yr+1;
        }
   
   //  echo $mon;
  // $_SESSION['yr']=$_SESSION['yr']+1;
  }
}else
{
// session_start();
   $mon= date('n');   
    $yr= date('Y'); 
    
  //  $_SESSION['mon']=$mon;
   //  $_SESSION['yr']=$yr;
 // echo "dfff".$_SESSION['mon'];
}
     
  // echo "<br>";

 
// $_SESSION['mon']=$mon;  
// $_SESSION['yr']=$yr;  
//echo date('l', strtotime($date));
// echo "dfff".$_SESSION['mon'];
?>

<script>

function fw()

{
 xmlhttp = new XMLHttpRequest();
    //  alert(str);
     xmlhttp.onreadystatechange = function()
             {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                 {
                    document.getElementById("cal").innerHTML = xmlhttp.responseText;
                }         
             } 
         //    var sel=    document.getElementById("sel").value;
         //    var val=    document.getElementById("val").value;
            xmlhttp.open("GET","calendar.php",true);
            xmlhttp.send();
       //     document.getElementById("qq").innerHTML="MPESA Report (  "+ sel+" : "+val+ "  )";
        //    document.getElementById("qq1").innerHTML="<a href='excel_mpesa.php?dat="+val+"&fld="+sel+">Export to Excel</a";


}

function bk()

{
  //  var mt=document.getElementById("xx").innerHTML;
// document.getElementById("xx").innerHTML =mt +"<br>"+ document.getElementById("txt").value;


}

function closes()

{
//alert("close");
var main = document.getElementById('main');
      main.style.display = "none";

}
function getval(dd,mm,yy)
{

var smm= mm.toString();
var sdd=dd.toString();
//alert(sdd.length);

if(sdd.length==1)
{

   sdd="0"+dd;
}
if(smm.length==1)
{

 smm="0"+smm;
  // alert(mm);
  
}
//alert(mm.length);

window.opener.document.getElementById("vall").value=sdd+"/"+smm+"/"+yy;

window.close();


}

</script>
<body onBlur="javascript:window.close();">

<?php
//     echo date("j, d-m-Y", strtotime("first Monday 2017-12"))."<br>";
 //      echo "<br>";
  // echo  date('Y-m-01');
 //    echo "<br>";
  //  echo  date('Y-m-t');
    //echo date('n-Y');
 //$mon=$_SESSION['mon'];
// $yr=$_SESSION['yr'];
$arr= array(31,29,31,30,31,30,31,31,30,31,30,31);
//echo $arr[3];
?>

    
<table width="80%" cellspacing="0" cellpadding="0" align=center>
<tr>
<?php

  $monlist=array(" ","January","February","March","April","May","June","July","August","September","October","November","December");
  
  $smon=$monlist[$mon];

	echo "<td align=left width=10%><a href='calendar.php?val=b&mon=$mon&yr=$yr'><<</a></td>";
	echo "<td align=center width=80%><p>$smon $yr</p></td>";
	echo "<td  align=right  width=10%><a href='calendar.php?val=f&mon=$mon&yr=$yr'>>></a></td>";
	
?>	
</tr>
</table>
<br>
<table width="80%" cellspacing="1" cellpadding="1" border=1 align=center>



<?php

 $date =  "01-".$mon."-".$yr;                       // "01-11-2017";
$fday=date('l', strtotime($date));
$d=0;

//$qyr=sprintf("%02d", $yr);
//$qmon=sprintf("%02d", $yr);

         	for($i = 0; $i < 7; ++$i)
         	{
         	      echo "<tr>";
         	            for($j = 0; $j <8; ++$j)
         	            {   
         	              
         	               
         	               
         	            if ($i==0 )
         	             {  
         	                  switch ($j) 
         	                   {
                                   case 0:
                                              echo "<td width=15% height=10%>Mon</td>";
                                             break;
                                   case 1:
                                              echo "<td width=15% height=10%> Tue</td>";
                                              break;
                                   case  3:
                                               echo "<td width=15% height=10%> Wed</td>";
                                             break;
                                    case 4:
                                              echo "<td width=15% height=10%>Thu</td>";
                                             break;
                                   case 5:
                                              echo "<td width=15% height=10%> Fri</td>";
                                              break;
                                   case  6:
                                               echo "<td width=15% height=10%>Sat</td>";
                                             break;          
                                             
                                       case  7:
                                               echo "<td width=15% height=10%>Sun</td>";
                                             break;                    
                                   default:
                                       //   echo "Your favorite color is neither red, blue, nor green!";
                                    
                               }
         	               }
         	               
         	               
         	               
         	                  if ($i==1 )
         	             {  
         	                  switch ($j) 
         	                   {
                                   case 0:
                                               if($fday=="Monday")
                                             {
                                               $d=$d+1;
                                                 echo "<td width=15% height=10% align=center><a href='#' onclick='getval($d,$mon,$yr)'>$d</a></td>";
                                             } else
                                                                                    
                                             {
                                              echo "<td width=15% height=10%> </td>";
                                             } 
                                             break;
                                   case 1:
                                             
                                             if($d>0)
                                             {
                                               $d=$d+1;
                                                 echo "<td width=15% height=10% align=center><a href='#' onclick='getval($d,$mon,$yr)'>$d</a></td>";
                                             }
                                              if($fday=="Tuesday")
                                             {
                                               $d=$d+1;
                                                 echo "<td width=15% height=10% align=center><a href='#' onclick='getval($d,$mon,$yr)'>$d</a></td>";
                                             }
                                             if ($d==0)
                                                                                
                                             {
                                              echo "<td width=15% height=10% align=center> </td>";
                                             } 
                                             
                                             
                                              break;
                                   case  3:
                                               if($d>0)
                                             {
                                               $d=$d+1;
                                                 echo "<td width=15% height=10% align=center><a href='#' onclick='getval($d,$mon,$yr)'>$d</a></td>";
                                             }
                                              if($fday=="Wednesday")
                                             {
                                               $d=$d+1;
                                                 echo "<td width=15% height=10% align=center><a href='#' onclick='getval($d,$mon,$yr)'>$d</a></td>";
                                             }
                                             if ($d==0)
                                                                                
                                             {
                                              echo "<td width=15% height=10%> </td>";
                                             } 
                                             
                                             break;
                                    case 4:
                                               if($d>0)
                                             {
                                               $d=$d+1;
                                                 echo "<td width=15% height=10% align=center><a href='#' onclick='getval($d,$mon,$yr)'>$d</a></td>";
                                             }
                                              if($fday=="Thursday")
                                             {
                                               $d=$d+1;
                                                 echo "<td width=15% height=10% align=center><a href='#' onclick='getval($d,$mon,$yr)'>$d</a></td>";
                                             }
                                             if ($d==0)
                                                                                
                                             {
                                              echo "<td width=15% height=10%> </td>";
                                             } 
                                             break;
                                   case 5:
                                               if($d>0)
                                             {
                                               $d=$d+1;
                                                 echo "<td width=15% height=10% align=center><a href='#' onclick='getval($d,$mon,$yr)'>$d</a></td>";
                                             }
                                              if($fday=="Friday")
                                             {
                                               $d=$d+1;
                                                 echo "<td width=15% height=10% align=center><a href='#' onclick='getval($d,$mon,$yr)'>$d</a></td>";
                                             }
                                             if ($d==0)
                                                                                
                                             {
                                              echo "<td width=15% height=10%> </td>";
                                             } 
                                              break;
                                   case  6:
                                                 if($d>0)
                                             {
                                               $d=$d+1;
                                                 echo "<td width=15% height=10% align=center><a href='#' onclick='getval($d,$mon,$yr)'>$d</a></td>";
                                             }
                                              if($fday=="Saturday")
                                             {
                                               $d=$d+1;
                                                 echo "<td width=15% height=10% align=center><a href='#' onclick='getval($d,$mon,$yr)'>$d</a></td>";
                                             }
                                             if ($d==0)
                                                                                
                                             {
                                              echo "<td width=15% height=10%> </td>";
                                             } 
                                             break;          
                                             
                                       case  7:
                                                  if($d>0)
                                             {
                                               $d=$d+1;
                                                 echo "<td width=15% height=10% align=center><a href='#' onclick='getval($d,$mon,$yr)'>$d</a></td>";
                                             }
                                              if($fday=="Sunday")
                                             {
                                               $d=$d+1;
                                                 echo "<td width=15% height=10% align=center><a href='#' onclick='getval($d,$mon,$yr)'>$d</a></td>";
                                             }
                                             if ($d==0)
                                                                                
                                             {
                                              echo "<td width=15% height=10%> </td>";
                                             } 
                                             break;                    
                                   default:
                                       //   echo "Your favorite color is neither red, blue, nor green!";
                                    
                               }
         	               }
         	               
         	               
         	               
         	               
         	               
         	               
         	               
         	               
         	               if($i>1 && $j<7)
         	               {
         	                   $d=$d+1;
         	                  if($d<=$arr[$mon-1])
         	                  {
         	                   echo "<td width=15% height=10% align=center><a href='#' onclick='getval($d,$mon,$yr)'>$d</a></td>";
         	                   }else
         	                     echo "<td width=15% height=10% align=center><a href='#' onclick='getval($d,$mon,$yr)'></a></td>";
         	               
         	               }
         	               
                                
	                     }
                /// echo "$i<br>";
                  echo "</tr>";
	        }
	        echo "</table>";
?>
  
</body>