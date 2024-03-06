<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
  <meta content="text/html; charset=UTF-8" http-equiv="content-type" />
  <title>Koyi Kun control administrativo</title>
</head>
<body>
<center>
<?php

if(!$_GET["id_sucursal"] OR !$_GET["numero_venta"]){
	echo "salio aca";
	exit;
}

include("../includes/connect.php");
include("../includes/funciones.php");


if($_GET["id_sucursal"] AND $_GET["numero_venta"]){
	$id_sucursal=$_GET["id_sucursal"];
	$numero_venta=$_GET["numero_venta"];
}
$sucursal=nombre_sucursal($_GET["id_sucursal"]);

$valores=valores($numero_venta, $sucursal);

$query='select * from ventas where sucursal="'.$sucursal.'" and numero_venta="'.$numero_venta.'"';
$result=mysql_query($query)or die(mysql_error());


echo '<table class="t1">';
	echo '<tr>';

echo "<td>Numero de venta: </td><td>".$_GET["numero_venta"]."</td>";
	echo '</tr><tr>';
echo "<td>Sucursal: </td><td>".$sucursal."</td>";
	echo '</tr><tr>';
echo "<td>Fecha: </td><td>".$valores["fecha"]."</td>";
	echo '</tr><tr>';
echo "<td>Hora: </td><td>".$valores["hora"]."</td>";
	echo '</tr><tr>';
echo "<td>Vendedor: </td><td>".$valores["vendedor"]."</td>";
	echo '</tr><tr>';
echo "<td>Tipo de pago: </td><td>".$valores["tipo_pago"]."</td>";
	echo '</tr><tr>';
echo "<td>Total venta: </td><td>".calcula_total_venta2( $_GET["numero_venta"], $sucursal )."</td>";
	echo '</tr>';

echo "</table>";
?>

<table class="t1">
<tr>
	<th>Marca</th>
	<th>Descripcion</th>
	<th>Clasificacion</th>
	<th>Subclasificacion</th>
	<th>Cantidad</th>
	<th>P/unitario</th>
	<th>Sub-total</th>
</tr>

<?php
while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["marca"].'</td>';
	echo '<td>'.$row["descripcion"].'</td>';
	echo '<td>'.$row["clasificacion"].'</td>';
	echo '<td>'.$row["subclasificacion"].'</td>';
	echo '<td>'.$row["cantidad"].'</td>';
	echo '<td>'.$row["precio_unitario"].'</td>';
	echo '<td>'.( $row["cantidad"] * $row["precio_unitario"] ).'</td>';
	echo "</tr>";
}

echo '<br>';
echo '<form action="tiquet_update.php" method="post">';
echo '<table class="t1">';
echo '	<tr><td>Tiquet / Factura Número</td><td><input type="text" name="tiquet" value="" size="10"></td></tr>';
echo '</table>';
echo '<input type="hidden" name="numero_venta" value="'.$numero_venta.'">';
echo '<input type="hidden" name="sucursal" value="'.$sucursal.'">';
echo '<input type="submit" name="ACEPTAR" value="ACEPTAR">';
echo '</form>';




#-----------------------------------------------------------------
function valores($numero_venta, $sucursal){
	$query='select * from ventas where numero_venta="'.$numero_venta.'" and sucursal="'.$sucursal.'" limit 0,1';
	$result=mysql_query($query)or die(mysql_error());
	$array=mysql_fetch_array($result);	
return $array;
}				
#-----------------------------------------------------------------

#-----------------------------------------------------------------
function calcula_total_venta2($numero_venta, $sucursal){
	$query='select sum( cantidad * precio_unitario ) from ventas where numero_venta="'.$numero_venta.'" and sucursal="'.$sucursal.'"';
	$result=mysql_query($query)or die(mysql_error());
	$total_venta=mysql_result($result,0);	
return $total_venta;
}				
#-----------------------------------------------------------------


?>
</center>

</body>
</html>