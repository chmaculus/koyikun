<?php
$query_ubicacion="SELECT codubicacion,nombre FROM ubicaciones WHERE borrado=0 ORDER BY nombre ASC";
$res_ubicacion=mysql_query($query_ubicacion);
$contador=0;
?>

<td>Ubicaci&oacute;n</td>
<td><select id="cboUbicacion" name="cboUbicacion" class="comboGrande">
	<option value="0">Todas las ubicaciones</option>
	<?php
	while ($contador < mysql_num_rows($res_ubicacion)) { 
		if ( mysql_result($res_ubicacion,$contador,"codubicacion") == $ubicacion) { ?>
			<option value="<?php echo mysql_result($res_ubicacion,$contador,"codubicacion")?>" selected><?php echo mysql_result($res_ubicacion,$contador,"nombre")?></option>
		<? } else { ?> 
			<option value="<?php echo mysql_result($res_ubicacion,$contador,"codubicacion")?>"><?php echo mysql_result($res_ubicacion,$contador,"nombre")?></option>
		<? }
		$contador++;
	} ?>				
</select>							
</td>
