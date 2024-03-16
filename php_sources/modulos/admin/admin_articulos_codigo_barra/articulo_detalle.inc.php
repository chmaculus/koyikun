<?php

$q='select * from articulos where id="'.$id_articulo.'"';
$array_articulos=mysql_fetch_array(mysql_query($q));


echo '<table border="1">';
echo '<tr><td>';

#----------------------------------------
echo '<table class="t1">';
	echo '<tr>';
		echo '<th>id</th>';
		echo '<td><font class="font1">'.$array_articulos["id"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>marca</th>';
		echo '<td>'.$array_articulos["marca"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>descripcion</th>';
		echo '<td>'.$array_articulos["descripcion"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>Color</th>';
		echo '<td>'.$array_articulos["color"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>contenido</th>';
		echo '<td>'.$array_articulos["contenido"].'</td>';
	echo '</tr>';
	echo "</table>";
echo '</td>';

echo '<td>';
echo '<table class="t1">';
	
	echo '<tr>';
		echo '<th>presentacion</th>';
		echo '<td>'.$array_articulos["presentacion"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>codigo_barra</th>';
		echo '<td>'.$array_articulos["codigo_barra"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>clasificacion</th>';
		echo '<td>'.$array_articulos["clasificacion"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>subclasificacion</th>';
		echo '<td>'.$array_articulos["subclasificacion"].'</td>';
	echo '</tr>';
echo "</table>";
	echo '<img src="barcode.php?encode=EAN-13&bdata='.$array_articulos["codigo_barra"].'&height=25&scale=2&bgcolor=%23FFFFEC&color=%23333366&type=jpg" alt="" /><br>';

echo "</td></tr>";
echo "</table>";
#----------------------------------------

?>