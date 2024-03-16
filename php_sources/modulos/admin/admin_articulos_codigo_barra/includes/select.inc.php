<?php

echo '<table class="t1">';
	echo '<tr><td>Marca</td>';

	echo "<td>";	
	echo '<select name="marca" id="marca" onChange="fun_marca();">';	
	include("includes/select_marca.inc.php"); 
	echo '</select>';
	echo "<td>";	
	

	echo '<tr><td>clasificacion</td>';
	echo "<td>";
	echo '<select name="clasificacion" id="clasificacion" onchange="fun_clasificacion();">';	
	include("includes/select_clasificacion.inc.php");  
	echo '</select>';
	echo "</td>";	

	echo '<tr><td>Sub-clasificacion</td>';
	echo "<td>";
	echo '<select name="subclasificacion" id="subclasificacion">';	
	include("includes/select_subclasificacion.inc.php");  
	echo '</select>';
	echo "</td>";	


echo "</table>";


?>