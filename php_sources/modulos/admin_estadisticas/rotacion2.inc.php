<?php
	echo '<table class="t1">';

	echo '<tr><td>';

	echo '<table>';
	echo '<tr>';
	echo "<td>Mes</td>";
	echo "<td>Tres</td>";
	echo '</tr><tr>';
    echo '<td>'.$row["mes"].'</td>';
    echo '<td>'.$row["tres"].'</td>';
	echo "</tr>";
	echo '</table>';
		    
	
	
	echo '</td><td>';
	echo '<table>';
	echo '<tr>';
	echo "<td>Seis</td>";
	echo "<td>Nueve</td>";
	echo '</tr><tr>';
    echo '<td>'.$row["seis"].'</td>';
    echo '<td>'.$row["nueve"].'</td>';
	echo "</tr>";
	echo '</table>';

	echo '</td><td>';
	echo '<table>';
	echo '<tr>';
	echo "<td>Doce</td>";
	echo '<td>Stk</td>';

	echo '</tr><tr>';

    echo '<td>'.$row["doce"].'</td>';
    echo '<td>'.$stock["stock"].'</td>';
	echo "</tr>";
	echo '</table>';


	echo '</td></tr>';
	echo '</table>';

?>


