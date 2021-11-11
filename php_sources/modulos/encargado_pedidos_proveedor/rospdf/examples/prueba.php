<?php

date_default_timezone_set('UTC');

include_once '../src/Cezpdf.php';
#include_once '../src/Cpdf.php';

$conexion = mysql_connect("localhost", "root", "maculuss");
mysql_select_db("koyikun", $conexion);


$q='select pedidos_proveedor.id_articulo , articulos.color
                                                        from pedidos_proveedor, articulos
                                                        	 where pedidos_proveedor.id_articulo=articulos.id
                                                        	        and  numero_pedido="'.$_GET["numero_pedido"].'" and articulos.color is not null';



$res=mysql_query($q);
if(mysql_error){echo mysql_error();}

while($row=mysql_fetch_array($res)){
        $q2='update pedidos_proveedor set color="'.$row[1].'" where id_articulo="'.$row[0].'"';
//      echo $row[0]." ".$row[1].chr(10);
				mysql_query($q2);
//        echo $q2.chr(10);
}




$q='select pedidos_proveedor.id_articulo as id, articulos.color as color, 
												from pedidos_proveedor, articulos 
														where pedidos_proveedor.id_articulo=articulos.id 
																		and  numero_pedido="'.$_GET["numero_pedido"].'"';




$pdf = new CezPDF('a4');

$pdf->selectFont('Helvetica');

$pdf->ezImage('../../af_ap.jpg', 0, 130, 'none', 'left');
$pdf->ezText("\n", 10);
$pdf->ezText("San Martin 1418 - Mendoza - Argentina", 10);
$pdf->ezText("administracion@almacendefragancias.com", 10);
$pdf->ezText("www.almacendefragancias.com", 10);
$pdf->ezText("Cel: +54 261 722 5115", 10);
$pdf->ezText("Rot: +54 261 420 1845", 10);



$numero="num: ".$_GET["numero_pedido"];


$q1='select marca from pedidos_proveedor where numero_pedido="'.$_GET["numero_pedido"].'" limit 0,1';
$a=mysql_fetch_array(mysql_query($q1));
$marca="Marca: ".$a[0];


$q2='select sum(cantidad_solicitada) from pedidos_proveedor where numero_pedido="'.$_GET["numero_pedido"].'"';
$a=mysql_fetch_array(mysql_query($q2));
$cantidad="Cantidad de articulos: ".$a[0];

$fecha="Fecha: ".date("d/n/Y");
$hora="Hora: ".date("H:i:s")."\n";
$numero_pedido="Numero pedido: ".$_GET["numero_pedido"];




//$pdf->ezText($numero, 10);
//$pdf->ezText($q1, 10);
//$pdf->ezText($q2, 10);
$pdf->ezText($numero_pedido, 10);
$pdf->ezText($marca, 10);
$pdf->ezText($cantidad, 10);
$pdf->ezText($fecha, 10);
$pdf->ezText($hora, 10);




$queEmp = 'select id_articulo, 
						marca, 
						descripcion, 
						color,
						contenido, 
						presentacion, 
						cantidad_solicitada 
								from pedidos_proveedor
										where numero_pedido="'.$_GET["numero_pedido"].'" ';
										
$resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);

//$pdf->ezText($queEmp, 10);


#$result_list = array();
#$data = array();
while($row = mysql_fetch_assoc($resEmp)) {
   $data[] = $row;
   }
   
   







// some general data used for table output
//$data = array(
// ['num' => 0, 'name' => 'gandalf', 'type' => 'wizard'], ['num' => 2, 'name' => 'bilbo', 'type' => 'hobbit', 'url' => 'http://www.ros.co.nz/pdf/'], ['num' => 3, 'name' => 'frodo', 'type' => 'hobbit'], ['num' => 4, 'name' => 'saruman', 'type' => 'bad dude', 'url' => 'http://sourceforge.net/projects/pdf-php'], ['num' => 5, 'name' => 'sauron', 'type' => 'really bad dude'],
//);

$cols = ['num' => 'No', 'type' => 'Type', 'name' => '<i>Alias</i>'];
$coloptions = ['num' => ['justification' => 'right'], 'name' => ['justification' => 'left'], 'type' => ['justification' => 'center']];


//$pdf->ezText("<b>using 'showLines' option - DEPRECATED</b>\n", 10);

//$pdf->ezText("\nDefault: showLines = 1\n", 10);
//$pdf->ezTable($data, $cols);
$pdf->ezTable($data);

if (isset($_GET['d']) && $_GET['d']) {
    echo $pdf->ezOutput(true);
} else {
    $pdf->ezStream();
}
