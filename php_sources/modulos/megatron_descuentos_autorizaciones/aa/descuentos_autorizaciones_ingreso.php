<?php
include_once("descuentos_autorizaciones_base.php");
if($_GET["id_descuentos_autorizaciones"]){
	include_once("connect.php");
	$query='select * from descuentos_autorizaciones where id="'.$_GET["id_descuentos_autorizaciones"].'"';
	$array_descuentos_autorizaciones=mysql_fetch_array(mysql_query($query));
}
?>
<center>
<form method="post" action="descuentos_autorizaciones_update.php" name="form_descuentos_autorizaciones">
<table class="t1">

<tr>
	<th>id</th>
	<td><input type="text" name="id" id="id" value="<?php if($array_descuentos_autorizaciones["id"]){ echo $array_descuentos_autorizaciones["id"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>n_carnet</th>
	<td><input type="text" name="n_carnet" id="n_carnet" value="<?php if($array_descuentos_autorizaciones["n_carnet"]){ echo $array_descuentos_autorizaciones["n_carnet"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>nombre</th>
	<td><input type="text" name="nombre" id="nombre" value="<?php if($array_descuentos_autorizaciones["nombre"]){ echo $array_descuentos_autorizaciones["nombre"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>apellido</th>
	<td><input type="text" name="apellido" id="apellido" value="<?php if($array_descuentos_autorizaciones["apellido"]){ echo $array_descuentos_autorizaciones["apellido"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>id_sucursal</th>
	<td><input type="text" name="id_sucursal" id="id_sucursal" value="<?php if($array_descuentos_autorizaciones["id_sucursal"]){ echo $array_descuentos_autorizaciones["id_sucursal"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>codigo</th>
	<td><input type="text" name="codigo" id="codigo" value="<?php if($array_descuentos_autorizaciones["codigo"]){ echo $array_descuentos_autorizaciones["codigo"]; } ?>" size="10"></td>
</tr>

</table>
<?php
if($_GET["id_descuentos_autorizaciones"] OR $array_descuentos_autorizaciones["id"]){
	echo '<input type="hidden" name="accion" value="modificacion">';
	echo '<input type="hidden" name="id_descuentos_autorizaciones" value="'.$array_descuentos_autorizaciones["id"].'">';
}else{
	echo '<input type="hidden" name="accion" value="ingreso">';
}
?>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
