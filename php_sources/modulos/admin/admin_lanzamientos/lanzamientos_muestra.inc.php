<center>

<br>
Grabar la imagen del lanzamiento con el numero de id y extencion jpg (en minusculas)

<br>

<?php
#----------------------------------------
echo '<table class="t1">';
	echo '<tr>';
		echo '<th>id</th>';
		echo '<td>'.$array_articulos_lanzamientos["id"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>descripcion</th>';
		echo '<td>'.$array_articulos_lanzamientos["descripcion"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>fecha_inicio</th>';
		echo '<td>'.$array_articulos_lanzamientos["fecha_inicio"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>fecha_finaliza</th>';
		echo '<td>'.$array_articulos_lanzamientos["fecha_finaliza"].'</td>';
	echo '</tr>';
echo "</table>";
#----------------------------------------

?>

</table>


