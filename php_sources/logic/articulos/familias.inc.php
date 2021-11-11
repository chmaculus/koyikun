<?php
$query_familias="SELECT * FROM familias ORDER BY nombre ASC";
$res_familias=mysql_query($query_familias);
$contador=0;
?>

<select id="cboFamilias" name="cboFamilias" class="comboMedio">
	<option value="0">Todas las familias</option>

	<?php
	while ($contador < mysql_num_rows($res_familias)) { 
		if ( mysql_result($res_familias,$contador,"codfamilia") == $familia) { ?>
			<option value="<?php echo mysql_result($res_familias,$contador,"codfamilia")?>" selected><?php echo mysql_result($res_familias,$contador,"nombre")?></option>
		<? } else { ?> 
			<option value="<?php echo mysql_result($res_familias,$contador,"codfamilia")?>"><?php echo mysql_result($res_familias,$contador,"nombre")?></option>
		<? }
		$contador++;
	} ?>				
</select>							
