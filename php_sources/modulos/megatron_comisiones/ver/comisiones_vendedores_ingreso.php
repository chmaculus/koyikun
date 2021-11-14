<?php
include_once("comisiones_vendedores_base.php");
if($_GET["id_comisiones_vendedores"]){
	include_once("connect.php");
	$query='select * from comisiones_vendedores where id="'.$_GET["id_comisiones_vendedores"].'"';
	$array_comisiones_vendedores=mysql_fetch_array(mysql_query($query));
}
?>
<center>
<form method="post" action="comisiones_vendedores_update.php" name="form_comisiones_vendedores">
<table class="t1">

<tr>
	<th>id</th>
	<td><input type="text" name="id" id="id" value="<?php if($array_comisiones_vendedores["id"]){ echo $array_comisiones_vendedores["id"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>id_datos_caja</th>
	<td><input type="text" name="id_datos_caja" id="id_datos_caja" value="<?php if($array_comisiones_vendedores["id_datos_caja"]){ echo $array_comisiones_vendedores["id_datos_caja"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>fecha</th>
	<td><input type="text" name="fecha" id="fecha" value="<?php if($array_comisiones_vendedores["fecha"]){ echo $array_comisiones_vendedores["fecha"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>turno</th>
	<td><input type="text" name="turno" id="turno" value="<?php if($array_comisiones_vendedores["turno"]){ echo $array_comisiones_vendedores["turno"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>vendedor</th>
	<td><input type="text" name="vendedor" id="vendedor" value="<?php if($array_comisiones_vendedores["vendedor"]){ echo $array_comisiones_vendedores["vendedor"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>linea</th>
	<td><input type="text" name="linea" id="linea" value="<?php if($array_comisiones_vendedores["linea"]){ echo $array_comisiones_vendedores["linea"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>total</th>
	<td><input type="text" name="total" id="total" value="<?php if($array_comisiones_vendedores["total"]){ echo $array_comisiones_vendedores["total"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>fecha_sistema</th>
	<td><input type="text" name="fecha_sistema" id="fecha_sistema" value="<?php if($array_comisiones_vendedores["fecha_sistema"]){ echo $array_comisiones_vendedores["fecha_sistema"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>hora_sistema</th>
	<td><input type="text" name="hora_sistema" id="hora_sistema" value="<?php if($array_comisiones_vendedores["hora_sistema"]){ echo $array_comisiones_vendedores["hora_sistema"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>id_sucursal</th>
	<td><input type="text" name="id_sucursal" id="id_sucursal" value="<?php if($array_comisiones_vendedores["id_sucursal"]){ echo $array_comisiones_vendedores["id_sucursal"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>id_session</th>
	<td><input type="text" name="id_session" id="id_session" value="<?php if($array_comisiones_vendedores["id_session"]){ echo $array_comisiones_vendedores["id_session"]; } ?>" size="10"></td>
</tr>

</table>
<?php
if($_GET["id_comisiones_vendedores"] OR $array_comisiones_vendedores["id"]){
	echo '<input type="hidden" name="accion" value="modificacion">';
	echo '<input type="hidden" name="id_comisiones_vendedores" value="'.$array_comisiones_vendedores["id"].'">';
}else{
	echo '<input type="hidden" name="accion" value="ingreso">';
}
?>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
