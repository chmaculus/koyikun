<?php

include_once("connect.php");

$fecha=date("Y-n-d");
$hora=date("H_i_s");

$query='select * from clientes_persona';
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
$header .= "<td>apellido</td>";
$header .= "<td>nombres</td>";
$header .= "<td>dni</td>";
$header .= "<td>estado_civil</td>";
$header .= "<td>telefono</td>";
$header .= "<td>celular</td>";
$header .= "<td>email</td>";
$header .= "<td>profesion</td>";
$header .= "<td>usa_tarjeta</td>";
$header .= "<td>vendedor</td>";
$header .= "<td>sucursal</td>";
$header .= "<td>tel_comercial</td>";
$header .= "<td>dom_comercial</td>";
$header .= "<td>ciudad</td>";
$header .= "<td>provincia</td>";
$header .= "<td>carnet</td>";
$header .= "<td>codigo_barras</td>";
$header .= "<td>fecha_entrega</td>";
$header .= "<td>radio</td>";
$header .= "<td>canal</td>";
$header .= "<td>programas</td>";
$header .= "<td>fecha</td>";
$header .= "<td>hora</td>";
$header .= "</tr>".chr(13);

while($row=mysql_fetch_array($result)){
	$linea="<tr>";
	$linea.="<td>". $row["id"]."</td>";
	$linea.="<td>". $row["apellido"]."</td>";
	$linea.="<td>". $row["nombres"]."</td>";
	$linea.="<td>". $row["dni"]."</td>";
	$linea.="<td>". $row["estado_civil"]."</td>";
	$linea.="<td>". $row["telefono"]."</td>";
	$linea.="<td>". $row["celular"]."</td>";
	$linea.="<td>". $row["email"]."</td>";
	$linea.="<td>". $row["profesion"]."</td>";
	$linea.="<td>". $row["usa_tarjeta"]."</td>";
	$linea.="<td>". $row["vendedor"]."</td>";
	$linea.="<td>". $row["sucursal"]."</td>";
	$linea.="<td>". $row["tel_comercial"]."</td>";
	$linea.="<td>". $row["dom_comercial"]."</td>";
	$linea.="<td>". $row["ciudad"]."</td>";
	$linea.="<td>". $row["provincia"]."</td>";
	$linea.="<td>". $row["carnet"]."</td>";
	$linea.="<td>". $row["codigo_barras"]."</td>";
	$linea.="<td>". $row["fecha_entrega"]."</td>";
	$linea.="<td>". $row["radio"]."</td>";
	$linea.="<td>". $row["canal"]."</td>";
	$linea.="<td>". $row["programas"]."</td>";
	$linea.="<td>". $row["fecha"]."</td>";
	$linea.="<td>". $row["hora"]."</td>";
	$linea.="</tr>".chr(13);
	$data .= $linea;
}

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=listado_clientes_persona_".$fecha."_".$hora.".xls");
header("Pragma: no-cache");
header("Expires: 0");
print $header_abre.$header.$data.$header_cierra;

?>
