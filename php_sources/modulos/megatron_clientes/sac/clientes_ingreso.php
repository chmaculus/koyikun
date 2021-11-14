<?php
include_once("clientes_base.php");
if($_GET["id_clientes"]){
	include_once("connect.php");
	$query='select * from clientes where id="'.$_GET["id_clientes"].'"';
	$array_clientes=mysql_fetch_array(mysql_query($query));
}
?>
<center>
<form method="post" action="clientes_update.php" name="form_clientes">
<table class="t1">

<tr>
	<th>id</th>
	<td><input type="text" name="id" id="id" value="<?php if($array_clientes["id"]){ echo $array_clientes["id"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>razon_social</th>
	<td><input type="text" name="razon_social" id="razon_social" value="<?php if($array_clientes["razon_social"]){ echo $array_clientes["razon_social"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>nombres</th>
	<td><input type="text" name="nombres" id="nombres" value="<?php if($array_clientes["nombres"]){ echo $array_clientes["nombres"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>condicion_iva</th>
	<td><input type="text" name="condicion_iva" id="condicion_iva" value="<?php if($array_clientes["condicion_iva"]){ echo $array_clientes["condicion_iva"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>cuit</th>
	<td><input type="text" name="cuit" id="cuit" value="<?php if($array_clientes["cuit"]){ echo $array_clientes["cuit"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>tipo_cliente</th>
	<td><input type="text" name="tipo_cliente" id="tipo_cliente" value="<?php if($array_clientes["tipo_cliente"]){ echo $array_clientes["tipo_cliente"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>carnet</th>
	<td><input type="text" name="carnet" id="carnet" value="<?php if($array_clientes["carnet"]){ echo $array_clientes["carnet"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>direccion</th>
	<td><input type="text" name="direccion" id="direccion" value="<?php if($array_clientes["direccion"]){ echo $array_clientes["direccion"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>ciudad</th>
	<td><input type="text" name="ciudad" id="ciudad" value="<?php if($array_clientes["ciudad"]){ echo $array_clientes["ciudad"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>provincia</th>
	<td><input type="text" name="provincia" id="provincia" value="<?php if($array_clientes["provincia"]){ echo $array_clientes["provincia"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>pais</th>
	<td><input type="text" name="pais" id="pais" value="<?php if($array_clientes["pais"]){ echo $array_clientes["pais"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>codigo_postal</th>
	<td><input type="text" name="codigo_postal" id="codigo_postal" value="<?php if($array_clientes["codigo_postal"]){ echo $array_clientes["codigo_postal"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>email</th>
	<td><textarea name="email" id="email" rows="3" cols="30"><?php if($array_clientes["email"]){ echo $array_clientes["email"]; } ?></textarea></td>
</tr>
<tr>
	<th>pagina_web</th>
	<td><input type="text" name="pagina_web" id="pagina_web" value="<?php if($array_clientes["pagina_web"]){ echo $array_clientes["pagina_web"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>telefonos</th>
	<td><textarea name="telefonos" id="telefonos" rows="3" cols="30"><?php if($array_clientes["telefonos"]){ echo $array_clientes["telefonos"]; } ?></textarea></td>
</tr>
<tr>
	<th>fax</th>
	<td><input type="text" name="fax" id="fax" value="<?php if($array_clientes["fax"]){ echo $array_clientes["fax"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>vendedor</th>
	<td><input type="text" name="vendedor" id="vendedor" value="<?php if($array_clientes["vendedor"]){ echo $array_clientes["vendedor"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>informacion_contacto</th>
	<td><textarea name="informacion_contacto" id="informacion_contacto" rows="3" cols="30"><?php if($array_clientes["informacion_contacto"]){ echo $array_clientes["informacion_contacto"]; } ?></textarea></td>
</tr>
<tr>
	<th>observaciones</th>
	<td><textarea name="observaciones" id="observaciones" rows="3" cols="30"><?php if($array_clientes["observaciones"]){ echo $array_clientes["observaciones"]; } ?></textarea></td>
</tr>
<tr>
	<th>sucursal</th>
	<td><input type="text" name="sucursal" id="sucursal" value="<?php if($array_clientes["sucursal"]){ echo $array_clientes["sucursal"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>fecha</th>
	<td><input type="text" name="fecha" id="fecha" value="<?php if($array_clientes["fecha"]){ echo $array_clientes["fecha"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>hora</th>
	<td><input type="text" name="hora" id="hora" value="<?php if($array_clientes["hora"]){ echo $array_clientes["hora"]; } ?>" size="10"></td>
</tr>

</table>
<?php
if($_GET["id_clientes"] OR $array_clientes["id"]){
	echo '<input type="hidden" name="accion" value="modificacion">';
	echo '<input type="hidden" name="id_clientes" value="'.$array_clientes["id"].'">';
}else{
	echo '<input type="hidden" name="accion" value="ingreso">';
}
?>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
