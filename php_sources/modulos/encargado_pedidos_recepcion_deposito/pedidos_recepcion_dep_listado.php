<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type" />
  <title>Tablabla pedidos_recepcion_d By Christian Máculus</title>
</head>



<center>
<?php
include("connect.php");
$query="select * from pedidos_recepcion_d limit 0,1000";
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table class="t1">';
echo "<tr>";
	echo "<th>id</th>";
	echo "<th>proveedor</th>";
	echo "<th>numero_factura</th>";
	echo "<th>fecha_factura</th>";
	echo "<th>razon_social</th>";
	echo "<th>importe</th>";
	echo "<th>tipo</th>";
	echo "<th>observaciones</th>";
	echo "<th>fecha</th>";
	echo "<th>hora</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["proveedor"].'</td>';
	echo '<td>'.$row["numero_factura"].'</td>';
	echo '<td>'.$row["fecha_factura"].'</td>';
	echo '<td>'.$row["razon_social"].'</td>';
	echo '<td>'.$row["importe"].'</td>';
	echo '<td>'.$row["tipo"].'</td>';
	echo '<td>'.$row["observaciones"].'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["hora"].'</td>';
	echo "</tr>".chr(10);
}
?>
</table></center>
