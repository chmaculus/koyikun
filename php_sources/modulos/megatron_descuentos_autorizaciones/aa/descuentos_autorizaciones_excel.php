<?php

include_once("connect.php");

$fecha=date("Y-n-d");
$hora=date("H_i_s");

$query='select * from descuentos_autorizaciones';
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
$header .= "<td>n_carnet</td>";
$header .= "<td>nombre</td>";
$header .= "<td>apellido</td>";
$header .= "<td>id_sucursal</td>";
$header .= "<td>codigo</td>";
$header .= "</tr>".chr(13);

while($row=mysql_fetch_array($result)){
	$linea="<tr>";
	$linea.="<td>". $row["id"]."</td>";
	$linea.="<td>". $row["n_carnet"]."</td>";
	$linea.="<td>". $row["nombre"]."</td>";
	$linea.="<td>". $row["apellido"]."</td>";
	$linea.="<td>". $row["id_sucursal"]."</td>";
	$linea.="<td>". $row["codigo"]."</td>";
	$linea.="</tr>".chr(13);
	$data .= $linea;
}

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=listado_descuentos_autorizaciones_".$fecha."_".$hora.".xls");
header("Pragma: no-cache");
header("Expires: 0");
print $header_abre.$header.$data.$header_cierra;

?>
