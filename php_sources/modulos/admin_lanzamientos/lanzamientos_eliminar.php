<?php
include_once("lanzamientos_base.php");
include_once("../includes/connect.php");
echo "<center>";

if($_GET["id_articulos_lanzamientos"]){
	$id_articulos_lanzamientos=$_GET["id_articulos_lanzamientos"];
}
if($_POST["id_articulos_lanzamientos"]){
	$id_articulos_lanzamientos=$_POST["id_articulos_lanzamientos"];
}if($_POST["decision"]=="ELIMINAR"){
	include("lanzamientos_update.php");
echo "<center>";
	echo "<font1>Los datos se eliminaron correctamente</font1>";
	exit;
}

if($_POST["decision"]=="CANCELAR"){
	include("lanzamientos_muestra.inc.php");
	echo "<font1>Los datos no se han eliminado</font1>";
	exit;
}
$query='select * from articulos_lanzamientos where id="'.$id_articulos_lanzamientos.'"';
$array_articulos_lanzamientos=mysql_fetch_array(mysql_query($query));
include("lanzamientos_muestra.inc.php");
echo '
<form action="lanzamientos_eliminar.php" method="post">
		<input type="hidden" name="id_articulos_lanzamientos" value="'.$id_articulos_lanzamientos.'">
		<input type="hidden" name="accion" value="ELIMINAR">
		<input type="submit" name="decision" value="ELIMINAR">
		<input type="submit" name="decision" value="CANCELAR">
</form>';

?>
</center>
