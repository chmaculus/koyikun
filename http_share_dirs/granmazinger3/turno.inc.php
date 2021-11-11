<?php
	echo '<table class="t1">';//abre tabla turno

	
	echo "<tr>";
	echo "<td>SUC</td><td>".$rowab["sucursal"]."</td>";
	echo "</tr>".chr(13);

	echo "<tr>";
	echo "<td>TT M</td><td>".$total_manana."</td>";
	echo "</tr>".chr(13);

	echo "<tr>";
	echo "<td>TT T</td><td>".$total_tarde."</td>";
	echo "</tr>".chr(13);

   echo '<tr class="especial" id="especial">';
	echo '<td>TT S</td>';
	echo '<td>'.( $total_manana + $total_tarde ).'</td>';
	echo "</tr>".chr(13);
	
	#var
	//$acum_mes=acumulado_mes($fecha , $rowab["sucursal"]);

	echo '<tr class="especial" id="especial">';
	echo '<td>ACT</td>';
	echo '<td>'.$acum_mes.'</td>';
	echo '</tr>';


 $arr_fecha=explode("-",$fecha);
 $fff=($arr_fecha[0] -1)."-".$arr_fecha[1] ."-";
 $q='select sum(cantidad * precio_unitario) from ventas where fecha>="'.$fff.'01" and fecha<="'.$fff.'31" and sucursal="'.$rowab[0].'"';
 $act1y=mysql_result(mysql_query($q),0,0);
	echo '<tr class="especial" id="especial">';
	echo '<td>ACT -1Y</td>';
	echo '<td>'.$act1y.'</td>';
	echo '</tr>';





	#var
	$acum_mes_ant=acumulado_mes_anterior($fecha , $rowab["sucursal"]);
	
	echo '<tr>';
		echo '<td>ANT</td>';
		echo '<td>'.$acum_mes_ant.'</td>';
	echo '</tr>';


	#var
	$zz=($acum_mes / $act1y) * 100; 
		echo '<tr class="especial2" id="especial2">';
		echo '<td>COM</td>';
		echo '<td>'.round($zz,2).'%</td>';
	echo '</tr>';

	#var
	$zz=($acum_mes * 100) / $acum_mes_ant; 
		echo '<tr class="especial2" id="especial2">';
		echo '<td>COM1</td>';
		echo '<td>'.round($zz,2).'%</td>';
	echo '</tr>';


	
	#var
	$acudi=calcula_total_dias_sucursal( $fecha, $rowab["sucursal"] );
	$prom1=($acum_mes / $acudi);
	echo '<tr>';
		echo '<td>Proy</td>';
		echo '<td>'.round($prom1 * 26,2).'</td>';
	echo '</tr>';

	#var
	$tasa_crecim=round(((($prom1 * 26) * 100) / $acum_mes_ant)-100,2);
		echo '<tr class="especial3" id="especial3">';
		echo '<td>Com2</td>';
		echo '<td>'.$tasa_crecim.'%</td>';
	echo '</tr>';

	#-------------------------------------------------------------
	$mes_anio=date("Y-n");
	$q='select sum(cantidad * precio_unitario), sum(cantidad * costo) from ventas where sucursal="'.$rowab["sucursal"].'" and fecha>="'.$mes_anio.'-01" and fecha<="'.$mes_anio.'-31"';
	$array=mysql_fetch_array(mysql_query($q));
	$rent=(($array[0] / $array[1] * 100)-100);
		echo '<tr>';
		echo '<td>R</td>';
		echo '<td>'.round($rent,2).'%</td>';
		echo '</tr>';
/*
		echo '<tr>';
		echo '<td>tven: '.$array[0].'</td>';
		echo '</tr>';

		echo '<tr>';
		echo '<td>tcos: '.$array[1].'</td>';
		echo '</tr>';

		echo '<tr>';
		echo '<td>'.$q.'</td>';
		echo '</tr>';
	*/
	#-------------------------------------------------------------	


	echo "</table>";

?>