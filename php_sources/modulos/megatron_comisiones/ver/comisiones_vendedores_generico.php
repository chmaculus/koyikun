<! #------------------------------------------------------------- >
tabla headers : comisiones_vendedores

	<th>id</th>
	<th>id_datos_caja</th>
	<th>fecha</th>
	<th>turno</th>
	<th>vendedor</th>
	<th>linea</th>
	<th>total</th>
	<th>fecha_sistema</th>
	<th>hora_sistema</th>
	<th>id_sucursal</th>
	<th>id_session</th>
<! #------------------------------------------------------------- >
<! #------------------------------------------------------------- >
tabla: comisiones_vendedores

	<td>id</td>
	<td>id_datos_caja</td>
	<td>fecha</td>
	<td>turno</td>
	<td>vendedor</td>
	<td>linea</td>
	<td>total</td>
	<td>fecha_sistema</td>
	<td>hora_sistema</td>
	<td>id_sucursal</td>
	<td>id_session</td>
<! #------------------------------------------------------------- >
<! #------------------------------------------------------------- >

<?php
#rows
	$row["id"]
	$row["id_datos_caja"]
	$row["fecha"]
	$row["turno"]
	$row["vendedor"]
	$row["linea"]
	$row["total"]
	$row["fecha_sistema"]
	$row["hora_sistema"]
	$row["id_sucursal"]
	$row["id_session"]

#--------------------------------------------------------
#rows table
	echo "<td>".$row["id"]."</td>"
	echo "<td>".$row["id_datos_caja"]."</td>"
	echo "<td>".$row["fecha"]."</td>"
	echo "<td>".$row["turno"]."</td>"
	echo "<td>".$row["vendedor"]."</td>"
	echo "<td>".$row["linea"]."</td>"
	echo "<td>".$row["total"]."</td>"
	echo "<td>".$row["fecha_sistema"]."</td>"
	echo "<td>".$row["hora_sistema"]."</td>"
	echo "<td>".$row["id_sucursal"]."</td>"
	echo "<td>".$row["id_session"]."</td>"
#--------------------------------------------------------

#--------------------------------------------------------
#rows table font
	echo '<tr>';
	echo "<td>".$row["id"]."</td>"
	echo "<td>".$row["id_datos_caja"]."</td>"
	echo "<td>".$row["fecha"]."</td>"
	echo "<td>".$row["turno"]."</td>"
	echo "<td>".$row["vendedor"]."</td>"
	echo "<td>".$row["linea"]."</td>"
	echo "<td>".$row["total"]."</td>"
	echo "<td>".$row["fecha_sistema"]."</td>"
	echo "<td>".$row["hora_sistema"]."</td>"
	echo "<td>".$row["id_sucursal"]."</td>"
	echo "<td>".$row["id_session"]."</td>"
	echo '</tr>'.chr(13);
#--------------------------------------------------------

#--------------------------------------------------------
#input
	echo '<td>id</td>';
	echo '<td><input type="text" name="id" value="" size="30" maxlength="80"></td>';
	echo '<td>id_datos_caja</td>';
	echo '<td><input type="text" name="id_datos_caja" value="" size="30" maxlength="80"></td>';
	echo '<td>fecha</td>';
	echo '<td><input type="text" name="fecha" value="" size="30" maxlength="80"></td>';
	echo '<td>turno</td>';
	echo '<td><input type="text" name="turno" value="" size="30" maxlength="80"></td>';
	echo '<td>vendedor</td>';
	echo '<td><input type="text" name="vendedor" value="" size="30" maxlength="80"></td>';
	echo '<td>linea</td>';
	echo '<td><input type="text" name="linea" value="" size="30" maxlength="80"></td>';
	echo '<td>total</td>';
	echo '<td><input type="text" name="total" value="" size="30" maxlength="80"></td>';
	echo '<td>fecha_sistema</td>';
	echo '<td><input type="text" name="fecha_sistema" value="" size="30" maxlength="80"></td>';
	echo '<td>hora_sistema</td>';
	echo '<td><input type="text" name="hora_sistema" value="" size="30" maxlength="80"></td>';
	echo '<td>id_sucursal</td>';
	echo '<td><input type="text" name="id_sucursal" value="" size="30" maxlength="80"></td>';
	echo '<td>id_session</td>';
	echo '<td><input type="text" name="id_session" value="" size="30" maxlength="80"></td>';
