<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
  <meta content="text/html; charset=UTF-8" http-equiv="content-type" />
  <title>Sucursal control administrativo</title>
</head>
<body>
<center>
<?php
include("../../includes/connect.php");
include("../../includes/funciones_listas.php");
include("../../includes/funciones_precios.php");

$id_sucursal=$_COOKIE["id_sucursal"];
$id_articulos=$_GET["id_articulo"];

$array_articulo=get_articulo($_GET["id_articulo"]);
$array_precios=precio_sucursal( $_GET["id_articulo"], $id_sucursal );

echo "Marca: ".$array_articulo["marca"]."<br>";
echo "Descripcion: ".$array_articulo["descripcion"]."<br>";
echo "Clasificacion: ".$array_articulo["clasificacion"]."<br>";
?>
<table class="t1">
<tr>
<th>Lista</th>
<td>Precio</th>
</tr>

<?php

$array_precios=array_precios($id_articulos, "1");

$query='select * from listas where nombre!="mayorista" order by nombre';
$result=mysql_query($query)or die(mysql_error());
while($row=mysql_fetch_array($result)){
	$array_lista=get_listas_porcentaje($id_articulos, $row["id"]);
	$precio =( ( $array_precios["precio_base"] * $array_lista["porcentaje"] ) / 100 ) + $array_precios["precio_base"]; 
	echo '<tr>';
//	echo "<td>rows".$array_lista["rows"]."</td>";
	echo '<td>'.$row["nombre"].'</td>';
	echo '<td>$'.round( $precio, 2 ) .'-</td>';
//	echo '<td>'.$array_lista["porcentaje"].'-</td>';
	echo '</tr>';
}

//$veri_promo=verifica_promo($id_articulos, $id_sucursal , $precio_base);

if($veri_promo!="NO"){
	echo '<tr class="special">';
	echo '<td>Promocion</td>';
	echo '<td>$'.$veri_promo.'-</td>';
	echo '</tr>';
}

echo '</table>';

#-----------------------------------------------------------------
function get_articulo($id_articulo){
	$query='select * from articulos where id="'.$id_articulo.'"';
	$result=mysql_query($query);
	$array_articulos=mysql_fetch_array($result);
return $array_articulos;	
}
#-----------------------------------------------------------------

/*
#-----------------------------------------------------------------
function get_listas_porcentaje($id_articulos, $id_lista){
	$query='select * from listas_porcentaje where id_lista="'.$id_lista.'" and id_articulos="'.$id_articulos.'"';
	$result=mysql_query($query);
	if(mysql_error()){
		echo mysql_error();
	}
	$rows=mysql_num_rows($result);
	if($rows==1){
		$array_listas=mysql_fetch_array($result);
		$array_listas["rows"];
	}else{
		$array_listas["porcentaje"]=0;
		$array_listas["rows"];
	}
return $array_listas;
}

#-----------------------------------------------------------------
*/
?>

</center>
</body>
</html>

