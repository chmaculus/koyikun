<?php
include("includes/connect.php");

for($i=2008;$i<=2017;$i++){
	for($j=1;$j<=12;$j++){
		$q='select distinct sucursal from ventas where fecha>="'.$i."-".$j.'-01" and fecha<="'.$i."-".$j.'-31"';
		$r=mysql_query($q);
		if(mysql_error()){echo mysql_error().chr(10).$q.chr(10);}
		while($row=mysql_fetch_array($r)){
			$q='select sum(cantidad*precio_unitario) from ventas where sucursal="'.$row["sucursal"].'" and fecha>="'.$i."-".$j.'-01" and fecha<="'.$i."-".$j.'-31" and hora>="08:00:00" and hora<="14:00:00"';
			$array=mysql_fetch_array(mysql_query($q));
			$q2='insert into ventas_historico set mes="'.$j.'", anio="'.$i.'", sucursal="'.$row["sucursal"].'", total="'.$array[0].'", turno="M";';
			echo $q2.chr(10);
//			echo "total: ".$array[0].chr(10);

			$q='select sum(cantidad*precio_unitario) from ventas where sucursal="'.$row["sucursal"].'" and fecha>="'.$i."-".$j.'-01" and fecha<="'.$i."-".$j.'-31" and hora>="14:00:01" and hora<="22:00:00"';
			$array=mysql_fetch_array(mysql_query($q));
			$q2='insert into ventas_historico set mes="'.$j.'", anio="'.$i.'", sucursal="'.$row["sucursal"].'", total="'.$array[0].'", turno="T";';
			echo $q2.chr(10);
//			echo "total: ".$array[0].chr(10);
		}
	}
}
?>

