<?php
	echo '<table class="t1">';

	echo '<tr><td>';

	echo '<table>';
	echo '<tr>';
	echo "<td>Mes</td>";
	echo "<td>Tres</td>";
	echo '</tr><tr>';
    echo '<td>'.round($row["mes"],0).'</td>';
    echo '<td>'.round($row["tres"],0).'</td>';
	echo "</tr>";
	echo '</table>';
		    
	
	
	echo '</td><td>';
	echo '<table>';
	echo '<tr>';
	echo "<td>Seis</td>";
	echo "<td>Nueve</td>";
	echo '</tr><tr>';
    echo '<td>'.round($row["seis"],0).'</td>';
    echo '<td>'.round($row["nueve"],0).'</td>';
	echo "</tr>";
	echo '</table>';

	echo '</td><td>';
	echo '<table>';
	echo '<tr>';
	echo "<td>Doce</td>";
	echo '<td>Stk</td>';

	echo '</tr><tr>';

    echo '<td>'.round($row["doce"],0).'</td>';
    echo '<td>'.round($stock["stock"],0).'</td>';
	echo "</tr>";
	echo '</table>';


	echo '</td></tr>';
	echo '</table>';

?>


