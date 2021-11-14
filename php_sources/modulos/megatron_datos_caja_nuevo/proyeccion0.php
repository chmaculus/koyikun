<?php

$anio=date("Y");

$mes=date("n");
$mes=($mes - 1);
if($mes==0){
	$mes=12;
	$anio=($anio-1);
}
	echo '<table class="t1">';


		echo '<tr">';
		echo '<td>ANT</td>';
		echo '<td>G ANT</td>';
		echo '<td>COSTO ANT</td>';
		echo '<td>RENT ANT</td>';
		echo '<td>RENT REAL</td>';
		echo '</tr>';
		
		#---------------------------------------------------------------
		#---------------------------------------------------------------
	echo '<tr>';
		echo '<td>ANT</td>';
		echo '<td>'.$acum_mes_ant.'</td>';
	echo '</tr>';
		#---------------------------------------------------------------
		#---------------------------------------------------------------


		#---------------------------------------------------------------
		#---------------------------------------------------------------
	echo "<tr>";
	echo "<td>G</td>";
	echo "<td>".round($gastos_suc,2)."</td>";
	echo "</tr>".chr(13);

		#---------------------------------------------------------------
		#---------------------------------------------------------------


		#---------------------------------------------------------------
		#---------------------------------------------------------------
		$q='select sum(cantidad * costo), sum(cantidad * precio_unitario) from ventas where fecha>="'.$anio.'-'.$mes.'-01" and fecha<="'.$anio.'-'.$mes.'-31"';


		echo "<tr>";
	echo '<td>'.$q.'</td>';
		
		echo '</tr>';
		#---------------------------------------------------------------
		#---------------------------------------------------------------


		#---------------------------------------------------------------
		#---------------------------------------------------------------
		$obj1=20;
		$vobj1=((($acum_mes_ant * $obj1) /100) +$acum_mes_ant); 
		$dobj1=round(($vobj1 / 25) , 2);
		$acu1=round((($acum_mes * 100) / $vobj1) ,2);
		$proy=round($prom1 * 26,2);
		$proy1=(( $proy * 100 ) / $vobj1);
		echo "<tr>";
		echo '<td><font class="font4" id="font4">'.$obj1.'</font></td>';
		echo '<td>'.round($vobj1,2).'</td>';
		echo '<td>'.$dobj1.'</td>';
		echo '<td>'.$acu1.'</td>';
		echo '<td>'.round($proy1,2).'</td>';
		if($proy1>100){ 
			echo '<td class="special1" id="special1">SUPERADO</td>';
		}else{ 
			echo '<td class="special2" id="special2">NO SUPERADO</td>';
		}
		echo '</tr>';
		#---------------------------------------------------------------
		#---------------------------------------------------------------


		#---------------------------------------------------------------
		#---------------------------------------------------------------
		$obj1=25;
		$vobj1=((($acum_mes_ant * $obj1) /100) +$acum_mes_ant); 
		$dobj1=round(($vobj1 / 25) , 2);
		$acu1=round((($acum_mes * 100) / $vobj1) ,2);
		$proy=round($prom1 * 26,2);
		$proy1=(( $proy * 100 ) / $vobj1);
		echo "<tr>";
		echo '<td><font class="font4" id="font4">'.$obj1.'</font></td>';
		echo '<td>'.round($vobj1,2).'</td>';
		echo '<td>'.$dobj1.'</td>';
		echo '<td>'.$acu1.'</td>';
		echo '<td>'.round($proy1,2).'</td>';
		if($proy1>100){ 
			echo '<td class="special1" id="special1">SUPERADO</td>';
		}else{ 
			echo '<td class="special2" id="special2">NO SUPERADO</td>';
		}
		echo '</tr>';
		#---------------------------------------------------------------
		#---------------------------------------------------------------


		#---------------------------------------------------------------
		#---------------------------------------------------------------
		$obj1=30;
		$vobj1=((($acum_mes_ant * $obj1) /100) +$acum_mes_ant); 
		$dobj1=round(($vobj1 / 25) , 2);
		$acu1=round((($acum_mes * 100) / $vobj1) ,2);
		$proy=round($prom1 * 26,2);
		$proy1=(( $proy * 100 ) / $vobj1);
		echo "<tr>";
		echo '<td><font class="font4" id="font4">'.$obj1.'</font></td>';
		echo '<td>'.round($vobj1,2).'</td>';
		echo '<td>'.$dobj1.'</td>';
		echo '<td>'.$acu1.'</td>';
		echo '<td>'.round($proy1,2).'</td>';
		if($proy1>100){ 
			echo '<td class="special1" id="special1">SUPERADO</td>';
		}else{ 
			echo '<td class="special2" id="special2">NO SUPERADO</td>';
		}
		echo '</tr>';
		#---------------------------------------------------------------
		#---------------------------------------------------------------


		#---------------------------------------------------------------
		#---------------------------------------------------------------
		$obj1=35;
		$vobj1=((($acum_mes_ant * $obj1) /100) +$acum_mes_ant); 
		$dobj1=round(($vobj1 / 25) , 2);
		$acu1=round((($acum_mes * 100) / $vobj1) ,2);
		$proy=round($prom1 * 26,2);
		$proy1=(( $proy * 100 ) / $vobj1);
		echo "<tr>";
		echo '<td><font class="font4" id="font4">'.$obj1.'</font></td>';
		echo '<td>'.round($vobj1,2).'</td>';
		echo '<td>'.$dobj1.'</td>';
		echo '<td>'.$acu1.'</td>';
		echo '<td>'.round($proy1,2).'</td>';
		if($proy1>100){ 
			echo '<td class="special1" id="special1">SUPERADO</td>';
		}else{ 
			echo '<td class="special2" id="special2">NO SUPERADO</td>';
		}
		echo '</tr>';
		#---------------------------------------------------------------
		#---------------------------------------------------------------


		#---------------------------------------------------------------
		#---------------------------------------------------------------
		$obj1=40;
		$vobj1=((($acum_mes_ant * $obj1) /100) +$acum_mes_ant); 
		$dobj1=round(($vobj1 / 25) , 2);
		$acu1=round((($acum_mes * 100) / $vobj1) ,2);
		$proy=round($prom1 * 26,2);
		$proy1=(( $proy * 100 ) / $vobj1);
		echo "<tr>";
		echo '<td><font class="font4" id="font4">'.$obj1.'</font></td>';
		echo '<td>'.round($vobj1,2).'</td>';
		echo '<td>'.$dobj1.'</td>';
		echo '<td>'.$acu1.'</td>';
		echo '<td>'.round($proy1,2).'</td>';
		if($proy1>100){ 
			echo '<td class="special1" id="special1">SUPERADO</td>';
		}else{ 
			echo '<td class="special2" id="special2">NO SUPERADO</td>';
		}
		echo '</tr>';
		#---------------------------------------------------------------
		#---------------------------------------------------------------


		#---------------------------------------------------------------
		#---------------------------------------------------------------
		$obj1=45;
		$vobj1=((($acum_mes_ant * $obj1) /100) +$acum_mes_ant); 
		$dobj1=round(($vobj1 / 25) , 2);
		$acu1=round((($acum_mes * 100) / $vobj1) ,2);
		$proy=round($prom1 * 26,2);
		$proy1=(( $proy * 100 ) / $vobj1);
		echo "<tr>";
		echo '<td><font class="font4" id="font4">'.$obj1.'</font></td>';
		echo '<td>'.round($vobj1,2).'</td>';
		echo '<td>'.$dobj1.'</td>';
		echo '<td>'.$acu1.'</td>';
		echo '<td>'.round($proy1,2).'</td>';
		if($proy1>100){ 
			echo '<td class="special1" id="special1">SUPERADO</td>';
		}else{ 
			echo '<td class="special2" id="special2">NO SUPERADO</td>';
		}
		echo '</tr>';
		#---------------------------------------------------------------
		#---------------------------------------------------------------


		#---------------------------------------------------------------
		#---------------------------------------------------------------
		$obj1=50;
		$vobj1=((($acum_mes_ant * $obj1) /100) +$acum_mes_ant); 
		$dobj1=round(($vobj1 / 25) , 2);
		$acu1=round((($acum_mes * 100) / $vobj1) ,2);
		$proy=round($prom1 * 26,2);
		$proy1=(( $proy * 100 ) / $vobj1);
		echo "<tr>";
		echo '<td><font class="font4" id="font4">'.$obj1.'</font></td>';
		echo '<td>'.round($vobj1,2).'</td>';
		echo '<td>'.$dobj1.'</td>';
		echo '<td>'.$acu1.'</td>';
		echo '<td>'.round($proy1,2).'</td>';
		if($proy1>100){ 
			echo '<td class="special1" id="special1">SUPERADO</td>';
		}else{ 
			echo '<td class="special2" id="special2">NO SUPERADO</td>';
		}
		echo '</tr>';
		#---------------------------------------------------------------
		#---------------------------------------------------------------

echo "</table>";

?>