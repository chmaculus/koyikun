<table class="t1">
	<tr>
	<tr>
		<td>Motivo</td>
		<td><?php echo $array_reportes["motivo"]; ?></td>
	</tr>
	<tr>
		<td>Detalle</td>
		<td><?php echo str_replace(chr(13),"<br>",$array_reportes["texto"]); ?></td>
	</tr>
	<tr>
		<td>fecha</td>
		<td><?php echo $array_reportes["fecha"]; ?></td>
	</tr>
	<tr>
		<td>hora</td>
		<td><?php echo $array_reportes["hora"]; ?></td>
	</tr>
</table>
