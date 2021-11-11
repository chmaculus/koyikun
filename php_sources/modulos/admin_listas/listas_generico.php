tabla: listas

	<th>id</th>
	<th>nombre</th>
	<th>porcentaje</th>
tabla: listas

	<td>id</td>
	<td>nombre</td>
	<td>porcentaje</td>

<?php
#rows
	$row["id"]
	$row["nombre"]
	$row["porcentaje"]

#rows table
	echo "<td>".$row["id"]."</td>"
	echo "<td>".$row["nombre"]."</td>"
	echo "<td>".$row["porcentaje"]."</td>"

#rows table font
	echo "<td><font1>".$row["id"]."</font1></td>"
	echo "<td><font1>".$row["nombre"]."</font1></td>"
	echo "<td><font1>".$row["porcentaje"]."</font1></td>"

#input
	echo '<td><font1>id</font1></td>';
	echo '<td><input type="text" name="id" value="" size="30" maxlength="80"></td>';
	echo '<td><font1>nombre</font1></td>';
	echo '<td><input type="text" name="nombre" value="" size="30" maxlength="80"></td>';
	echo '<td><font1>porcentaje</font1></td>';
	echo '<td><input type="text" name="porcentaje" value="" size="30" maxlength="80"></td>';

#modify
	echo '<tr><td><font1>id</font1></td>';
	echo '<td><input type="text" name="id" value="'.$array_listas["id"].'" size="30" maxlength="80"></td></tr>';
	echo '<tr><td><font1>nombre</font1></td>';
	echo '<td><input type="text" name="nombre" value="'.$array_listas["nombre"].'" size="30" maxlength="80"></td></tr>';
	echo '<tr><td><font1>porcentaje</font1></td>';
	echo '<td><input type="text" name="porcentaje" value="'.$array_listas["porcentaje"].'" size="30" maxlength="80"></td></tr>';

?>
#modify2
	<tr><td><font1>id</font1></td>
	<td><input type="text" name="id" value="<?php echo $array_listas["id"]; ?>" size="30" maxlength="80"></td></tr>
	<tr><td><font1>nombre</font1></td>
	<td><input type="text" name="nombre" value="<?php echo $array_listas["nombre"]; ?>" size="30" maxlength="80"></td></tr>
	<tr><td><font1>porcentaje</font1></td>
	<td><input type="text" name="porcentaje" value="<?php echo $array_listas["porcentaje"]; ?>" size="30" maxlength="80"></td></tr>
<?php

#muestra
	echo '<tr><td><font1>id</font1></td>';
	echo '<td><font1>'.$array_listas["id"].'</font1></td></tr>';
	echo '<tr><td><font1>nombre</font1></td>';
	echo '<td><font1>'.$array_listas["nombre"].'</font1></td></tr>';
	echo '<tr><td><font1>porcentaje</font1></td>';
	echo '<td><font1>'.$array_listas["porcentaje"].'</font1></td></tr>';

#rows2
	echo '<td><font1>'.$row["id"].'</font1></td>';
	echo '<td><font1>'.$row["nombre"].'</font1></td>';
	echo '<td><font1>'.$row["porcentaje"].'</font1></td>';

#rows3
	echo $row["id"].'<br>'.chr(13);
	echo $row["nombre"].'<br>'.chr(13);
	echo $row["porcentaje"].'<br>'.chr(13);

#estructura tabla
# 0 id
# 1 nombre
# 2 porcentaje

?>




