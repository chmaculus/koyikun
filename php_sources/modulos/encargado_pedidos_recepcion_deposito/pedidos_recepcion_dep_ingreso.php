<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" href="style.css" type="text/css">
<meta content="text/html; charset=UTF-8" http-equiv="content-type" />
<title>Tablabla articulos By Christian Máculus</title>
</head>

<?php
include("pedidos_recepcion_d_base.php");
?>

<form method="post" action="pedidos_recepcion_dep_update.php" name="form_pedidos_recepcion_dep">

<center>
<table class="t1" border="1">
	<tr>
		<th>proveedor</th>
		<td><input type="text" name="proveedor" id="proveedor" value="" size="10"></td>
	</tr>
	<tr>
		<th>numero_factura</th>
		<td><input type="text" name="numero_factura" id="numero_factura" value="" size="10"></td>
	</tr>
	<tr>
		<th>fecha_factura</th>
		<td><input type="text" name="fecha_factura" id="fecha_factura" value="" size="10"></td>
	</tr>
	<tr>
		<th>razon_social</th>
		<td><input type="text" name="razon_social" id="razon_social" value="" size="10"></td>
	</tr>
	<tr>
		<th>importe</th>
		<td><input type="text" name="importe" id="importe" value="" size="10"></td>
	</tr>
	<tr>
		<th>tipo</th>
		<td><input type="text" name="tipo" id="tipo" value="" size="10"></td>
	</tr>
	<tr>
		<th>observaciones</th>
			<td><textarea name="observaciones" id="observaciones" rows="10" cols="33"></textarea></td>	</tr>
</table>
<input type="hidden" name="accion" value="ingreso" />
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