#--------------------------------------------------------

#--------------------------------------------------------
#modify
	echo '<tr><td>id</td>';
	echo '<td><input type="text" name="id" value="'.$array_comisiones_vendedores["id"].'" size="30" maxlength="80"></td></tr>';
	echo '<tr><td>id_datos_caja</td>';
	echo '<td><input type="text" name="id_datos_caja" value="'.$array_comisiones_vendedores["id_datos_caja"].'" size="30" maxlength="80"></td></tr>';
	echo '<tr><td>fecha</td>';
	echo '<td><input type="text" name="fecha" value="'.$array_comisiones_vendedores["fecha"].'" size="30" maxlength="80"></td></tr>';
	echo '<tr><td>turno</td>';
	echo '<td><input type="text" name="turno" value="'.$array_comisiones_vendedores["turno"].'" size="30" maxlength="80"></td></tr>';
	echo '<tr><td>vendedor</td>';
	echo '<td><input type="text" name="vendedor" value="'.$array_comisiones_vendedores["vendedor"].'" size="30" maxlength="80"></td></tr>';
	echo '<tr><td>linea</td>';
	echo '<td><input type="text" name="linea" value="'.$array_comisiones_vendedores["linea"].'" size="30" maxlength="80"></td></tr>';
	echo '<tr><td>total</td>';
	echo '<td><input type="text" name="total" value="'.$array_comisiones_vendedores["total"].'" size="30" maxlength="80"></td></tr>';
	echo '<tr><td>fecha_sistema</td>';
	echo '<td><input type="text" name="fecha_sistema" value="'.$array_comisiones_vendedores["fecha_sistema"].'" size="30" maxlength="80"></td></tr>';
	echo '<tr><td>hora_sistema</td>';
	echo '<td><input type="text" name="hora_sistema" value="'.$array_comisiones_vendedores["hora_sistema"].'" size="30" maxlength="80"></td></tr>';
	echo '<tr><td>id_sucursal</td>';
	echo '<td><input type="text" name="id_sucursal" value="'.$array_comisiones_vendedores["id_sucursal"].'" size="30" maxlength="80"></td></tr>';
	echo '<tr><td>id_session</td>';
	echo '<td><input type="text" name="id_session" value="'.$array_comisiones_vendedores["id_session"].'" size="30" maxlength="80"></td></tr>';
#--------------------------------------------------------

?>
<! #------------------------------------------------------------- >
#modify2
	<tr><td>id</td>
	<td><input type="text" name="id" value="<?php echo $array_comisiones_vendedores["id"]; ?>" size="30" maxlength="80"></td></tr>
	<tr><td>id_datos_caja</td>
	<td><input type="text" name="id_datos_caja" value="<?php echo $array_comisiones_vendedores["id_datos_caja"]; ?>" size="30" maxlength="80"></td></tr>
	<tr><td>fecha</td>
	<td><input type="text" name="fecha" value="<?php echo $array_comisiones_vendedores["fecha"]; ?>" size="30" maxlength="80"></td></tr>
	<tr><td>turno</td>
	<td><input type="text" name="turno" value="<?php echo $array_comisiones_vendedores["turno"]; ?>" size="30" maxlength="80"></td></tr>
	<tr><td>vendedor</td>
	<td><input type="text" name="vendedor" value="<?php echo $array_comisiones_vendedores["vendedor"]; ?>" size="30" maxlength="80"></td></tr>
	<tr><td>linea</td>
	<td><input type="text" name="linea" value="<?php echo $array_comisiones_vendedores["linea"]; ?>" size="30" maxlength="80"></td></tr>
	<tr><td>total</td>
	<td><input type="text" name="total" value="<?php echo $array_comisiones_vendedores["total"]; ?>" size="30" maxlength="80"></td></tr>
	<tr><td>fecha_sistema</td>
	<td><input type="text" name="fecha_sistema" value="<?php echo $array_comisiones_vendedores["fecha_sistema"]; ?>" size="30" maxlength="80"></td></tr>
	<tr><td>hora_sistema</td>
	<td><input type="text" name="hora_sistema" value="<?php echo $array_comisiones_vendedores["hora_sistema"]; ?>" size="30" maxlength="80"></td></tr>
	<tr><td>id_sucursal</td>
	<td><input type="text" name="id_sucursal" value="<?php echo $array_comisiones_vendedores["id_sucursal"]; ?>" size="30" maxlength="80"></td></tr>
	<tr><td>id_session</td>
	<td><input type="text" name="id_session" value="<?php echo $array_comisiones_vendedores["id_session"]; ?>" size="30" maxlength="80"></td></tr>
