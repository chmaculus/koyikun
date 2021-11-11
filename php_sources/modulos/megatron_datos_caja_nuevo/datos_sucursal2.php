<?php









	echo '<table class="t1">';
	$acum_mes=acumulado_mes($fecha , $row["sucursal"]);

		echo '<tr class="especial" id="especial">';
		echo '<td>ACT</td>';
		echo '<td>'.$acum_mes.'</td>';

	echo '</tr>';



	$acum_mes_ant=acumulado_mes_anterior($fecha , $row["sucursal"]);
	echo '<tr>';
		echo '<td>ANT</td>';
		echo '<td>'.$acum_mes_ant.'</td>';
	echo '</tr>';



	$zz=($acum_mes * 100) / $acum_mes_ant; 
		echo '<tr class="especial2" id="especial2">';
		echo '<td>COM</td>';
		echo '<td>'.round($zz,2).'%</td>';
	echo '</tr>';
	
	$acudi=calcula_total_dias_sucursal( $fecha, $row["sucursal"] );
	$prom1=($acum_mes / $acudi);
	echo '<tr>';
		echo '<td>AcuDi</td>';
		echo '<td>'.$acudi.'</td>';
	echo '</tr>';

	echo '<tr>';
		echo '<td>Prom</td>';
		echo '<td>'.round($prom1,2).'</td>';
	echo '</tr>';

	echo '<tr>';
		echo '<td>Proy</td>';
		echo '<td>'.round($prom1 * 26,2).'</td>';
	echo '</tr>';

	$tasa_crecim=round(((($prom1 * 26) * 100) / $acum_mes_ant)-100,2);
		echo '<tr class="especial3" id="especial3">';
		echo '<td>Com2</td>';
		echo '<td>'.$tasa_crecim.'%</td>';
	echo '</tr>';


	#------------------------------------------------------------------------------
	$aabb1=$total_debito_credito;
	echo "<tr>";
	echo "<td>TT + TD Dia</td>";
	echo "<td>".$aabb1."</td>";
	echo "</tr>";
	#------------------------------------------------------------------------------


	#------------------------------------------------------------------------------
	echo "<tr>";
	echo "<td>TX</td>";
	$tx=($zm + $zt);
	
	echo "<td>".$tx."</td>";

	$aabb2=round(($tx / $total_debito_credito),2);
	echo "<td>".$aabb2."</td>";
	
	#------------------------------------------------------------------------------




	#----------------------------------------------------------
		echo '<tr class="especial4" id="especial4">';
	echo "<td>ACU Z</td>";
	echo "<td>".trae_total_z($fecha, id_sucursal($row["sucursal"]), "jejeje")."</td>";
	echo "</tr>".chr(13);
	#----------------------------------------------------------

	$fa=explode("-",$fecha);
	$fecha_desde=$fa[0]."-".$fa[1]."-01";
	$fecha_hasta=$fa[0]."-".$fa[1]."-31";
	$rentabilidad=rentabilidad($row["sucursal"], $fecha_desde, $fecha_hasta);
	echo '<tr>';
		echo '<td>Rbrt</td>';
		echo '<td>'.round($rentabilidad,2).'</td>';
	echo '</tr>';

	echo "<tr>";
	echo "<td>Rbrut-G</td>";
	echo "<td>".round(($rentabilidad - $gastos_suc ),2)."</td>";
	echo "</tr>".chr(13);

	echo "<tr>";
	echo "<td>G</td>";
	echo "<td>".round($gastos_suc,2)."</td>";
	echo "</tr>".chr(13);

	echo "<tr>";
	echo "<td>G.ant</td>";
	echo "<td>".round(trae_gastos_sucursal_mes_ant( $fecha, $row["sucursal"]),2)."</td>";
	echo "</tr>".chr(13);


	$qa='select a,b from cuota_alquiler where sucursal="'.$row["sucursal"].'"';
	$aa=mysql_fetch_array(mysql_query($qa));
	$influ=((($aa[0] + $aa[1]) * 100) / 	$acum_mes_ant) ;
	echo "<tr>";
	echo "<td>A Influ</td>";
	echo "<td>".round($influ,2)."</td>";
	echo "</tr>".chr(13);

	echo '</table>'.chr(13);//cierra tabla turno


	if($tasa_crecim>0){
		echo '<img src="arriba.jpg" width="140" height="140">';
	}
	if($tasa_crecim<0){
		echo '<img src="abajo.jpg" width="140" height="140">';
	}
?>