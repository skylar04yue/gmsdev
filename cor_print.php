<?php
include 'core/init.php';
require('fpdf17/fpdf.php');


//A4 width: 219mm
//default margin : 10 mm each side
//writable horizontal: 219 (10 *2) = 189mm

class PDF extends FPDF {
	function Header(){
		$this-> SetFont('Arial','B',13);
		$this->Ln(5);
		$this->Ln(5);
		$this->Cell(35);
		$this->Image("img/NEUST-LOGO.png",15,20,20);
		$this->Cell(100,5,'NUEVA ECIJA UNIVERSITY OF SCIENCE AND TECHNOLOGY',0,0,'C');
		$this->Cell(35);
		$this->Image("img/gentiniologo.png",175,20,20);
		$this->Cell(35);
		$this->Cell(100,5,'GENERAL TINIO (PAPAYA) OFF-CAMPUS',0,1,'C');
		$this->Cell(35);
		$this-> SetFont('Arial','B',12);
		$this->Cell(100,5,'Brgy. Concepcion, General Tinio (Papaya), Nueva Ecija',0,1,'C');
		$this->Cell(35);
		$this->Cell(100,5,'OFFICE OF THE REGISTRAR',0,1,'C');
		$this->Ln(5);
		$this->Ln(5);
		$this-> SetFont('Arial','U',15);
		
		$this->Cell(169,5,'CERTIFICATE OF GRADES',0,1,'C');
		$this->Ln(5);
		$this->Ln(5);
		$this->Ln(5);
		$this->Ln(5);
	}
}


$image1 = "img/NEUST-LOGO.png";

$pdf = new PDF('P','mm','A4');
$pdf->SetMargins(20, 10);
$pdf->AddPage();



//set font to arial, bold, 14pt

$pdf->SetFont('Arial','',11);

//Cell(width, height, text,border, end line, [align])


if (isset($_GET['id'])) {
	$col = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']); 
}

if (isset($_GET['stf'])) {
	$stf = (get_magic_quotes_gpc()) ? $_GET['stf'] : addslashes($_GET['stf']); 
}
						
								
							
							
$cors = $func->select_one('registrationtbl',array('regID','=',$col));

$pangalannya = $func->select_one('studtbl',array('studID','=',$cors[0]['studID']));

$gender = "";

if($pangalannya[0]['gender'] == 1){
	$gender = "MR. ";}
else{$gender = "MS. ";
} 

 $angang = $func->select_one('curriculum',array('currID','=',$cors[0]['currID'])); 
												


$angcoursemajor = $func->selectjoin_where('coursetbl','majortbl','courseID','courseID','majortbl',array('majorID','=',$angang[0]['majorID']));  



$textnya = "           This is to certifies that according to the records in this university, ". $gender. strtoupper($pangalannya[0]['fName'])." ".strtoupper($pangalannya[0]['mName'])." ". strtoupper($pangalannya[0]['lName'])." ". "was officially enrolled under the program ". $angcoursemajor[0]['courseTitle']." (". $angcoursemajor[0]['majorName'] .") ". "and has obtained the following grades for:"; 

$cellWidth=169;
$cellHeight=5;

//check whether overflowing

if($pdf->GetStringWidth($textnya) <$cellWidth){
	$line=1;
} else{
	$textLength = strlen($textnya);
	$errMargin=20;
	$startChar=0;
	$maxChar=0;
	$textArray=array();
	$tmpString="";

	while($startChar < $textLength){
		while( $pdf->GetStringWidth($tmpString) < ($cellWidth - $errMargin) && ($startChar + $maxChar) < $textLength ){
			$maxChar++;
			$tmpString=substr($textnya, $startChar,$maxChar);
		}
		$startChar=$startChar+$maxChar;
		array_push($textArray,$tmpString);
		$maxChar = 0;
		$tmpString ="";
	}

	$line=count($textArray);

}



$xPos = $pdf->GetX();
$YPos = $pdf->GetY();
$pdf->MultiCell($cellWidth,$cellHeight,$textnya,0);

$pdf->SetXY($xPos + $cellWidth, $YPos);
$pdf->Cell(1,($line * $cellHeight),"",0,1);

$pdf->Cell(169,5,"",0,1);

$yrlevel = "";
$semlevel = "";
$acadhead = "";

if ($cors[0]['regYrlevel'] == 1){ 
	$yrlevel = "1st Year ";
} else if ($cors[0]['regYrlevel'] == 2){ 
	$yrlevel = "2nd Year ";
} else if ($cors[0]['regYrlevel'] == 3){ 
	$yrlevel = "3rd Year ";
} else if ($cors[0]['regYrlevel'] == 4){ 
	$yrlevel = "4th Year ";
} else if ($cors[0]['regYrlevel'] == 5){ 
	$yrlevel = "5th Year ";
}  


if ($cors[0]['regSem'] == 1){ 
	$semlevel =  "1st Semester ";
} else if ($cors[0]['regSem'] == 2){ 
	$semlevel =  "2nd Semester ";
} else if ($cors[0]['regSem'] == 3){ $semlevel =  "Summer ";} 
else if ($cors[0]['regSem'] == 4){ $semlevel =  "Midyear ";
}  

$acadhead = $yrlevel . $semlevel ."A.Y. ". $cors[0]['regAcadYr'];



