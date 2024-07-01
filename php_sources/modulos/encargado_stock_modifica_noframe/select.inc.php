<?php

echo '<table class="t1">';
/*
	echo '<tr>';
	echo '<td>Sucursal</td>';
	echo "<td>";
	include("sucursal_select.inc.php");
	echo "</td>";
	echo '</tr>';
*/

	echo '<td>Marca</td>';

	echo "<td>";	
	echo '<select name="marca" id="marca" onChange="fun_marca();">';	
	include("select_marca.inc.php"); 
	echo '</select>';
	echo "<td>";	
	echo "</tr>";
	

	echo "<tr>";
	echo '<td>clasificacion</td>';
	echo "<td>";
	echo '<select name="clasificacion" id="clasificacion" onchange="fun_clasificacion();">';	
	include("select_clasificacion.inc.php");  
	echo '</select>';
	echo "</td>";	
	echo "</tr>";

	echo "<tr>";
	echo '	<td>Sub-clasificacion</td>';
	echo "	<td>";
	echo '		<select name="subclasificacion" id="subclasificacion">';	
	include("select_subclasificacion.inc.php");  
	echo '		</select>';

	echo "	</td>";	
	echo "	<td>";	
	echo '<input type="submit" name="ACEPTAR" value="ACEPTAR"><br>';
	echo "	</td>";	
	echo "</tr>";


echo "</table>";


?>