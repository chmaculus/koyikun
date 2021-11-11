<?php
$query_proveedores="SELECT codproveedor,nombre,nif FROM proveedores WHERE borrado=0 ORDER BY nombre ASC";
$res_proveedores=mysql_query($query_proveedores);
$contador=0;
?>


<select id="cboProveedores1" name="acboProveedores1" class="comboGrande">
	<option value="0">Todos los proveedores</option>
	<?php
	while ($contador < mysql_num_rows($res_proveedores)) { 
		if ( mysql_result($res_proveedores,$contador,"codproveedor") == $proveedor) { ?>
			<option value="<?php echo mysql_result($res_proveedores,$contador,"codproveedor")?>" selected><?php echo mysql_result($res_proveedores,$contador,"nif")?> -- <?php echo mysql_result($res_proveedores,$contador,"nombre")?></option>
		<? } else { ?> 
			<option value="<?php echo mysql_result($res_proveedores,$contador,"codproveedor")?>"><?php echo mysql_result($res_proveedores,$contador,"nif")?> -- <?php echo mysql_result($res_proveedores,$contador,"nombre")?></option>
		<? }
		$contador++;
	} ?>				
</select>						