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
$query='update articulos set codigo_barra="'.$_POST["codigo_barra"].'" where id="'.$_POST["id_articulos"].'"';
echo "query: ".$query."<br>".chr(13);
mysql_query($query)or die(mysql_error());

$query='select * from articulos where id="'.$_POST["id_articulos"].'"';
$result=mysql_query($query) or die(mysql_error()." ".$SCRIPT_NAME);
$array_articulos=mysql_fetch_array($result);

echo '<table border=1>';
	echo '<tr><td><font1>marca</font1></td>';
	echo '<td><font1>'.$array_articulos["marca"].'</font1></td></tr>';
	echo '<tr><td><font1>descripcion</font1></td>';
	echo '<td><font1>'.$array_articulos["descripcion"].'</font1></td></tr>';
	echo '<tr><td><font1>contenido</font1></td>';
	echo '<td><font1>'.$array_articulos["contenido"].'</font1></td></tr>';
	echo '<tr><td><font1>presentacion</font1></td>';
	echo '<td><font1>'.$array_articulos["presentacion"].'</font1></td></tr>';
	echo '<tr><td><font1>codigo_barra</font1></td>';
	echo '<td><font1>'.$array_articulos["codigo_barra"].'</font1></td></tr>';
	echo '<tr><td><font1>fecha</font1></td>';
	echo '<td><font1>'.$array_articulos["fecha"].'</font1></td></tr>';
	echo '<tr><td><font1>hora</font1></td>';
	echo '<td><font1>'.$array_articulos["hora"].'</font1></td></tr>';
	echo '<tr><td><font1>clasificacion</font1></td>';
	echo '<td><font1>'.$array_articulos["clasificacion"].'</font1></td></tr>';
	echo '<tr><td><font1>subclasificacion</font1></td>';
	echo '<td><font1>'.$array_articulos["subclasificacion"].'</font1></td></tr>';
echo '</table>';

?>
</body>
</center>
</html>
