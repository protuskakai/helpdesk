<head>
<style>




</style>
<script>

// var tcode="";
function getpage()
 
{


 // document.getElementById("mm").innerHTML=str+" length="+cnt;
   
    xmlhttp = new XMLHttpRequest();
    //  alert(str);
     xmlhttp.onreadystatechange = function()
             {
           
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                 {
                    document.getElementById("mm2").innerHTML = xmlhttp.responseText;
                }
                
           
         } 
             var sel=    document.getElementById("sel").value;
             var val=    document.getElementById("val").value;
   //          alert(sel+" "+val);
                xmlhttp.open("GET","mpesat.php?fld="+sel+"&dat="+val,true);
            xmlhttp.send();

            document.getElementById("qq").innerHTML="MPESA Report (  "+ sel+" : "+val+ "  )";
           //<a href='excel_mpesa.php?dat=$dat&fld=$fld'>Export to Excel</a>
           document.getElementById("qq1").innerHTML="<a href='excel_mpesa.php?dat="+val+"&fld="+sel+">Export to Excel</a";

}



function additem(tcode)
{
 //alert(tcode);
 var mt=document.getElementById("mm3").innerHTML;
  document.getElementById("mm3").innerHTML =mt +" "+ tcode;

}

function clearlist()
{
 //alert(tcode);
 //var mt=document.getElementById("mm3").innerHTML;
  document.getElementById("mm3").innerHTML ="";
   document.getElementById("qq").innerHTML ="";
    document.getElementById("qq1").innerHTML ="";
  document.getElementById("mm2").innerHTML ="";

}
function clean()
{
 //alert(tcode);
 //var mt=document.getElementById("mm3").innerHTML;
  document.getElementById("qq").innerHTML ="";
    document.getElementById("qq1").innerHTML ="";
  document.getElementById("mm2").innerHTML ="";

}

function viewlist()
 
{
  
   myPopup = '';
  var vall=    document.getElementById("mm3").innerHTML;
   var url="mpesaz.php?list="+vall;
    myPopup = window.open(url,'popupWindow','width=740,height=480,top=150,left=450,location=0, titlebar=0');
    if (!myPopup.opener)
         myPopup.opener = self;

 // document.getElementById("mm").innerHTML=str+" length="+cnt;
/*   
    xmlhttp = new XMLHttpRequest();
    //  alert(str);
     xmlhttp.onreadystatechange = function()
             {
           
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                 {
                    document.getElementById("mm2").innerHTML = xmlhttp.responseText;
                }
                
           
         } 
            // var sel=    document.getElementById("sel").value;
             var vall=    document.getElementById("mm3").innerHTML;
   //          alert(sel+" "+val);
              document.getElementById("mm3").innerHTML="";
                xmlhttp.open("GET","mpesaz.php?list="+vall,true);
            xmlhttp.send();

*/


}
function checkopt()
{


 clean();


}


</script>

</head>

<table width="70%" cellspacing="0" cellpadding="0" bgcolor="#CCE0EE" align=center>
<tr>
	<td>
<?php

//include "header.htm";

echo "<b> \t&emsp;&emsp;&emsp;    Query MPESA Payments</b>";


?>




<tr><td><p  id="mm3"></p></td><p><td><input type="button"  value="View List"  onclick="viewlist()" ></td><td><input type="button"  value="Clear LIst"  onclick="clearlist()" ></p></td></tr>

<table width="70%" cellspacing="0" cellpadding="0" align=center>

<tr><td><form method="post" action="mpesa.php">
<tr>
<td width=15%>Query By</td>
<td width=15%>
<select id="sel" name="fld" size="1" onchange="checkopt()">
	<option value="dat">Date</option>
	<option value="nam">Name</option>
	<option value="accno">Connection No.</option>
	<option value="telno">Tel No.</option>
	<option value="tcode">Transaction Code</option>
</select>
</td>

<td width=15%><input id="val" type="text" name="dat"  onkeyup="clean()"></td><td width=15%><input type="button"   value="Query" onclick="getpage()"></td>
<td  width=35%><p id="qq">            </p></td><td><p id="qq1">            </p></td>
</tr>



</form>
</td></tr>
</table>
</td>
</tr>
</table>
<table    bgcolor="#FFFFFF" width=100%>
<tr   bgcolor=#FFFFFF><td><p  id="mm2"   bgcolor=#FFFF80></p></td></tr>
</table>
<?php
// echo "<br> <a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''><img src='back2.gif' width='47' height='16' border='0' alt=''></a>" ;
// include "footer.htm";
?>
