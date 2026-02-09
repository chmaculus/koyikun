include_once("viajante_visitas_base.php");




<form method="post" action="viajante_visitas_update.php" name="form_viajante_visitas">

<center><br>
<table class="t1" border="1">
	<tr>
		<th>id</th>
		<td><input type="text" name="id" id="id" value="" size="10"></td>
	</tr>
	<tr>
		<th>id_clientes</th>
		<td><input type="text" name="id_clientes" id="id_clientes" value="" size="10"></td>
	</tr>
	<tr>
		<th>id_viajante</th>
		<td><input type="text" name="id_viajante" id="id_viajante" value="" size="10"></td>
	</tr>
	<tr>
		<th>compro</th>
		<td><input type="text" name="compro" id="compro" value="" size="10"></td>
	</tr>
	<tr>
		<th>detalle</th>
			<td><textarea name="detalle" id="detalle" rows="10" cols="33"></textarea></td>	</tr>
	<tr>
		<th>marcas_ofrecidas</th>
			<td><textarea name="marcas_ofrecidas" id="marcas_ofrecidas" rows="10" cols="33"></textarea></td>	</tr>
	<tr>
		<th>fecha_visita</th>
		<td><input type="text" name="fecha_visita" id="fecha_visita" value="" size="10"></td>
	</tr>
	<tr>
		<th>hora_visita</th>
		<td><input type="text" name="hora_visita" id="hora_visita" value="" size="10"></td>
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