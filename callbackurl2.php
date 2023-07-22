<?php
header("Content-Type: application/json");

$stkCallbackResponse =file_get_contents('php://input');


//$stkCallbackResponse='{"Body":{"stkCallback":{"MerchantRequestID":"10208-6748009-1","CheckoutRequestID":"ws_CO_06092022170724527717411083","ResultCode":0,"ResultDesc":"The service request is processed successfully.","CallbackMetadata":{"Item":[{"Name":"Amount","Value":1},{"Name":"MpesaReceiptNumber","Value":"QI68HOFDTU"},{"Name":"Balance"},{"Name":"TransactionDate","Value":20220906170732},{"Name":"PhoneNumber","Value":254717411083}]},"TinyPesaID":"39206740-2ded-11ed-8f54-db8086470da9","ExternalReference":"test","Amount":1,"Msisdn":"254717411083"}}}';
 //echo strlen($stkCallbackResponse);
$logFile = "stkTinypesaResponse.json";
//die();
echo $stkCallbackResponse;

$log = fopen($logFile, "a");
fwrite($log, $stkCallbackResponse);
fclose($log);

/*
$log2 = fopen('test2.txt', "w");
fwrite($log2, $stkCallbackResponse);
fclose($log2);
$log2 = fopen('test2.txt', "r");
 while(!feof($log2))
 {
     $line= fgets($log2);
    // echo $line;
     
 
 }
fclose($log2);
$stkCallbackResponse=$line;
*/
$callbackContent = json_decode($stkCallbackResponse,true);


 if (is_array( $callbackContent['Body']))
            {
            
            
          //   echo "yes";
            }

if(isset($stkCallbackResponse))
{
  /*
 $CheckoutRequestID = $callbackContent->Body->stkCallback->CheckoutRequestID;
 $Amount = $callbackContent->Body->stkCallback->CallbackMetadata->Item[0]->Value;
 $MpesaReceiptNumber = $callbackContent->Body->stkCallback->CallbackMetadata->Item[1]->Value;
 $PhoneNumber = $callbackContent->Body->stkCallback->CallbackMetadata->Item[4]->Value;
  */

	$ResultCode =  $callbackContent['Body']['stkCallback']['CheckoutRequestID'];
	$CheckoutRequestID =  $callbackContent['Body']['stkCallback']['CheckoutRequestID'];
	$amount =  $callbackContent['Body']['stkCallback']['CallbackMetadata']['Item'][0]['Value'];
	$MpesaReceiptNumber =  $callbackContent['Body']['stkCallback']['CallbackMetadata']['Item'][1]['Value'];
	$MpesaDate =  $callbackContent['Body']['stkCallback']['CallbackMetadata']['Item'][3]['Value'];
	$PhoneNumber =  $callbackContent['Body']['stkCallback']['CallbackMetadata']['Item'][4]['Value'];
	
	 echo $PhoneNumber;
	
}else
{
  echo"no data";
}







?>