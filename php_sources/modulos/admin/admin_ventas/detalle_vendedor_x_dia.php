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
if(!$_GET["vendedor"]){
	echo "salio aca";
	exit;
}

include("../../includes/connect.php");
include("../../includes/funciones_ventas.php");
include("../../includes/funciones_varias.php");


if($_GET["vendedor"]){
	$vendedor=$_GET["vendedor"];
	$fecha_desde=$_GET["fecha_desde"];
	$fecha_hasta=$_GET["fecha_hasta"];
}

$query='select distinct fecha from ventas where vendedor="'.$vendedor.'" and fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'" order by fecha';
$result=mysql_query($query)or die(mysql_error());
$rows=mysql_num_rows($result);

$total_vendedor=calcula_total_vendedor($vendedor, $fecha_desde, $fecha_hasta);
$promedio_diario=$total_vendedor/$rows;


echo "<font1>Vendedor: ".$vendedor." Total: ".$total_vendedor."</font1><br>";
echo "<font1>promedio: ".$promedio_diario."</font1><br>";
echo "Desde Fecha: ".fecha_conv( "-", $fecha_desde )." Hasta fecha: ".fecha_conv( "-", $fecha_hasta )."<br>";
?>

<table class="t1">
<tr>
	<th>Marca</th>
	<th>Total</th>
</tr>

<?php
while($row=mysql_fetch_array($result)){
	$total_dia=calcula_total_dia($vendedor, $row["fecha"]);
	$promedio=($total_dia * 100)/$total_vendedor;
	echo "<tr>";
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$total_dia.'</td>';
	echo '<td>'.round($promedio,2).'</td>';
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
function calcula_total_dia($vendedor, $fecha){
	$query='select sum( cantidad * precio_unitario ) from ventas where fecha="'.$fecha.'" and vendedor="'.$vendedor.'"';
	$result=mysql_query($query)or die(mysql_error());
	$total=mysql_result($result,0);	
return $total;
}				
#-----------------------------------------------------------------

#-----------------------------------------------------------------
function calcula_total_vendedor($vendedor, $fecha_desde, $fecha_hasta){
	$query='select sum( cantidad * precio_unitario ) from ventas where vendedor="'.$vendedor.'" and fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'"';
	$result=mysql_query($query)or die(mysql_error());
	$total=mysql_result($result,0);	
return $total;
}				
#-----------------------------------------------------------------


?>
</center>

</body>
</html>