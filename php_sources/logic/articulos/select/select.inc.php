<script language="javascript" src="js/jquery-1.3.min.js"></script>
<script language="javascript" src="./select/funciones.js"></script>
<?php

echo '<table class="t1">';
	echo '<tr><td>ID</td>';
	echo "<td>";
	echo '<input type="text" name="id" id="id" value="" size="6">';	
	echo "<td>";	
	
	echo '<tr><td>Marca</td>';
	echo "<td>";	
	echo '<select name="marca" id="marca" onChange="fun_marca();">';	
	include("./select/select_marca.inc.php"); 
	echo '</select>';
	echo "<td>";	
	

	echo '<tr><td>clasificacion</td>';
	echo "<td>";
	echo '<select name="clasificacion" id="clasificacion" onchange="fun_clasificacion();">';	
	include("./select/select_clasificacion.inc.php");  
	echo '</select>';
	echo "</td>";	

	echo '<tr><td>Sub-clasificacion</td>';
	echo "<td>";
	echo '<select name="subclasificacion" id="subclasificacion">';	
	include("./select/select_subclasificacion.inc.php");  
	echo '</select>';
	echo "</td>";	

	echo '<tr><td>Descripcion</td>';
	echo "<td>";	
	echo '<input type="text" name="descripcion" id="descripcion" value="" size="20">';	
	echo "<td>";	
	
	

echo "</table>";


?>