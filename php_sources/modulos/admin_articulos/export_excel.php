<?php include("../login/login_verifica.inc.php");

$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="0"){
	header('Location: ../login/login_nologin.php?nologin=6');
	exit;
} ?>

<?php
include_once("../includes/connect.php");

$fecha=date("Y-n-d");
//$hora=date("H:i:s");
$id_sucursal=$_POST["id_sucursal"];

/*
query: select articulos.marca, 
					articulos.descripcion, 
					articulos.clasificacion, 
					articulos.subclasificacion, 
						from articulos where articulos.marca="ALISSE"
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

$header = "<th>Marca</th>".chr(13);
$header .= "<th>Descripcion</th>".chr(13);
$header .= "<th>Clasificacion</th>".chr(13);
$header .= "<th>Subclasificacion</th>".chr(13);
$header .= "<th>Stock</th>".chr(13);
$header .= "<th>Minimo</th>".chr(13);
$header .= "<th>Maximo</th>".chr(13);
$header .= "<th>Reponer</th>".chr(13);

//Extract all data, format it, and assign to the $data variable
while($row=mysql_fetch_array($result)){
	$linea="	<td>". $row[0]."</td>";
	$linea.="	<td>".$row[1]."</td>";
	$linea.="	<td>".$row[2]."</td>";
	$linea.="	<td>".$row[3]."</td>";
	$linea.="	<td>".$row[4]."</td>";
	$linea.="	<td>".$row[5]."</td>";
	$linea.="	<td>".$row[6]."</td>".chr(13);
	$linea.="	<td>".($row[6] - $row[4])."</td>";
	$data .= "	<tr>".$linea."</tr>";
}

//$data = str_replace("r", "", $data);


//print $data Set the automatic download section 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=listado_articulos_".$marca."_".$fecha.".xls");
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

