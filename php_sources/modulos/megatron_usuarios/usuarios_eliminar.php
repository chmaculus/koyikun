<?php
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");
include_once("seguridad.inc.php");

include_once("usuarios_base.php");
include_once("funciones.php");

if($_GET["id_usuarios"]){
	$id_usuarios=$_GET["id_usuarios"];
}
if($_POST["id_usuarios"]){
	$id_usuarios=$_POST["id_usuarios"];
}
if($_POST["decision"]=="ELIMINAR"){
	include("usuarios_update.php");
	echo '<center><font1>Los datos se eliminaron correctamente</font1></center>';
	exit;
}

if($_POST["decision"]=="CANCELAR"){
	include_once("connect.php");
	include("usuarios_muestra.inc.php");
	echo '<center><font1>Los datos no se han eliminado</font1></center>';
	exit;

}


$query='select * from usuarios where id="'.$id_usuarios.'"';
$array_usuarios=mysql_fetch_array(mysql_query($query));

echo '<center>';
include("usuarios_muestra.inc.php");

echo '
<form action="usuarios_eliminar.php" method="post">
		<input type="hidden" name="id_usuarios" value="'.$id_usuarios.'">
		<input type="hidden" name="usuario" value="'.$array_usuarios["usuario"].'">
		<input type="hidden" name="accion" value="ELIMINAR">
		<input type="submit" name="decision" value="ELIMINAR">
		<input type="submit" name="decision" value="CANCELAR">
</form>
</center>';
?>
</center>
