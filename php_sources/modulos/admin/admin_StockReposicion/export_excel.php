<?php include_once("../login/login_verifica.inc.php");

include_once("../seguridad.inc.php"); ?>

<?php
include_once("../../includes/connect.php");
include_once("../../includes/funciones_varias.php");

$fecha=date("Y-n-d");
//$hora=date("H:i:s");
$id_sucursal=$_POST["id_sucursal"];
$nombre_sucursal=str_replace(" ","_",nombre_sucursal($id_sucursal));

/*
query: select articulos.marca, 
					articulos.descripcion, 
					articulos.clasificacion, 
					articulos.subclasificacion, 
					stock.stock, 
					stock.minimo, 
					stock.maximo 
						from articulos,stock where articulos.id=stock.id_articulo and articulos.marca="ALISSE" and stock.stock < stock.minimo and stock.id_sucursal="10"
*/


$query=base64_decode($_POST["query"]);
$result = mysql_query($query)or die(mysql_error());

$header_abre='<html>
<head>
<title>Reposicion de stock</title>
</head>
<table border="1">
';

$header_cierra="</table>";

$header = "<th>Codigo</th>";
$header .= "<th>Marca</th>";
$header .= "<th>Descripcion</th>";
$header .= "<th>Contenido</th>";
$header .= "<th>Presentacion</th>";
$header .= "<th>Clasificacion</th>";
$header .= "<th>Subclasificacion</th>";
$header .= "<th>Stock</th>";
$header .= "<th>Minimo</th>";
$header .= "<th>Maximo</th>";
$header .= "<th>Reponer</th>".chr(13);

//Extract all data, format it, and assign to the $data variable
while($row=mysql_fetch_array($result)){
	$linea="<td>". $row[9]."</td>";
	$linea.="<td>". $row[0]."</td>";
	$linea.="<td>".$row[1]."</td>";
	$linea.="<td>".$row[7]."</td>";
	$linea.="<td>".$row[8]."</td>";
	$linea.="<td>".$row[2]."</td>";
	$linea.="<td>".$row[3]."</td>";
	$linea.="<td>".$row[4]."</td>";
	$linea.="<td>".$row[5]."</td>";
	$linea.="<td>".$row[6]."</td>";
	$linea.="<td>".($row[6] - $row[4])."</td>";
	$data .= "<tr>".$linea."</tr>".chr(13);
}



//print $data Set the automatic download section 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=repocision_stock_".$nombre_sucursal."_".$fecha.".xls");
header("Pragma: no-cache");
header("Expires: 0");
print $header_abre.$header.$data.$header_cierra;

?>

