mediumint(8) unsignedmediumint(8) unsignedvarchar(20)varchar(20)datetimedatedate<?php
include("codigos_autorizados_base.php");
?>

<form method="post" action="codigos_autorizados_update.php" name="form_codigos_autorizados">

<center>
<table class="t1" border="1">
	<tr>
		<th>id</th>
		<td><input type="text" name="id" id="id" value="" size="10"></td>
	</tr>
	<tr>
		<th>id_servicio</th>
		<td><input type="text" name="id_servicio" id="id_servicio" value="" size="10"></td>
	</tr>
	<tr>
		<th>tipo</th>
		<td><input type="text" name="tipo" id="tipo" value="" size="10"></td>
	</tr>
	<tr>
		<th>codigo</th>
		<td><input type="text" name="codigo" id="codigo" value="" size="10"></td>
	</tr>
	<tr>
		<th>fecha</th>
		<td><input type="text" name="fecha" id="fecha" value="" size="10"></td>
	</tr>
	<tr>
		<th>hora</th>
		<td><input type="text" name="hora" id="hora" value="" size="10"></td>
	</tr>
	<tr>
		<th>fecha_vigencia</th>
		<td><input type="text" name="fecha_vigencia" id="fecha_vigencia" value="" size="10"></td>
	</tr>
	<tr>
		<th>fecha_caducidad</th>
		<td><input type="text" name="fecha_caducidad" id="fecha_caducidad" value="" size="10"></td>
	</tr>
</table>
<input type="hidden" name="accion" value="ingreso" />
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>