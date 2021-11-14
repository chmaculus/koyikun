<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type" />
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
include("../../includes/funciones_varias.php");


if($_GET["vendedor"]){
	$vendedor=$_GET["vendedor"];
	$fecha_desde=$_GET["fecha_desde"];
	$fecha_hasta=$_GET["fecha_hasta"];
}

$query='select distinct marca from ventas where vendedor="'.$vendedor.'" and fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'" order by marca';
$result=mysql_query($query)or die(mysql_error());

$total_vendedor=calcula_total_vendedor($vendedor, $fecha_desde, $fecha_hasta);

echo "<font1>Vendedor: ".$vendedor." Total: ".$total_vendedor."</font1><br>";
echo "Desde Fecha: ".fecha_conv( "-", $fecha_desde )." Hasta fecha: ".fecha_conv( "-", $fecha_hasta )."<br>";
?>

<table class="t1">
<tr>
	<th>Marca</th>
	<th>Total</th>
</tr>

<?php
while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["marca"].'</td>';
	echo '<td>'.calcula_total_marca($vendedor, $row["marca"], $fecha_desde, $fecha_hasta).'</td>';
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
function calcula_total_marca($vendedor, $marca, $fecha_desde, $fecha_hasta){
	$query='select sum( cantidad * precio_unitario ) from ventas where marca="'.$marca.'" and vendedor="'.$vendedor.'" and fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'"';
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