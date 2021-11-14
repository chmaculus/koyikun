<?php

include_once("connect.php");

$fecha=date("Y-n-d");
$hora=date("H_i_s");

$query='select * from clientes';
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
$header .= "<td>razon_social</td>";
$header .= "<td>nombres</td>";
$header .= "<td>condicion_iva</td>";
$header .= "<td>cuit</td>";
$header .= "<td>tipo_cliente</td>";
$header .= "<td>carnet</td>";
$header .= "<td>direccion</td>";
$header .= "<td>ciudad</td>";
$header .= "<td>provincia</td>";
$header .= "<td>pais</td>";
$header .= "<td>codigo_postal</td>";
$header .= "<td>email</td>";
$header .= "<td>pagina_web</td>";
$header .= "<td>telefonos</td>";
$header .= "<td>fax</td>";
$header .= "<td>vendedor</td>";
$header .= "<td>informacion_contacto</td>";
$header .= "<td>observaciones</td>";
$header .= "<td>sucursal</td>";
$header .= "<td>fecha</td>";
$header .= "<td>hora</td>";
$header .= "</tr>".chr(13);

while($row=mysql_fetch_array($result)){
	$linea="<tr>";
	$linea.="<td>". $row["id"]."</td>";
	$linea.="<td>". $row["razon_social"]."</td>";
	$linea.="<td>". $row["nombres"]."</td>";
	$linea.="<td>". $row["condicion_iva"]."</td>";
	$linea.="<td>". $row["cuit"]."</td>";
	$linea.="<td>". $row["tipo_cliente"]."</td>";
	$linea.="<td>". $row["carnet"]."</td>";
	$linea.="<td>". $row["direccion"]."</td>";
	$linea.="<td>". $row["ciudad"]."</td>";
	$linea.="<td>". $row["provincia"]."</td>";
	$linea.="<td>". $row["pais"]."</td>";
	$linea.="<td>". $row["codigo_postal"]."</td>";
	$linea.="<td>". $row["email"]."</td>";
	$linea.="<td>". $row["pagina_web"]."</td>";
	$linea.="<td>". $row["telefonos"]."</td>";
	$linea.="<td>". $row["fax"]."</td>";
	$linea.="<td>". $row["vendedor"]."</td>";
	$linea.="<td>". $row["informacion_contacto"]."</td>";
	$linea.="<td>". $row["observaciones"]."</td>";
	$linea.="<td>". $row["sucursal"]."</td>";
	$linea.="<td>". $row["fecha"]."</td>";
	$linea.="<td>". $row["hora"]."</td>";
	$linea.="</tr>".chr(13);
	$data .= $linea;
}

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=listado_clientes_".$fecha."_".$hora.".xls");
header("Pragma: no-cache");
header("Expires: 0");
print $header_abre.$header.$data.$header_cierra;

?>
