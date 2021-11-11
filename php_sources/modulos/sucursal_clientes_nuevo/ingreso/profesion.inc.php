	<table border="1">

	<tr>
	<td>Peluquero/a</td>
		<optgroup label="">
	<td><input type="radio" name="profesion" value="Peluquero"<?php if($array_clientes_persona["profesion"]=="Peluquero"){echo 'checked="checked"';} ?> /></td>
	</tr>

	<tr>
	<td>Cosmetólogo/a</td>
	<td>		<input type="radio" name="profesion" value="Cosmetologo"<?php if($array_clientes_persona["profesion"]=="Cosmetologo"){echo 'checked="checked"';} ?> /></td>
	<tr>

	<tr>
	<td>Particular</td>
	<td>		<input type="radio" name="profesion" value="Particular"<?php if($array_clientes_persona["profesion"]=="Particular"){echo 'checked="checked"';} ?> /></td>
	<tr>

	<tr>
	<td>Internacional</td>
	<td>		<input type="radio" name="profesion" value="Internacional"<?php if($array_clientes_persona["profesion"]=="Internacional"){echo 'checked="checked"';} ?> /></td>
	<tr>

	<tr>
	<td>Los Andes Pass</td>
	<td>		<input type="radio" name="profesion" value="Los Andes Pass"<?php if($array_clientes_persona["profesion"]==="Los Andes Pass"){echo 'checked="checked"';} ?> /></td>
	<tr>

	<tr>
	<td>Otro</td>
	<td>		<input type="radio" name="profesion" value="otro" <?php 
	if( $array_clientes_persona["profesion"]!="" OR $array_clientes_persona["profesion"]!=NULL){
		if($array_clientes_persona["profesion"]!="Cosmetologo" AND  $array_clientes_persona["profesion"]!="Peluquero"){
			echo 'checked="checked"';
		}
	}?> />
	</optgroup>
	<?php 
	if($array_clientes_persona["profesion"]=="otro" ){
		$otra_prof=get_clientes_persona_valores($id_cliente,"otra_profesion");
	}elseif( $array_clientes_persona["profesion"]!="Cosmetologo" AND  $array_clientes_persona["profesion"]!="Peluquero" ){
		$otra_prof=$array_clientes_persona["profesion"];
	}else{
		$otra_prof="";
	}
	?>
	<input type="text" name="otra_profesion" size="14" value="<?php echo $otra_prof;	?>"/>
	</td>
	<tr>
	</table>