$pdf->Ln(5);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(169,5,$acadhead,0,1,'C');
$pdf->Ln(5);


$pdf->Cell(25,5,'Subj. Code',1,0,'C');
$pdf->Cell(89,5,'Descriptive Title',1,0,'C');
$pdf->Cell(15,5,'Units',1,0,'C');
$pdf->Cell(18,5,'Grades',1,0,'C');
$pdf->Cell(22,5,'Remarks',1,1,'C');


$selectenrollsub = $func->select_one('gradetbl',array('regID','=',$cors[0]['regID']));

$pdf->SetFont('Arial','',10);

$talunits= 0;

for($t=0;$t<count($selectenrollsub);$t++){ 

	$subjlist41 = $func->select_one('subjtbl',array('subjID','=',$selectenrollsub[$t]['subjID']));

	$pdf->Cell(25,5,$subjlist41[0]['subjCode'],1,0,'C');
	$pdf->Cell(89,5,$subjlist41[0]['subjTitle'],1,0,'C');

	$subjunit = "";
	if($subjlist41[0]['subjUnit'] == 0){
				$subjunit = "";
				$talunits = $talunits;
	} else if($subjlist41[0]['subjUnit']<= 0){
		$talunits = $talunits + 0;
		$subjunit = '(' .$subjlist41[0]['subjUnit'] * -1 .')';
	} else{
		$subjunit = $subjlist41[0]['subjUnit'];
		$talunits = $talunits + $subjunit;
	}
	
	$pdf->Cell(15,5,$subjunit,1,0,'C');

	$raty = "";

	if ($selectenrollsub[$t]['rating'] == 0){ 
		$raty = "";
	} else {
		$raty = $selectenrollsub[$t]['rating']; 
	} 

	$pdf->Cell(18,5,$raty,1,0,'C');

	$remarka = "";
	if($selectenrollsub[$t]['remarks'] == 1){ 
		$remarka =  "Passed"; 
	}else if($selectenrollsub[$t]['remarks'] == 0){ 
		$remarka =  "Failed"; 
	}


	$pdf->Cell(22,5,$remarka,1,1,'C');

}

$pdf->Cell(25,5,"",1,0,'C');
$pdf->Cell(89,5,'X------------------X',1,0,'C');
$pdf->Cell(15,5,$talunits,1,0,'C');
$pdf->Cell(18,5,'',1,0,'C');
$pdf->Cell(22,5,'',1,1,'C');

$pdf->Ln(5);


$curday ="";
  $currentDay = date('d'); 
  if($currentDay == 1){
  	$curday = "1st ";
  } else if($currentDay == 2){
  	$curday = "2nd ";
  } else if($currentDay == 3){
  	$curday = "3rd ";
  } else{ $curday = $currentDay ."th "; 
} 


$textnya = "           This is certification is issued this " .$curday. " day of " .date('F Y'). " upon the request of the above-named person for references purposes.";


if($pdf->GetStringWidth($textnya) <$cellWidth){
	$line=1;
} else{
	$textLength = strlen($textnya);
	$errMargin=20;
	$startChar=0;
	$maxChar=0;
	$textArray=array();
	$tmpString="";

	while($startChar < $textLength){
		while( $pdf->GetStringWidth($tmpString) < ($cellWidth - $errMargin) && ($startChar + $maxChar) < $textLength ){
			$maxChar++;
			$tmpString=substr($textnya, $startChar,$maxChar);
		}
		$startChar=$startChar+$maxChar;
		array_push($textArray,$tmpString);
		$maxChar = 0;
		$tmpString ="";
	}

	$line=count($textArray);

}



$xPos = $pdf->GetX();
$YPos = $pdf->GetY();
$pdf->MultiCell($cellWidth,$cellHeight,$textnya,0);

$pdf->SetXY($xPos + $cellWidth, $YPos);
$pdf->Cell(1,($line * $cellHeight),"",0,1);

$pdf->Cell(169,5,"",0,1);

$pdf->Ln(5);
$pdf->Cell(169,5,"               Prepared by:",0,1);
$pdf->Cell(25,5,"",0,0,'C');

$pdf->Ln(5);
$pdf->Ln(5);
$pdf->Cell(25,5,"",0,0,'C');

$staffko = $func->select_one('stafftbl',array('staffID','=',$stf));

$thestaff = strtoupper(escape($staffko[0]['firstName'])." ". substr(escape($staffko[0]['midName']),0,1) .". ".escape($staffko[0]['lastName'])) ; 

$pdf->SetFont('Arial','U',12);
$pdf->Cell(40,5,$thestaff,0,1,'C');
$pdf->Cell(25,5,"",0,0,'C');
$pdf->SetFont('Arial','',11);
$pdf->Cell(40,5,'Clerk',0,0,'C');
$pdf->Cell(80,5,'Check and Verified by:',0,0,'R');
$pdf->Ln(5);
$pdf->Ln(5);
$pdf->Ln(5);
$pdf->SetFont('Arial','U',12);
$pdf->Cell(120,5,'',0,0,'R');
$pdf->Cell(40,5,'JOCELYN A. IBARRA',0,1,'C');
$pdf->Cell(120,5,'',0,0,'R');
$pdf->SetFont('Arial','',12);
$pdf->Cell(40,5,'Campus Registrar',0,1,'C');


$pdf->Output();

?>