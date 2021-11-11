<?php
include_once("tarjetas_base.php");
echo "<br>";
?>

<form method="post" action="tarjetas_" name="form_tarjetas">

<center>
<table class="t1" border="1">
	<tr>
		<th>id</th>
		<td><input type="text" name="id" id="id" value="" size="10"></td>
	</tr>
	<tr>
		<th>tarjeta</th>
		<td><input type="text" name="tarjeta" id="tarjeta" value="" size="10"></td>
	</tr>
</table>
<input type="hidden" name="accion" value="ingreso" />
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>