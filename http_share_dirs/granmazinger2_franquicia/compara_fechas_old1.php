<?php



for($i=1;$i<=$mes;$i++){
	$fecha_desde=$anio.'-'.$i.'-01';
	$fecha_hasta=$anio.'-'.$i.'-31';
	$q='select sum(cantidad * precio_unitario) from ventas where fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'"  and sucursal !="157 AP OnLine" and sucursal!="88"';
	$r=mysql_query($q);
	$array1=mysql_fetch_array($r);
	//echo $q."<br>";
	
	

	$fecha_desde=($anio -1).'-'.$i.'-01';
	$fecha_hasta=($anio -1).'-'.$i.'-31';
	$q='select sum(cantidad * precio_unitario) from ventas where fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'" and sucursal !="157 AP OnLine" and sucursal!="88"';
	$r=mysql_query($q);
	$array2=mysql_fetch_array($r);
	//echo $q."<br><br>";

	echo "<tr>";
	echo "<td>".$i."</td>";
	echo "<td>".round($array1[0],2)."</td>";

	echo "<td>".$i." -1Y</td>";
	echo "<td>".round($array2[0],2)."</td>";

	echo "<td>".round(($array1[0] / $array2[0]),2)."</td>";
	echo "</tr>";
	
	if($i<=($mes-1)){
		$count++;
		$prom=$prom+($array1[0] / $array2[0]);
	}

}
	echo "<tr>";
	echo "<td>Prom</td>";
	echo "<td>".round(($prom / $count ),2)."</td>";
	echo "</tr>";

?>