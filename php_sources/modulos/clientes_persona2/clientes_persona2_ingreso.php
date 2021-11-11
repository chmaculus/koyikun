<?php
include("clientes_persona2_base.php");
?>

<form method="post" action="clientes_persona2_update.php" name="form_clientes_persona2">

<center>
<table class="t1" border="1">
	<tr>
		<th>Apellido</th>
		<td><input type="text" name="apellido" id="apellido" value="" size="10"></td>
	</tr>
	<tr>
		<th>Nombres</th>
		<td><input type="text" name="nombres" id="nombres" value="" size="10"></td>
	</tr>
	<tr>
		<th>D.N.I</th>
		<td><input type="text" name="dni" id="dni" value="" size="10"></td>
	</tr>
	<tr>
		<th>estado_civil</th>
		<td><input type="text" name="estado_civil" id="estado_civil" value="" size="10"></td>
	</tr>
	<tr>
		<th>telefono</th>
		<td><input type="text" name="telefono" id="telefono" value="" size="10"></td>
	</tr>
	<tr>
		<th>celular</th>
		<td><input type="text" name="celular" id="celular" value="" size="10"></td>
	</tr>
	<tr>
		<th>email</th>
		<td><input type="text" name="email" id="email" value="" size="10"></td>
	</tr>
	<tr>
		<th>web</th>
		<td><input type="text" name="web" id="web" value="" size="10"></td>
	</tr>
	<tr>
		<th>calle</th>
		<td><input type="text" name="calle" id="calle" value="" size="10"></td>
	</tr>
	<tr>
		<th>numero</th>
		<td><input type="text" name="numero" id="numero" value="" size="10"></td>
	</tr>
	<tr>
		<th>piso</th>
		<td><input type="text" name="piso" id="piso" value="" size="10"></td>
	</tr>
	<tr>
		<th>dpto</th>
		<td><input type="text" name="dpto" id="dpto" value="" size="10"></td>
	</tr>
	<tr>
		<th>localidad</th>
		<td><input type="text" name="localidad" id="localidad" value="" size="10"></td>
	</tr>
	<tr>
		<th>departamento</th>
		<td><input type="text" name="departamento" id="departamento" value="" size="10"></td>
	</tr>
	<tr>
		<th>provincia</th>
		<td><input type="text" name="provincia" id="provincia" value="" size="10"></td>
	</tr>
	<tr>
		<th>pais</th>
		<td><input type="text" name="pais" id="pais" value="" size="10"></td>
	</tr>
	<tr>
		<th>profesion</th>
		<td><input type="text" name="profesion" id="profesion" value="" size="10"></td>
	</tr>
	<tr>
		<th>observaciones</th>
			<td><textarea name="observaciones" id="observaciones" rows="10" cols="33"></textarea></td>	</tr>
	<tr>
		<th>usa_tarjeta</th>
		<td><input type="text" name="usa_tarjeta" id="usa_tarjeta" value="" size="10"></td>
	</tr>
	<tr>
		<th>vendedor</th>
		<td><input type="text" name="vendedor" id="vendedor" value="" size="10"></td>
	</tr>
	<tr>
		<th>sucursal</th>
		<td><input type="text" name="sucursal" id="sucursal" value="" size="10"></td>
	</tr>
	<tr>
		<th>nombre_comercio</th>
		<td><input type="text" name="nombre_comercio" id="nombre_comercio" value="" size="10"></td>
	</tr>
	<tr>
		<th>tel_comercial</th>
		<td><input type="text" name="tel_comercial" id="tel_comercial" value="" size="10"></td>
	</tr>
	<tr>
		<th>dom_comercial</th>
		<td><input type="text" name="dom_comercial" id="dom_comercial" value="" size="10"></td>
	</tr>
	<tr>
		<th>localidad_comercio</th>
		<td><input type="text" name="localidad_comercio" id="localidad_comercio" value="" size="10"></td>
	</tr>
	<tr>
		<th>dpto_comercio</th>
		<td><input type="text" name="dpto_comercio" id="dpto_comercio" value="" size="10"></td>
	</tr>
	<tr>
		<th>calle_comercio</th>
		<td><input type="text" name="calle_comercio" id="calle_comercio" value="" size="10"></td>
	</tr>
	<tr>
		<th>numero_comercio</th>
		<td><input type="text" name="numero_comercio" id="numero_comercio" value="" size="10"></td>
	</tr>
	<tr>
		<th>piso_comercio</th>
		<td><input type="text" name="piso_comercio" id="piso_comercio" value="" size="10"></td>
	</tr>
	<tr>
		<th>provincia_comercio</th>
		<td><input type="text" name="provincia_comercio" id="provincia_comercio" value="" size="10"></td>
	</tr>
	<tr>
		<th>pais_comercio</th>
		<td><input type="text" name="pais_comercio" id="pais_comercio" value="" size="10"></td>
	</tr>
	<tr>
		<th>carnet</th>
		<td><input type="text" name="carnet" id="carnet" value="" size="10"></td>
	</tr>
	<tr>
		<th>codigo_barras</th>
		<td><input type="text" name="codigo_barras" id="codigo_barras" value="" size="10"></td>
	</tr>
	<tr>
		<th>fecha_entrega</th>
		<td><input type="text" name="fecha_entrega" id="fecha_entrega" value="" size="10"></td>
	</tr>
	<tr>
		<th>radio</th>
		<td><input type="text" name="radio" id="radio" value="" size="10"></td>
	</tr>
	<tr>
		<th>canal</th>
		<td><input type="text" name="canal" id="canal" value="" size="10"></td>
	</tr>
	<tr>
		<th>programas</th>
		<td><input type="text" name="programas" id="programas" value="" size="10"></td>
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