<! #------------------------------------------------------------- >
<?php

#----------------------------------------------------------------------------------
#muestra
	echo '<tr><td>id</td>';
	echo '<td>'.$array_comisiones_vendedores["id"].'</td></tr>';
	echo '<tr><td>id_datos_caja</td>';
	echo '<td>'.$array_comisiones_vendedores["id_datos_caja"].'</td></tr>';
	echo '<tr><td>fecha</td>';
	echo '<td>'.$array_comisiones_vendedores["fecha"].'</td></tr>';
	echo '<tr><td>turno</td>';
	echo '<td>'.$array_comisiones_vendedores["turno"].'</td></tr>';
	echo '<tr><td>vendedor</td>';
	echo '<td>'.$array_comisiones_vendedores["vendedor"].'</td></tr>';
	echo '<tr><td>linea</td>';
	echo '<td>'.$array_comisiones_vendedores["linea"].'</td></tr>';
	echo '<tr><td>total</td>';
	echo '<td>'.$array_comisiones_vendedores["total"].'</td></tr>';
	echo '<tr><td>fecha_sistema</td>';
	echo '<td>'.$array_comisiones_vendedores["fecha_sistema"].'</td></tr>';
	echo '<tr><td>hora_sistema</td>';
	echo '<td>'.$array_comisiones_vendedores["hora_sistema"].'</td></tr>';
	echo '<tr><td>id_sucursal</td>';
	echo '<td>'.$array_comisiones_vendedores["id_sucursal"].'</td></tr>';
	echo '<tr><td>id_session</td>';
	echo '<td>'.$array_comisiones_vendedores["id_session"].'</td></tr>';
#----------------------------------------------------------------------------------


#----------------------------------------------------------------------------------
#array post
	$array_comisiones_vendedores["id"]=$_POST["id"];
	$array_comisiones_vendedores["id_datos_caja"]=$_POST["id_datos_caja"];
	$array_comisiones_vendedores["fecha"]=$_POST["fecha"];
	$array_comisiones_vendedores["turno"]=$_POST["turno"];
	$array_comisiones_vendedores["vendedor"]=$_POST["vendedor"];
	$array_comisiones_vendedores["linea"]=$_POST["linea"];
	$array_comisiones_vendedores["total"]=$_POST["total"];
	$array_comisiones_vendedores["fecha_sistema"]=$_POST["fecha_sistema"];
	$array_comisiones_vendedores["hora_sistema"]=$_POST["hora_sistema"];
	$array_comisiones_vendedores["id_sucursal"]=$_POST["id_sucursal"];
	$array_comisiones_vendedores["id_session"]=$_POST["id_session"];
#----------------------------------------------------------------------------------


#----------------------------------------------------------------------------------
#array get
	$array_comisiones_vendedores["id"]=$_GET["id"];
	$array_comisiones_vendedores["id_datos_caja"]=$_GET["id_datos_caja"];
	$array_comisiones_vendedores["fecha"]=$_GET["fecha"];
	$array_comisiones_vendedores["turno"]=$_GET["turno"];
	$array_comisiones_vendedores["vendedor"]=$_GET["vendedor"];
	$array_comisiones_vendedores["linea"]=$_GET["linea"];
	$array_comisiones_vendedores["total"]=$_GET["total"];
	$array_comisiones_vendedores["fecha_sistema"]=$_GET["fecha_sistema"];
	$array_comisiones_vendedores["hora_sistema"]=$_GET["hora_sistema"];
	$array_comisiones_vendedores["id_sucursal"]=$_GET["id_sucursal"];
	$array_comisiones_vendedores["id_session"]=$_GET["id_session"];
