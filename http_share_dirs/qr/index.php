<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type" />
  <title>Tablabla articulos By Christian Máculus</title>
</head>



<?php
if(!$_GET["id_articulo"]){
    exit;
}


include("includes/connect.php");
include("includes/funciones_precios.php");

#muestra registro ingresado
$query='select * from articulos where id="'.$_GET["id_articulo"].'"';
$result=mysql_query($query);

if(mysql_error()){
    echo mysql_error();
}

$array_articulos=mysql_fetch_array($result);

$array_precio=precio_sucursal($_GET["id_articulo"],1);



#----------------------------------------
echo '<center>';
echo '<table border="1">';
	echo '<tr>';
		echo '<th>id</th>';
		echo '<td>'.$array_articulos["id"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>codigo_interno</th>';
		echo '<td>'.$array_articulos["codigo_interno"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>marca</th>';
		echo '<td>'.$array_articulos["marca"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>descripcion</th>';
		echo '<td>'.$array_articulos["descripcion"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>contenido</th>';
		echo '<td>'.$array_articulos["contenido"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>presentacion</th>';
		echo '<td>'.$array_articulos["presentacion"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>codigo_barra</th>';
		echo '<td>'.$array_articulos["codigo_barra"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>fecha</th>';
		echo '<td>'.$array_articulos["fecha"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>hora</th>';
		echo '<td>'.$array_articulos["hora"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>clasificacion</th>';
		echo '<td>'.$array_articulos["clasificacion"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>subclasificacion</th>';
		echo '<td>'.$array_articulos["subclasificacion"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>Precio contado</th>';
		echo '<td><font size="5">$'.$array_precio["precio_base"].'</font></td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>Tarjeta</th>';
		echo '<td>$'.round($array_precio["precio_base"] * 1.2,2).'</td>';
	echo '</tr>';
echo "</table>";
#----------------------------------------



?>
