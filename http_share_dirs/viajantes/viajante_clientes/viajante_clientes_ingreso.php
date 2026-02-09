include_once("viajante_clientes_base.php");




<form method="post" action="viajante_clientes_update.php" name="form_viajante_clientes">

<center><br>
<table class="t1" border="1">
	<tr>
		<th>id</th>
		<td><input type="text" name="id" id="id" value="" size="10"></td>
	</tr>
	<tr>
		<th>id_viajante</th>
		<td><input type="text" name="id_viajante" id="id_viajante" value="" size="10"></td>
	</tr>
	<tr>
		<th>apellido</th>
		<td><input type="text" name="apellido" id="apellido" value="" size="10"></td>
	</tr>
	<tr>
		<th>nombres</th>
		<td><input type="text" name="nombres" id="nombres" value="" size="10"></td>
	</tr>
	<tr>
		<th>localidad</th>
		<td><input type="text" name="localidad" id="localidad" value="" size="10"></td>
	</tr>
	<tr>
		<th>codigo_postal</th>
		<td><input type="text" name="codigo_postal" id="codigo_postal" value="" size="10"></td>
	</tr>
	<tr>
		<th>celular</th>
		<td><input type="text" name="celular" id="celular" value="" size="10"></td>
	</tr>
	<tr>
		<th>fecha</th>
		<td><input type="text" name="fecha" id="fecha" value="" size="10"></td>
	</tr>
	<tr>
		<th>hora</th>
		<td><input type="text" name="hora" id="hora" value="" size="10"></td>
	</tr>
</table>
<input type="hidden" name="accion" value="ingreso" />
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>