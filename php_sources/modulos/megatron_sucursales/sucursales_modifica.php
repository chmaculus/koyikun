
<?php
if($_GET["id_sucursales"]){
    include_once("connect.php");
    $query='select * from sucursales where id="'.$_GET["id_sucursales"].'"';
    $array_sucursales=mysql_fetch_array(mysql_query($query));
    if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
}
if($_GET["uuid_sucursales"]){
    include_once("connect.php");
    $query='select * from sucursales where uuid="'.$_GET["uuid_sucursales"].'"';
    $array_sucursales=mysql_fetch_array(mysql_query($query));
}
?>

<form method="post" action="sucursales_update.php" name="form_sucursales">

<center>
<table class="t1" border="1">
	<tr>
		<th>sucursal</th>
		<td><input type="text" name="sucursal" id="sucursal" value="<?php if($array_sucursales["sucursal"]){echo $array_sucursales["sucursal"];}?>" size="10"></td>
	</tr>

</table>

	<tr>
		<td><input type="text" name="id" id="id" value="<?php if($array_sucursales["id"]){echo $array_sucursales["id"];}?>" size="10"></td>
		<td><input type="text" name="sucursal" id="sucursal" value="<?php if($array_sucursales["sucursal"]){echo $array_sucursales["sucursal"];}?>" size="10"></td>
	</tr>
</table>
<?php
if($_GET["id_sucursales"] OR $array_sucursales["id"]){
    echo '<input type="hidden" name="accion" value="modificacion">';
    echo '<input type="hidden" name="id_sucursales" value="'.$array_sucursales["id"].'">';
    echo '<input type="hidden" name="uuid_sucursales" value="'.$array_sucursales["uuid"].'">';
}else{
    echo '<input type="hidden" name="accion" value="ingreso">';
}
?>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
