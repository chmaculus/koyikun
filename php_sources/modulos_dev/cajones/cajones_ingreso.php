<?php
include_once("cajones_base.php");
if($_GET["id_cajones"]){
	include_once("connect.php");
	$query='select * from cajones where id="'.$_GET["id_cajones"].'"';
	$array_cajones=mysql_fetch_array(mysql_query($query));
}
?>
<center>
<form method="post" action="cajones_update.php" name="form_cajones">
<table class="t1">

<tr>
	<th>id_sucursal_origen</th>
	<td><input type="text" name="id_sucursal_origen" id="id_sucursal_origen" value="<?php if($array_cajones["id_sucursal_origen"]){ echo $array_cajones["id_sucursal_origen"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>id_sucursal_destino</th>
	<td><input type="text" name="id_sucursal_destino" id="id_sucursal_destino" value="<?php if($array_cajones["id_sucursal_destino"]){ echo $array_cajones["id_sucursal_destino"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>vendedor_envia</th>
	<td><input type="text" name="vendedor_envia" id="vendedor_envia" value="<?php if($array_cajones["vendedor_envia"]){ echo $array_cajones["vendedor_envia"]; } ?>" size="10"></td>
</tr>

</table>
<?php
if($_GET["id_cajones"] OR $array_cajones["id"]){
	echo '<input type="hidden" name="accion" value="modificacion">';
	echo '<input type="hidden" name="id_cajones" value="'.$array_cajones["id"].'">';
}else{
	echo '<input type="hidden" name="accion" value="ingreso">';
}
?>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
