<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
  <meta content="text/html; charset=UTF-8" http-equiv="content-type" />
  <title>Tablabla articulos By Christian Máculus</title>
</head>



<center>
<?php
include("connect.php");
include("./includes/funciones_costos.php");
include("./includes/funciones_precios.php");

$query='select * from articulos order by marca, clasificacion, subclasificacion, descripcion';
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table class="t1">';
echo "<tr>";
	echo "<th>id</th>";
	echo "<th>marca</th>";
	echo "<th>descripcion</th>";
	echo "<th>color</th>";
	echo "<th>contenido</th>";
	echo "<th>presentacion</th>";
	echo "<th>clasificacion</th>";
	echo "<th>subclasificacion</th>";
	echo "<th>Costo</th>";
	echo "<th>P.Venta</th>";
	echo "<th>P.Venta2</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	$array_costo=array_costo($row["id"]);
	$precio_venta=calcula_precio_venta( $array_costo );
	$costo=calcula_precio_costo( $row["id"] );
	$precio=precio_sucursal2( $row["id"], 1 );
	$aa=($costo * 1.5);
	if($precio_venta <$aa){
		echo "<tr>";
		echo '<td>'.$row["id"].'</td>';
		echo '<td>'.$row["marca"].'</td>';
		echo '<td>'.$row["descripcion"].'</td>';
		echo '<td>'.$row["color"].'</td>';
		echo '<td>'.$row["contenido"].'</td>';
		echo '<td>'.$row["presentacion"].'</td>';
		echo '<td>'.$row["clasificacion"].'</td>';
		echo '<td>'.$row["subclasificacion"].'</td>';
		echo '<td>'.$costo.'</td>';
		echo '<td>'.$precio_venta.'</td>';
		echo '<td>'.$precio["precio_base"].'</td>';
		echo "</tr>".chr(10);
	}
}
?>
</table>
</center>
