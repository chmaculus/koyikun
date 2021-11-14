<?php include("../../login/login_verifica.inc.php");

$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="0"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 

include_once("../../includes/connect.php");
include_once("../../includes/funciones_stock.php");
include_once("../../includes/funciones_precios.php");

$fecha=date("Y-n-d");
//$hora=date("H:i:s");

$query='select * from ventas order by vendedor, sucursal, numero_venta';
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

//Extract all data, format it, and assign to the $data variable
while($row=mysql_fetch_array($result)){
	$array_stock=stock_sucursal($row["id"], $id_sucursal);
	$array_precios=precio_sucursal($row["id"], $id_sucursal);

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
	$data .= "<tr>".$linea."</tr>".chr(13);
}

//$data = str_replace("r", "", $data);


//print $data Set the automatic download section 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=listado_ventas_".$fecha.".xls");
header("Pragma: no-cache");
header("Expires: 0");
print $header_abre.$header.$data.$header_cierra;

?>

