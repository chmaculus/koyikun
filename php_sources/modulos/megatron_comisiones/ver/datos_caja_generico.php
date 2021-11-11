<! #------------------------------------------------------------- >
tabla headers : datos_caja

	<th>id</th>
	<th>numero_suc</th>
	<th>fecha</th>
	<th>total_efectivo</th>
	<th>total_tarjeta</th>
	<th>sin_comision</th>
	<th>turno</th>
	<th>fecha_sistema</th>
	<th>hora_sistema</th>
	<th>id_sucursal</th>
	<th>id_session</th>
<! #------------------------------------------------------------- >
<! #------------------------------------------------------------- >
tabla: datos_caja

	<td>id</td>
	<td>numero_suc</td>
	<td>fecha</td>
	<td>total_efectivo</td>
	<td>total_tarjeta</td>
	<td>sin_comision</td>
	<td>turno</td>
	<td>fecha_sistema</td>
	<td>hora_sistema</td>
	<td>id_sucursal</td>
	<td>id_session</td>
<! #------------------------------------------------------------- >
<! #------------------------------------------------------------- >

<?php
#rows
	$row["id"]
	$row["numero_suc"]
	$row["fecha"]
	$row["total_efectivo"]
	$row["total_tarjeta"]
	$row["sin_comision"]
	$row["turno"]
	$row["fecha_sistema"]
	$row["hora_sistema"]
	$row["id_sucursal"]
	$row["id_session"]

#--------------------------------------------------------
#rows table
	echo "<td>".$row["id"]."</td>"
	echo "<td>".$row["numero_suc"]."</td>"
	echo "<td>".$row["fecha"]."</td>"
	echo "<td>".$row["total_efectivo"]."</td>"
	echo "<td>".$row["total_tarjeta"]."</td>"
	echo "<td>".$row["sin_comision"]."</td>"
	echo "<td>".$row["turno"]."</td>"
	echo "<td>".$row["fecha_sistema"]."</td>"
	echo "<td>".$row["hora_sistema"]."</td>"
	echo "<td>".$row["id_sucursal"]."</td>"
	echo "<td>".$row["id_session"]."</td>"
#--------------------------------------------------------

#--------------------------------------------------------
#rows table font
	echo '<tr>';
	echo "<td>".$row["id"]."</td>"
	echo "<td>".$row["numero_suc"]."</td>"
	echo "<td>".$row["fecha"]."</td>"
	echo "<td>".$row["total_efectivo"]."</td>"
	echo "<td>".$row["total_tarjeta"]."</td>"
	echo "<td>".$row["sin_comision"]."</td>"
	echo "<td>".$row["turno"]."</td>"
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
	echo '<td>numero_suc</td>';
	echo '<td><input type="text" name="numero_suc" value="" size="30" maxlength="80"></td>';
	echo '<td>fecha</td>';
	echo '<td><input type="text" name="fecha" value="" size="30" maxlength="80"></td>';
	echo '<td>total_efectivo</td>';
	echo '<td><input type="text" name="total_efectivo" value="" size="30" maxlength="80"></td>';
	echo '<td>total_tarjeta</td>';
	echo '<td><input type="text" name="total_tarjeta" value="" size="30" maxlength="80"></td>';
	echo '<td>sin_comision</td>';
	echo '<td><input type="text" name="sin_comision" value="" size="30" maxlength="80"></td>';
	echo '<td>turno</td>';
	echo '<td><input type="text" name="turno" value="" size="30" maxlength="80"></td>';
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
	echo '<td><input type="text" name="id" value="'.$array_datos_caja["id"].'" size="30" maxlength="80"></td></tr>';
	echo '<tr><td>numero_suc</td>';
	echo '<td><input type="text" name="numero_suc" value="'.$array_datos_caja["numero_suc"].'" size="30" maxlength="80"></td></tr>';
	echo '<tr><td>fecha</td>';
	echo '<td><input type="text" name="fecha" value="'.$array_datos_caja["fecha"].'" size="30" maxlength="80"></td></tr>';
	echo '<tr><td>total_efectivo</td>';
	echo '<td><input type="text" name="total_efectivo" value="'.$array_datos_caja["total_efectivo"].'" size="30" maxlength="80"></td></tr>';
	echo '<tr><td>total_tarjeta</td>';
	echo '<td><input type="text" name="total_tarjeta" value="'.$array_datos_caja["total_tarjeta"].'" size="30" maxlength="80"></td></tr>';
	echo '<tr><td>sin_comision</td>';
	echo '<td><input type="text" name="sin_comision" value="'.$array_datos_caja["sin_comision"].'" size="30" maxlength="80"></td></tr>';
	echo '<tr><td>turno</td>';
	echo '<td><input type="text" name="turno" value="'.$array_datos_caja["turno"].'" size="30" maxlength="80"></td></tr>';
	echo '<tr><td>fecha_sistema</td>';
	echo '<td><input type="text" name="fecha_sistema" value="'.$array_datos_caja["fecha_sistema"].'" size="30" maxlength="80"></td></tr>';
	echo '<tr><td>hora_sistema</td>';
	echo '<td><input type="text" name="hora_sistema" value="'.$array_datos_caja["hora_sistema"].'" size="30" maxlength="80"></td></tr>';
	echo '<tr><td>id_sucursal</td>';
	echo '<td><input type="text" name="id_sucursal" value="'.$array_datos_caja["id_sucursal"].'" size="30" maxlength="80"></td></tr>';
	echo '<tr><td>id_session</td>';
	echo '<td><input type="text" name="id_session" value="'.$array_datos_caja["id_session"].'" size="30" maxlength="80"></td></tr>';
