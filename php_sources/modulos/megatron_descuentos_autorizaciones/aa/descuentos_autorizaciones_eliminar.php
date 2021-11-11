<?php
include_once("descuentos_autorizaciones_base.php");
echo "<center>";
if($_GET["id_descuentos_autorizaciones"]){
	$id_descuentos_autorizaciones=$_GET["id_descuentos_autorizaciones"];
}
if($_POST["id_descuentos_autorizaciones"]){
	$id_descuentos_autorizaciones=$_POST["id_descuentos_autorizaciones"];
}
if($_POST["decision"]=="ELIMINAR"){
	include("descuentos_autorizaciones_update.php");
echo "<center>";
	echo '<font1>Los datos se eliminaron correctamente</font1>';
	exit;
}

if($_POST["decision"]=="CANCELAR"){
	include_once("connect.php");
	include("descuentos_autorizaciones_muestra.inc.php");
	echo '<font1>Los datos no se han eliminado</font1>';
	exit;

}


include_once("connect.php");

$query='select * from descuentos_autorizaciones where id="'.$id_descuentos_autorizaciones.'"';
$array_descuentos_autorizaciones=mysql_fetch_array(mysql_query($query));

include("descuentos_autorizaciones_muestra.inc.php");

echo '
<form action="descuentos_autorizaciones_eliminar.php" method="post">
		<input type="hidden" name="id_descuentos_autorizaciones" value="'.$id_descuentos_autorizaciones.'">
		<input type="hidden" name="accion" value="ELIMINAR">
		<input type="submit" name="decision" value="ELIMINAR">
		<input type="submit" name="decision" value="CANCELAR">
</form>';
?>
</center>
