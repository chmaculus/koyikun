<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" href="style.css" type="text/css">
<meta content="text/html; charset=UTF-8" http-equiv="content-type" />
<title>Tablabla articulos By Christian Máculus</title>
</head>

<br />
<b>Warning</b>:  mysql_fetch_array() expects parameter 1 to be resource, boolean given in <b>/home/php/devel/php_devel0.2/modelos/koyi/input_modify.php</b> on line <b>11</b><br />
<?php
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
<?php
/*
	<tr>
		<th>id</th>
		<td><input type="text" name="id" id="id" value="<?php if($array_servicio_tecnico["id"]){echo $array_servicio_tecnico["id"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>apellido</th>
		<td><input type="text" name="apellido" id="apellido" value="<?php if($array_servicio_tecnico["apellido"]){echo $array_servicio_tecnico["apellido"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>nombres</th>
		<td><input type="text" name="nombres" id="nombres" value="<?php if($array_servicio_tecnico["nombres"]){echo $array_servicio_tecnico["nombres"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>direccion</th>
		<td><input type="text" name="direccion" id="direccion" value="<?php if($array_servicio_tecnico["direccion"]){echo $array_servicio_tecnico["direccion"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>celular</th>
		<td><input type="text" name="celular" id="celular" value="<?php if($array_servicio_tecnico["celular"]){echo $array_servicio_tecnico["celular"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>marca</th>
		<td><input type="text" name="marca" id="marca" value="<?php if($array_servicio_tecnico["marca"]){echo $array_servicio_tecnico["marca"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>codigo_servicio</th>
		<td><input type="text" name="codigo_servicio" id="codigo_servicio" value="<?php if($array_servicio_tecnico["codigo_servicio"]){echo $array_servicio_tecnico["codigo_servicio"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>modelo</th>
		<td><input type="text" name="modelo" id="modelo" value="<?php if($array_servicio_tecnico["modelo"]){echo $array_servicio_tecnico["modelo"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>n_de_serie</th>
		<td><input type="text" name="n_de_serie" id="n_de_serie" value="<?php if($array_servicio_tecnico["n_de_serie"]){echo $array_servicio_tecnico["n_de_serie"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>falla_declarada</th>
			<td><textarea name="falla_declarada" id="falla_declarada" rows="10" cols="33"><?php if($array_servicio_tecnico["falla_declarada"]){echo $array_servicio_tecnico["falla_declarada"];}?></textarea></td>	</tr>
	<tr>
		<th>falla_encontrada</th>
			<td><textarea name="falla_encontrada" id="falla_encontrada" rows="10" cols="33"><?php if($array_servicio_tecnico["falla_encontrada"]){echo $array_servicio_tecnico["falla_encontrada"];}?></textarea></td>	</tr>
	<tr>
		<th>servicio_realizado</th>
			<td><textarea name="servicio_realizado" id="servicio_realizado" rows="10" cols="33"><?php if($array_servicio_tecnico["servicio_realizado"]){echo $array_servicio_tecnico["servicio_realizado"];}?></textarea></td>	</tr>
	<tr>
		<th>sucursal</th>
		<td><input type="text" name="sucursal" id="sucursal" value="<?php if($array_servicio_tecnico["sucursal"]){echo $array_servicio_tecnico["sucursal"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>vendedor</th>
		<td><input type="text" name="vendedor" id="vendedor" value="<?php if($array_servicio_tecnico["vendedor"]){echo $array_servicio_tecnico["vendedor"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>estado</th>
		<td><input type="text" name="estado" id="estado" value="<?php if($array_servicio_tecnico["estado"]){echo $array_servicio_tecnico["estado"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>mano_de_obra</th>
		<td><input type="text" name="mano_de_obra" id="mano_de_obra" value="<?php if($array_servicio_tecnico["mano_de_obra"]){echo $array_servicio_tecnico["mano_de_obra"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>repuestos</th>
		<td><input type="text" name="repuestos" id="repuestos" value="<?php if($array_servicio_tecnico["repuestos"]){echo $array_servicio_tecnico["repuestos"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>acepta</th>
		<td><input type="text" name="acepta" id="acepta" value="<?php if($array_servicio_tecnico["acepta"]){echo $array_servicio_tecnico["acepta"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>total</th>
		<td><input type="text" name="total" id="total" value="<?php if($array_servicio_tecnico["total"]){echo $array_servicio_tecnico["total"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>retirado</th>
		<td><input type="text" name="retirado" id="retirado" value="<?php if($array_servicio_tecnico["retirado"]){echo $array_servicio_tecnico["retirado"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>fecha_ingreso</th>
		<td><input type="text" name="fecha_ingreso" id="fecha_ingreso" value="<?php if($array_servicio_tecnico["fecha_ingreso"]){echo $array_servicio_tecnico["fecha_ingreso"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>hora_ingreso</th>
		<td><input type="text" name="hora_ingreso" id="hora_ingreso" value="<?php if($array_servicio_tecnico["hora_ingreso"]){echo $array_servicio_tecnico["hora_ingreso"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>fecha_presupuesto</th>
		<td><input type="text" name="fecha_presupuesto" id="fecha_presupuesto" value="<?php if($array_servicio_tecnico["fecha_presupuesto"]){echo $array_servicio_tecnico["fecha_presupuesto"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>hora_presupuesto</th>
		<td><input type="text" name="hora_presupuesto" id="hora_presupuesto" value="<?php if($array_servicio_tecnico["hora_presupuesto"]){echo $array_servicio_tecnico["hora_presupuesto"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>fecha_reparacion</th>
		<td><input type="text" name="fecha_reparacion" id="fecha_reparacion" value="<?php if($array_servicio_tecnico["fecha_reparacion"]){echo $array_servicio_tecnico["fecha_reparacion"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>hora_reparacion</th>
		<td><input type="text" name="hora_reparacion" id="hora_reparacion" value="<?php if($array_servicio_tecnico["hora_reparacion"]){echo $array_servicio_tecnico["hora_reparacion"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>fecha_retiro</th>
		<td><input type="text" name="fecha_retiro" id="fecha_retiro" value="<?php if($array_servicio_tecnico["fecha_retiro"]){echo $array_servicio_tecnico["fecha_retiro"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>hora_retiro</th>
		<td><input type="text" name="hora_retiro" id="hora_retiro" value="<?php if($array_servicio_tecnico["hora_retiro"]){echo $array_servicio_tecnico["hora_retiro"];}?>" size="10"></td>
	</tr>

</table>

*/
/*
<table class="t1" border="1">
	<tr>
		<th>id</th>
		<th>apellido</th>
		<th>nombres</th>
		<th>direccion</th>
		<th>celular</th>
		<th>marca</th>
		<th>codigo_servicio</th>
		<th>modelo</th>
		<th>n_de_serie</th>
		<th>falla_declarada</th>
		<th>falla_encontrada</th>
		<th>servicio_realizado</th>
		<th>sucursal</th>
		<th>vendedor</th>
		<th>estado</th>
		<th>mano_de_obra</th>
		<th>repuestos</th>
		<th>acepta</th>
		<th>total</th>
		<th>retirado</th>
		<th>fecha_ingreso</th>
		<th>hora_ingreso</th>
		<th>fecha_presupuesto</th>
		<th>hora_presupuesto</th>
		<th>fecha_reparacion</th>
		<th>hora_reparacion</th>
		<th>fecha_retiro</th>
		<th>hora_retiro</th>
	</tr>
*/
/*
	<tr>
		<td><input type="text" name="id" id="id" value="<?php if($array_servicio_tecnico["id"]){echo $array_servicio_tecnico["id"];}?>" size="10"></td>
		<td><input type="text" name="apellido" id="apellido" value="<?php if($array_servicio_tecnico["apellido"]){echo $array_servicio_tecnico["apellido"];}?>" size="10"></td>
		<td><input type="text" name="nombres" id="nombres" value="<?php if($array_servicio_tecnico["nombres"]){echo $array_servicio_tecnico["nombres"];}?>" size="10"></td>
		<td><input type="text" name="direccion" id="direccion" value="<?php if($array_servicio_tecnico["direccion"]){echo $array_servicio_tecnico["direccion"];}?>" size="10"></td>
		<td><input type="text" name="celular" id="celular" value="<?php if($array_servicio_tecnico["celular"]){echo $array_servicio_tecnico["celular"];}?>" size="10"></td>
		<td><input type="text" name="marca" id="marca" value="<?php if($array_servicio_tecnico["marca"]){echo $array_servicio_tecnico["marca"];}?>" size="10"></td>
		<td><input type="text" name="codigo_servicio" id="codigo_servicio" value="<?php if($array_servicio_tecnico["codigo_servicio"]){echo $array_servicio_tecnico["codigo_servicio"];}?>" size="10"></td>
		<td><input type="text" name="modelo" id="modelo" value="<?php if($array_servicio_tecnico["modelo"]){echo $array_servicio_tecnico["modelo"];}?>" size="10"></td>
		<td><input type="text" name="n_de_serie" id="n_de_serie" value="<?php if($array_servicio_tecnico["n_de_serie"]){echo $array_servicio_tecnico["n_de_serie"];}?>" size="10"></td>
			<td><textarea name="falla_declarada" id="falla_declarada" rows="10" cols="33"><?php if($array_servicio_tecnico["falla_declarada"]){echo $array_servicio_tecnico["falla_declarada"];}?></textarea></td>			<td><textarea name="falla_encontrada" id="falla_encontrada" rows="10" cols="33"><?php if($array_servicio_tecnico["falla_encontrada"]){echo $array_servicio_tecnico["falla_encontrada"];}?></textarea></td>			<td><textarea name="servicio_realizado" id="servicio_realizado" rows="10" cols="33"><?php if($array_servicio_tecnico["servicio_realizado"]){echo $array_servicio_tecnico["servicio_realizado"];}?></textarea></td>		<td><input type="text" name="sucursal" id="sucursal" value="<?php if($array_servicio_tecnico["sucursal"]){echo $array_servicio_tecnico["sucursal"];}?>" size="10"></td>
		<td><input type="text" name="vendedor" id="vendedor" value="<?php if($array_servicio_tecnico["vendedor"]){echo $array_servicio_tecnico["vendedor"];}?>" size="10"></td>
		<td><input type="text" name="estado" id="estado" value="<?php if($array_servicio_tecnico["estado"]){echo $array_servicio_tecnico["estado"];}?>" size="10"></td>
		<td><input type="text" name="mano_de_obra" id="mano_de_obra" value="<?php if($array_servicio_tecnico["mano_de_obra"]){echo $array_servicio_tecnico["mano_de_obra"];}?>" size="10"></td>
		<td><input type="text" name="repuestos" id="repuestos" value="<?php if($array_servicio_tecnico["repuestos"]){echo $array_servicio_tecnico["repuestos"];}?>" size="10"></td>
		<td><input type="text" name="acepta" id="acepta" value="<?php if($array_servicio_tecnico["acepta"]){echo $array_servicio_tecnico["acepta"];}?>" size="10"></td>
		<td><input type="text" name="total" id="total" value="<?php if($array_servicio_tecnico["total"]){echo $array_servicio_tecnico["total"];}?>" size="10"></td>
		<td><input type="text" name="retirado" id="retirado" value="<?php if($array_servicio_tecnico["retirado"]){echo $array_servicio_tecnico["retirado"];}?>" size="10"></td>
		<td><input type="text" name="fecha_ingreso" id="fecha_ingreso" value="<?php if($array_servicio_tecnico["fecha_ingreso"]){echo $array_servicio_tecnico["fecha_ingreso"];}?>" size="10"></td>
		<td><input type="text" name="hora_ingreso" id="hora_ingreso" value="<?php if($array_servicio_tecnico["hora_ingreso"]){echo $array_servicio_tecnico["hora_ingreso"];}?>" size="10"></td>
		<td><input type="text" name="fecha_presupuesto" id="fecha_presupuesto" value="<?php if($array_servicio_tecnico["fecha_presupuesto"]){echo $array_servicio_tecnico["fecha_presupuesto"];}?>" size="10"></td>
		<td><input type="text" name="hora_presupuesto" id="hora_presupuesto" value="<?php if($array_servicio_tecnico["hora_presupuesto"]){echo $array_servicio_tecnico["hora_presupuesto"];}?>" size="10"></td>
		<td><input type="text" name="fecha_reparacion" id="fecha_reparacion" value="<?php if($array_servicio_tecnico["fecha_reparacion"]){echo $array_servicio_tecnico["fecha_reparacion"];}?>" size="10"></td>
		<td><input type="text" name="hora_reparacion" id="hora_reparacion" value="<?php if($array_servicio_tecnico["hora_reparacion"]){echo $array_servicio_tecnico["hora_reparacion"];}?>" size="10"></td>
		<td><input type="text" name="fecha_retiro" id="fecha_retiro" value="<?php if($array_servicio_tecnico["fecha_retiro"]){echo $array_servicio_tecnico["fecha_retiro"];}?>" size="10"></td>
		<td><input type="text" name="hora_retiro" id="hora_retiro" value="<?php if($array_servicio_tecnico["hora_retiro"]){echo $array_servicio_tecnico["hora_retiro"];}?>" size="10"></td>
	</tr>
*/
?>

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
