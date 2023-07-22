<?php

include "net2.php";

$result = mysqli_query($dbi," select * from mpesa");

echo "<table width='70%' border='0' align='center'>\n" 
         ."<tr bgcolor='#CCE0EE'>\n" 
         ."<td width=10%> No.</td>\n"
         ."<td>Kitale</td>\n"
       ."<td>Kitale</td>\n"
          ."<td>Kitale</td>\n"
      ."" 
        ."</tr>"; 
        
        
                while ($data = mysqli_fetch_array($result))
 {
 $seq=$data['seq'];
 $n=strrpos($data['dat'], "2017");
 if($n>0)
 {
    $jj="/2017";
      $m =strchr($data['dat'],"/2017",true);
   // else
      
  }    
  
   $n=strrpos ($data['dat'], "2016");
 if($n>0)
 {
      $m =strchr($data['dat'],"/2016",true);
      $jj="/2016";
  }    
 //$days=$data[sdate]-$data[dat];
 // $j=strtoupper($data[sprovider]) ;
  //$n++;
  $j=trim( substr($m,-5).$jj);
  
  
  list($d, $m, $y) = explode('/', $j);
  $dd="$y-$m-$d";

   $result2 = mysqli_query($dbi,"update mpesa set mdat='$dd' where seq='$seq'");
//  echo "update mpesa set mdate='$d' where seq='$seq'";

  
 echo "\n\n<tr bgcolor='#CCD0EE'>\n" 
     ."<td width=10%> $data[dat]</td>\n"
       ."<td>$m</td>\n"
     
          ."<td>$j</td>\n"
            ."<td>$dd</td>\n"
           ."</tr>"; 

  
  }

?>