#--------------------------------------------------------

?>
<! #------------------------------------------------------------- >
#modify2
	<tr><td>id</td>
	<td><input type="text" name="id" value="<?php echo $array_datos_caja["id"]; ?>" size="30" maxlength="80"></td></tr>
	<tr><td>numero_suc</td>
	<td><input type="text" name="numero_suc" value="<?php echo $array_datos_caja["numero_suc"]; ?>" size="30" maxlength="80"></td></tr>
	<tr><td>fecha</td>
	<td><input type="text" name="fecha" value="<?php echo $array_datos_caja["fecha"]; ?>" size="30" maxlength="80"></td></tr>
	<tr><td>total_efectivo</td>
	<td><input type="text" name="total_efectivo" value="<?php echo $array_datos_caja["total_efectivo"]; ?>" size="30" maxlength="80"></td></tr>
	<tr><td>total_tarjeta</td>
	<td><input type="text" name="total_tarjeta" value="<?php echo $array_datos_caja["total_tarjeta"]; ?>" size="30" maxlength="80"></td></tr>
	<tr><td>sin_comision</td>
	<td><input type="text" name="sin_comision" value="<?php echo $array_datos_caja["sin_comision"]; ?>" size="30" maxlength="80"></td></tr>
	<tr><td>turno</td>
	<td><input type="text" name="turno" value="<?php echo $array_datos_caja["turno"]; ?>" size="30" maxlength="80"></td></tr>
	<tr><td>fecha_sistema</td>
	<td><input type="text" name="fecha_sistema" value="<?php echo $array_datos_caja["fecha_sistema"]; ?>" size="30" maxlength="80"></td></tr>
	<tr><td>hora_sistema</td>
	<td><input type="text" name="hora_sistema" value="<?php echo $array_datos_caja["hora_sistema"]; ?>" size="30" maxlength="80"></td></tr>
	<tr><td>id_sucursal</td>
	<td><input type="text" name="id_sucursal" value="<?php echo $array_datos_caja["id_sucursal"]; ?>" size="30" maxlength="80"></td></tr>
	<tr><td>id_session</td>
	<td><input type="text" name="id_session" value="<?php echo $array_datos_caja["id_session"]; ?>" size="30" maxlength="80"></td></tr>
<! #------------------------------------------------------------- >
<?php

#----------------------------------------------------------------------------------
#muestra
	echo '<tr><td>id</td>';
	echo '<td>'.$array_datos_caja["id"].'</td></tr>';
	echo '<tr><td>numero_suc</td>';
	echo '<td>'.$array_datos_caja["numero_suc"].'</td></tr>';
	echo '<tr><td>fecha</td>';
	echo '<td>'.$array_datos_caja["fecha"].'</td></tr>';
	echo '<tr><td>total_efectivo</td>';
	echo '<td>'.$array_datos_caja["total_efectivo"].'</td></tr>';
	echo '<tr><td>total_tarjeta</td>';
	echo '<td>'.$array_datos_caja["total_tarjeta"].'</td></tr>';
	echo '<tr><td>sin_comision</td>';
	echo '<td>'.$array_datos_caja["sin_comision"].'</td></tr>';
	echo '<tr><td>turno</td>';
	echo '<td>'.$array_datos_caja["turno"].'</td></tr>';
	echo '<tr><td>fecha_sistema</td>';
	echo '<td>'.$array_datos_caja["fecha_sistema"].'</td></tr>';
	echo '<tr><td>hora_sistema</td>';
	echo '<td>'.$array_datos_caja["hora_sistema"].'</td></tr>';
	echo '<tr><td>id_sucursal</td>';
	echo '<td>'.$array_datos_caja["id_sucursal"].'</td></tr>';
	echo '<tr><td>id_session</td>';
	echo '<td>'.$array_datos_caja["id_session"].'</td></tr>';
#----------------------------------------------------------------------------------


#----------------------------------------------------------------------------------
#array post
	$array_datos_caja["id"]=$_POST["id"];
	$array_datos_caja["numero_suc"]=$_POST["numero_suc"];
	$array_datos_caja["fecha"]=$_POST["fecha"];
	$array_datos_caja["total_efectivo"]=$_POST["total_efectivo"];
	$array_datos_caja["total_tarjeta"]=$_POST["total_tarjeta"];
	$array_datos_caja["sin_comision"]=$_POST["sin_comision"];
	$array_datos_caja["turno"]=$_POST["turno"];
	$array_datos_caja["fecha_sistema"]=$_POST["fecha_sistema"];
	$array_datos_caja["hora_sistema"]=$_POST["hora_sistema"];
	$array_datos_caja["id_sucursal"]=$_POST["id_sucursal"];
	$array_datos_caja["id_session"]=$_POST["id_session"];
