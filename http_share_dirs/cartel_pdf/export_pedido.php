<?php


require_once('class.ezpdf.php');
$pdf =& new Cezpdf('a4');
$pdf->selectFont('./fonts/courier.afm');
$pdf->ezSetCmMargins(1,1,1.5,1.5);



$conexion = mysql_connect("localhost", "root", "maculuss");
mysql_select_db("koyikun", $conexion);
$queEmp = 'select * from pedidos_proveedor where numero_pedido="869"';
$resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);

$ixx = 0;


while($datatmp = mysql_fetch_assoc($resEmp)) { 
	$ixx = $ixx+1;
	$data[] = array_merge($datatmp, array('num'=>$ixx));
}

$titles = array(
				'id'=>'<b>ID</b>',
				'descripcion'=>'<b>Descripcion</b>',
				'contenido'=>'<b>Contenido</b>',
				'presentacion'=>'<b>Presentacion</b>',
				'clasificacion'=>'<b>Clasificacion</b>',
				'subclasificacion'=>'<b>Sub clasificacion</b>',
				'barras'=>'<b>Codigo de Barras</b>',
				'cantidad'=>'<b>Cantidad</b>'
			);
$options = array(
				'shadeCol'=>array(0.9,0.9,0.9),
				'xOrientation'=>'center',
				'width'=>500
			);

$txttit = "<b>San Martin 1418 Mendoza Argentina</b>\n";
//$txttit.= "Ejemplo de PDF con PHP y MYSQL \n";



$pdf->ezText($txttit, 12);
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezText("\n\n\n", 10);
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y")."\n\n", 10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n", 10);
$pdf->ezStream();


?>




