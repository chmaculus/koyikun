<?php
	echo '<table class="t1">';
	echo "<tr><td>Mes</td>";
    echo '<td>'.round($row["mes"],0).'</td>';
	echo "</tr>";
		    
	echo '<tr class="special1"><td>Tres</td>';
    echo '<td>'.round($row["tres"],0).'</td>';
	echo "</tr>";

	echo "<tr><td>Seis</td>";
    echo '<td>'.round($row["seis"],0).'</td>';
	echo "</tr>";

	echo "<tr><td>Nueve</td>";
    echo '<td>'.round($row["nueve"],0).'</td>';
	echo "</tr>";

	echo "<tr><td>Doce</td>";
    echo '<td>'.round($row["doce"],0).'</td>';
	echo "</tr>";

	echo "<tr><td>Min</td>";
    echo '<td>'.round($row["tres"],0).'</td>';
	echo "</tr>";

	echo "<tr><td>Max</td>";
    echo '<td>'.round($maximo,0).'</td>';
	echo "</tr>";

	echo '<tr class="special1"><td>Stk</td>';
    echo '<td>'.round($stock["stock"],0).'</td>';
	echo "</tr>";
	echo '</table>';
?>