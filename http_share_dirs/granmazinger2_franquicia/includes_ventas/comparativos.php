<?php

echo '<table class="t1">';

		$query='select distinct numero_venta from ventas where fecha="'.$fecha.'"';
		$rows=mysql_num_rows(mysql_query($query));
	echo '<tr>';
		echo '<td>TCD</td>';
		echo '<td>'.$rows.'</td>';
	echo '</tr>';

	//$aaaa=cuenta_ventas($rowab["sucursal"],$fff);
	$m=date("Y-n-d",$epoch);
	
	$m=date("Y-n",$epoch);
		$query='select distinct numero_venta from ventas where fecha>="'.$m.'-01" and fecha<="'.$m.'-31"';
		$rows=mysql_num_rows(mysql_query($query));
	echo '<tr>';
		echo '<td>TCAM</td>';
		echo '<td>'.$rows.'</td>';
		//echo '<td>'.$query.'</td>';
	echo '</tr>';


		////////////
		$epoch2=strtotime("-1 month", $epoch);
		$aa=date("Y-m",$epoch2);

		$query='select distinct numero_venta from ventas where  fecha>="'.$aa.'-01" and fecha<="'.$aa.'-31"';
		$rows=mysql_num_rows(mysql_query($query));
	echo '<tr>';
		echo '<td>TCAM-1</td>';
		echo '<td>'.$rows.'</td>';
		//echo '<td>'.$query.'</td>';
	echo '</tr>';
	/////////////////////////////////////////////
echo "</table>".chr(10);
?>