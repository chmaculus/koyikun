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


	#var
	$acum_mes_ant=acumulado_mes_anterior($fecha , $rowab["sucursal"]);
	
	echo '<tr>';
		echo '<td>ANT</td>';
		echo '<td>'.$acum_mes_ant.'</td>';
	echo '</tr>';


	#var
	$zz=($acum_mes * 100) / $acum_mes_ant; 
		echo '<tr class="especial2" id="especial2">';
		echo '<td>COM</td>';
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



	echo "</table>";

?>