<?php
$q='select * from ventas_estadistica where id_articulo="'.$row["id"].'"';
$array_rotacion=mysql_fetch_array(mysql_query($q));

$stock=stock_sucursal($row["id"],1);


	echo '<table class="t1">';
	echo "<tr><td>Mes</td>";
    echo '<td>'.$array_rotacion["mes"].'</td>';
	echo "</tr>";
		    
	echo '<tr class="special1"><td>Tres</td>';
    echo '<td>'.$array_rotacion["tres"].'</td>';
	echo "</tr>";

	echo "<tr><td>Seis</td>";
    echo '<td>'.$array_rotacion["seis"].'</td>';
	echo "</tr>";

	echo "<tr><td>Nueve</td>";
    echo '<td>'.$array_rotacion["nueve"].'</td>';
	echo "</tr>";

	echo "<tr><td>Doce</td>";
    echo '<td>'.$array_rotacion["doce"].'</td>';
	echo "</tr>";

	echo "<tr><td>Min</td>";
    echo '<td>'.$array_rotacion["tres"].'</td>';
	echo "</tr>";

	echo '<tr class="special1"><td>Stk</td>';
    echo '<td>'.$stock["stock"].'</td>';
	echo "</tr>";
	echo '</table>';
?>