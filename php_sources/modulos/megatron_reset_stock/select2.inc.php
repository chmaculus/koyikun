
<table class="t1">



	<tr>
	<td>Marca</td>
	<td>Clasificacion</td>
	<td>Sub-clasificacion</td>
	</tr>

	<tr>	
	<td>	
	<select name="marca" id="marca" onChange="fun_marca();">	
	<?php
	include("select_marca.inc.php");
	?> 
	</select>
	</td>	
	

	<td>
	<select name="clasificacion" id="clasificacion" onchange="fun_clasificacion();">
	<?php	
	include("select_clasificacion.inc.php");
	?>  
	</select>
	</td>	

	<td>
	<select name="subclasificacion" id="subclasificacion">
	<?php	
	include("select_subclasificacion.inc.php");
	?>  
	</select>
	</td>	


</table>

