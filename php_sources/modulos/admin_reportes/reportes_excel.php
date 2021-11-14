<?php

include_once("connect.php");
include_once("../../includes/funciones_varias.php");

$fecha_desde=base64_decode($_GET["fecha_desde"]);
$fecha_hasta=base64_decode($_GET["fecha_hasta"]);

$fecha=date("Y-n-d");
$hora=date("H_i_s");

//$query='select * from reportes';
$query='select * from reportes where fecha>="'.fecha_conv("/",$fecha_desde).'" and fecha<="'.fecha_conv("/",$fecha_hasta).'" order by fecha, hora';
$result = mysql_query($query)or die(mysql_error());

$header_abre='<html>
<head>
</head>
<table border="1">
';

$header_cierra="</table>";

$header = "<tr>";
$header .= "<td>Sucursal</td>";
$header .= "<td>Motivo</td>";
$header .= "<td>Texto</td>";
$header .= "<td>Fecha</td>";
$header .= "<td>Hora</td>";
$header .= "</tr>".chr(13);

while($row=mysql_fetch_array($result)){
	$linea="<tr>";
	$linea.="<td>". nombre_sucursal($row["id_sucursal"])."</td>";
	$linea.="<td>". $row["motivo"]."</td>";
	$linea.="<td>". $row["texto"]."</td>";
	$linea.="<td>". $row["fecha"]."</td>";
	$linea.="<td>". $row["hora"]."</td>";
	$linea.="</tr>".chr(13);
	$data .= $linea;
}

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=listado_reportes_desde_".$fecha_desde."_hasta_".$fecha_hasta.".xls");
header("Pragma: no-cache");
header("Expires: 0");
print $header_abre.$header.$data.$header_cierra;

?>
