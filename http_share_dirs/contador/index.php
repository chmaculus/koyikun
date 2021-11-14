
<center>
<form action="aaa" method="post">
<input type="text" name="fecha" value="a"><br>
<input type="submit" name="ACEPTAR" value="ACEPTAR">

</form>


<?php

if(!$_POST["fecha"]){
	//exit;
}

include("includes/connect.php");

$dias=cal_days_in_month(CAL_GREGORIAN, 11, 2021);





$q='select sucursal from sucursales where suc_reales=1 order by sucursal';
$res=mysql_query($q);
while($row=mysql_fetch_array($res)){
	$array[]=$row;
}



$fecha="2021-11-01";


echo '<table border="1">';


echo '<tr>';
foreach($array as $sucursal){
	//echo $sucursal[0]."<br>";
	echo "<td>".$sucursal[0]."</td>";
	echo "<td>de</td>";
	echo "<td>ta</td>";
}
echo "</tr>";


echo '<tr>';
foreach($array as $sucursal){
	//echo $sucursal[0]."<br>";
	echo "<td>".trae_debito($sucursal[0], $fecha)."</td>";
	echo "<td>".trae_tarjeta($sucursal[0], $fecha)."</td>";
}
echo "</tr>";


echo '</table>';



#-----------------------------------
function trae_tarjeta($sucursal, $fecha){
	$q='select sum(cantidad * precio_unitario) from ventas where sucursal="'.$sucursal.'" and fecha="'.$fecha.'" and tipo_pago="ta"';
	echo $q."<br>";
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





?>



<table border="1">
<tr>
	<td></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td></td>
</tr>
</table>








</center>




