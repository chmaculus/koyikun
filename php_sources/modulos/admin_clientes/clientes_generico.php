tabla: clientes

	<th>id</th>
	<th>razon_social</th>
	<th>condicion_iva</th>
	<th>cuit</th>
	<th>direccion</th>
	<th>ciudad</th>
	<th>provincia</th>
	<th>codigo_postal</th>
	<th>email</th>
	<th>pagina_web</th>
	<th>telefonos</th>
	<th>fax</th>
	<th>informacion_contacto</th>
	<th>observaciones</th>
tabla: clientes

	<td>id</td>
	<td>razon_social</td>
	<td>condicion_iva</td>
	<td>cuit</td>
	<td>direccion</td>
	<td>ciudad</td>
	<td>provincia</td>
	<td>codigo_postal</td>
	<td>email</td>
	<td>pagina_web</td>
	<td>telefonos</td>
	<td>fax</td>
	<td>informacion_contacto</td>
	<td>observaciones</td>

<?php
#rows
	$row["id"]
	$row["razon_social"]
	$row["condicion_iva"]
	$row["cuit"]
	$row["direccion"]
	$row["ciudad"]
	$row["provincia"]
	$row["codigo_postal"]
	$row["email"]
	$row["pagina_web"]
	$row["telefonos"]
	$row["fax"]
	$row["informacion_contacto"]
	$row["observaciones"]

#rows table
	echo "<td>".$row["id"]."</td>"
	echo "<td>".$row["razon_social"]."</td>"
	echo "<td>".$row["condicion_iva"]."</td>"
	echo "<td>".$row["cuit"]."</td>"
	echo "<td>".$row["direccion"]."</td>"
	echo "<td>".$row["ciudad"]."</td>"
	echo "<td>".$row["provincia"]."</td>"
	echo "<td>".$row["codigo_postal"]."</td>"
	echo "<td>".$row["email"]."</td>"
	echo "<td>".$row["pagina_web"]."</td>"
	echo "<td>".$row["telefonos"]."</td>"
	echo "<td>".$row["fax"]."</td>"
	echo "<td>".$row["informacion_contacto"]."</td>"
	echo "<td>".$row["observaciones"]."</td>"

#rows table font
	echo "<td><font1>".$row["id"]."</font1></td>"
	echo "<td><font1>".$row["razon_social"]."</font1></td>"
	echo "<td><font1>".$row["condicion_iva"]."</font1></td>"
	echo "<td><font1>".$row["cuit"]."</font1></td>"
	echo "<td><font1>".$row["direccion"]."</font1></td>"
	echo "<td><font1>".$row["ciudad"]."</font1></td>"
	echo "<td><font1>".$row["provincia"]."</font1></td>"
	echo "<td><font1>".$row["codigo_postal"]."</font1></td>"
	echo "<td><font1>".$row["email"]."</font1></td>"
	echo "<td><font1>".$row["pagina_web"]."</font1></td>"
	echo "<td><font1>".$row["telefonos"]."</font1></td>"
	echo "<td><font1>".$row["fax"]."</font1></td>"
	echo "<td><font1>".$row["informacion_contacto"]."</font1></td>"
	echo "<td><font1>".$row["observaciones"]."</font1></td>"

#input
	echo '<td><font1>id</font1></td>';
	echo '<td><input type="text" name="id" value="" size="30" maxlength="80"></td>';
	echo '<td><font1>razon_social</font1></td>';
	echo '<td><input type="text" name="razon_social" value="" size="30" maxlength="80"></td>';
	echo '<td><font1>condicion_iva</font1></td>';
	echo '<td><input type="text" name="condicion_iva" value="" size="30" maxlength="80"></td>';
	echo '<td><font1>cuit</font1></td>';
	echo '<td><input type="text" name="cuit" value="" size="30" maxlength="80"></td>';
	echo '<td><font1>direccion</font1></td>';
	echo '<td><input type="text" name="direccion" value="" size="30" maxlength="80"></td>';
	echo '<td><font1>ciudad</font1></td>';
	echo '<td><input type="text" name="ciudad" value="" size="30" maxlength="80"></td>';
	echo '<td><font1>provincia</font1></td>';
	echo '<td><input type="text" name="provincia" value="" size="30" maxlength="80"></td>';
	echo '<td><font1>codigo_postal</font1></td>';
	echo '<td><input type="text" name="codigo_postal" value="" size="30" maxlength="80"></td>';
	echo '<td><font1>email</font1></td>';
	echo '<td><input type="text" name="email" value="" size="30" maxlength="80"></td>';
	echo '<td><font1>pagina_web</font1></td>';
	echo '<td><input type="text" name="pagina_web" value="" size="30" maxlength="80"></td>';
	echo '<td><font1>telefonos</font1></td>';
	echo '<td><input type="text" name="telefonos" value="" size="30" maxlength="80"></td>';
	echo '<td><font1>fax</font1></td>';
	echo '<td><input type="text" name="fax" value="" size="30" maxlength="80"></td>';
	echo '<td><font1>informacion_contacto</font1></td>';
	echo '<td><input type="text" name="informacion_contacto" value="" size="30" maxlength="80"></td>';
	echo '<td><font1>observaciones</font1></td>';
	echo '<td><input type="text" name="observaciones" value="" size="30" maxlength="80"></td>';

