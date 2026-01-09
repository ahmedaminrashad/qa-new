<?php 
require('libs/fpdf.php'); 

class PDF extends FPDF 
{ 
	// Page header 
	function Header() 
	{ 
		// GFG logo image 
		$this->Image('header.jpg', 0, 0); 
		
		// Set font-family and font-size 
		$this->SetFont('Times','B',20); 
		
		// Set the title of pages.
		$this->SetY(47);
		$this->SetTextColor(195, 136, 42);
		$this->Cell(0, 10, 'Monthly Report', 0, 2, 'C'); 
		
	} 
	function Footer() 
	{ 
		// Position at 1.5 cm from bottom 
		$this->SetY(-30); 
		
		// Set font-family and font-size of footer. 
		$this->SetFont('Arial', 'I', 10); 
		$this->SetTextColor(195, 136, 42);
		// set page number 
		$this->Cell(0, 10, 'Website: www.quranspirit.com', 0, 0, 'C');
		$this->SetY(-25);
		$this->SetFont('Arial', 'U', 10);
		$this->Cell(0, 10, 'USA Phone: +1 315 636 6686 WhatsApp: +2 011 2983 4164', 0, 0, 'C');
	}

	
} 
  $head = $_POST['heading'];
  $heading1 = $head['0'];
  $heading2 = $head['1'];
  $heading3 = $head['2'];
  $heading4 = $head['3'];
  $rate = $_POST['rating'];
  $rating1 = $rate['0'];
  $rating2 = $rate['1'];
  $rating3 = $rate['2'];
  $rating4 = $rate['3'];
  $note = $_POST['notes'];
  $note1 = $note['0'];
  $note2 = $note['1'];
  $note3 = $note['2'];
  $note4 = $note['3'];
  $next = $_POST['next'];
  $next1 = $next['0'];
  $next2 = $next['1'];
  $next3 = $next['2'];
  $next4 = $next['3'];
  $Tname = $_POST['Tname'];
  $Sname = $_POST['Sname'];
  $Course = $_POST['Course'];
  $Dtae = $_POST['Date'];
	
// Create new object. 
$pdf = new PDF( 'L', 'mm', 'A4' ); 


// Add new pages 
$pdf->AddPage();
// Set font-family and font-size. 
$pdf->SetFont('Times','',12);
$pdf->SetDrawColor(195, 136, 42);
$pdf->SetY(62);
$pdf->Cell(30,7,'Student Name:',1);
$pdf->Cell(60,7,$Sname,1);
$pdf->Cell(30,7,'Course Name:',1);
$pdf->Cell('CellFitScale',7,$Course,1);
$pdf->Ln();
$pdf->Cell(30,7,'Teacher:',1);
$pdf->Cell(60,7,$Tname,1);
$pdf->Cell(30,7,'Date:',1);
$pdf->Cell('CellFitScale',7,$Dtae,1);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Times','B',12);
$pdf->Cell(29,7,'Subjects',0,0,C);
$pdf->Cell(62,7,$heading1,0,0,C);
$pdf->Cell(62,7,$heading2,0,0,C);
$pdf->Cell(62,7,$heading3,0,0,C);
$pdf->Cell(62,7,$heading4,0,0,C);
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->SetFillColor(242,222,222);
$pdf->Cell(29,7,'Rating',0,0,C,true);
$pdf->Cell(62,7,$rating1,0,0,C,true);
$pdf->Cell(62,7,$rating2,0,0,C,true);
$pdf->Cell(62,7,$rating3,0,0,C,true);
$pdf->Cell(62,7,$rating4,0,0,C,true);
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->SetFillColor(223,240,216);
$pdf->SetY(97);
$pdf->Cell(277,35,'Notes',0,0,L,true);
$pdf->SetY(97);
$pdf->SetX(10);
$pdf->Cell(29,35,'Notes',0,0,C,true);
$pdf->SetY(97);
$pdf->SetX(39);
$pdf->MultiCell('62',6,$note1,0,C,true);
$pdf->SetY(97);
$pdf->SetX(101);
$pdf->MultiCell('62',6,$note2,0,C,true);
$pdf->SetY(97);
$pdf->SetX(163);
$pdf->MultiCell('62',6,$note3,0,C,true);
$pdf->SetY(97);
$pdf->SetX(225);
$pdf->MultiCell('62',6,$note4,0,C,true);
$pdf->Ln();
$pdf->SetFillColor(217,237,247);
$pdf->SetY(132);
$pdf->Cell(277,36,'Next Course',0,0,L,true);
$pdf->SetY(132);
$pdf->SetX(10);
$pdf->Cell(29,35,'Next Course',0,0,C,true);
$pdf->SetY(132);
$pdf->SetX(39);
$pdf->MultiCell('62',6,$next1,0,C,true);
$pdf->SetY(132);
$pdf->SetX(101);
$pdf->MultiCell('62',6,$next2,0,C,true);
$pdf->SetY(132);
$pdf->SetX(163);
$pdf->MultiCell('62',6,$next3,0,C,true);
$pdf->SetY(132);
$pdf->SetX(225);
$pdf->MultiCell('62',6,$next4,0,C,true);
$pdf->SetFont('Times','',12);
$pdf->Line(10,83,287,83);
$pdf->Line(10,90,287,90);
$pdf->Line(10,83,10,168);
$pdf->Line(39,83,39,168);
$pdf->Line(101,83,101,168);
$pdf->Line(163,83,163,168);
$pdf->Line(225,83,225,168);
$pdf->Line(287,83,287,168);
$pdf->Line(10,97,287,97);
$pdf->Line(10,132,287,132);
$pdf->Line(10,168,287,168);
$pdf->Output(); 

?> 
