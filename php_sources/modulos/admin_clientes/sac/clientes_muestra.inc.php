<table class="t1">
	<tr>
		<td>id</td>
		<td><?php echo $array_clientes["id"]; ?></td>
	</tr>
	<tr>
		<td>razon_social</td>
		<td><?php echo $array_clientes["razon_social"]; ?></td>
	</tr>
	<tr>
		<td>nombres</td>
		<td><?php echo $array_clientes["nombres"]; ?></td>
	</tr>
	<tr>
		<td>condicion_iva</td>
		<td><?php echo $array_clientes["condicion_iva"]; ?></td>
	</tr>
	<tr>
		<td>cuit</td>
		<td><?php echo $array_clientes["cuit"]; ?></td>
	</tr>
	<tr>
		<td>tipo_cliente</td>
		<td><?php echo $array_clientes["tipo_cliente"]; ?></td>
	</tr>
	<tr>
		<td>carnet</td>
		<td><?php echo $array_clientes["carnet"]; ?></td>
	</tr>
	<tr>
		<td>direccion</td>
		<td><?php echo $array_clientes["direccion"]; ?></td>
	</tr>
	<tr>
		<td>ciudad</td>
		<td><?php echo $array_clientes["ciudad"]; ?></td>
	</tr>
	<tr>
		<td>provincia</td>
		<td><?php echo $array_clientes["provincia"]; ?></td>
	</tr>
	<tr>
		<td>pais</td>
		<td><?php echo $array_clientes["pais"]; ?></td>
	</tr>
	<tr>
		<td>codigo_postal</td>
		<td><?php echo $array_clientes["codigo_postal"]; ?></td>
	</tr>
	<tr>
		<td>email</td>
		<td><?php echo str_replace(chr(13),"<br>",$array_clientes["email"]); ?></td>
	</tr>
	<tr>
		<td>pagina_web</td>
		<td><?php echo $array_clientes["pagina_web"]; ?></td>
	</tr>
	<tr>
		<td>telefonos</td>
		<td><?php echo str_replace(chr(13),"<br>",$array_clientes["telefonos"]); ?></td>
	</tr>
	<tr>
		<td>fax</td>
		<td><?php echo $array_clientes["fax"]; ?></td>
	</tr>
	<tr>
		<td>vendedor</td>
		<td><?php echo $array_clientes["vendedor"]; ?></td>
	</tr>
	<tr>
		<td>informacion_contacto</td>
		<td><?php echo str_replace(chr(13),"<br>",$array_clientes["informacion_contacto"]); ?></td>
	</tr>
	<tr>
		<td>observaciones</td>
		<td><?php echo str_replace(chr(13),"<br>",$array_clientes["observaciones"]); ?></td>
	</tr>
	<tr>
		<td>sucursal</td>
		<td><?php echo $array_clientes["sucursal"]; ?></td>
	</tr>
	<tr>
		<td>fecha</td>
		<td><?php echo $array_clientes["fecha"]; ?></td>
	</tr>
	<tr>
		<td>hora</td>
		<td><?php echo $array_clientes["hora"]; ?></td>
	</tr>
</table>