#----------------------------------------------------------------------------------


#----------------------------------------------------------------------------------
#rows2
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["id_datos_caja"].'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["turno"].'</td>';
	echo '<td>'.$row["vendedor"].'</td>';
	echo '<td>'.$row["linea"].'</td>';
	echo '<td>'.$row["total"].'</td>';
	echo '<td>'.$row["fecha_sistema"].'</td>';
	echo '<td>'.$row["hora_sistema"].'</td>';
	echo '<td>'.$row["id_sucursal"].'</td>';
	echo '<td>'.$row["id_session"].'</td>';
#----------------------------------------------------------------------------------


#----------------------------------------------------------------------------------
#rows3
	echo $row["id"].'<br>'.chr(13);
	echo $row["id_datos_caja"].'<br>'.chr(13);
	echo $row["fecha"].'<br>'.chr(13);
	echo $row["turno"].'<br>'.chr(13);
	echo $row["vendedor"].'<br>'.chr(13);
	echo $row["linea"].'<br>'.chr(13);
	echo $row["total"].'<br>'.chr(13);
	echo $row["fecha_sistema"].'<br>'.chr(13);
	echo $row["hora_sistema"].'<br>'.chr(13);
	echo $row["id_sucursal"].'<br>'.chr(13);
	echo $row["id_session"].'<br>'.chr(13);
#----------------------------------------------------------------------------------


#estructura tabla
#--------------------------------------
# 0 id
# 1 id_datos_caja
# 2 fecha
# 3 turno
# 4 vendedor
# 5 linea
# 6 total
# 7 fecha_sistema
# 8 hora_sistema
# 9 id_sucursal
# 10 id_session
#--------------------------------------

#--------------------------------------
$query='select * from comisiones_vendedores';
$result=mysql_query($query)or die(mysql_error() ." ".$_SERVER["script_name"]." ".$query);
while($row=mysql_fetch_array($result)){
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["id_datos_caja"].'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["turno"].'</td>';
	echo '<td>'.$row["vendedor"].'</td>';
	echo '<td>'.$row["linea"].'</td>';
	echo '<td>'.$row["total"].'</td>';
	echo '<td>'.$row["fecha_sistema"].'</td>';
	echo '<td>'.$row["hora_sistema"].'</td>';
	echo '<td>'.$row["id_sucursal"].'</td>';
	echo '<td>'.$row["id_session"].'</td>';
}
#--------------------------------------


#--------------------------------------
	echo '<td><input type="text" name="id'.$row["id"].'" id="id'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["id"].'"></td>';
	echo '<td><input type="text" name="id_datos_caja'.$row["id"].'" id="id_datos_caja'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["id_datos_caja"].'"></td>';
	echo '<td><input type="text" name="fecha'.$row["id"].'" id="fecha'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["fecha"].'"></td>';
	echo '<td><input type="text" name="turno'.$row["id"].'" id="turno'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["turno"].'"></td>';
	echo '<td><input type="text" name="vendedor'.$row["id"].'" id="vendedor'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["vendedor"].'"></td>';
	echo '<td><input type="text" name="linea'.$row["id"].'" id="linea'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["linea"].'"></td>';
	echo '<td><input type="text" name="total'.$row["id"].'" id="total'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["total"].'"></td>';
	echo '<td><input type="text" name="fecha_sistema'.$row["id"].'" id="fecha_sistema'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["fecha_sistema"].'"></td>';
	echo '<td><input type="text" name="hora_sistema'.$row["id"].'" id="hora_sistema'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["hora_sistema"].'"></td>';
	echo '<td><input type="text" name="id_sucursal'.$row["id"].'" id="id_sucursal'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["id_sucursal"].'"></td>';
	echo '<td><input type="text" name="id_session'.$row["id"].'" id="id_session'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["id_session"].'"></td>';
#--------------------------------------

?>




