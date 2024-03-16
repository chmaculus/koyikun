<table class="t1">
	<tr>
		<td>Sucursal</td>
		<td><?php echo $array_novedades["id_sucursal"]; ?></td>
	</tr>
	<tr>
		<td>Motivo</td>
		<td><?php echo $array_novedades["motivo"]; ?></td>
	</tr>
	<tr>
		<td>Texto</td>
		<td><?php echo str_replace(chr(13),"<br>",$array_novedades["texto"]); ?></td>
	</tr>
	<tr>
		<td>Vigencia inicio</td>
		<td><?php echo $array_novedades["vigencia_inicio"]; ?></td>
	</tr>
	<tr>
		<td>Vigencia finaliza</td>
		<td><?php echo $array_novedades["vigencia_finaliza"]; ?></td>
	</tr>
	<tr>
		<td>Fecha</td>
		<td><?php echo $array_novedades["fecha"]; ?></td>
	</tr>
	<tr>
		<td>Hora</td>
		<td><?php echo $array_novedades["hora"]; ?></td>
	</tr>
</table>
