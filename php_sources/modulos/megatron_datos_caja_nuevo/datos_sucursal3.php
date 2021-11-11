<?php



	echo '<table class="t1">';
	$acum_mes=acumulado_mes($fecha , $row["sucursal"]);
/*
		echo '<tr class="especial" id="especial">';
		echo '<td>ACT</td>';
		echo '<td>'.$acum_mes.'</td>';
*/

	echo '</tr>';




#------------------------------------------------------
#ACT D+T
$q='select sum(cantidad * precio_unitario) from ventas where fecha="'.$fecha.'" and sucursal="'.$row["sucursal"].'" and (tipo_pago="de" or tipo_pago="ta")';
$r=mysql_query($q);
$arr1=mysql_fetch_array($r);

echo "<tr>";
echo '<td>ACT D+T</td><td>'.$arr1[0].'</td>';
echo '<td>'.round((( ($arr1[0]) * 100 ) / $acum_mes),1).'%</td>';
//echo '<td>'.$arr1[0].'</td>';
//echo '<td>'.$q.'</td>';
echo "</tr>";
#------------------------------------------------------




	$acum_mes_ant=acumulado_mes_anterior($fecha , $row["sucursal"]);
/*
	echo '<tr>';
		echo '<td>ANT</td>';
		echo '<td>'.$acum_mes_ant.'</td>';
	echo '</tr>';


	$zz=($acum_mes * 100) / $acum_mes_ant; 
		echo '<tr class="especial2" id="especial2">';
		echo '<td>COM</td>';
		echo '<td>'.round($zz,2).'%</td>';
	echo '</tr>';
	
	$tasa_crecim=round(((($prom1 * 26) * 100) / $acum_mes_ant)-100,2);
		echo '<tr class="especial3" id="especial3">';
		echo '<td>Com2</td>';
		echo '<td>'.$tasa_crecim.'%</td>';
	echo '</tr>';
*/

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
//		echo '<tr class="especial4" id="especial4">';
//	echo "<td>ACU Z</td>";
//	echo "<td>".trae_total_z($fecha, id_sucursal($row["sucursal"]), "jejeje")."</td>";
//	echo "</tr>".chr(13);
	#----------------------------------------------------------


	echo '</table>'.chr(13);//cierra tabla turno


?>