#modify
	echo '<tr><td><font1>id</font1></td>';
	echo '<td><input type="text" name="id" value="'.$array_clientes["id"].'" size="30" maxlength="80"></td></tr>';
	echo '<tr><td><font1>razon_social</font1></td>';
	echo '<td><input type="text" name="razon_social" value="'.$array_clientes["razon_social"].'" size="30" maxlength="80"></td></tr>';
	echo '<tr><td><font1>condicion_iva</font1></td>';
	echo '<td><input type="text" name="condicion_iva" value="'.$array_clientes["condicion_iva"].'" size="30" maxlength="80"></td></tr>';
	echo '<tr><td><font1>cuit</font1></td>';
	echo '<td><input type="text" name="cuit" value="'.$array_clientes["cuit"].'" size="30" maxlength="80"></td></tr>';
	echo '<tr><td><font1>direccion</font1></td>';
	echo '<td><input type="text" name="direccion" value="'.$array_clientes["direccion"].'" size="30" maxlength="80"></td></tr>';
	echo '<tr><td><font1>ciudad</font1></td>';
	echo '<td><input type="text" name="ciudad" value="'.$array_clientes["ciudad"].'" size="30" maxlength="80"></td></tr>';
	echo '<tr><td><font1>provincia</font1></td>';
	echo '<td><input type="text" name="provincia" value="'.$array_clientes["provincia"].'" size="30" maxlength="80"></td></tr>';
	echo '<tr><td><font1>codigo_postal</font1></td>';
	echo '<td><input type="text" name="codigo_postal" value="'.$array_clientes["codigo_postal"].'" size="30" maxlength="80"></td></tr>';
	echo '<tr><td><font1>email</font1></td>';
	echo '<td><input type="text" name="email" value="'.$array_clientes["email"].'" size="30" maxlength="80"></td></tr>';
	echo '<tr><td><font1>pagina_web</font1></td>';
	echo '<td><input type="text" name="pagina_web" value="'.$array_clientes["pagina_web"].'" size="30" maxlength="80"></td></tr>';
	echo '<tr><td><font1>telefonos</font1></td>';
	echo '<td><input type="text" name="telefonos" value="'.$array_clientes["telefonos"].'" size="30" maxlength="80"></td></tr>';
	echo '<tr><td><font1>fax</font1></td>';
	echo '<td><input type="text" name="fax" value="'.$array_clientes["fax"].'" size="30" maxlength="80"></td></tr>';
	echo '<tr><td><font1>informacion_contacto</font1></td>';
	echo '<td><input type="text" name="informacion_contacto" value="'.$array_clientes["informacion_contacto"].'" size="30" maxlength="80"></td></tr>';
	echo '<tr><td><font1>observaciones</font1></td>';
	echo '<td><input type="text" name="observaciones" value="'.$array_clientes["observaciones"].'" size="30" maxlength="80"></td></tr>';

?>
#modify2
	<tr><td><font1>id</font1></td>
	<td><input type="text" name="id" value="<?php echo $array_clientes["id"]; ?>" size="30" maxlength="80"></td></tr>
	<tr><td><font1>razon_social</font1></td>
	<td><input type="text" name="razon_social" value="<?php echo $array_clientes["razon_social"]; ?>" size="30" maxlength="80"></td></tr>
	<tr><td><font1>condicion_iva</font1></td>
	<td><input type="text" name="condicion_iva" value="<?php echo $array_clientes["condicion_iva"]; ?>" size="30" maxlength="80"></td></tr>
	<tr><td><font1>cuit</font1></td>
	<td><input type="text" name="cuit" value="<?php echo $array_clientes["cuit"]; ?>" size="30" maxlength="80"></td></tr>
	<tr><td><font1>direccion</font1></td>
	<td><input type="text" name="direccion" value="<?php echo $array_clientes["direccion"]; ?>" size="30" maxlength="80"></td></tr>
	<tr><td><font1>ciudad</font1></td>
	<td><input type="text" name="ciudad" value="<?php echo $array_clientes["ciudad"]; ?>" size="30" maxlength="80"></td></tr>
	<tr><td><font1>provincia</font1></td>
	<td><input type="text" name="provincia" value="<?php echo $array_clientes["provincia"]; ?>" size="30" maxlength="80"></td></tr>
	<tr><td><font1>codigo_postal</font1></td>
	<td><input type="text" name="codigo_postal" value="<?php echo $array_clientes["codigo_postal"]; ?>" size="30" maxlength="80"></td></tr>
	<tr><td><font1>email</font1></td>
	<td><input type="text" name="email" value="<?php echo $array_clientes["email"]; ?>" size="30" maxlength="80"></td></tr>
	<tr><td><font1>pagina_web</font1></td>
	<td><input type="text" name="pagina_web" value="<?php echo $array_clientes["pagina_web"]; ?>" size="30" maxlength="80"></td></tr>
	<tr><td><font1>telefonos</font1></td>
	<td><input type="text" name="telefonos" value="<?php echo $array_clientes["telefonos"]; ?>" size="30" maxlength="80"></td></tr>
	<tr><td><font1>fax</font1></td>
	<td><input type="text" name="fax" value="<?php echo $array_clientes["fax"]; ?>" size="30" maxlength="80"></td></tr>
	<tr><td><font1>informacion_contacto</font1></td>
	<td><input type="text" name="informacion_contacto" value="<?php echo $array_clientes["informacion_contacto"]; ?>" size="30" maxlength="80"></td></tr>
	<tr><td><font1>observaciones</font1></td>
	<td><input type="text" name="observaciones" value="<?php echo $array_clientes["observaciones"]; ?>" size="30" maxlength="80"></td></tr>
