<?php
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");
include_once("seguridad.inc.php");
include_once("cabecera.inc.php");

echo "<center>";
if($_GET["id_sessiones_activas"]){
	$id_sessiones_activas=$_GET["id_sessiones_activas"];
}
if($_POST["id_sessiones_activas"]){
	$id_sessiones_activas=$_POST["id_sessiones_activas"];
}
if($_POST["decision"]=="ELIMINAR"){
	include("sessiones_activas_update.php");
echo "<center>";
	echo '<font1>Los datos se eliminaron correctamente</font1>';
	exit;
}

if($_POST["decision"]=="CANCELAR"){
	include_once("../../includes/connect.php");
	include("sessiones_activas_muestra.inc.php");
	echo '<font1>Los datos no se han eliminado</font1>';
	exit;

}



$query='select * from sessiones_activas where id_session="'.$id_sessiones_activas.'"';
$array_sessiones_activas=mysql_fetch_array(mysql_query($query));

include("sessiones_activas_muestra.inc.php");

echo '
<form action="sessiones_activas_eliminar.php" method="post">
		<input type="hidden" name="id_sessiones_activas" value="'.$id_sessiones_activas.'">
		<input type="hidden" name="accion" value="ELIMINAR">
		<input type="submit" name="decision" value="ELIMINAR">
		<input type="submit" name="decision" value="CANCELAR">
</form>';
?>
</center>
