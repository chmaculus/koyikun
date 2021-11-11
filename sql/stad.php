<center>
<?php
include("../../includes/connect.php");




for($i=2010;$i<=2020;$i++){
	$q='select distinct sucursal from ventas where fecha>="'.$i.'-01-01" and fecha<="'.$i.'-12-31" order by sucursal';
	$res=mysql_query($q);
	while($row=mysql_fetch_array($res)){
	echo '<table border="1">';
	echo '<tr><td>sucursal</td> <td>anio</td <td>Mes</td> <td>Total mes</td> <td>Mes anterior</td> <td>porcentaje</td></tr>';
		calcula_historico_anio($row[0],$i);
	echo "</table>";
	echo "<br><br>";
	}
}

function calcula_historico_anio($sucursal,$anio){
	$anterior=calcula_hisorico_mes($sucursal,$anio,1,$anterior);

	$anterior=calcula_hisorico_mes($sucursal,$anio,2,$anterior);

	$anterior=calcula_hisorico_mes($sucursal,$anio,3,$anterior);
	$anterior=calcula_hisorico_mes($sucursal,$anio,4,$anterior);

	$anterior=calcula_hisorico_mes($sucursal,$anio,5,$anterior);

	$anterior=calcula_hisorico_mes($sucursal,$anio,6,$anterior);

	$anterior=calcula_hisorico_mes($sucursal,$anio,7,$anterior);
	$anterior=calcula_hisorico_mes($sucursal,$anio,8,$anterior);
	$anterior=calcula_hisorico_mes($sucursal,$anio,9,$anterior);
	$anterior=calcula_hisorico_mes($sucursal,$anio,10,$anterior);
	$anterior=calcula_hisorico_mes($sucursal,$anio,11,$anterior);
	$anterior=calcula_hisorico_mes($sucursal,$anio,12,$anterior);
}

function calcula_hisorico_mes($sucursal,$anio,$mes,$anterior){
	echo '<tr>';
	$q='select sum(cantidad * precio_unitario) from ventas where fecha>="'.$anio.'-'.$mes.'-01" and fecha<="'.$anio.'-'.$mes.'-31" and sucursal="'.$sucursal.'"';
	$res=mysql_query($q);
	$array=mysql_fetch_array($res);
	$tot=$array[0];
	//echo '<td>'.$q.'</td>';
	echo '<td>'.$sucursal.'</td>';
	echo '<td>'.$anio.'</td>';
	echo '<td>'.$mes.'</td>';
	echo '<td>'.$array[0].'</td>';
	echo '<td>'.$anterior.'</td>';
	echo '<td>'.round(((($array[0] * 100 )/ $anterior) -100),2).'%</td>';
	
	echo '</tr>';
	$q2='insert into ventas_historico ser secursal="'.$sucursal.'" anio="'.$anio.'" mes="'.$mes.'" total="'.$array[0].'"';
	mysql_query($q2);
	return $array[0];
}

?>