<?php

#muestra
	echo '<tr><td><font1>id</font1></td>';
	echo '<td><font1>'.$array_clientes["id"].'</font1></td></tr>';
	echo '<tr><td><font1>razon_social</font1></td>';
	echo '<td><font1>'.$array_clientes["razon_social"].'</font1></td></tr>';
	echo '<tr><td><font1>condicion_iva</font1></td>';
	echo '<td><font1>'.$array_clientes["condicion_iva"].'</font1></td></tr>';
	echo '<tr><td><font1>cuit</font1></td>';
	echo '<td><font1>'.$array_clientes["cuit"].'</font1></td></tr>';
	echo '<tr><td><font1>direccion</font1></td>';
	echo '<td><font1>'.$array_clientes["direccion"].'</font1></td></tr>';
	echo '<tr><td><font1>ciudad</font1></td>';
	echo '<td><font1>'.$array_clientes["ciudad"].'</font1></td></tr>';
	echo '<tr><td><font1>provincia</font1></td>';
	echo '<td><font1>'.$array_clientes["provincia"].'</font1></td></tr>';
	echo '<tr><td><font1>codigo_postal</font1></td>';
	echo '<td><font1>'.$array_clientes["codigo_postal"].'</font1></td></tr>';
	echo '<tr><td><font1>email</font1></td>';
	echo '<td><font1>'.$array_clientes["email"].'</font1></td></tr>';
	echo '<tr><td><font1>pagina_web</font1></td>';
	echo '<td><font1>'.$array_clientes["pagina_web"].'</font1></td></tr>';
	echo '<tr><td><font1>telefonos</font1></td>';
	echo '<td><font1>'.$array_clientes["telefonos"].'</font1></td></tr>';
	echo '<tr><td><font1>fax</font1></td>';
	echo '<td><font1>'.$array_clientes["fax"].'</font1></td></tr>';
	echo '<tr><td><font1>informacion_contacto</font1></td>';
	echo '<td><font1>'.$array_clientes["informacion_contacto"].'</font1></td></tr>';
	echo '<tr><td><font1>observaciones</font1></td>';
	echo '<td><font1>'.$array_clientes["observaciones"].'</font1></td></tr>';

#rows2
	echo '<td><font1>'.$row["id"].'</font1></td>';
	echo '<td><font1>'.$row["razon_social"].'</font1></td>';
	echo '<td><font1>'.$row["condicion_iva"].'</font1></td>';
	echo '<td><font1>'.$row["cuit"].'</font1></td>';
	echo '<td><font1>'.$row["direccion"].'</font1></td>';
	echo '<td><font1>'.$row["ciudad"].'</font1></td>';
	echo '<td><font1>'.$row["provincia"].'</font1></td>';
	echo '<td><font1>'.$row["codigo_postal"].'</font1></td>';
	echo '<td><font1>'.$row["email"].'</font1></td>';
	echo '<td><font1>'.$row["pagina_web"].'</font1></td>';
	echo '<td><font1>'.$row["telefonos"].'</font1></td>';
	echo '<td><font1>'.$row["fax"].'</font1></td>';
	echo '<td><font1>'.$row["informacion_contacto"].'</font1></td>';
	echo '<td><font1>'.$row["observaciones"].'</font1></td>';

#rows3
	echo $row["id"].'<br>'.chr(13);
	echo $row["razon_social"].'<br>'.chr(13);
	echo $row["condicion_iva"].'<br>'.chr(13);
	echo $row["cuit"].'<br>'.chr(13);
	echo $row["direccion"].'<br>'.chr(13);
	echo $row["ciudad"].'<br>'.chr(13);
	echo $row["provincia"].'<br>'.chr(13);
	echo $row["codigo_postal"].'<br>'.chr(13);
	echo $row["email"].'<br>'.chr(13);
	echo $row["pagina_web"].'<br>'.chr(13);
	echo $row["telefonos"].'<br>'.chr(13);
	echo $row["fax"].'<br>'.chr(13);
	echo $row["informacion_contacto"].'<br>'.chr(13);
	echo $row["observaciones"].'<br>'.chr(13);

#estructura tabla
# 0 id
# 1 razon_social
# 2 condicion_iva
# 3 cuit
# 4 direccion
# 5 ciudad
# 6 provincia
# 7 codigo_postal
# 8 email
# 9 pagina_web
# 10 telefonos
# 11 fax
# 12 informacion_contacto
# 13 observaciones

?>




