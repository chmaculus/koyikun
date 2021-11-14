<?php
require_once('class.ezpdf.php');
$pdf =& new Cezpdf('a4','landscape');
$pdf->selectFont('../fonts/courier.afm');
$pdf->ezSetCmMargins(1,1,1.5,1.5);


// -------------------------------------------------------------------
// dibuja linea 
/*
$pdf->setLineStyle(2,'round');
$x_start="15";
$x_end="820";

$y_start="10";
$y_end="580";

$pdf->line($x_start, $y_start, $x_start, $y_end);
$pdf->line($x_start, $y_start, $x_end, $y_start);

$pdf->line($x_start, $y_end, $x_end, $y_end);
$pdf->line($x_end, $x_start, $x_end, $y_end );
*/
// -------------------------------------------------------------------
//case 'A4': default: {$size = array(0,0,595.28,841.89); break;}


// -----------------------------------------------------------
// incrementa X, dibuja las verticales
$pdf->setLineStyle("0.25",'round');
for ($i = 0; $i < 843; $i=$i+5){
	$pdf->line($i, 0, $i, 595);
}
// -----------------------------------------------------------

// -----------------------------------------------------------
// incrementa Y, dibuja las Horizontales
$pdf->setLineStyle("0.25",'round');
for ($i = 0; $i < 596; $i=$i+5){
	$pdf->line(0, $i, 842, $i);
}
// -----------------------------------------------------------


// -----------------------------------------------------------
// Eje X
$pdf->setLineStyle("2",'round');
for ($i = 0; $i < 843; $i=$i+50){
	$pdf->addText($i, 10 ,18, "x".$i );
	$pdf->line($i, 0, $i, 595);
}
// -----------------------------------------------------------

// -----------------------------------------------------------
// Eje Y
$pdf->setLineStyle("2",'round');
for ($i = 0; $i < 596; $i=$i+50){
	$pdf->addText(10, $i ,18, "y".$i );
	$pdf->line(0, $i, 842, $i);
}
// -----------------------------------------------------------


$pdf->ezStream();
?>
