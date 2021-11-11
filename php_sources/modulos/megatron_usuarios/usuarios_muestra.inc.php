<table class="t1">
	<tr>
		<td>Nombre</td>
		<td><?php echo $array_usuarios["nombre"]; ?></td>
	</tr>
	<tr>
		<td>Usuario</td>
		<td><?php echo $array_usuarios["usuario"]; ?></td>
	</tr>
	<tr>
		<td>Sucursal</td>
		<td><?php echo nombre_sucursal($array_usuarios); ?></td>
	</tr>
	<tr>
		<td>Jerarquia</td>
		<td><?php echo $array_usuarios["jerarquia"]; ?></td>
	</tr>
	<tr>
		<td>Fecha</td>
		<td><?php echo $array_usuarios["fecha"]; ?></td>
	</tr>
	<tr>
		<td>Hora</td>
		<td><?php echo $array_usuarios["hora"]; ?></td>
	</tr>
</table>
