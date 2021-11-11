<?php
include("../includes/connect.php");



for($i=2008;$i<=2021;$i++){
	for($j=1;$j<=12;$j++){
		$fecha_desde=$i."-".$j."-01";
		$fecha_hasta=$i."-".$j."-31";
		$q='select distinct sucursal from ventas where fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'"';
		$res=mysql_query($q);
		while($row=mysql_fetch_array($res)){
			$q2='select sum(cantidad*precio_unitario) from ventas where sucursal="'.$row[0].'" and fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'" and tipo_pago="co"';
			$res=mysql_query($q2);
			$contado=mysql_result($res,0,0);

			$q2='select sum(cantidad*precio_unitario) from ventas where sucursal="'.$row[0].'" and fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'" and tipo_pago="de"';
			$debito=mysql_result(mysql_query($q2),0,0);

			$q2='select sum(cantidad*precio_unitario) from ventas where sucursal="'.$row[0].'" and fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'" and tipo_pago="ta"';
			$tarj=mysql_result(mysql_query($q2),0,0);
			
			$q2='select distinct numero_venta from ventas where sucursal="'.$row[0].'" and fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'"';
			$clientes=mysql_num_rows(mysql_query($q2));
			
			$total=$contado+$debito+$tarj;

			$q3='insert into ventas_historico set anio="'.$i.'", mes="'.$j.'", sucursal="'.$row[0].'", contado="'.$contado.'", debito="'.$debito.'", tarjeta="'.$tarj.'", total="'.$total.'", clientes="'.$clientes.'"';
			echo $q3.";".chr(10);
		}	
	}
}




?>
