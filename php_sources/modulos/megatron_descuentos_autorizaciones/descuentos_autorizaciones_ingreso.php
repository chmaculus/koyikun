<?php
#include_once("cabecera.inc.php");
include_once("descuentos_autorizaciones_base.php");
if($_GET["id_descuentos_autorizaciones"]){
	include_once("connect.php");
	$query='select * from descuentos_autorizaciones where id="'.$_GET["id_descuentos_autorizaciones"].'"';
	$array_descuentos_autorizaciones=mysql_fetch_array(mysql_query($query));
}
if($_GET["uuid_descuentos_autorizaciones"]){
	include_once("connect.php");
	$query='select * from descuentos_autorizaciones where uuid="'.$_GET["uuid_descuentos_autorizaciones"].'"';
	$array_descuentos_autorizaciones=mysql_fetch_array(mysql_query($query));
}
?>
<form method="post" action="descuentos_autorizaciones_update.php" name="form_descuentos_autorizaciones">

<center>
<table class="t1" border="1">
	<tr>
	<tr>
		<th>N carnet</th>
		<td><input type="text" name="n_carnet" id="n_carnet" value="<?php if($array_descuentos_autorizaciones["n_carnet"]){ echo $array_descuentos_autorizaciones["n_carnet"]; } ?>" size="10"></td>
	</tr>
	<tr>
		<th>Nombre</th>
		<td><input type="text" name="nombre" id="nombre" value="<?php if($array_descuentos_autorizaciones["nombre"]){ echo $array_descuentos_autorizaciones["nombre"]; } ?>" size="20"></td>
	</tr>
	<tr>
		<th>Apellido</th>
		<td><input type="text" name="apellido" id="apellido" value="<?php if($array_descuentos_autorizaciones["apellido"]){ echo $array_descuentos_autorizaciones["apellido"]; } ?>" size="20"></td>
	</tr>
	<tr>
		<th>Codigo barra carnet</th>
		<td><input type="text" name="codigo" id="codigo" value="<?php if($array_descuentos_autorizaciones["codigo"]){ echo $array_descuentos_autorizaciones["codigo"]; } ?>" size="25"></td>
	</tr>
	<tr>
	<?php include("includes/sucursales.inc.php");?>
	</tr>
</table>
<?php
if($_GET["id_descuentos_autorizaciones"] OR $array_descuentos_autorizaciones["id"]){
	echo '<input type="hidden" name="accion" value="modificacion">';
	echo '<input type="hidden" name="id_descuentos_autorizaciones" value="'.$array_descuentos_autorizaciones["id"].'">';
	echo '<input type="hidden" name="uuid_descuentos_autorizaciones" value="'.$array_descuentos_autorizaciones["uuid"].'">';
}else{
	echo '<input type="hidden" name="accion" value="ingreso">';
}
?>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>