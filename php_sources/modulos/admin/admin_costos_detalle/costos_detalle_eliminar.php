<?php
include_once("costos_detalle_base.php");
echo "<center>";
if($_GET["id_costos_detalle"]){
	$id_costos_detalle=$_GET["id_costos_detalle"];
}
if($_POST["id_costos_detalle"]){
	$id_costos_detalle=$_POST["id_costos_detalle"];
}
if($_POST["decision"]=="ELIMINAR"){
	include("costos_detalle_update.php");
echo "<center>";
	echo '<font1>Los datos se eliminaron correctamente</font1>';
	exit;
}

if($_POST["decision"]=="CANCELAR"){
	include_once("connect.php");
	include("costos_detalle_muestra.inc.php");
	echo '<font1>Los datos no se han eliminado</font1>';
	exit;

}


include_once("connect.php");

$query='select * from costos_detalle where id="'.$id_costos_detalle.'"';
$array_costos_detalle=mysql_fetch_array(mysql_query($query));

include("costos_detalle_muestra.inc.php");

echo '
<form action="costos_detalle_eliminar.php" method="post">
		<input type="hidden" name="id_costos_detalle" value="'.$id_costos_detalle.'">
		<input type="hidden" name="accion" value="ELIMINAR">
		<input type="submit" name="decision" value="ELIMINAR">
		<input type="submit" name="decision" value="CANCELAR">
</form>';
?>
</center>
