<?php
include("lanzamientos_base.php");

$fecha=date("Y-n-d");
$fecha=date("d/n/Y");

if($_GET["id_articulos_lanzamientos"]){
    include_once("connect.php");
    $query='select * from articulos_lanzamientos where id="'.$_GET["id_articulos_lanzamientos"].'"';
    $array_articulos_lanzamientos=mysql_fetch_array(mysql_query($query));
    if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
}
if($_GET["uuid_articulos_lanzamientos"]){
    include_once("connect.php");
    $query='select * from articulos_lanzamientos where uuid="'.$_GET["uuid_articulos_lanzamientos"].'"';
    $array_articulos_lanzamientos=mysql_fetch_array(mysql_query($query));
}
?>
<form method="post" action="lanzamientos_update.php" name="form_articulos_lanzamientos">

<center>
<table class="t1" border="1">
	<tr>
		<th>descripcion</th>
			<td><textarea name="descripcion" id="descripcion" rows="10" cols="33"><?php if($array_articulos_lanzamientos["descripcion"]){echo $array_articulos_lanzamientos["descripcion"];}?></textarea></td>	</tr>
	<tr>
		<th>Fecha inicio</th>
		<td><input type="text" name="fecha_inicio" id="fecha_inicio" value="<?php echo $fecha; ?>" size="10"></td>
	</tr>
	<tr>
		<th>Fecha finaliza</th>
		<td><input type="text" name="fecha_finaliza" id="fecha_finaliza" value="<?php echo $fecha; ?>" size="10"></td>
	</tr>

</table>


</table>

<?php
if($_GET["id_articulos_lanzamientos"] OR $array_articulos_lanzamientos["id"]){
    echo '<input type="hidden" name="accion" value="modificacion">';
    echo '<input type="hidden" name="id_articulos_lanzamientos" value="'.$array_articulos_lanzamientos["id"].'">';
    echo '<input type="hidden" name="uuid_articulos_lanzamientos" value="'.$array_articulos_lanzamientos["uuid"].'">';
}else{
    echo '<input type="hidden" name="accion" value="ingreso">';
}
?>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>

