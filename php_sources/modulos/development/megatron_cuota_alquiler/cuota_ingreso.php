<?php
if($_GET["id_cuota_alquiler"]){
    include_once("connect.php");
    $query='select * from cuota_alquiler where id="'.$_GET["id_cuota_alquiler"].'"';
    $array_cuota_alquiler=mysql_fetch_array(mysql_query($query));
    if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
}
if($_GET["uuid_cuota_alquiler"]){
    include_once("connect.php");
    $query='select * from cuota_alquiler where uuid="'.$_GET["uuid_cuota_alquiler"].'"';
    $array_cuota_alquiler=mysql_fetch_array(mysql_query($query));
}
?>
<form method="post" action="cuota_alquiler_update.php" name="form_cuota_alquiler">

<center>
<table class="t1" border="1">
<?php

	<tr>
		<th>sucursal</th>
		<td><input type="text" name="sucursal" id="sucursal" value="<?php if($array_cuota_alquiler["sucursal"]){echo $array_cuota_alquiler["sucursal"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>valor</th>
		<td><input type="text" name="valor" id="valor" value="<?php if($array_cuota_alquiler["valor"]){echo $array_cuota_alquiler["valor"];}?>" size="10"></td>
	</tr>

</table>


?>

</table>

<?php
if($_GET["id_cuota_alquiler"] OR $array_cuota_alquiler["id"]){
    echo '<input type="hidden" name="accion" value="modificacion">';
    echo '<input type="hidden" name="id_cuota_alquiler" value="'.$array_cuota_alquiler["id"].'">';
    echo '<input type="hidden" name="uuid_cuota_alquiler" value="'.$array_cuota_alquiler["uuid"].'">';
}else{
    echo '<input type="hidden" name="accion" value="ingreso">';
}
?>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
