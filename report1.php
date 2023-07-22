<?php
include "header.htm";
?>

<html>
  <head>
  <script language="JavaScript"> 
           
            function doSubmit() 
            {
               if(document.report1.fnam.value == '') 
               { 
                      alert('Please enter First Name!'); 
                      document.report1.fnam.focus(); 
                       return false; 
                }             
                
                 if(document.report1.snam.value == '') 
               { 
                      alert('Please enter Surname!'); 
                      document.report1.snam.focus(); 
                       return false; 
                }     
                
                 if(document.report1.dept.value == '') 
               { 
                      alert('Please enter Dept!'); 
                      document.report1.dept.focus(); 
                       return false; 
                }                         
                 if(document.report1.reg.value == '') 
               { 
                      alert('Please select Region!'); 
                      document.report1.reg.focus(); 
                       return false; 
                }              
                 if(document.report1.telno.value == '') 
               { 
                      alert('Please enter Telephone No.!'); 
                      document.report1.telno.focus(); 
                       return false; 
                }                  
                 if(document.report1.ext.value == '') 
               { 
                      alert('Please enter Telephone Ext!'); 
                      document.report1.ext.focus(); 
                       return false; 
                }         
                    if(document.report1.email.value == '') 
               { 
                      alert('Please enter Email Address!'); 
                      document.report1.email.focus(); 
                       return false; 
                }                 
                 if(document.report1.problem.value == '') 
               { 
                      alert('Please select problem!'); 
                      document.report1.problem.focus(); 
                       return false; 
                }    
                
                  if(document.report1.descp.value == '') 
               { 
                      alert('Please enter description!'); 
                      document.report1.descp.focus(); 
                       return false; 
                }      
                
                
                  if(document.report1.urgency.value == '') 
               { 
                      alert('Please select level of urgency!'); 
                      document.report1.urgency.focus(); 
                       return false; 
                }                                
               document.report1.submit(); 
               return true;   
            } 
    </script> 
</head>

<?php


?>
<b>Log an ICT call</b> 

<form method="post" name="report1" action="report2.php">
<table width="100%" border="0" cellspacing="8" cellpadding="5" bgcolor="#CDDFED"  align=center>
<th colspan=2 align=left><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Please Enter Details</b> </th>
<tr>
	<td  width="20%"> First Name:</td>
	<td><input type="text" size="40" name="fnam" value=""></td>
</tr>
<tr>
	<td>Surname:</td>
	<td><input type="text" size="40" name="snam" value=""></td>
</tr>
<tr>
	<td>Dept:</td>
	<td><input type="text" size="40" name="dept" value=""></td>
</tr>
<tr>
<td>Region</td>
<td>
<select name="reg" size="1">
<option value=""></option>
  
	<option value="Bungoma">Bungoma</option>
		<option value="Chwele">Chwele</option>
	<option value="Kimilili">Kimilili</option>
	<option value="Kitale">Kitale</option>
	
		<option value="Webuye">Webuye</option>
	
	
</select>
</td>
</tr>
<tr>
	<td>Tel. No:</td>
	<td><input type="text" size="20" name="telno" value="" </td>
</tr>
<tr>
	<td>Email Address:</td>
	<td><input type="text" size="40" name="email" value=""></td>
</tr>
<td>Problem Area</td>
<td>
	
<select name="problem" size="1">
     <option value=""></option>
     <option value="Hardware">Hardware</option>
	  <option value="Software">Software</option>
		<option value="Network">Network</option>
		<option value="Sage">Sage</option>
		
		<option value="Billing">Billing</option>
		<option value="Printing">Printing</option>
		<option value="Internet">Internet</option>
		<option value="Mails">Mails</option>
		<option value="Other">Other</option>
</select>
</td>
</tr>
<tr>
	<td>Brief description of problem:</td>
<td ><textarea type="text" name="descp"   rows="3" cols="50"></textarea></td>	
</tr>
<tr>
<td>Level of Urgency</td>
<td>
	
<select name="urgency" size="1">
	<option value=""></option>
	<option value="Very Urgent">Very Urgent</option>
	<option value="Urgent"> Urgent</option>
	<option value="Not Urgent">Not Urgent</option>
</select>
</td>
</tr>






<br>
<tr><td></td></tr>
<tr><td><input type="submit"  name="Submit" onclick="doSubmit()"  value="Submit Request"></td><td><input type="reset"></td></tr>



</table>


</form>




<?php
 echo "<br> <a href='javascript:history.back(1)'><img src='BACK.BMP' width='12' height='16' border='0' alt=''><img src='back2.gif' width='47' height='16' border='0' alt=''></a>" ; 
  include "footer.htm";
?>