<?php
$query_embalaje="SELECT codembalaje,nombre FROM embalajes WHERE borrado=0 ORDER BY nombre ASC";
$res_embalaje=mysql_query($query_embalaje);
$contador=0;
?>
<select id="cboEmbalaje" name="AcboEmbalaje" class="comboGrande">
	<option value="0">Todos los embalajes</option>
	<?php
	while ($contador < mysql_num_rows($res_embalaje)) { 
		if ( mysql_result($res_embalaje,$contador,"codembalaje") == $embalaje) { ?>
			<option value="<?php echo mysql_result($res_embalaje,$contador,"codembalaje")?>" selected><?php echo mysql_result($res_embalaje,$contador,"nombre")?></option>
		<? } else { ?> 
			<option value="<?php echo mysql_result($res_embalaje,$contador,"codembalaje")?>"><?php echo mysql_result($res_embalaje,$contador,"nombre")?></option>
		<? }
		$contador++;
	} ?>				
</select>	