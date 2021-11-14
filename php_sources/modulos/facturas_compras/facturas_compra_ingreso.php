include_once("facturas_compra_base.php");




<form method="post" action="facturas_compra_update.php" name="form_facturas_compra">

<center><br>
<table class="t1" border="1">
	<tr>
		<th>id</th>
		<td><input type="text" name="id" id="id" value="" size="10"></td>
	</tr>
	<tr>
		<th>fecha_factura</th>
		<td><input type="text" name="fecha_factura" id="fecha_factura" value="" size="10"></td>
	</tr>
	<tr>
		<th>proveedor</th>
		<td><input type="text" name="proveedor" id="proveedor" value="" size="10"></td>
	</tr>
	<tr>
		<th>numero_factura</th>
		<td><input type="text" name="numero_factura" id="numero_factura" value="" size="10"></td>
	</tr>
	<tr>
		<th>importe</th>
		<td><input type="text" name="importe" id="importe" value="" size="10"></td>
	</tr>
	<tr>
		<th>fecha_ingreso</th>
		<td><input type="text" name="fecha_ingreso" id="fecha_ingreso" value="" size="10"></td>
	</tr>
	<tr>
		<th>hora_ingreso</th>
		<td><input type="text" name="hora_ingreso" id="hora_ingreso" value="" size="10"></td>
	</tr>
</table>
<input type="hidden" name="accion" value="ingreso" />
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>