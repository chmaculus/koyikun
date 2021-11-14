include_once("deposito_ingresos1_base.php");




<form method="post" action="deposito_ingresos1_update.php" name="form_deposito_ingresos1">

<center><br>
<table class="t1" border="1">
	<tr>
		<th>id</th>
		<td><input type="text" name="id" id="id" value="" size="10"></td>
	</tr>
	<tr>
		<th>proveedor</th>
		<td><input type="text" name="proveedor" id="proveedor" value="" size="10"></td>
	</tr>
	<tr>
		<th>bultos</th>
		<td><input type="text" name="bultos" id="bultos" value="" size="10"></td>
	</tr>
	<tr>
		<th>fecha</th>
		<td><input type="text" name="fecha" id="fecha" value="" size="10"></td>
	</tr>
	<tr>
		<th>fecha_sistema</th>
		<td><input type="text" name="fecha_sistema" id="fecha_sistema" value="" size="10"></td>
	</tr>
	<tr>
		<th>hora_sistema</th>
		<td><input type="text" name="hora_sistema" id="hora_sistema" value="" size="10"></td>
	</tr>
</table>
<input type="hidden" name="accion" value="ingreso" />
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>