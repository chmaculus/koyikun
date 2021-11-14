<?php
include("vendedores_base.php");
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
  <meta content="text/html; charset=UTF-8" http-equiv="content-type" />
  <title>Tablabla vendedores By Christian Máculus</title>
</head>


<form method="post" action="vendedores_update.php" name="form_vendedores">

<center>
<table class="t1" border="1">
	<tr>
		<th>id_legajo</th>
		<td><input type="text" name="id_legajo" id="id_legajo" value="" size="10"></td>
	</tr>
	<tr>
		<th>numero</th>
		<td><input type="text" name="numero" id="numero" value="" size="10"></td>
	</tr>
	<tr>
		<th>apellido</th>
		<td><input type="text" name="apellido" id="apellido" value="" size="10"></td>
	</tr>
	<tr>
		<th>nombres</th>
		<td><input type="text" name="nombres" id="nombres" value="" size="10"></td>
	</tr>
</table>
<input type="hidden" name="accion" value="ingreso" />
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>