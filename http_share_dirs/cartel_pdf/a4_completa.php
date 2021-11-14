<?php
require_once('class.ezpdf.php');
$pdf =& new Cezpdf('a4','landscape');
$pdf->ezSetCmMargins(1,1,1.5,1.5);

/*
$options = array(
				'shadeCol'=>array(0.9,0.9,0.9),
				'xOrientation'=>'center',
				'width'=>500
			);
*/
$options_text = array(
				'justification'=>'center'
			);



$pdf->selectFont($_POST["font_texto1"]);
$pdf->addText($_POST["x_texto1"],$_POST["y_texto1"],$_POST["tam1"], $_POST["texto1"] );
$pdf->selectFont($_POST["font_texto2"]);
$pdf->addText($_POST["x_texto2"],$_POST["y_texto2"],$_POST["tam2"], $_POST["texto2"] );

//case 'A4': default: {$size = array(0,0,595.28,841.89); break;}
#$pdf->line(10,10,800,500);

// -------------------------------------------------------------------
// dibuja linea 
$pdf->setLineStyle(7,'round');
$x_start="15";
$x_end="820";

$y_start="10";
$y_end="580";

$pdf->line($x_start, $y_start, $x_start, $y_end);
$pdf->line($x_start, $y_start, $x_end, $y_start);

$pdf->line($x_start, $y_end, $x_end, $y_end);
$pdf->line($x_end, $x_start, $x_end, $y_end );
// -------------------------------------------------------------------



// -------------------------------------------------------------------
// texto izquierda
$pdf->selectFont($_POST["font_texto3"]);
$array_texto3=explode( chr(13), $_POST["texto3"] );
$count=count($array_texto3);

$x_texto3=$_POST["x_texto3"];
$y_texto3=$_POST["y_texto3"];
$tam3=$_POST["tam3"];
for ($i = 0; $i < $count; $i++){
	$pdf->addText($x_texto3, $y_texto3, $tam3, $array_texto3[$i]);
	$y_texto3 = $y_texto3 - $tam3;	
}
// -------------------------------------------------------------------

// -------------------------------------------------------------------
// texto derecha
$pdf->selectFont($_POST["font_texto4"]);
$array_texto4=explode( chr(13), $_POST["texto4"] );
$count=count($array_texto4);

$x_texto4=$_POST["x_texto4"];
$y_texto4=$_POST["y_texto4"];
$tam4=$_POST["tam4"];
for ($i = 0; $i < $count; $i++){
	$pdf->addText($x_texto4, $y_texto4, $tam4, $array_texto4[$i]);
	$y_texto4 = $y_texto4 - $tam4;	
}
// -------------------------------------------------------------------

// -------------------------------------------------------------------
// precio
$pdf->selectFont($_POST["font_precio"]);
$pdf->addText($_POST["x_precio"],$_POST["y_precio"],$_POST["tam_precio"], $_POST["precio"] );
// -------------------------------------------------------------------


// -------------------------------------------------------------------
// aaaa
$pdf->selectFont($_POST["font_precio"]);
$pdf->addText($_POST["x_marca"], $_POST["y_marca"], $_POST["tam_marca"], $_POST["marca"] );
$pdf->addText($_POST["x_marca"], (($_POST["y_marca"]) - ($_POST["tam_marca"] * 1) ) , $_POST["tam_marca"], "Desde: ".$_POST["desde"] );
$pdf->addText($_POST["x_marca"], (($_POST["y_marca"]) - ($_POST["tam_marca"] * 2) ), $_POST["tam_marca"], "Hasta: ".$_POST["hasta"] );
$pdf->addText($_POST["x_marca"]-20, (($_POST["y_marca"]) - ($_POST["tam_marca"] * 4) ), $_POST["tam_marca"], "Int" );
$pdf->addText($_POST["x_marca"]+20, (($_POST["y_marca"]) - ($_POST["tam_marca"] * 4) ), $_POST["tam_marca"], "Ext" );
// -------------------------------------------------------------------

// -------------------------------------------------------------------
// cuadradito 1 

$pdf->setLineStyle(2,'round');
$x_start="50";
$x_end="60";

$y_start="50";
$y_end="60";

$pdf->line($x_start, $y_start, $x_start, $y_end);
$pdf->line($x_start, $y_start, $x_end, $y_start);

$pdf->line($x_start, $y_end, $x_end, $y_end);
$pdf->line($x_end, $x_start, $x_end, $y_end );

$pdf->selectFont($_POST["font_precio"]);
$pdf->addText($_POST["x_marca"], $_POST["y_marca"], $_POST["tam_marca"], $_POST["marca"] );

// -------------------------------------------------------------------

// -------------------------------------------------------------------
// cruz 1 
if($_POST["int"]=="int"){
	$pdf->setLineStyle(1,'round');
	$x_start="50";
	$x_end="60";

	$y_start="50";
	$y_end="60";

	$pdf->line($x_start, $y_start, $x_end, $y_end);
	$pdf->line($x_end, $y_start, $x_start, $y_end);
}
// -------------------------------------------------------------------


// -------------------------------------------------------------------
// cuadradito 2 
$pdf->setLineStyle(2,'round');
$x_start="90";
$x_end="100";

$y_start="50";
$y_end="60";

$pdf->line($x_start, $y_start, $x_start, $y_end);
$pdf->line($x_start, $y_start, $x_end, $y_start);

$pdf->line($x_end, $y_start, $x_end, $y_end );
$pdf->line($x_start, $y_end, $x_end, $y_end);
// -------------------------------------------------------------------



// -------------------------------------------------------------------
// cruz 2 
if($_POST["ext"]=="ext"){
	$pdf->setLineStyle(1,'round');
	$x_start="90";
	$x_end="100";

	$y_start="50";
	$y_end="60";


	$pdf->line($x_start, $y_start, $x_end, $y_end);
	$pdf->line($x_end, $y_start, $x_start, $y_end);
}
// -------------------------------------------------------------------




// -------------------------------------------------------------------
// imagen 
$x_image=$_POST["x_image"];
$y_image=$_POST["y_image"];
$tam_image=$_POST["tam_image"];
$pdf->addJpegFromFile("image015.jpg",$x_image,$y_image,$tam_image);
// -------------------------------------------------------------------




$pdf->ezStream();
?>
