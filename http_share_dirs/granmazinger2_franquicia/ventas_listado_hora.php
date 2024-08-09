<?php


include_once("cabecera2.inc.php");
/*
include("./includes/funciones_varias.inc.php");
include_once("./includes/funciones_tabla_gastos.php");
include_once("./includes/funciones_vendedor.php");
include_once("./includes/funciones_sucursal.php");
include_once("./includes/funciones_calculo.php");
*/
include_once("connect.php");


$fecha=date("Y-m-d");
$epoch=strtotime($fecha);

$zzaa=explode("-",$fecha);
$mes=$zzaa[1];
$anio=$zzaa[0];

$fecha_desde=$anio."-".$mes."-01";
$fecha_hasta=$anio."-".$mes."-31";

echo '<center>';


$q='select sum(cantidad*precio_unitario) from ventas where fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'"';
$total=mysql_result(mysql_query($q),0,0);

echo "Acumulado mes $total<br>";

echo '<table class="t1">';
echo '<tr>';
echo '	<td>Desde</td>';
echo '	<td>Hasta</td>';
echo '	<td>Importe</td>';
echo '	<td>Porc</td>';
echo '</tr>';


for($i=8;$i<=21;$i++){
	$hora_desde=$i.":00:00";
	$hora_hasta=($i).":59:59";
	$q='select sum(cantidad*precio_unitario) from ventas where fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'" and hora>="'.$hora_desde.'" and hora<="'.$hora_hasta.'"';
	$tot=mysql_result(mysql_query($q),0,0);
	//echo "$q;".chr(10);
	echo '<tr>';
	echo '	<td>'.$hora_desde.'</td>';
	echo '	<td>'.$hora_hasta.'</td>';
	echo '	<td>'.$tot.'</td>';
	echo '	<td>%'.round(((100 / $total) *$tot),2).'</td>';
	echo '</tr>';
	
}

echo '</table>';



?>
