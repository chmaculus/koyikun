<table class="t1">
	<tr>
		<td>id_session</td>
		<td><?php echo $array_sessiones_activas["id_session"]; ?></td>
	</tr>
	<tr>
		<td>usuario</td>
		<td><?php echo $array_sessiones_activas["usuario"]; ?></td>
	</tr>
	<tr>
		<td>id_sucursal</td>
		<td><?php echo $array_sessiones_activas["id_sucursal"]; ?></td>
	</tr>
	<tr>
		<td>jerarquia</td>
		<td><?php echo $array_sessiones_activas["jerarquia"]; ?></td>
	</tr>
	<tr>
		<td>inicio</td>
		<td><?php echo date("Y-n-d H:i:s",$array_sessiones_activas["inicio"]); ?></td>
	</tr>
	<tr>
		<td>finaliza</td>
		<td><?php echo date("Y-n-d H:i:s",$array_sessiones_activas["finaliza"]); ?></td>
	</tr>
	<tr>
		<td>ip</td>
		<td><?php echo $array_sessiones_activas["ip"]; ?></td>
	</tr>
	<tr>
		<td>navegador</td>
		<td><?php echo $array_sessiones_activas["navegador"]; ?></td>
	</tr>
</table>
