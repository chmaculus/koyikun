<?php
include("index.php");
include_once("../includes/connect.php");



echo "<center>";
if($_GET["id_cajas_deudores"]){
	$id_cajas_deudores=$_GET["id_cajas_deudores"];
}
if($_POST["id_cajas_deudores"]){
	$id_cajas_deudores=$_POST["id_cajas_deudores"];
}if($_POST["decision"]=="ELIMINAR"){
	include("cajas_deudores_update.php");
echo "<center>";
	echo "<font1>Los datos se eliminaron correctamente</font1>";
	exit;
}
if($_POST["decision"]=="CANCELAR"){
	include("cajas_deudores_muestra.inc.php");
	echo "<font1>Los datos no se han eliminado</font1>;"
	exit;
}
$query='select * from cajas_deudores where id="'.$id_cajas_deudores.'"';
$array_cajas_deudores=mysql_fetch_array(mysql_query($query));
include("cajas_deudores_muestra.inc.php");
echo '
<form action="cajas_deudores_eliminar.php" method="post">
		<input type="hidden" name="id_cajas_deudores" value="'.$id_cajas_deudores.'">
		<input type="hidden" name="accion" value="ELIMINAR">
		<input type="submit" name="decision" value="ELIMINAR">
		<input type="submit" name="decision" value="CANCELAR">
</form>';
?>
</center>
