	<th>Tarjetas<br>de Crédito</th>
	<td>
	¿Usa Tarjeta de Crédito?
	<table>
		<tr>
			<optgroup>
			<td>Si<input type="radio" name="usa_tarjeta" value="si" <?php if($array_clientes_persona["usa_tarjeta"]=="si"){echo 'checked="checked"';} ?> /></td>
			<td>No<input type="radio" name="usa_tarjeta" value="no" <?php if($array_clientes_persona["usa_tarjeta"]=="no"){echo 'checked="checked"';} ?>/></td>
			</optgroup>
		</tr>
	</table>
		<br>
			<table>
				<optgroup>
				<tr>
			<td>
				<input type="checkbox" name="tarjeta1" value="Mastercard"  <?php if(get_clientes_persona_valores($id_cliente,"tarjeta1")!=""){echo 'checked="checked"';}?> />
				Mastercard
			</td>
			<td>
				<input type="checkbox" name="tarjeta2" value="Cabal"  <?php if(get_clientes_persona_valores($id_cliente,"tarjeta2")!=""){echo 'checked="checked"';}?> />
				Cabal
			</td>
			<td>
				<input type="checkbox" name="tarjeta3" value="Visa"  <?php if(get_clientes_persona_valores($id_cliente,"tarjeta3")!=""){echo 'checked="checked"';}?> />
				Visa
			</td>
	</tr>
	<tr>
			<td>
				<input type="checkbox" name="tarjeta4" value="Nevada"  <?php if(get_clientes_persona_valores($id_cliente,"tarjeta4")!=""){echo 'checked="checked"';}?> />
				Nevada
			</td>
			<td>
				<input type="checkbox" name="tarjeta5" value="Nativa"  <?php if(get_clientes_persona_valores($id_cliente,"tarjeta5")!=""){echo 'checked="checked"';}?> />
				Nativa
			</td>
			<td>
				<input type="checkbox" name="tarjeta6" value="Provencred"  <?php if(get_clientes_persona_valores($id_cliente,"tarjeta6")!=""){echo 'checked="checked"';}?> />
				Provencred
			</td>
	</tr>
	<tr>
			<td>
				<input type="checkbox" name="tarjeta7" value="Naranja"  <?php if(get_clientes_persona_valores($id_cliente,"tarjeta7")!=""){echo 'checked="checked"';}?> />
				Naranja
			</td>
			<td>
				<input type="checkbox" name="tarjeta8" value="Diners"  <?php if(get_clientes_persona_valores($id_cliente,"tarjeta8")!=""){echo 'checked="checked"';}?> />
				Diners
			</td>
	</tr>
	<tr>
				<tr>

					<td>Otra
					<input type="text" name="otra_tarjeta" size="12" <?php if(get_clientes_persona_valores($id_cliente,"otra_tarjeta")!=""){echo 'value="'.get_clientes_persona_valores($id_cliente,"otra_tarjeta").'"';}?> /></td>
				</tr>
				</optgroup>
			</table>
