<?php
$query_impuesto="SELECT codimpuesto,valor FROM impuestos WHERE borrado=0 ORDER BY nombre ASC";
$res_impuesto=mysql_query($query_impuesto);
$contador=0;
?>
<td width="17%">Impuesto</td>
<td><select id="cboImpuestos" name="AcboImpuestos" class="comboMedio">
	<option value="0">Seleccione un impuesto</option>
	<?php
	while ($contador < mysql_num_rows($res_impuesto)) { ?>
		<option value="<?php echo mysql_result($res_impuesto,$contador,"valor")?>"><?php echo mysql_result($res_impuesto,$contador,"valor")?></option>
		<? $contador++; } ?>				
	</select> %	</td>

