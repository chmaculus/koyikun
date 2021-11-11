<?php
	echo '<table class="t1">';
	echo "<tr><td>Mes</td>";
    echo '<td>'.$row["mes"].'</td>';
	echo "</tr>";
		    
	echo '<tr class="special1"><td>Tres</td>';
    echo '<td>'.$row["tres"].'</td>';
	echo "</tr>";

	echo "<tr><td>Seis</td>";
    echo '<td>'.$row["seis"].'</td>';
	echo "</tr>";

	echo "<tr><td>Nueve</td>";
    echo '<td>'.$row["nueve"].'</td>';
	echo "</tr>";

	echo "<tr><td>Doce</td>";
    echo '<td>'.$row["doce"].'</td>';
	echo "</tr>";

	echo "<tr><td>Min</td>";
    echo '<td>'.$row["tres"].'</td>';
	echo "</tr>";

	echo "<tr><td>Max</td>";
    echo '<td>'.$maximo.'</td>';
	echo "</tr>";

	echo '<tr class="special1"><td>Stk</td>';
    echo '<td>'.$stock["stock"].'</td>';
	echo "</tr>";
	echo '</table>';
?>