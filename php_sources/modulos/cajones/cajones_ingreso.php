<?php 
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");
include_once("seguridad.inc.php");
//include_once("cabecera.inc.php");
include_once("../../includes/funciones_varias.php");
include_once("cajones_base.php");
?>



<?php
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
	<th>Sucursal origen</th>
	<td><input type="text" name="sucursal_origen" id="sucursal_origen" value="<?php if($array_cajones["id_sucursal_origen"]){ echo nombre_sucursal($array_cajones["id_sucursal_origen"]); }else {echo nombre_sucursal($_COOKIE["id_sucursal"]);} ?>" size="5" readonly="readonly"></td>
	<input type="hidden" name="id_sucursal_origen" id="id_sucursal_destino" value="<?php if($array_cajones["id_sucursal_origen"]){ echo $array_cajones["id_sucursal_origen"]; }else {echo $_COOKIE["id_sucursal"];} ?>">
</tr>
<tr>
	<th>Sucursal destino</th>
	<td>
	<?php 
		echo '<select name="sucursal_destino">'.chr(10);
		include("sucursales.inc.php"); 
		echo '</select>'.chr(10);
	?>
	</td>
</tr>
<tr>
	<th>Vendedor envia</th>
	<td><input type="text" name="vendedor_envia" id="vendedor_envia" value="<?php if($array_cajones["vendedor_envia"]){ echo $array_cajones["vendedor_envia"]; } ?>" size="4"></td>
</tr>
</table>

<?php
echo '<input type="hidden" name="id_session" value="'.$id_session.'">';
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
