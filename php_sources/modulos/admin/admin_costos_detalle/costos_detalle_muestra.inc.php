<table class="t1">
	<tr>
		<td>Marca</td>
		<td><?php echo $array_costos_detalle["marca"]; ?></td>
	</tr>
	<tr>
		<td>Detalle</td>
		<td><?php echo str_replace(chr(13),"<br>",$array_costos_detalle["detalle"]); ?></td>
	</tr>
	<tr>
		<td>Fecha</td>
		<td><?php echo $array_costos_detalle["fecha"]; ?></td>
	</tr>
	<tr>
		<td>Hora</td>
		<td><?php echo $array_costos_detalle["hora"]; ?></td>
	</tr>
</table>
