<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
  <meta content="text/html; charset=UTF-8" http-equiv="content-type" />
  <title>Tablabla articulos By Christian Máculus</title>
</head>



<center>
<?php
include("includes/connect.php");
$query='select articulos.* from articulos,usuarios_lineas where articulos.marca=usuarios_lineas.marca and id_usuario=187';
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table class="t1">';
echo "<tr>";
	echo "<th>id</th>";
	echo "<th>codigo_interno</th>";
	echo "<th>marca</th>";
	echo "<th>descripcion</th>";
	echo "<th>contenido</th>";
	echo "<th>presentacion</th>";
	echo "<th>codigo_barra</th>";
	echo "<th>fecha</th>";
	echo "<th>hora</th>";
	echo "<th>clasificacion</th>";
	echo "<th>subclasificacion</th>";
	echo "<th>id_web</th>";
	echo "<th>publicar_web</th>";
	echo "<th>discontinuo</th>";
	echo "<th>lanzamiento</th>";
	echo "<th>codigo_af</th>";
	echo "<th>marca_corta</th>";
	echo "<th>color</th>";
	echo "<th>observaciones</th>";
	echo "<th>prom_asoc</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["codigo_interno"].'</td>';
	echo '<td>'.$row["marca"].'</td>';
	echo '<td>'.$row["descripcion"].'</td>';
	echo '<td>'.$row["contenido"].'</td>';
	echo '<td>'.$row["presentacion"].'</td>';
	echo '<td>'.$row["codigo_barra"].'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["hora"].'</td>';
	echo '<td>'.$row["clasificacion"].'</td>';
	echo '<td>'.$row["subclasificacion"].'</td>';
	echo '<td>'.$row["id_web"].'</td>';
	echo '<td>'.$row["publicar_web"].'</td>';
	echo '<td>'.$row["discontinuo"].'</td>';
	echo '<td>'.$row["lanzamiento"].'</td>';
	echo '<td>'.$row["codigo_af"].'</td>';
	echo '<td>'.$row["marca_corta"].'</td>';
	echo '<td>'.$row["color"].'</td>';
	echo '<td>'.$row["observaciones"].'</td>';
	echo '<td>'.$row["prom_asoc"].'</td>';
	echo "</tr>".chr(10);
}
?>
</table></center>
