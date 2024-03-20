<?php include_once("../login/login_verifica.inc.php");

include_once("../seguridad.inc.php"); 

include_once("../../includes/connect.php");
include_once("../../includes/funciones_precios.php");

$fecha=date("Y-n-d");
//$hora=date("H:i:s");
$id_sucursal=$_POST["id_sucursal"];
$nombre_sucursal=str_replace(" ","_",nombre_sucursal($id_sucursal));

$marca=str_replace( "'","",base64_decode($_POST["marca2"]) );
$marca=str_replace('"','',$marca);
/*
query: select * from articulos where articulos.marca="A. R. NOVAL"
*/

$query=base64_decode($_POST["query"]);
$result = mysql_query($query)or die(mysql_error());

$header_abre='<html>
<table border="0">
';
$header_cierra="</table>";

$header = "<th>Id</th>";
$header .= "<th>Codigo</th>";
$header .= "<th>Marca</th>";
$header .= "<th>Descripcion</th>";
$header .= "<th>Contenido</th>";
$header .= "<th>Presentacion</th>";
$header .= "<th>Clasificacion</th>";
$header .= "<th>Subclasificacion</th>";
$header .= "<th>Precio contado</th>";
$header .= "<th>Porcentaje tarjeta</th>";
$header .= "<th>Fecha precios</th>";
$header .= "<th>Stock</th>";
$header .= "<th>Fecha stock</th>".chr(13);

//Extract all data, format it, and assign to the $data variable
while($row=mysql_fetch_array($result)){
	$array_stock=stock_sucursal($row["id"], $id_sucursal);
	$array_precios=precio_sucursal($row["id"], 1);

	$linea="<td>". $row["id"]."</td>";
	$linea.="<td>".$row["codigo_interno"]."</td>";
	$linea.="<td>".$row["marca"]."</td>";
	$linea.="<td>".$row["descripcion"]."</td>";
	$linea.="<td>".$row["contenido"]."</td>";
	$linea.="<td>".$row["presentacion"]."</td>";
	$linea.="<td>".$row["clasificacion"]."</td>";
	$linea.="<td>".$row["subclasificacion"]."</td>";

	$precio_contado=(( $array_precios["precio_base"] * $array_precios["porcentaje_contado"] ) / 100) + $array_precios["precio_base"];
	$precio_tarjeta=(( $array_precios["precio_base"] * $array_precios["porcentaje_tarjeta"] ) / 100) + $array_precios["precio_base"];

	$linea.="<td>".str_replace( "." , "," ,$precio_contado )."</td>";
	$linea.="<td>".str_replace( "." , "," ,$precio_tarjeta )."</td>";
	$linea.="<td>".$array_precios["fecha"]."</td>";

	$linea.="<td>".$array_stock["stock"]."</td>";
	$linea.="<td>".$array_stock["fecha"]."</td>";
	$data .= "<tr>".$linea."</tr>".chr(13);
}


//print $data Set the automatic download section 
header("Content-type: application/octet-stream");
header('Content-Disposition: attachment; filename=listado_'.$nombre_sucursal.'_'.$marca.'_'.$fecha.'.xls');
header("Pragma: no-cache");
header("Expires: 0");
print $header_abre.$header.$data.$header_cierra;


?>