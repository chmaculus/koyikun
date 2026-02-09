<?php
include("viajante_visitas_base.php");



if($_GET["id_viajante_visitas"]){
    include_once("connect.php");
    $query='select * from viajante_visitas where id="'.$_GET["id_viajante_visitas"].'"';
    $array_viajante_visitas=mysql_fetch_array(mysql_query($query));
    if(mysql_error()){echo "<br>".mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
}
if($_GET["uuid_viajante_visitas"]){
    include_once("connect.php");
    $query='select * from viajante_visitas where uuid="'.$_GET["uuid_viajante_visitas"].'"';
    $array_viajante_visitas=mysql_fetch_array(mysql_query($query));
}
?>

<form method="post" action="viajante_visitas_update.php" name="form_viajante_visitas">

<center>
<table class="t1" border="1">
	<tr>
		<th>id</th>
		<td><input type="text" name="id" id="id" value="<?php if($array_viajante_visitas["id"]){echo $array_viajante_visitas["id"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>id_clientes</th>
		<td><input type="text" name="id_clientes" id="id_clientes" value="<?php if($array_viajante_visitas["id_clientes"]){echo $array_viajante_visitas["id_clientes"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>id_viajante</th>
		<td><input type="text" name="id_viajante" id="id_viajante" value="<?php if($array_viajante_visitas["id_viajante"]){echo $array_viajante_visitas["id_viajante"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>compro</th>
		<td><input type="text" name="compro" id="compro" value="<?php if($array_viajante_visitas["compro"]){echo $array_viajante_visitas["compro"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>detalle</th>
			<td><textarea name="detalle" id="detalle" rows="10" cols="33"><?php if($array_viajante_visitas["detalle"]){echo $array_viajante_visitas["detalle"];}?></textarea></td>	</tr>
	<tr>
		<th>marcas_ofrecidas</th>
			<td><textarea name="marcas_ofrecidas" id="marcas_ofrecidas" rows="10" cols="33"><?php if($array_viajante_visitas["marcas_ofrecidas"]){echo $array_viajante_visitas["marcas_ofrecidas"];}?></textarea></td>	</tr>
	<tr>
		<th>fecha_visita</th>
		<td><input type="text" name="fecha_visita" id="fecha_visita" value="<?php if($array_viajante_visitas["fecha_visita"]){echo $array_viajante_visitas["fecha_visita"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>hora_visita</th>
		<td><input type="text" name="hora_visita" id="hora_visita" value="<?php if($array_viajante_visitas["hora_visita"]){echo $array_viajante_visitas["hora_visita"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>fecha</th>
		<td><input type="text" name="fecha" id="fecha" value="<?php if($array_viajante_visitas["fecha"]){echo $array_viajante_visitas["fecha"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>hora</th>
		<td><input type="text" name="hora" id="hora" value="<?php if($array_viajante_visitas["hora"]){echo $array_viajante_visitas["hora"];}?>" size="10"></td>
	</tr>

</table>

<?php
/*
<table class="t1" border="1">
	<tr>
		<th>id</th>
		<th>id_clientes</th>
		<th>id_viajante</th>
		<th>compro</th>
		<th>detalle</th>
		<th>marcas_ofrecidas</th>
		<th>fecha_visita</th>
		<th>hora_visita</th>
		<th>fecha</th>
		<th>hora</th>
	</tr>
*/
/*
	<tr>
		<td><input type="text" name="id" id="id" value="<?php if($array_viajante_visitas["id"]){echo $array_viajante_visitas["id"];}?>" size="10"></td>
		<td><input type="text" name="id_clientes" id="id_clientes" value="<?php if($array_viajante_visitas["id_clientes"]){echo $array_viajante_visitas["id_clientes"];}?>" size="10"></td>
		<td><input type="text" name="id_viajante" id="id_viajante" value="<?php if($array_viajante_visitas["id_viajante"]){echo $array_viajante_visitas["id_viajante"];}?>" size="10"></td>
		<td><input type="text" name="compro" id="compro" value="<?php if($array_viajante_visitas["compro"]){echo $array_viajante_visitas["compro"];}?>" size="10"></td>
			<td><textarea name="detalle" id="detalle" rows="10" cols="33"><?php if($array_viajante_visitas["detalle"]){echo $array_viajante_visitas["detalle"];}?></textarea></td>			<td><textarea name="marcas_ofrecidas" id="marcas_ofrecidas" rows="10" cols="33"><?php if($array_viajante_visitas["marcas_ofrecidas"]){echo $array_viajante_visitas["marcas_ofrecidas"];}?></textarea></td>		<td><input type="text" name="fecha_visita" id="fecha_visita" value="<?php if($array_viajante_visitas["fecha_visita"]){echo $array_viajante_visitas["fecha_visita"];}?>" size="10"></td>
		<td><input type="text" name="hora_visita" id="hora_visita" value="<?php if($array_viajante_visitas["hora_visita"]){echo $array_viajante_visitas["hora_visita"];}?>" size="10"></td>
		<td><input type="text" name="fecha" id="fecha" value="<?php if($array_viajante_visitas["fecha"]){echo $array_viajante_visitas["fecha"];}?>" size="10"></td>
		<td><input type="text" name="hora" id="hora" value="<?php if($array_viajante_visitas["hora"]){echo $array_viajante_visitas["hora"];}?>" size="10"></td>
	</tr>
*/
?>

</table>

<?php
if($_GET["id_viajante_visitas"] OR $array_viajante_visitas["id"]){
    echo '<input type="hidden" name="accion" value="modificacion">';
    echo '<input type="hidden" name="id_viajante_visitas" value="'.$array_viajante_visitas["id"].'">';
    echo '<input type="hidden" name="uuid_viajante_visitas" value="'.$array_viajante_visitas["uuid"].'">';
}else{
    echo '<input type="hidden" name="accion" value="ingreso">';
}
?>
<br>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
