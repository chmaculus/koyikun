<?php
include("../../login/login_verifica.inc.php");

$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="0"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 

include_once("../../includes/connect.php");
include_once("../../includes/funciones_costos.php");

$fecha=date("Y-n-d");
$hora=date("H_i_s");

$user_path='/var/www/temp/';
$nombre_archivo='listado_costos_'.$fecha.'_'.$hora.'.xls';
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
$header .= "<td>Codigo</td>";
$header .= "<td>Marca</td>";
$header .= "<td>Descripcion</td>";
$header .= "<td>Contenido</td>";
$header .= "<td>Presentacion</td>";
$header .= "<td>clasificacion</td>";
$header .= "<td>subclasificacion</td>";

$header .= "<td>Costo</td>";
$header .= "<td>Desc1</td>";
$header .= "<td>Desc2</td>";
$header .= "<td>Desc3</td>";
$header .= "<td>Desc4</td>";
$header .= "<td>Desc5</td>";
$header .= "<td>Desc6</td>";
$header .= "<td>Desc7</td>";
$header .= "<td>Desc8</td>";
$header .= "<td>Desc9</td>";
$header .= "<td>Desc10</td>";
$header .= "<td>I.V.A.</td>";
$header .= "<td>Margen</td>";
$header .= "<td>P. costo</td>";
$header .= "<td>Fecha</td>";
$header .= "<td>Hora</td>";
$header .= "</tr>".chr(13);

fwrite($fopen, $header_abre);
fwrite($fopen, $header);

while($array_articulo=mysql_fetch_array($result)){
	$array_costo=array_costo( $array_articulo["id"] );
	$precio_costo=calcula_precio_costo( $array_articulo["id"] );
	$linea="<tr>";

	$linea.="<td>".$array_articulo["codigo_interno"]."</td>";
	$linea.="<td>".$array_articulo["marca"]."</td>";
	$linea.="<td>".$array_articulo["descripcion"]."</td>";
	$linea.="<td>".$array_articulo["contenido"]."</td>";
	$linea.="<td>".$array_articulo["presentacion"]."</td>";
	$linea.="<td>".$array_articulo["clasificacion"]."</td>";
	$linea.="<td>".$array_articulo["subclasificacion"]."</td>";
	
	$linea.="<td>".str_replace('.',',',$array_costo["precio_costo"])."</td>";
	$linea.="<td>".$array_costo["descuento1"]."</td>";
	$linea.="<td>".$array_costo["descuento2"]."</td>";
	$linea.="<td>".$array_costo["descuento3"]."</td>";
	$linea.="<td>".$array_costo["descuento4"]."</td>";
	$linea.="<td>".$array_costo["descuento5"]."</td>";
	$linea.="<td>".$array_costo["descuento6"]."</td>";
	$linea.="<td>".$array_costo["descuento7"]."</td>";
	$linea.="<td>".$array_costo["descuento8"]."</td>";
	$linea.="<td>".$array_costo["descuento9"]."</td>";
	$linea.="<td>".$array_costo["descuento10"]."</td>";
	$linea.="<td>".$array_costo["iva"]."</td>";
	$linea.="<td>".$array_costo["margen"]."</td>";
	$linea.="<td>".str_replace('.',',',$precio_costo)."</td>";
	$linea.="<td>".$array_costo["fecha"]."</td>";
	$linea.="<td>".$array_costo["hora"]."</td>";
	$linea.="</tr>".chr(13);
	$data = $linea;
	fwrite($fopen, $data);

}

fwrite($fopen, $header_cierra);
fclose($fopen);
header('Location: /temp/'.$nombre_archivo);



?>