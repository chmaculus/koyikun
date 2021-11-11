
	<th>Marcas<br>Cosmetóloga</th>
	<td>Cosmetóloga
	<table>
		<tr>
			<td>
				<input type="checkbox" name="Cosme1" value="Fiorella"  <?php if(get_clientes_persona_valores($id_cliente,"Cosme1")!=""){echo 'checked="checked"';}?> />
				Fiorella
			</td>
			<td>
				<input type="checkbox" name="Cosme2" value="Laca"  <?php if(get_clientes_persona_valores($id_cliente,"Cosme2")!=""){echo 'checked="checked"';}?> />
				Laca
			</td>
	</tr>
	<tr>
			<td>
				<input type="checkbox" name="Cosme3" value="Dayloplas"  <?php if(get_clientes_persona_valores($id_cliente,"Cosme3")!=""){echo 'checked="checked"';}?> />
				Dayloplas
			</td>
			<td>
				<input type="checkbox" name="Cosme4" value="Germaine de capuccini"  <?php if(get_clientes_persona_valores($id_cliente,"Cosme4")!=""){echo 'checked="checked"';}?> />
				Germaine de capuccini
			</td>
		</tr>
	</table>
				Otros
				<input type="text" name="cosmarcaotros" <?php if(get_clientes_persona_valores($id_cliente,"cosmarcaotros")!=""){echo 'value="'.get_clientes_persona_valores($id_cliente,"cosmarcaotros").'"';}?>  />
	</td>
