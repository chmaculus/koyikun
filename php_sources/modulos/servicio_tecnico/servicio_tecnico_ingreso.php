<?php

include_once("servicio_tecnico_base.php");

if($_GET["id_servicio_tecnico"]){
    include_once("connect.php");
    $query='select * from servicio_tecnico where id="'.$_GET["id_servicio_tecnico"].'"';
    $array_servicio_tecnico=mysql_fetch_array(mysql_query($query));
    if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
}
if($_GET["uuid_servicio_tecnico"]){
    include_once("connect.php");
    $query='select * from servicio_tecnico where uuid="'.$_GET["uuid_servicio_tecnico"].'"';
    $array_servicio_tecnico=mysql_fetch_array(mysql_query($query));
}
?>
<form method="post" action="servicio_tecnico_update.php" name="form_servicio_tecnico">

<center>
<table class="t1" border="1">
	<tr>
		<th>Apellido</th>
		<td><input type="text" name="apellido" id="apellido" value="<?php if($array_servicio_tecnico["apellido"]){echo $array_servicio_tecnico["apellido"];}?>" size="25"></td>
	</tr>
	<tr>
		<th>Nombres</th>
		<td><input type="text" name="nombres" id="nombres" value="<?php if($array_servicio_tecnico["nombres"]){echo $array_servicio_tecnico["nombres"];}?>" size="30"></td>
	</tr>
	<tr>
		<th>direccion</th>
		<td><input type="text" name="direccion" id="direccion" value="<?php if($array_servicio_tecnico["direccion"]){echo $array_servicio_tecnico["direccion"];}?>" size="35"></td>
	</tr>
	<tr>
		<th>celular</th>
		<td><input type="text" name="celular" id="celular" value="<?php if($array_servicio_tecnico["celular"]){echo $array_servicio_tecnico["celular"];}?>" size="14"></td>
	</tr>
	<tr>
		<th>marca</th>
		<td><input type="text" name="marca" id="marca" value="<?php if($array_servicio_tecnico["marca"]){echo $array_servicio_tecnico["marca"];}?>" size="12"></td>
	</tr>
	<tr>
		<th>Modelo</th>
		<td><input type="text" name="modelo" id="modelo" value="<?php if($array_servicio_tecnico["modelo"]){echo $array_servicio_tecnico["modelo"];}?>" size="12"></td>
	</tr>
	<tr>
		<th>N de serie</th>
		<td><input type="text" name="n_de_serie" id="n_de_serie" value="<?php if($array_servicio_tecnico["n_de_serie"]){echo $array_servicio_tecnico["n_de_serie"];}?>" size="10"></td>
	</tr>
	 <tr>
        <th>Falla</th>
            <td><textarea name="falla_declarada" id="falla_declarada" rows="10" cols="33"><?php if($array_servicio_tecnico["falla_declarada"]){echo $array_servicio_tecnico["falla_declarada"];}?></textarea></td>    
    </tr>
	<tr>
		<th>N vendedor</th>
		<td><input type="text" name="vendedor" id="vendedor" value="<?php if($array_servicio_tecnico["vendedor"]){echo $array_servicio_tecnico["vendedor"];}?>" size="10"></td>
	</tr>
</table>


<?php
if($_GET["id_servicio_tecnico"] OR $array_servicio_tecnico["id"]){
    echo '<input type="hidden" name="accion" value="modificacion">';
    echo '<input type="hidden" name="id_servicio_tecnico" value="'.$array_servicio_tecnico["id"].'">';
    echo '<input type="hidden" name="uuid_servicio_tecnico" value="'.$array_servicio_tecnico["uuid"].'">';
}else{
    echo '<input type="hidden" name="accion" value="ingreso">';
}
?>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
