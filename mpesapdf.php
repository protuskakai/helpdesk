<?php

//$dat="0000";
//25387065
//$dbhost="nzoiawater.or.ke";
//$dbuser= "nzoiaw_kak2";
//$dbpass = "kitale2017";
//$dbname = "nzoiaw_kak";

require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    global $fl;
   //global $address;
    global $fld;
    global $dat;
    $this->Ln(5);
    $this->Image('logo22.jpg',18,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',14);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(80,6,'NZOIA WATER SERVICES COMPANY LIMITED',0,1,'C');
     $this->SetFont('Arial','',8);
      $this->Cell(230,5,'P.O. BOX 1010-50205, WEBUYE',0,1,'C');
       $this->Cell(230,5,'KENYA',0,1,'C');
     // $this->Ln(30);
   //   $this->Cell(20,10,'NZOIA WATER SERVICES COMPANY LIMITED',0,0,'R');
    // Line break
    $this->Ln(10);
    $this->SetFont('Arial','',8);
       $this->Cell(255,5,'MPESA REPORT',1,1,'C');
      $this->SetFont('Arial','B',10);
      $this->Cell(255,5,$fl.'   '.$dat,1,1,'C');
        
    //  $this->Cell(180,5,'Customer Statement:  Connection No. '.$dat,1,1,'C');
        $this->Ln(5);
         $this->Cell(30,5,'Ref No',1,0,'C');
            $this->Cell(30,5,'Date',1,0,'C');
               $this->Cell(60,5,'Name',1,0,'C');
               $this->Cell(30,5,'Tel No.',1,0,'C');
                $this->Cell(30,5,'Region',1,0,'C');
                 $this->Cell(30,5,'Account No.',1,0,'C');
                  $this->Cell(30,5,'Amount',1,0,'C');
                  $this->Cell(15,5,'Err Ind.',1,1,'C');
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    $tim=date("d/m/Y");
      $this->Cell(0,10,'Printed on '. $tim,0,0,'L');
   // ' date("Y/m/d")
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}'.'                                   '  ,0,0,'C');
 //     $this->Cell(0,10,'Printed on '. $tim,0,0,'L');
}

}
$dat = $_GET['dat'];
$fld = $_GET['fld'];
$len=strlen($dat);
//echo "<br>";
//echo "<br>";


switch ($fld)
	 {
	case "telno":
		$fl="Tel No. :";
		break;
	case "accno":
		$fl="Connection No:";
		break;
	case "dat":
		$fl="Date:";
		break;
		case "nam":
		$fl="Name:";
		break;
	}
//if ($len<12)
//{
 //  die("Invalid Connection No."."<a href='javascript:history.back(1)'>Click here to go back");
//}
//echo $dat;

$dbhost="localhost";
$dbuser= "55509";
$dbpass = "kitale";
$dbname = "mpesa";

$dbi  = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("I cannot connect to the database. Error :" . mysql_error());;
//mysqli_select_db($dbi,$dbname); 
//$fld = $_POST['fld'];
$dbi  = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("I cannot connect to the database. Error :" . mysql_error());;
$bal=0;


//$sql = "select * from customers  where  accno='$dat'";
//$sql = "select tcode as 'Ref No',dat as 'Date',nam as 'Name',accno as 'Connection No',ind  as 'Error Ind',telno as 'Tel No',amt as 'Amount',reg as 'Region' from mpesa where $fld like '%$dat%' order by reg,mdat,accno desc"; 
//$result = mysql_query($sql,$dbi);  
//echo $sql;
//$result= mysqli_query($dbi,$sql);
//if (!$result)
//{

//}else
//{

//$data = mysqli_fetch_array($result);
 //$nam=$data['nam'];
 //$address=$data['address'];
//$town=$data['town'];
//echo $fld;
 // die( "sss");
//}


$pdf = new PDF();
$pdf->SetMargins(18,5,5);
$pdf->AliasNbPages();

$pdf->AddPage("L","A4");
//
//$qry= $fld.":".$dat;
//$fs=substr($dat, 0, 1);
$bal=0;
//echo "<title>NZOWASCO ICT HELPDESK - MPESA QUERIES</title>";
$sql = "select * from mpesa where $fld like '%$dat%' order by reg,mdat,accno desc"; 
$result = mysqli_query($dbi,$sql);
        $n=0;
     
          $pdf->SetFont("Arial","B",12);
  
                  
        $pdf->SetFont("Arial","",10);
         while ($data = mysqli_fetch_array($result))
 {
 //$days=$data[sdate]-$data[dat];
 // $j=strtoupper($data[sprovider]) ;
 $amt=$data['amt'];
  $n++;
 
 $tcode =$data['tcode'];
 $mdat =$data['mdat'];
 $nam =$data['nam'];
 $reg =$data['reg'];
 $reg =$data['reg'];
 $ind =$data['ind'];
  $telno=$data['telno'];
   $accno =$data['accno'];
 $amt=number_format($amt,2);
 $bbal=number_format($bal,2);

   
  //    $pdf-->Cell($n,6,"$data[dat]","LR");
 //       $pdf-->Cell($n,6,$bbal,'LR');
    //    $pdf-->Cell($n,6,number_format($amt,'LR',0,'R');
     //   $pdf-->Cell($n,6,number_format($bbal,'LR',0,'R');
  //      $pdf-->Ln();
    
   $pdf->Cell(30,5,"$tcode",1,0);
    $pdf->Cell(30,5,"$mdat",1,0);
  $pdf->Cell(60,5,"$nam",1,0);
   $pdf->Cell(30,5,"$telno",1,0);
    $pdf->Cell(30,5,"$reg",1,0);
      $pdf->Cell(30,5,"$accno",1,0);
 //       $pdf->Cell(60,5,"$ind",1,0);
  //  $pdf->MultiCell( 200, 5 ," $data[item]", 1,0); 
  //    $pdf->Cell(30,5,"$dr",1,0);
    
        $pdf->Cell(30,5,"$amt",1,0,"R");
 //        $pdf->Cell(30,5,"$dr",1,0);
       
       $pdf->Cell(15,5,"$ind",1,1,"R");
   
}
 $pdf->SetFont("Arial","B",10);
 // $pdf->Cell(180,5,"Balance  C/F   $bbal",1,1,"R");
  
//$pdf->output('D','xxxx.pdf');

$pdf->Output('Statement_'.$dat.'.pdf', 'I');


echo "</table>";



?>