<table border="1">
<optgroup>
	<tr>
		<td>
			Soltero/a
		</td>
	<td>
		<input type="radio" name="estado_civil" value="soltero/a" <?php if($array_clientes_persona["estado_civil"]=="soltero/a"){echo 'checked="checked"';} ?> />
	</td>
	</tr>

	<tr>
		<td>
			Casado/a
		</td>
		<td>
			<input type="radio" name="estado_civil" value="casado/a" <?php if($array_clientes_persona["estado_civil"]=="casado/a"){echo 'checked="checked"';} ?> />
		</td>
	</tr>

	<tr>
		<td>
			Divorsiado/a
		</td>
		<td>
			<input type="radio" name="estado_civil" value="divorsiado/a" <?php if($array_clientes_persona["estado_civil"]=="divorsiado/a"){echo 'checked="checked"';} ?> />
		</td>
	</tr>

	<tr>
		<td>
			Viudo/a
		</td>
		<td>
			<input type="radio" name="estado_civil" value="viudo/a" <?php if($array_clientes_persona["estado_civil"]=="viudo/a"){echo 'checked="checked"';} ?> />
		</td>
	</tr>
	
	<tr>
		<td>
			No contesta
		</td>
		<td>
			<input type="radio" name="estado_civil" value="N/C" <?php if($array_clientes_persona["estado_civil"]=="N/C"){echo 'checked="checked"';} ?> />
		</td>
	</tr>
</optgroup>
</table>

