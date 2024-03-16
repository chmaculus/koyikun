<?php
include("clientes_base.php");
if($_GET["id_clientes"]){
	include("connect.php");
	$query='select * from clientes where id="'.$_GET["id_clientes"].'"';
	$array_clientes=mysql_fetch_array(mysql_query($query));
}
?>
<center>
<form method="post" action="clientes_update.php">
<table border="1" class="t1">

<tr>
	<th>Razon social</th>
	<td><input type="text" name="razon_social" value="<?php if($array_clientes["razon_social"]){ echo $array_clientes["razon_social"]; } ?>" size="20"></td>
</tr>
<tr>
	<th>Condicion I.V.A.</th>
	<td><?php include("condicion_iva.inc.php");?></td>
</tr>
<tr>
	<th>C.U.I.T.</th>
	<td><input type="text" name="cuit" value="<?php if($array_clientes["cuit"]){ echo $array_clientes["cuit"]; } ?>" size="13"></td>
</tr>
<tr>
	<th>Direccion</th>
	<td><input type="text" name="direccion" value="<?php if($array_clientes["direccion"]){ echo $array_clientes["direccion"]; } ?>" size="30"></td>
</tr>
<tr>
	<th>Ciudad</th>
	<td><input type="text" name="ciudad" value="<?php if($array_clientes["ciudad"]){ echo $array_clientes["ciudad"]; }else{ echo "Ciudad";} ?>" size="20"></td>
</tr>
<tr>
	<th>Provincia</th>
	<td><input type="text" name="provincia" value="<?php if($array_clientes["provincia"]){ echo $array_clientes["provincia"]; }else{ echo "Mendoza";} ?>" size="13"></td>
</tr>
<tr>
	<th>Codigo Postal</th>
	<td><input type="text" name="codigo_postal" value="<?php if($array_clientes["codigo_postal"]){ echo $array_clientes["codigo_postal"]; }else{ echo "5500";} ?>" size="8"></td>
</tr>
<tr>
	<th>E-mail</th>
	<td><textarea name="email" rows="1" cols="30"><?php if($array_clientes["email"]){ echo $array_clientes["email"]; } ?></textarea></td>
</tr>
<tr>
	<th>Pagina web</th>
	<td><input type="text" name="pagina_web" value="<?php if($array_clientes["pagina_web"]){ echo $array_clientes["pagina_web"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>telefonos</th>
	<td><textarea name="telefonos" rows="1" cols="30"><?php if($array_clientes["telefonos"]){ echo $array_clientes["telefonos"]; } ?></textarea></td>
</tr>
<tr>
	<th>Fax</th>
	<td><input type="text" name="fax" value="<?php if($array_clientes["fax"]){ echo $array_clientes["fax"]; } ?>" size="20"></td>
</tr>
<tr>
	<th>Informacion <br>de contacto</th>
	<td><textarea name="informacion_contacto" rows="1" cols="30"><?php if($array_clientes["informacion_contacto"]){ echo $array_clientes["informacion_contacto"]; } ?></textarea></td>
</tr>
<tr>
	<th>Observaciones</th>
	<td><textarea name="observaciones" rows="3" cols="30"><?php if($array_clientes["observaciones"]){ echo $array_clientes["observaciones"]; } ?></textarea></td>
</tr>

</table>
<?php
if($_GET["id_clientes"]){
	echo '<input type="hidden" name="accion" value="modificacion">';
	echo '<input type="hidden" name="id_clientes" value="'.$array_clientes["id"].'">';
}else{
	echo '<input type="hidden" name="accion" value="ingreso">';
}
?>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
