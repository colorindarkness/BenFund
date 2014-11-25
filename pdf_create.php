<?php
require('functions/fpdf.php');
$id = $_POST['id'];
$group = stripslashes(strtoupper($_POST['group']));
$cause = stripslashes($_POST['cause']);
$pdf=new FPDF('p', 'pt', 'letter');
$pdf->SetMargins(50,50,50);
$pdf->AddPage();
$pdf->SetFont('Arial','B',27);
$message = "$group\nNEEDS YOUR HELP!";
$pdf->MultiCell(0,30,$message,0,'C',0);
$im = 'images/approved/'
		."$id"
		.'.jpg';
$size = getimagesize($im);
$x = (612-$size[0])/2;
$y = 122;
$pdf->image($im, $x, $y);
$pdf->SetY($size[1]+122+20);
$pdf->SetFont('Arial','',14);
$message = $cause;
$pdf->MultiCell(0,14,$message,0,'J',0);
$pdf->ln();
$message = "Go to www.benfund.com\nEnter the Benfund#: $id and click DONATE!\n\nFollow the on-screen instructions to complete you donation.";
$pdf->SetFont('Arial','B',20);
$pdf->MultiCell(0,21,$message,0,'C',0);
$pdf->Output('benfund.pdf', 'I');

?>