<?php


	echo '<table class="t1">';//abre tabla turno
		echo '<tr class="especial" id="especial">';
		echo "<td>TT</td>";
		echo "<td>".$row["sucursal"]."</td>";
	echo "</tr>".chr(13);

	echo "<tr>";
		echo "<td>TE</td><td>".$total_efectivo."</td>";
		echo "<td>".$cantidad_efectivo."</td>";
		echo "<td>".$porc_efectivo."%</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>TT</td><td>".$total_tarjeta."</td>";
		echo "<td>".$cantidad_tarjeta."</td>";
		echo "<td>".$porc_tarjeta."%</td>";
	echo "</tr>".chr(13);

	echo "<tr>";
		echo "<td>TD</td><td>".$total_debito."</td>";
		echo "<td>".$cantidad_debito."</td>";
		echo "<td>".$porc_debito."%</td>";
	echo "</tr>".chr(13);

	$total_tarde=( $total_efectivo + $total_tarjeta + $total_debito );
	echo "<tr>";
		echo "<td>TT2</td><td>".$total_tarde."</td>";
		echo "<td>".$tot_cli_man."</td>";
	echo "</tr>".chr(13);

	$tts=( $total_manana + $total_tarde );
	echo '<tr class="especial" id="especial">';
		echo '<td>TTS</td>';
		echo '<td>'.$tts.'</td>';
		echo '<td>TC</td>';
		echo '<td>'. $total_clientes_dia .'</td>';
	echo "</tr>".chr(13);

	echo '<tr>';
		echo '<td>VT</td>';
		echo '<td>'.round($tts / $total_clientes_dia ,2).'</td>';
	echo "</tr>".chr(13);

	echo "<tr>";
		echo "<td>XT</td>";
		echo "<td>".$zt."</td>";
	echo "</tr>".chr(13);


	echo "</table>";

?>