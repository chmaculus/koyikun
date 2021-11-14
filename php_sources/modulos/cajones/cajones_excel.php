<?php

include_once("connect.php");

$fecha=date("Y-n-d");
$hora=date("H_i_s");

$query='select * from cajones';
$result = mysql_query($query)or die(mysql_error());

$header_abre='<html>
<head>
<title>Listado de stock</title>
</head>
<table border="1">
';

$header_cierra="</table>";

$header = "<tr>";
$header .= "<td>id</td>";
$header .= "<td>numero</td>";
$header .= "<td>id_sucursal_origen</td>";
$header .= "<td>id_sucursal_destino</td>";
$header .= "<td>vendedor_envia</td>";
$header .= "<td>vendedor_recibe</td>";
$header .= "<td>fechao</td>";
$header .= "<td>horao</td>";
$header .= "<td>fechad</td>";
$header .= "<td>horad</td>";
$header .= "<td>estado</td>";
$header .= "</tr>".chr(13);

while($row=mysql_fetch_array($result)){
	$linea="<tr>";
	$linea.="<td>". $row["id"]."</td>";
	$linea.="<td>". $row["numero"]."</td>";
	$linea.="<td>". $row["id_sucursal_origen"]."</td>";
	$linea.="<td>". $row["id_sucursal_destino"]."</td>";
	$linea.="<td>". $row["vendedor_envia"]."</td>";
	$linea.="<td>". $row["vendedor_recibe"]."</td>";
	$linea.="<td>". $row["fechao"]."</td>";
	$linea.="<td>". $row["horao"]."</td>";
	$linea.="<td>". $row["fechad"]."</td>";
	$linea.="<td>". $row["horad"]."</td>";
	$linea.="<td>". $row["estado"]."</td>";
	$linea.="</tr>".chr(13);
	$data .= $linea;
}

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=listado_cajones_".$fecha."_".$hora.".xls");
header("Pragma: no-cache");
header("Expires: 0");
print $header_abre.$header.$data.$header_cierra;

?>
