<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type" />
  <title>Tablabla ventas By Christian Máculus</title>
</head>



<center>
<?php
include("connect.php");
$query='select * from ventas where fecha>="2018-12-01" and fecha<="2018-12-31" and sucursal="66" order by sucursal, fecha,hora ';
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table class="t1">';
echo "<tr>";
	echo "<th>numero_venta</th>";
	echo "<th>marca</th>";
	echo "<th>descripcion</th>";
	echo "<th>clasificacion</th>";
	echo "<th>subclasificacion</th>";
	echo "<th>cantidad</th>";
	echo "<th>precio_unitario</th>";
	echo "<th>sucursal</th>";
	echo "<th>tipo_pago</th>";
	echo "<th>vendedor</th>";
	echo "<th>fecha</th>";
	echo "<th>hora</th>";
	echo "<th>id_articulos</th>";
	echo "<th>contenido</th>";
	echo "<th>presentacion</th>";
	echo "<th>costo</th>";
	echo "<th>color</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["numero_venta"].'</td>';
	echo '<td>'.$row["marca"].'</td>';
	echo '<td>'.$row["descripcion"].'</td>';
	echo '<td>'.$row["clasificacion"].'</td>';
	echo '<td>'.$row["subclasificacion"].'</td>';
	echo '<td>'.$row["cantidad"].'</td>';
	echo '<td>'.str_replace(".",",",$row["precio_unitario"]).'</td>';
	echo '<td>'.$row["sucursal"].'</td>';
	echo '<td>'.$row["tipo_pago"].'</td>';
	echo '<td>'.$row["vendedor"].'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["hora"].'</td>';
	echo '<td>'.$row["id_articulos"].'</td>';
	echo '<td>'.$row["contenido"].'</td>';
	echo '<td>'.$row["presentacion"].'</td>';
	echo '<td>'.str_replace(".",",",$row["costo"]).'</td>';
	echo '<td>'.$row["color"].'</td>';
	echo "</tr>".chr(10);
}
?>
</table></center>
