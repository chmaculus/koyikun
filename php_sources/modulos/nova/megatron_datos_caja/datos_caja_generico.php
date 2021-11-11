<! #------------------------------------------------------------- >
tabla headers : datos_caja

<table class="t1">
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
</table>
<! #------------------------------------------------------------- >


<! #------------------------------------------------------------- >
tabla: datos_caja

<table class="t1">
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
</table>
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
echo '<table class="t1">';
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
</table>
#--------------------------------------------------------


#--------------------------------------------------------
#rows table font
echo '<table class="t1">';
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
</table>
#--------------------------------------------------------


#--------------------------------------------------------
#input
<table class="t1">
<tr>
	<th>id</th>
	<td><input type="text" name="id" id="id" value="" size="10"></td>
</tr>
<tr>
	<th>numero_suc</th>
	<td><input type="text" name="numero_suc" id="numero_suc" value="" size="10"></td>
</tr>
<tr>
	<th>fecha</th>
	<td><input type="text" name="fecha" id="fecha" value="" size="10"></td>
</tr>
<tr>
	<th>total_efectivo</th>
	<td><input type="text" name="total_efectivo" id="total_efectivo" value="" size="10"></td>
</tr>
<tr>
	<th>total_tarjeta</th>
	<td><input type="text" name="total_tarjeta" id="total_tarjeta" value="" size="10"></td>
</tr>
<tr>
	<th>sin_comision</th>
	<td><input type="text" name="sin_comision" id="sin_comision" value="" size="10"></td>
</tr>
<tr>
	<th>turno</th>
	<td><input type="text" name="turno" id="turno" value="" size="10"></td>
</tr>
<tr>
	<th>fecha_sistema</th>
	<td><input type="text" name="fecha_sistema" id="fecha_sistema" value="" size="10"></td>
</tr>
<tr>
	<th>hora_sistema</th>
	<td><input type="text" name="hora_sistema" id="hora_sistema" value="" size="10"></td>
</tr>
<tr>
	<th>id_sucursal</th>
	<td><input type="text" name="id_sucursal" id="id_sucursal" value="" size="10"></td>
</tr>
<tr>
	<th>id_session</th>
	<td><input type="text" name="id_session" id="id_session" value="" size="10"></td>
</tr>
</table>
#--------------------------------------------------------


#--------------------------------------------------------
#modify
<table class="t1">
<tr>
	<th>id</th>
	<td><input type="text" name="id" id="id" value="<?php if($array_datos_caja["id"]){ echo $array_datos_caja["id"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>numero_suc</th>
	<td><input type="text" name="numero_suc" id="numero_suc" value="<?php if($array_datos_caja["numero_suc"]){ echo $array_datos_caja["numero_suc"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>fecha</th>
	<td><input type="text" name="fecha" id="fecha" value="<?php if($array_datos_caja["fecha"]){ echo $array_datos_caja["fecha"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>total_efectivo</th>
	<td><input type="text" name="total_efectivo" id="total_efectivo" value="<?php if($array_datos_caja["total_efectivo"]){ echo $array_datos_caja["total_efectivo"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>total_tarjeta</th>
	<td><input type="text" name="total_tarjeta" id="total_tarjeta" value="<?php if($array_datos_caja["total_tarjeta"]){ echo $array_datos_caja["total_tarjeta"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>sin_comision</th>
	<td><input type="text" name="sin_comision" id="sin_comision" value="<?php if($array_datos_caja["sin_comision"]){ echo $array_datos_caja["sin_comision"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>turno</th>
	<td><input type="text" name="turno" id="turno" value="<?php if($array_datos_caja["turno"]){ echo $array_datos_caja["turno"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>fecha_sistema</th>
	<td><input type="text" name="fecha_sistema" id="fecha_sistema" value="<?php if($array_datos_caja["fecha_sistema"]){ echo $array_datos_caja["fecha_sistema"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>hora_sistema</th>
	<td><input type="text" name="hora_sistema" id="hora_sistema" value="<?php if($array_datos_caja["hora_sistema"]){ echo $array_datos_caja["hora_sistema"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>id_sucursal</th>
	<td><input type="text" name="id_sucursal" id="id_sucursal" value="<?php if($array_datos_caja["id_sucursal"]){ echo $array_datos_caja["id_sucursal"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>id_session</th>
	<td><input type="text" name="id_session" id="id_session" value="<?php if($array_datos_caja["id_session"]){ echo $array_datos_caja["id_session"]; } ?>" size="10"></td>
