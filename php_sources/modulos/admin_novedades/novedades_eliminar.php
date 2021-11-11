<?php
include_once("novedades_base.php");
echo "<center>";
if($_GET["id_novedades"]){
	$id_novedades=$_GET["id_novedades"];
}
if($_POST["id_novedades"]){
	$id_novedades=$_POST["id_novedades"];
}
if($_POST["decision"]=="ELIMINAR"){
	include("novedades_update.php");
echo "<center>";
	echo '<font1>Los datos se eliminaron correctamente</font1>';
	exit;
}

if($_POST["decision"]=="CANCELAR"){
	include_once("connect.php");
	include("novedades_muestra.inc.php");
	echo '<font1>Los datos no se han eliminado</font1>';
	exit;

}


include_once("connect.php");

$query='select * from novedades where id="'.$id_novedades.'"';
$array_novedades=mysql_fetch_array(mysql_query($query));

include("novedades_muestra.inc.php");

echo '
<form action="novedades_eliminar.php" method="post">
		<input type="hidden" name="id_novedades" value="'.$id_novedades.'">
		<input type="hidden" name="accion" value="ELIMINAR">
		<input type="submit" name="decision" value="ELIMINAR">
		<input type="submit" name="decision" value="CANCELAR">
</form>';
?>
</center>
