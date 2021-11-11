<?php
include_once("datos_caja_base.php");
if($_GET["id_datos_caja"]){
	include_once("connect.php");
	$query='select * from datos_caja where id="'.$_GET["id_datos_caja"].'"';
	$array_datos_caja=mysql_fetch_array(mysql_query($query));
}
?>
<center>
<form method="post" action="datos_caja_update.php" name="form_datos_caja">
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
<?php
if($_GET["id_datos_caja"] OR $array_datos_caja["id"]){
	echo '<input type="hidden" name="accion" value="modificacion">';
	echo '<input type="hidden" name="id_datos_caja" value="'.$array_datos_caja["id"].'">';
}else{
	echo '<input type="hidden" name="accion" value="ingreso">';
}
?>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
