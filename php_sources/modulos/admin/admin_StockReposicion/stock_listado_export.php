<?php
include_once("../../includes/connect.php");
include_once("../login/login_verifica.inc.php");
include_once("seguridad_1.inc.php");

$fecha=date("Y-n-d");
//$hora=date("H:i:s");
$id_sucursal=$_POST["id_sucursal"];
$nombre_sucursal=str_replace(" ","_",nombre_sucursal($id_sucursal));

/*
query: select * from articulos where articulos.marca="A. R. NOVAL"
*/

$query=base64_decode($_POST["query"]);
$result = mysql_query($query)or die(mysql_error());

$header_abre='<html>
<head>
<title>Listado de stock</title>
</head>
<table border="1">
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
$header .= "<th>Stock</th>";
$header .= "<th>Minimo</th>";
$header .= "<th>Minimo</th>";
$header .= "<th>Sucursal</th>".chr(13);

//Extract all data, format it, and assign to the $data variable
while($row=mysql_fetch_array($result)){
	$array_stock=stock_sucursal($row["id"], $id_sucursal);
	$array_precios=precio_sucursal($row["id"], $id_sucursal);

	$linea="<td>". $row["id"]."</td>";
	$linea.="<td>".$row["codigo_interno"]."</td>";
	$linea.="<td>".$row["marca"]."</td>";
	$linea.="<td>".$row["descripcion"]."</td>";
	$linea.="<td>".$row["contenido"]."</td>";
	$linea.="<td>".$row["presentacion"]."</td>";
	$linea.="<td>".$row["clasificacion"]."</td>";
	$linea.="<td>".$row["subclasificacion"]."</td>";

	$precio_contado=(( $array_precios["precio_base"] * $array_precios["porcentaje_contado"] ) / 100) + $array_precios["precio_base"];
	$precio_tarjeta=$array_precios["porcentaje_tarjeta"];

	$linea.="<td>".$precio_contado."</td>";
	$linea.="<td>".$precio_tarjeta."</td>";

	$linea.="<td>".$array_stock["stock"]."</td>";
	$linea.="<td>".$array_stock["maximo"]."</td>";
	$linea.="<td>".$array_stock["minimo"]."</td>";
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




#-----------------------------------------------------------------
function precio($id_articulo){
	$query='select * from precios where id_articulo="'.$id_articulo.'" and id_sucursal="1"';
	$res=mysql_query($query) or die(mysql_error()." ".$SCRIPT_NAME);
	$rows=mysql_num_rows($res);
	if($rows==1){
		$array_precios=mysql_fetch_array($res);
		$precio=$array_precios["precio_base"];
		return $precio;		
	}
	if($rows>1){
		$precio="0";
		return $precio;		
	}
return $precio;
}
#-----------------------------------------------------------------



?>

