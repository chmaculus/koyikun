<?php include("login_verifica.inc.php");

$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="2"){
	header('Location: login_nologin.php?nologin=6');
	exit;
} ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
  <meta content="text/html; charset=UTF-8" http-equiv="content-type" />
  <title>Sucursal control administrativo</title>
</head>

<body onLoad=document.modificar.codigo_barra.focus()>
<center>
<?php
include_once("../../includes/connect.php");
include_once("../../includes/funciones_varias.php");
#include("articulos_base.php");
?>

<form name="modificar" action="codigo_barra_update.php" method="post">
<?php

if(!$_GET["id_articulo"]){
	exit;
}
$array_articulos=mysql_fetch_array(mysql_query('select * from articulos where id="'.$_GET["id_articulo"].'"'));

echo '<table border="1">';
	echo '<tr><td><font1>marca</font1></td>';
	echo '<td><font1>'.$array_articulos["marca"].'</font1></td></tr>';
	echo '<tr><td><font1>descripcion</font1></td>';
	echo '<td><font1>'.$array_articulos["descripcion"].'</font1></td></tr>';
	echo '<tr><td><font1>contenido</font1></td>';
	echo '<td><font1>'.$array_articulos["contenido"].'</font1></td></tr>';
	echo '<tr><td><font1>presentacion</font1></td>';
	echo '<td><font1>'.$array_articulos["presentacion"].'</font1></td></tr>';
	echo '<tr><td><font1>codigo_barra</font1></td>';
	echo '<td><input type="text" name="codigo_barra" value="'.$array_articulos["codigo_barra"].'" size="15"></td></tr>';
	echo '<tr><td><font1>fecha</font1></td>';
	echo '<td><font1>'.$array_articulos["fecha"].'</font1></td></tr>';
	echo '<tr><td><font1>hora</font1></td>';
	echo '<td><font1>'.$array_articulos["hora"].'</font1></td></tr>';
	echo '<tr><td><font1>clasificacion</font1></td>';
	echo '<td><font1>'.$array_articulos["clasificacion"].'</font1></td></tr>';
	echo '<tr><td><font1>subclasificacion</font1></td>';
	echo '<td><font1>'.$array_articulos["subclasificacion"].'</font1></td></tr>';
echo '</table>';
echo '<input type="hidden" name="id_articulos" value="'.$_GET["id_articulo"].'">';
//input_hidden("id_articulos",$_GET["id_articulo"]);

?>

<input type="submit" name="modificar" value="MODIFICAR">
</form>
</center>
</body>
</html>
