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
if(!$_GET["id_sucursal"] OR !$_GET["marca"]){
	echo "salio aca";
	exit;
}

include("../../includes/connect.php");
include("../../includes/funciones_varias.php");


if($_GET["id_sucursal"] AND $_GET["marca"]){
	$id_sucursal=$_GET["id_sucursal"];
	$marca=$_GET["marca"];
	$fecha_desde=$_GET["fecha_desde"];
	$fecha_hasta=$_GET["fecha_hasta"];
}
$sucursal=nombre_sucursal($_GET["id_sucursal"]);

$query='select * from ventas where sucursal="'.$sucursal.'" and marca="'.$marca.'" and fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'" order by clasificacion, subclasificacion';
$result=mysql_query($query)or die(mysql_error());

echo "Marca: ".$_GET["marca"]."<br>";
echo "Desde fecha: ".fecha_conv("-",$fecha_desde)." Hasta: ".fecha_conv("-",$fecha_hasta)."<br>";
echo "Total : ".$_GET["marca"]." ".calcula_total_marca( $sucursal, $_GET["marca"], $fecha_desde, $fecha_hasta)."<br>";
echo "Sucursal: ".$sucursal."<br>";
#echo "Total venta: ".calcula_total_venta2( $_GET["numero_venta"], $sucursal )."<br>";
?>

<table class="t1">
<tr>
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
	echo '<td>'.$row["descripcion"].'</td>';
	echo '<td>'.$row["clasificacion"].'</td>';
	echo '<td>'.$row["subclasificacion"].'</td>';
	echo '<td>'.$row["cantidad"].'</td>';
	echo '<td>'.$row["precio_unitario"].'</td>';
	echo '<td>'.( $row["cantidad"] * $row["precio_unitario"] ).'</td>';
	echo "</tr>";
}



#-----------------------------------------------------------------
function calcula_total_marca( $sucursal, $marca, $fecha_desde, $fecha_hasta){
	$query='select sum( cantidad * precio_unitario ) from ventas where marca="'.$marca.'" and sucursal="'.$sucursal.'" and fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'"';
	$result=mysql_query($query)or die(mysql_error());
	$total=mysql_result($result,0);	
return $total;
}				
#-----------------------------------------------------------------


?>
</center>

</body>
</html>