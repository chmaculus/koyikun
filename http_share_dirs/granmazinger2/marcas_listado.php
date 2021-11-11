<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style_marcas.css" type="text/css">
  <meta content="text/html; charset=UTF-8" http-equiv="content-type" />
  <title>Tablabla articulos By Christian Máculus</title>
</head>



<center>
<?php
include("connect.php");

#$fecha=date("Y-n-d");
$mes=date("n");
$anio=date("Y");
$mes=($mes -1);
if($mes==0){$mes=12;$anio=($anio-1);}
$fecha_desde=$anio."-".$mes."-01";
$fecha_hasta=$anio."-".$mes."-31";

#echo $fecha_desde."<br>";
#echo $fecha_hasta."<br>";

$q='select sum(cantidad * precio_unitario) from ventas where fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'"';
//echo $q."<br>";
$total_venta=mysql_result(mysql_query($q),0,0);


$qa='select * from marcas_estadisticas where mes="'.$mes.'" and anio="'.$anio.'" order by importe desc';
$result=mysql_query($qa);
$rows=mysql_num_rows($result);


if($rows<10){
#-------------------------------------------------------------------------
$q='select distinct marca from ventas where fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'" and marca not like "%financiacion%"';
$res=mysql_query($q);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}
while($marca=mysql_fetch_array($res)) {
	$q2='select sum(cantidad * precio_unitario) from ventas where marca="'.$marca[0].'" and fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'"';
	$total_marca=mysql_result(mysql_query($q2),0,0);

	#-------------------------------
	#tot tarj
	$q4='select sum(cantidad * precio_unitario) from ventas where marca="'.$marca[0].'" and fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'" and tipo_pago="ta"';
	$total_tarj=mysql_result(mysql_query($q4),0,0);
	#-------------------------------
	
	$q3='insert into marcas_estadisticas set marca="'.$marca[0].'", importe="'.$total_marca.'", tarjeta="'.($total_tarj * 0.2).'", mes="'.$mes.'", anio="'.$anio.'"';
	echo $q3.";<br>";
	mysql_query($q3);
}//end while
#-------------------------------------------------------------------------
$result=mysql_query($qa);
}//end if

if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}

echo "Tot: ".$total_venta."<br>";

echo '<table><tr><td valign="top">';

		echo '<table class="t1">';
		//echo '<table>';
		echo "<tr>";
		echo "<th>Marca</th>";
		echo "<th>Total</th>";
//		echo "<th>Cantidad</th>";
//		echo "<th>Rent</th>";
		echo "</tr>".chr(10);


$count=0;
$count2=0;
$count3=1;

while($row=mysql_fetch_array($result)){
	$count2++;
	if( $count==25 or $count==50 or $count==75 or $count==100){
		echo '</table></td><td valign="top">';
		echo '<table class="t1">';
		//echo '<table>';
		echo "<tr>";
		echo "<th>Marca</th>";
		echo "<th>Total</th>";
//		echo "<th>Cantidad</th>";
//		echo "<th>Rent</th>";
		echo "</tr>";
	}
	$count++;
	if($count2==($count3*5)){
		$count3++;
		echo '<tr class="special3" id="special3">';
		echo '<td class="special1">'.$count2.'</td>';
		echo '<td class="special1">'.substr($row["marca"],0,12).'</td>';
		$tot=($row["importe"] + $row["tarjeta"]);
		echo '<td class="special1">'.$tot.'</td>';
		$porc=((100 / $total_venta) * $tot);
		echo '<td class="special1">'.round($porc,2).'%</td>';
	}else{
		echo '<tr>';
		echo '<td>'.$count2.'</td>';
		echo '<td>'.substr($row["marca"],0,12).'</td>';
		$tot=($row["importe"] + $row["tarjeta"]);
		echo '<td>'.$tot.'</td>';
		$porc=((100 / $total_venta) * $tot);
		echo '<td>'.round($porc,2).'%</td>';
	}
	
	echo "</tr>".chr(10).chr(10);
	
}
echo '</table>';
echo '</td></tr></table>'.chr(10);

//echo "<br>".$tottarj."<br>";








#--------------------------------------------------------
function trae_desc1( $fecha_desde, $fecha_hasta, $marca){
	$q='select distinct numero_venta,sucursal from ventas where tipo_pago="ta" and fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'" and marca="'.$marca.'"';
	$res=mysql_query($q);
		//echo "<td>";
	while($row=mysql_fetch_array($res)){
		$q2='select sum(cantidad * precio_unitario) from ventas where numero_venta="'.$row[0].'" and sucursal="'.$row[1].'" and marca="'.$marca.'"';
		$res2=mysql_result(mysql_query($q2),0,0);
		$tot=$tot+$res2;
		//echo $q2."<br>";
	}
	return $tot;
		//echo "</td>";

}
#--------------------------------------------------------












?>



