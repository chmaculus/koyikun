
<center>


<?php

echo '<table border="1">';
echo '<tr>';
echo '<td>Mes</td>';
echo '<td>Anio</td>';
echo '</tr>';
echo '<tr>';


echo '<form action="'.$_SERVER["SCRIPT_NAME"].'" method="post">';

echo '<td><select name="mes">';
for($i=1;$i<=12;$i++){
	if($_POST["mes"]==$i){
		echo '<option value="'.$i.'" label="'.$i.'" selected>'.$i.'</option>';
	}else{
		echo '<option value="'.$i.'" label="'.$i.'">'.$i.'</option>';
	}
	
}
echo '</select></td>';



#---------------------------------------
echo '<td><select name="anio">';
for($i=2008;$i<=2030;$i++){
	if($_POST["anio"]==$i){
		echo '<option value="'.$i.'" label="'.$i.'" selected>'.$i.'</option>';
	}else{
		echo '<option value="'.$i.'" label="'.$i.'">'.$i.'</option>';
	}
}
echo '</select></td>';
#---------------------------------------

echo '</tr></table>';


echo '<input type="submit" name="ACEPTAR" value="ACEPTAR">';
echo '</form>';



if(!$_POST["mes"]){
	exit;
}

include("includes/connect.php");

$dias=cal_days_in_month(CAL_GREGORIAN, 11, 2021);

$mes=$_POST["mes"];
$anio=$_POST["anio"];

echo "<br><br>Mes: ".$mes." Anio: ".$anio."<br><br>";

$q='select sucursal from sucursales where suc_reales=1 order by sucursal';
$res=mysql_query($q);
while($row=mysql_fetch_array($res)){
	$array[]=$row;
}



echo '<table border="1">';

echo '<tr>';
echo '<td>Dia</td>';
foreach($array as $sucursal){
	//echo $sucursal[0]."<br>";
	echo "<td>".$sucursal[0]." debito</td>";
	echo "<td>".$sucursal[0]." tarjeta</td>";
}

echo "<td>Total debito</td>";
echo "<td>Total tarjeta</td>";

echo "</tr>";


for($i=1;$i<=$dias;$i++){
	$fecha=$anio."-".$mes."-".$i;

	echo '<tr>';
	echo '<td>'.$i.'</td>';

	$tot_de=0;
	$tot_ta=0;
	foreach($array as $sucursal){
		$debito=trae_debito($sucursal[0], $fecha);
		$tarjeta=trae_tarjeta($sucursal[0], $fecha);
		$tot_de=$tot_de+$debito;
		$tot_ta=$tot_ta+$tarjeta;
		echo "<td>".str_replace('.',',',$debito)."</td>";
		echo "<td>".str_replace('.',',',$tarjeta)."</td>";
	}

	echo "<td>".$tot_de."</td>";
	echo "<td>".$tot_ta."</td>";
	echo "</tr>";
}
echo '<tr>';
echo "<td>Totales</td>";

$tot_de=0;
$tot_ta=0;

foreach($array as $sucursal){
	$debito=trae_debito_mes($sucursal[0], $mes, $anio);
	$tarjeta=trae_tarjeta_mes($sucursal[0], $mes, $anio);
	$tot_de=$tot_de+$debito;
	$tot_ta=$tot_ta+$tarjeta;
	echo "<td>".str_replace('.',',',$debito)."</td>";
	echo "<td>".str_replace('.',',',$tarjeta)."</td>";
}

echo "<td>".$tot_de."</td>";
echo "<td>".$tot_ta."</td>";

echo '</tr>';
echo '</table>';



#-----------------------------------
function trae_tarjeta($sucursal, $fecha){
	$q='select sum(cantidad * precio_unitario) from ventas where sucursal="'.$sucursal.'" and fecha="'.$fecha.'" and tipo_pago="ta"';
	$total=mysql_result(mysql_query($q),0,0);
	return $total;	
}
#-----------------------------------



#-----------------------------------
function trae_debito($sucursal, $fecha){
	$q='select sum(cantidad * precio_unitario) from ventas where sucursal="'.$sucursal.'" and fecha="'.$fecha.'" and tipo_pago="de"';
	$total=mysql_result(mysql_query($q),0,0);
	return $total;	
}
#-----------------------------------


#-----------------------------------
function trae_tarjeta_mes($sucursal, $mes, $anio){
	$fecha_desde=$anio."-".$mes."-1";
	$fecha_hasta=$anio."-".$mes."-31";
	$q='select sum(cantidad * precio_unitario) from ventas where sucursal="'.$sucursal.'" and fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'" and tipo_pago="ta"';
	$total=mysql_result(mysql_query($q),0,0);
	return $total;	
}
#-----------------------------------



#-----------------------------------
function trae_debito_mes($sucursal, $mes, $anio){
	$fecha_desde=$anio."-".$mes."-1";
	$fecha_hasta=$anio."-".$mes."-31";
	$q='select sum(cantidad * precio_unitario) from ventas where sucursal="'.$sucursal.'" and fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'" and tipo_pago="de"';
	$total=mysql_result(mysql_query($q),0,0);
	return $total;	
}
#-----------------------------------





?>







</center>




