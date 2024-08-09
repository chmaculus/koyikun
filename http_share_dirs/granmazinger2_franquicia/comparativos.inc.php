<?php

	echo '<table border="1">';///3 ra

	#--------------------------------------------	
	echo '<tr class="especial" id="especial">';///3 ra
	echo '<td>ACT</td>';
	echo '<td>'.$total_acum_mes.'</td>';

	##########acudi
	$acum_mes_anioaa=acumulado_menos_un_anio($fecha , $rowab["sucursal"]);
	echo "<td>ACT -1 Y</td><td>".$acum_mes_anioaa."</td>";
	echo "<td>".round( ( ($total_acum_mes * 100) / $acum_mes_anioaa),2)."</td>";

	echo '</tr>';
	#--------------------------------------------	

	
	#--------------------------------------------	
    echo '<tr class="especial" id="especial">';

  	echo '<td>ACT</td>';
	echo '<td>'.$total_acum_mes.'</td>';

		echo '<td>ANT</td>';
		echo '<td>'.$total_acum_mes_ant.'</td>';
		echo '<td>'.round(($total_acum_mes *100 ) / $total_acum_mes_ant,2).'</td>';
	echo '</tr>';
	#--------------------------------------------	


	#--------------------------------------------	
	$za1=calcula_total_dias_todas($fecha);
	echo '<tr>';
	echo "<td>AcuDi</td><td>".$za1."</td>";
	echo '</tr>';
	#--------------------------------------------	




	#--------------------------------------------	
	$proy=round((($total_acum_mes / $za1) * 25),2);
	echo '<tr>';
	echo "<td>Proy</td><td>".$proy."</td>";
	echo '</tr>';
	#--------------------------------------------	

include("compara_fechas.php");	


echo "</td>";
echo "</table>";


?>