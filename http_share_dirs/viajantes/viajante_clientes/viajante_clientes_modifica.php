<?php
include("viajante_clientes_base.php");



if($_GET["id_viajante_clientes"]){
    include_once("connect.php");
    $query='select * from viajante_clientes where id="'.$_GET["id_viajante_clientes"].'"';
    $array_viajante_clientes=mysql_fetch_array(mysql_query($query));
    if(mysql_error()){echo "<br>".mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
}
if($_GET["uuid_viajante_clientes"]){
    include_once("connect.php");
    $query='select * from viajante_clientes where uuid="'.$_GET["uuid_viajante_clientes"].'"';
    $array_viajante_clientes=mysql_fetch_array(mysql_query($query));
}
?>

<form method="post" action="viajante_clientes_update.php" name="form_viajante_clientes">

<center>
<table class="t1" border="1">
		
	<tr>
		<th>apellido</th>
		<td><input type="text" name="Apellido" id="apellido" value="<?php if($array_viajante_clientes["apellido"]){echo $array_viajante_clientes["apellido"];}?>" size="20"></td>
	</tr>
	<tr>
		<th>nombres</th>
		<td><input type="text" name="Nombres" id="nombres" value="<?php if($array_viajante_clientes["nombres"]){echo $array_viajante_clientes["nombres"];}?>" size="30"></td>
	</tr>
	<tr>
		<th>localidad</th>
		<td><input type="text" name="localidad" id="localidad" value="<?php if($array_viajante_clientes["localidad"]){echo $array_viajante_clientes["localidad"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>codigo_postal</th>
		<td><input type="text" name="codigo_postal" id="codigo_postal" value="<?php if($array_viajante_clientes["codigo_postal"]){echo $array_viajante_clientes["codigo_postal"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>celular</th>
		<td><input type="text" name="celular" id="celular" value="<?php if($array_viajante_clientes["celular"]){echo $array_viajante_clientes["celular"];}?>" size="15"></td>
	</tr>

</table>


</table>

<?php
if($_GET["id_viajante_clientes"] OR $array_viajante_clientes["id"]){
    echo '<input type="hidden" name="accion" value="modificacion">';
    echo '<input type="hidden" name="id_viajante_clientes" value="'.$array_viajante_clientes["id"].'">';
    echo '<input type="hidden" name="id_viajante" value="'.$array_viajante_clientes["id_viajante"].'">';
    echo '<input type="hidden" name="uuid_viajante_clientes" value="'.$array_viajante_clientes["uuid"].'">';
}else{
    echo '<input type="hidden" name="accion" value="ingreso">';
}
?>
<br>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