</tr>
</table>

#--------------------------------------------------------


?>
<! #------------------------------------------------------------- >
#modify2
<table class="t1">
	<tr>
		<td>id</td>
		<td><input type="text" name="id" value="<?php echo $array_datos_caja["id"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>numero_suc</td>
		<td><input type="text" name="numero_suc" value="<?php echo $array_datos_caja["numero_suc"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>fecha</td>
		<td><input type="text" name="fecha" value="<?php echo $array_datos_caja["fecha"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>total_efectivo</td>
		<td><input type="text" name="total_efectivo" value="<?php echo $array_datos_caja["total_efectivo"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>total_tarjeta</td>
		<td><input type="text" name="total_tarjeta" value="<?php echo $array_datos_caja["total_tarjeta"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>sin_comision</td>
		<td><input type="text" name="sin_comision" value="<?php echo $array_datos_caja["sin_comision"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>turno</td>
		<td><input type="text" name="turno" value="<?php echo $array_datos_caja["turno"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>fecha_sistema</td>
		<td><input type="text" name="fecha_sistema" value="<?php echo $array_datos_caja["fecha_sistema"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>hora_sistema</td>
		<td><input type="text" name="hora_sistema" value="<?php echo $array_datos_caja["hora_sistema"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>id_sucursal</td>
		<td><input type="text" name="id_sucursal" value="<?php echo $array_datos_caja["id_sucursal"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>id_session</td>
		<td><input type="text" name="id_session" value="<?php echo $array_datos_caja["id_session"]; ?>" size="30" maxlength="80"></td>
	</tr>
</table>
<! #------------------------------------------------------------- >
<?php

#----------------------------------------------------------------------------------
#muestra
echo '<table class="t1">';
echo "<tr>";
	echo '<td>id</td>';
	echo '<td>'.$array_datos_caja["id"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>numero_suc</td>';
	echo '<td>'.$array_datos_caja["numero_suc"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>fecha</td>';
	echo '<td>'.$array_datos_caja["fecha"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>total_efectivo</td>';
	echo '<td>'.$array_datos_caja["total_efectivo"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>total_tarjeta</td>';
	echo '<td>'.$array_datos_caja["total_tarjeta"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>sin_comision</td>';
	echo '<td>'.$array_datos_caja["sin_comision"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>turno</td>';
	echo '<td>'.$array_datos_caja["turno"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>fecha_sistema</td>';
	echo '<td>'.$array_datos_caja["fecha_sistema"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>hora_sistema</td>';
	echo '<td>'.$array_datos_caja["hora_sistema"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>id_sucursal</td>';
	echo '<td>'.$array_datos_caja["id_sucursal"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>id_session</td>';
	echo '<td>'.$array_datos_caja["id_session"].'</td>';
echo "</tr>";
</table>
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
#rows char 13
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


#--------------------------------------
<table class="t1">
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
</table>
#--------------------------------------


#estructura tabla: datos_caja
#--------------------------------------
# 0	id	mediumint(8) unsigned
# 1	numero_suc	varchar(5)
# 2	fecha	date
# 3	total_efectivo	double(10,2)
# 4	total_tarjeta	double(10,2)
# 5	sin_comision	double(10,2)
# 6	turno	varchar(1)
# 7	fecha_sistema	date
# 8	hora_sistema	time
# 9	id_sucursal	mediumint(9)
# 10	id_session	varchar(30)
#--------------------------------------


#--------------------------------------
#temporal mio
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


