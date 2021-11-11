<?php

include("informe_clientes_sucursal_base.php");
include_once("../includes/connect.php");

if($_GET["id_informe_clientes_sucursal"]){
    include_once("../includes/connect.php");
    $query='select * from informe_clientes_sucursal where id="'.$_GET["id_informe_clientes_sucursal"].'"';
    $array_informe_clientes_sucursal=mysql_fetch_array(mysql_query($query));
    if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
}
if($_GET["uuid_informe_clientes_sucursal"]){
    include_once("../includes/connect.php");
    $query='select * from informe_clientes_sucursal where uuid="'.$_GET["uuid_informe_clientes_sucursal"].'"';
    $array_informe_clientes_sucursal=mysql_fetch_array(mysql_query($query));
}
?>
<form method="post" action="informe_clientes_sucursal_update.php" name="form_informe_clientes_sucursal">

<center>
<table class="t1" border="1">
	<tr>
		<th>Sucursal</th>
		<td>
		<?php include("sucursal_select.inc.php");?>
		</td>
	</tr>
	<tr>
		<th>Sexo</th>
		<td>
		<select name="sexo">
		<option value="">Seleccione</option>
		<option value="Masculino">Masculino</option>
		<option value="Femenino">Femenino</option>
		</select>
		</td>
	</tr>
	<tr>
		<th>Edad</th>
		<td>
		<select name="edad">
		<option value="">Seleccione</option>
		<option value="Menos de 20">Menos de 20</option>
		<option value="20-29">20-29</option>
		<option value="30-39">30-39</option>
		<option value="40-59">40-59</option>
		<option value="50-59">50-59</option>
		<option value="60-70">60-70</option>
		<option value="Mas de 70">Mas de 70</option>
		</select>
		</td>
	</tr>
	<tr>
		<th>Compra</th>
		<td>
		<select name="compra">
		<option value="">Seleccione</option>
		<option value="S">Si</option>
		<option value="N">No</option>
		</select>
		</td>
	</tr>
	<tr>
		<th>Motivo no</th>
		<td>
		<select name="motivo_no">
		<option value="">Seleccione</option>
		<option value="No fue atendido">No fue atendido</option>
		<option value="Falta dinero">Falta dinero</option>
		<option value="Falta cambio">Falta cambio</option>
		<option value="Buscaba otra Marca">Buscaba otra Marca</option>
		<option value="No habia stock">No habia stock</option>
		<option value="Estaban ocupados">Estaban ocupados</option>
		<option value="otro">Otro</option>
		</select>
		</td>
	</tr>
	<tr>
		<th>otro motivo</th>
			<td><textarea name="otro_motivo" id="otro_motivo" rows="10" cols="33"><?php if($array_informe_clientes_sucursal["otro_motivo"]){echo $array_informe_clientes_sucursal["otro_motivo"];}?></textarea></td>	</tr>
	<tr>
		<th>Marca que buscaba</th>
		<td><input type="text" name="marca_buscaba" id="marca_buscaba" value="<?php if($array_informe_clientes_sucursal["marca_buscaba"]){echo $array_informe_clientes_sucursal["marca_buscaba"];}?>" size="10"></td>
	</tr>

</table>


<?php
if($_GET["id_informe_clientes_sucursal"] OR $array_informe_clientes_sucursal["id"]){
    echo '<input type="hidden" name="accion" value="modificacion">';
    echo '<input type="hidden" name="id_informe_clientes_sucursal" value="'.$array_informe_clientes_sucursal["id"].'">';
    echo '<input type="hidden" name="uuid_informe_clientes_sucursal" value="'.$array_informe_clientes_sucursal["uuid"].'">';
}else{
    echo '<input type="hidden" name="accion" value="ingreso">';
}
?>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
