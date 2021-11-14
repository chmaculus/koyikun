<?php

include_once("connect.php");

$fecha=date("Y-n-d");
$hora=date("H_i_s");

$query='select * from asistencias';
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
$header .= "<td>id_sucursal</td>";
$header .= "<td>vendedor</td>";
$header .= "<td>fecha</td>";
$header .= "<td>hora</td>";
$header .= "</tr>".chr(13);

while($row=mysql_fetch_array($result)){
	$linea="<tr>";
	$linea.="<td>". $row["id"]."</td>";
	$linea.="<td>". $row["id_sucursal"]."</td>";
	$linea.="<td>". $row["vendedor"]."</td>";
	$linea.="<td>". $row["fecha"]."</td>";
	$linea.="<td>". $row["hora"]."</td>";
	$linea.="</tr>".chr(13);
	$data .= $linea;
}

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=listado_asistencias_".$fecha."_".$hora.".xls");
header("Pragma: no-cache");
header("Expires: 0");
print $header_abre.$header.$data.$header_cierra;

?>
