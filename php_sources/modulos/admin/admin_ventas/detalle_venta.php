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
	echo "falta numero de venta o sucursal";
	exit;
}

include("../../includes/connect.php");
include("../../includes/funciones_varias.php");


if($_GET["id_sucursal"] AND $_GET["numero_venta"]){
	$id_sucursal=$_GET["id_sucursal"];
	$numero_venta=$_GET["numero_venta"];
}
$sucursal=nombre_sucursal($_GET["id_sucursal"]);

$valores=valores($numero_venta, $sucursal);

$query='select * from ventas where sucursal="'.$sucursal.'" and numero_venta="'.$numero_venta.'"';
$result=mysql_query($query)or die(mysql_error());


echo '<table class="t1">';
echo "<tr><td>Numero de venta</td><td>".$_GET["numero_venta"]."</td></tr>";
echo "<tr><td>Sucursal</td><td>".$sucursal."</td></tr>";
echo "<tr><td>Fecha</td><td>".$valores["fecha"]."</td></tr>";
echo "<tr><td>Hora</td><td>".$valores["hora"]."</td></tr>";
echo "<tr><td>Vendedor</td><td>".$valores["vendedor"]."</td></tr>";
echo "<tr><td>Tipo de pago</td><td>".$valores["tipo_pago"]."</td></tr>";
echo "<tr><td>Total venta</td><td>".calcula_total_venta2( $_GET["numero_venta"], $sucursal )."</td></tr>";
echo '</table>';
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