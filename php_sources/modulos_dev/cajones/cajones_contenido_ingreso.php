<?php
include_once("cajones_contenido_base.php");
if($_GET["id_cajones_contenido"]){
	include_once("connect.php");
	$query='select * from cajones_contenido where id="'.$_GET["id_cajones_contenido"].'"';
	$array_cajones_contenido=mysql_fetch_array(mysql_query($query));
}
?>
<center>
<form method="post" action="cajones_contenido_update.php" name="form_cajones_contenido">
<table class="t1">

<tr>
	<th>id</th>
	<td><input type="text" name="id" id="id" value="<?php if($array_cajones_contenido["id"]){ echo $array_cajones_contenido["id"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>id_cajon</th>
	<td><input type="text" name="id_cajon" id="id_cajon" value="<?php if($array_cajones_contenido["id_cajon"]){ echo $array_cajones_contenido["id_cajon"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>id_articulo</th>
	<td><input type="text" name="id_articulo" id="id_articulo" value="<?php if($array_cajones_contenido["id_articulo"]){ echo $array_cajones_contenido["id_articulo"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>marca</th>
	<td><input type="text" name="marca" id="marca" value="<?php if($array_cajones_contenido["marca"]){ echo $array_cajones_contenido["marca"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>descripcion</th>
	<td><input type="text" name="descripcion" id="descripcion" value="<?php if($array_cajones_contenido["descripcion"]){ echo $array_cajones_contenido["descripcion"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>contenido</th>
	<td><input type="text" name="contenido" id="contenido" value="<?php if($array_cajones_contenido["contenido"]){ echo $array_cajones_contenido["contenido"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>presentacion</th>
	<td><input type="text" name="presentacion" id="presentacion" value="<?php if($array_cajones_contenido["presentacion"]){ echo $array_cajones_contenido["presentacion"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>clasificacion</th>
	<td><input type="text" name="clasificacion" id="clasificacion" value="<?php if($array_cajones_contenido["clasificacion"]){ echo $array_cajones_contenido["clasificacion"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>subclasificacion</th>
	<td><input type="text" name="subclasificacion" id="subclasificacion" value="<?php if($array_cajones_contenido["subclasificacion"]){ echo $array_cajones_contenido["subclasificacion"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>precio_unitario</th>
	<td><input type="text" name="precio_unitario" id="precio_unitario" value="<?php if($array_cajones_contenido["precio_unitario"]){ echo $array_cajones_contenido["precio_unitario"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>cantidad</th>
	<td><input type="text" name="cantidad" id="cantidad" value="<?php if($array_cajones_contenido["cantidad"]){ echo $array_cajones_contenido["cantidad"]; } ?>" size="10"></td>
</tr>

</table>
<?php
if($_GET["id_cajones_contenido"] OR $array_cajones_contenido["id"]){
	echo '<input type="hidden" name="accion" value="modificacion">';
	echo '<input type="hidden" name="id_cajones_contenido" value="'.$array_cajones_contenido["id"].'">';
}else{
	echo '<input type="hidden" name="accion" value="ingreso">';
}
?>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
