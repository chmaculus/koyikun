<?php
include("../../login/login_verifica.inc.php");

include_once("../seguridad.inc.php"); 

include_once("../../includes/connect.php");
include_once("../../includes/funciones_costos.php");

$fecha=date("Y-n-d");
$hora=date("H_i_s");

$user_path='/var/www/temp/';
$nombre_archivo='listado_precios_'.$fecha.'__'.$hora.'.xls';
$fopen = fopen($user_path.$nombre_archivo, 'w');

$query='select * from articulos order by marca, clasificacion, subclasificacion, descripcion';
$result = mysql_query($query)or die(mysql_error());

$header_abre='<html>
<head>
<title>Listado de stock</title>
</head>
<table border="1">
';

$header_cierra="</table>";

$header = "<tr>";
$header .= "<td>ID</td>";
$header .= "<td>Codigo</td>";
$header .= "<td>Marca</td>";
$header .= "<td>Descripcion</td>";
$header .= "<td>Contenido</td>";
$header .= "<td>Presentacion</td>";
$header .= "<td>clasificacion</td>";
$header .= "<td>Sub clasificacion</td>";
$header .= "<td>Precio</td>";
$header .= "<td>Fecha</td>";
$header .= "<td>Hora</td>";

fwrite($fopen, $header_abre);
fwrite($fopen, $header);

while($array_articulo=mysql_fetch_array($result)){
	$array_costo=array_costo( $array_articulo["id"] );
	$precio=calcula_precio_venta( $array_costo );
	$precio=($precio * 1.2) ;
	$linea="<tr>";

	$linea.="<td>".$array_articulo["id"]."</td>";
	$linea.="<td>".$array_articulo["codigo_interno"]."</td>";
	$linea.="<td>".$array_articulo["marca"]."</td>";
	$linea.="<td>".$array_articulo["descripcion"]."</td>";
	$linea.="<td>".$array_articulo["contenido"]."</td>";
	$linea.="<td>".$array_articulo["presentacion"]."</td>";
	$linea.="<td>".$array_articulo["clasificacion"]."</td>";
	$linea.="<td>".$array_articulo["subclasificacion"]."</td>";

	$linea.="<td>".str_replace('.',',',round($precio,2))."</td>";

	
	$linea.="<td>".$array_costo["fecha"]."</td>";
	$linea.="<td>".$array_costo["hora"]."</td>";
	$linea.="</tr>".chr(13);
	$data = $linea;
	fwrite($fopen, $data);

}

fwrite($fopen, $header_cierra);
fclose($fopen);
header('Location: /temp/'.$nombre_archivo);





/*
#---------------------------------------------------------------------------------------------
function calcula_precio_venta( $array_costos ){
	$temp1=( ( $array_costos["precio_costo"] * ( $array_costos["descuento1"] * -1 ) ) / 100 )+ $array_costos["precio_costo"];
	$temp1=( ( $temp1 * ( $array_costos["descuento2"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento3"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento4"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento5"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento6"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento7"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento8"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento9"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento10"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * $array_costos["iva"] ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * $array_costos["margen"] ) / 100 )+ $temp1;
	return round($temp1,6);
}
#---------------------------------------------------------------------------------------------

*/

?>