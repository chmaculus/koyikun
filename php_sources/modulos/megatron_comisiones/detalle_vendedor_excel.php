<?php

include_once("connect.php");
include_once("funciones.php");

$fecha=date("Y-n-d");
$hora=date("H_i_s");

$query=base64_decode($_POST["query"]);
//echo "decodequery: ".base64_decode($query)."<br>".chr(13);

$result = mysql_query($query)or die(mysql_error());

$header_abre='<html>
<head>
<title>Listado de stock</title>
</head>
<table border="1">
';

$header_cierra="</table>";

$header = "<tr>";
$header .= "<td>fecha</td>";
$header .= "<td>turno</td>";
$header .= "<td>vendedor</td>";
$header .= "<td>linea</td>";
$header .= "<td>total</td>";
$header .= "<td>fecha_sistema</td>";
$header .= "<td>hora_sistema</td>";
$header .= "</tr>".chr(13);

while($row=mysql_fetch_array($result)){
	$linea="<tr>";
	$linea.="<td>". $row["fecha"]."</td>";
	$linea.="<td>". $row["turno"]."</td>";
	$linea.="<td>". $row["vendedor"]."</td>";
	$linea.="<td>". $row["linea"]."</td>";
	$linea.="<td>". str_replace('.' , ',' , $row["total"])."</td>";
	$linea.="<td>". $row["fecha_sistema"]."</td>";
	$linea.="<td>". $row["hora_sistema"]."</td>";
	$linea.="</tr>".chr(13);
	$data .= $linea;
}




$q='select distinct linea from comisiones_vendedores where vendedor="'.$_POST["vendedor"].'" and fecha>="'.$_POST["desde"].'" and fecha<="'.$_POST["hasta"].'" order by linea';
$res=mysql_query($q)or die(mysql_error()." ".$q);

while($row=mysql_fetch_array($res)){
	$total_marca=calcula_total_marca_vendedor( $row["linea"], $_POST["vendedor"], $_POST["desde"], $_POST["hasta"] );
	$linea2="<tr>";
	$linea2.="<td>Total</td><td>". $row["linea"]."</td><td>".$total_marca."</td>";
	$linea2.="</tr>".chr(13);
	$data2 .= $linea2;
}


header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=listado_comisiones_vendedores_".$fecha."_".$hora.".xls");
header("Pragma: no-cache");
header("Expires: 0");
print $header_abre.$header.$data.$header_cierra.$data2;
//print $data2;

?>