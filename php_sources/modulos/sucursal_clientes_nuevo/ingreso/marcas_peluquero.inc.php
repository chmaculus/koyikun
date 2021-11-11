	<th>Marcas<br>Peluqueros</th>
	<td>Peluqueros
	<table>
		<tr>
			<td>
				<input type="checkbox" name="Pelu1" value="Loreal"  <?php if(get_clientes_persona_valores($id_cliente,"Pelu1")!=""){echo 'checked="checked"';}?> />
				Loreal
			</td>
			<td>
				<input type="checkbox" name="Pelu2" value="Wella"  <?php if(get_clientes_persona_valores($id_cliente,"Pelu2")!=""){echo 'checked="checked"';}?> />
				Wella
			</td>
			<td>
				<input type="checkbox" name="Pelu3" value="Kerastase"  <?php if(get_clientes_persona_valores($id_cliente,"Pelu3")!=""){echo 'checked="checked"';}?> />
				Kerastase
			</td>
	</tr>
	<tr>
			<td>
				<input type="checkbox" name="Pelu4" value="Silkey"  <?php if(get_clientes_persona_valores($id_cliente,"Pelu4")!=""){echo 'checked="checked"';}?> />
				Silkey
			</td>
			<td>
				<input type="checkbox" name="Pelu5" value="Framesi"  <?php if(get_clientes_persona_valores($id_cliente,"Pelu5")!=""){echo 'checked="checked"';}?> />
				Framesi
			</td>
			<td>
				<input type="checkbox" name="Pelu6" value="Alfaparf"  <?php if(get_clientes_persona_valores($id_cliente,"Pelu6")!=""){echo 'checked="checked"';}?> />
				Alfaparf
			</td>
	</tr>
	<tr>
			<td>
				<input type="checkbox" name="Pelu7" value="Bonmetique"  <?php if(get_clientes_persona_valores($id_cliente,"Pelu7")!=""){echo 'checked="checked"';}?> />
				Bonmetique
			</td>
			<td>
				<input type="checkbox" name="Pelu8" value="Single"  <?php if(get_clientes_persona_valores($id_cliente,"Pelu8")!=""){echo 'checked="checked"';}?> />
				Single
			</td>
</tr>
	</table>

				Otros
				<input type="text" name="pelmarcaotros" <?php if(get_clientes_persona_valores($id_cliente,"pelmarcaotros")!=""){echo 'value="'.get_clientes_persona_valores($id_cliente,"pelmarcaotros").'"';}?>  />
	</td>
