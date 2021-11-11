<?php









for($i=1;$i<=$mes;$i++){
	$fecha_desde=$anio.'-'.$i.'-01';
	$fecha_hasta=$anio.'-'.$i.'-31';
	
	$array1=trae_total_ventas_mes_anio($i,$anio);
	$total1=($array1[0]+$array1[1]+$array1[2]);

	$array2=trae_total_ventas_mes_anio($i,($anio-1));
	$total2=($array2[0]+$array2[1]+$array2[2]);

	$che=che($fecha_desde,$fecha_hasta);
	$pa=pa($fecha_desde,$fecha_hasta);
	$pe=pe($fecha_desde,$fecha_hasta);

	echo "<tr>";
	echo "<td>".$i."</td>";
	echo "<td>".my_format($total1)."</td>";

	echo "<td>".$i." -1Y</td>";
	echo "<td>".my_format($total2)."</td>";

	echo "<td>p:".my_format((($array1[0] / $array2[0])))."</td>";

	echo "<td>c: ".my_format($array1[0])."</td>";
	echo '<td><font color="#019500">c: '.round((($array1[0] * 100 )/$total1),2)."%</font></td>";
	
	echo "<td>d: ".my_format($array1[1])."</td>";
	echo "<td>t: ".my_format($array1[2])."</td>";
	
	$d_mas_t=($array1[1] + $array1[2]);
	echo "<td>d+t: ".number_format($d_mas_t, 2, ',' , '.')."</td>";
	echo '<td><font color="#019500">d+t: '.round(((($array1[1] + $array1[2]) * 100 )/$total1),2)."%</font></td>";
	
	$tot=number_format(($array1[0]+$array1[1]+$array1[2]), 2, ',' , '.');
	echo "<td>tot: ".$tot."</td>";

	$dif=$d_mas_t-$che;
	if($dif<0){$color="#019500";}
	if($dif>0){$color="#ff0000";}

	$dif=number_format($dif, 2, ',' , '.');
	echo '<td><font color="'.$color.'">dif: '.$dif."</font></td>";
	

	echo "<td>che: ".number_format($che, 2, ',' , '.')."</td>";

	echo "<td>PA: ".number_format($pa, 2, ',' , '.')."</td>";

	echo "<td>PE: ".number_format($pe, 2, ',' , '.')."</td>";
	
	
	

	if($i<=($mes-1)){
		$count++;
		$prom=$prom+($array1[0] / $array2[0]);
	}
	echo "</tr>";
}

	echo "<tr>";
	echo "<td>Prom</td>";
	echo "<td>".round(($prom / $count ),2)."</td>";
	echo "</tr>";







/*
	echo "<td>CHE: </td><td>".$mes. "</td><td>".round($tot[0],2)."</td>";
	echo "<td>PRY: </td><td>".round($proyeccion[0],2)."</td>";
	echo "<td>Tot: </td><td>".round(($tot[0] + $proyeccion[0]) ,2)."</td>";
*/


#-------------------------------------------------------
#PRY:
function pa($fecha_desde,$fecha_hasta){
	
	$query='select sum(importe) from gastos.banco where fecha_vencimiento>="'.$fecha_desde.'" and fecha_vencimiento<="'.$fecha_hasta.'" and cobrado="S" and cuenta!="Proyeccion"';
	$result=mysql_query($query);

	if(mysql_error()){
		echo mysql_error();
	}
	$tot=mysql_fetch_array($result);
	return $tot[0];
	
	
}
#-------------------------------------------------------




#-------------------------------------------------------
#CHE:
function che($fecha_desde,$fecha_hasta){
	$query='select sum(importe) from gastos.banco where fecha_vencimiento>="'.$fecha_desde.'" and fecha_vencimiento<="'.$fecha_hasta.'" and cuenta!="Proyeccion"';
	$result=mysql_query($query);

	if(mysql_error()){
		echo mysql_error();
	}
	$tot=mysql_fetch_array($result);
	return $tot[0];
}
#-------------------------------------------------------

function pe($fecha_desde,$fecha_hasta){
	$query='select sum(importe) from gastos.banco where fecha_vencimiento>="'.$fecha_desde.'" and fecha_vencimiento<="'.$fecha_hasta.'" and cobrado="N"  and cuenta!="Proyeccion"';
	$result=mysql_query($query);

	if(mysql_error()){
		echo mysql_error();
	}
	$tot=mysql_fetch_array($result);
	return $tot[0];
}


function my_format($num){
	return number_format($num, 2, ',' , '.');
}



?>