#----------------------------------------------------------------------------------


#----------------------------------------------------------------------------------
#array get
	$array_datos_caja["id"]=$_GET["id"];
	$array_datos_caja["numero_suc"]=$_GET["numero_suc"];
	$array_datos_caja["fecha"]=$_GET["fecha"];
	$array_datos_caja["total_efectivo"]=$_GET["total_efectivo"];
	$array_datos_caja["total_tarjeta"]=$_GET["total_tarjeta"];
	$array_datos_caja["sin_comision"]=$_GET["sin_comision"];
	$array_datos_caja["turno"]=$_GET["turno"];
	$array_datos_caja["fecha_sistema"]=$_GET["fecha_sistema"];
	$array_datos_caja["hora_sistema"]=$_GET["hora_sistema"];
	$array_datos_caja["id_sucursal"]=$_GET["id_sucursal"];
	$array_datos_caja["id_session"]=$_GET["id_session"];
#----------------------------------------------------------------------------------


#----------------------------------------------------------------------------------
#rows2
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["numero_suc"].'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["total_efectivo"].'</td>';
	echo '<td>'.$row["total_tarjeta"].'</td>';
	echo '<td>'.$row["sin_comision"].'</td>';
	echo '<td>'.$row["turno"].'</td>';
	echo '<td>'.$row["fecha_sistema"].'</td>';
	echo '<td>'.$row["hora_sistema"].'</td>';
	echo '<td>'.$row["id_sucursal"].'</td>';
	echo '<td>'.$row["id_session"].'</td>';
#----------------------------------------------------------------------------------


#----------------------------------------------------------------------------------
#rows3
	echo $row["id"].'<br>'.chr(13);
	echo $row["numero_suc"].'<br>'.chr(13);
	echo $row["fecha"].'<br>'.chr(13);
	echo $row["total_efectivo"].'<br>'.chr(13);
	echo $row["total_tarjeta"].'<br>'.chr(13);
	echo $row["sin_comision"].'<br>'.chr(13);
	echo $row["turno"].'<br>'.chr(13);
	echo $row["fecha_sistema"].'<br>'.chr(13);
	echo $row["hora_sistema"].'<br>'.chr(13);
	echo $row["id_sucursal"].'<br>'.chr(13);
	echo $row["id_session"].'<br>'.chr(13);
#----------------------------------------------------------------------------------


#estructura tabla
#--------------------------------------
# 0 id
# 1 numero_suc
# 2 fecha
# 3 total_efectivo
# 4 total_tarjeta
# 5 sin_comision
# 6 turno
# 7 fecha_sistema
# 8 hora_sistema
# 9 id_sucursal
# 10 id_session
#--------------------------------------

#--------------------------------------
$query='select * from datos_caja';
$result=mysql_query($query)or die(mysql_error() ." ".$_SERVER["script_name"]." ".$query);
while($row=mysql_fetch_array($result)){
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["numero_suc"].'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["total_efectivo"].'</td>';
	echo '<td>'.$row["total_tarjeta"].'</td>';
	echo '<td>'.$row["sin_comision"].'</td>';
	echo '<td>'.$row["turno"].'</td>';
	echo '<td>'.$row["fecha_sistema"].'</td>';
	echo '<td>'.$row["hora_sistema"].'</td>';
	echo '<td>'.$row["id_sucursal"].'</td>';
	echo '<td>'.$row["id_session"].'</td>';
}
#--------------------------------------


#--------------------------------------
	echo '<td><input type="text" name="id'.$row["id"].'" id="id'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["id"].'"></td>';
	echo '<td><input type="text" name="numero_suc'.$row["id"].'" id="numero_suc'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["numero_suc"].'"></td>';
	echo '<td><input type="text" name="fecha'.$row["id"].'" id="fecha'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["fecha"].'"></td>';
	echo '<td><input type="text" name="total_efectivo'.$row["id"].'" id="total_efectivo'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["total_efectivo"].'"></td>';
	echo '<td><input type="text" name="total_tarjeta'.$row["id"].'" id="total_tarjeta'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["total_tarjeta"].'"></td>';
	echo '<td><input type="text" name="sin_comision'.$row["id"].'" id="sin_comision'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["sin_comision"].'"></td>';
	echo '<td><input type="text" name="turno'.$row["id"].'" id="turno'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["turno"].'"></td>';
	echo '<td><input type="text" name="fecha_sistema'.$row["id"].'" id="fecha_sistema'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["fecha_sistema"].'"></td>';
	echo '<td><input type="text" name="hora_sistema'.$row["id"].'" id="hora_sistema'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["hora_sistema"].'"></td>';
	echo '<td><input type="text" name="id_sucursal'.$row["id"].'" id="id_sucursal'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["id_sucursal"].'"></td>';
	echo '<td><input type="text" name="id_session'.$row["id"].'" id="id_session'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["id_session"].'"></td>';
#--------------------------------------

?>




