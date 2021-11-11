<?php
include_once("../../includes/connect.php");
include_once("../../includes/funciones_varias.php");

$fecha=date("Y-n-d");
$hora=date("H_i_s");

$user_path='/var/www/temp/';
$nombre_archivo='listado_ventas_'.$fecha.'_'.$hora.'.xls';
$fopen = fopen($user_path.$nombre_archivo, 'w');


$query='select * from ventas order by sucursal, vendedor, numero_venta';
$result = mysql_query($query)or die(mysql_error());

$header_abre='<html>
<head>
<title>Listado de stock</title>
</head>
<table border="1">
';

$header_cierra="</table>";

$header = "<tr><td>Id</td>";
$header .= "<td>Numero venta</td>";
$header .= "<td>Marca</td>";
$header .= "<td>Descripcion</td>";
$header .= "<td>Clasificacion</td>";
$header .= "<td>Subclasificacion</td>";
$header .= "<td>Cantidad</td>";
$header .= "<td>Precio unitario</td>";
$header .= "<td>Sucursala</td>";
$header .= "<td>Tipo Pago</td>";
$header .= "<td>vendedor</td>";
$header .= "<td>Fecha</td>";
$header .= "<td>Hora</td></tr>".chr(13);
fwrite($fopen, $header_abre);
fwrite($fopen, $header);

while($row=mysql_fetch_array($result)){

	$linea="<td>". $row["id"]."</td>";
	$linea.="<td>".$row["numero_venta"]."</td>";
	$linea.="<td>".$row["marca"]."</td>";
	$linea.="<td>".$row["descripcion"]."</td>";
	$linea.="<td>".$row["clasificacion"]."</td>";
	$linea.="<td>".$row["subclasificacion"]."</td>";
	$linea.="<td>".$row["cantidad"]."</td>";
	$linea.="<td>".$row["precio_unitario"]."</td>";
	$linea.="<td>".$row["sucursal"]."</td>";
	$linea.="<td>".$row["tipo_pago"]."</td>";
	$linea.="<td>".$row["vendedor"]."</td>";
	$linea.="<td>".$row["fecha"]."</td>";
	$linea.="<td>".$row["hora"]."</td>";
	$data = "<tr>".$linea."</tr>".chr(13);
	fwrite($fopen, $data);
}



fwrite($fopen, $header_cierra);
fclose($fopen);
header('Location: /temp/'.$nombre_archivo);
?>