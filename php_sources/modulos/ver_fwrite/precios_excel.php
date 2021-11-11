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
$header .= "<td>Codigo</td>";
$header .= "<td>Marca</td>";
$header .= "<td>Descripcion</td>";
$header .= "<td>Contenido</td>";
$header .= "<td>Presentacion</td>";
$header .= "<td>clasificacion</td>";
$header .= "<td>subclasificacion</td>";

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