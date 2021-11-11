<?php
include_once("datos_caja_base.php");

if($_GET["id_datos_caja"]){
	$id_datos_caja=$_GET["id_datos_caja"];
}
if($_POST["id_datos_caja"]){
	$id_datos_caja=$_POST["id_datos_caja"];
}
if($_POST["decision"]=="ELIMINAR"){
	include("datos_caja_update.php");
echo "<center>";
	echo '<font1>Los datos se eliminaron correctamente</font1>';
	exit;
}

if($_POST["decision"]=="CANCELAR"){
	include_once("connect.php");
	include("datos_caja_muestra.inc.php");
	echo '<font1>Los datos no se han eliminado</font1>';
	exit;

}


include_once("connect.php");

$query='select * from datos_caja where id="'.$id_datos_caja.'"';
$array_datos_caja=mysql_fetch_array(mysql_query($query));

include("datos_caja_muestra.inc.php");

echo '
<form action="datos_caja_eliminar.php" method="post">
		<input type="hidden" name="id_datos_caja" value="'.$id_datos_caja.'">
		<input type="hidden" name="accion" value="ELIMINAR">
		<input type="submit" name="decision" value="ELIMINAR">
		<input type="submit" name="decision" value="CANCELAR">
</form>
?>
</center>
