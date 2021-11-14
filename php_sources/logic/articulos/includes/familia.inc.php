<?php
$query_familias="SELECT * FROM familias WHERE borrado=0 ORDER BY nombre ASC";
$res_familias=mysql_query($query_familias);
$contador=0;
?>

<td width="17%">Familia</td>
<td><select id="cboFamilias" name="AcboFamilias" class="comboGrande">

	<option value="0">Seleccione una familia</option>
	<?php
	while ($contador < mysql_num_rows($res_familias)) { ?>
		<option value="<?php echo mysql_result($res_familias,$contador,"codfamilia")?>"><?php echo mysql_result($res_familias,$contador,"nombre")?></option>
		<? $contador++;
	} ?>				
</select>
</td>

