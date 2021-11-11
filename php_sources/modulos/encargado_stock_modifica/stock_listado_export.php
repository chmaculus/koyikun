<?php
include_once("../includes/connect.php");
include_once("../login/login_verifica.inc.php");
include_once("seguridad.php");

include_once("../includes/funciones.php");

$fecha=date("Y-n-d");
//$hora=date("H:i:s");

$nombre_sucursal=str_replace(" ","_",nombre_sucursal($id_sucursal));

$query='select * from articulos order by marca, clasificacion, subclasificacion, descripcion';
$result = mysql_query($query)or die(mysql_error());

$header_abre='<html>
<head>
<title>Listado de stock</title>
</head>
<table border="1">
';

$header_cierra="</table>";

$header = "<tr><td>Id</td>";
$header .= "<td>Codigo</td>";
$header .= "<td>Marca</td>";
$header .= "<td>Descripcion</td>";
$header .= "<td>Contenido</td>";
$header .= "<td>Presentacion</td>";
$header .= "<td>Clasificacion</td>";
$header .= "<td>Subclasificacion</td>";
$header .= "<td>Precio contado</td>";
$header .= "<td>Porcentaje tarjeta</td>";
$header .= "<td>Stock</td>";
$header .= "<td>Minimo</td>";
$header .= "<td>Maximo</td>";
$header .= "<td>Sucursal</td></tr>".chr(13);

//Extract all data, format it, and assign to the $data variable
while($row=mysql_fetch_array($result)){
	$array_stock=stock_sucursal($row["id"], $id_sucursal);
	$array_precios=precio_sucursal($row["id"], $id_sucursal);

	$precio_contado=(( $array_precios["precio_base"] * $array_precios["porcentaje_contado"] ) / 100) + $array_precios["precio_base"];
	$precio_tarjeta=$array_precios["porcentaje_tarjeta"];


	$linea="<td>". $row["id"]."</td>";
	$linea.="<td>".$row["codigo_interno"]."</td>";
	$linea.="<td>".$row["marca"]."</td>";
	$linea.="<td>".$row["descripcion"]."</td>";
	$linea.="<td>".$row["contenido"]."</td>";
	$linea.="<td>".$row["presentacion"]."</td>";
	$linea.="<td>".$row["clasificacion"]."</td>";
	$linea.="<td>".$row["subclasificacion"]."</td>";

	$linea.="<td>".$precio_contado."</td>";
	$linea.="<td>".$precio_tarjeta."</td>";

	$linea.="<td>".$array_stock["stock"]."</td>";
	$linea.="<td>".$array_stock["minimo"]."</td>";
	$linea.="<td>".$array_stock["maximo"]."</td>";
	$linea.="<td>".$id_sucursal."</td>";
	$data .= "<tr>".$linea."</tr>".chr(13);
}

//$data = str_replace("r", "", $data);


//print $data Set the automatic download section 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=listado_stock_".$nombre_sucursal."_".$fecha.".xls");
header("Pragma: no-cache");
header("Expires: 0");
print $header_abre.$header.$data.$header_cierra;

?>

