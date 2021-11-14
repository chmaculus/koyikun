<?php
include_once("listas_base.php");

if($_GET["id_listas"]){
	$id_listas=$_GET["id_listas"];
}
if($_POST["id_listas"]){
	$id_listas=$_POST["id_listas"];
}
if($_POST["decision"]=="ELIMINAR"){
	include("listas_update.php");
	echo '<center><font1>Los datos se eliminaron correctamente</font1></center>';
	exit;
}

if($_POST["decision"]=="CANCELAR"){
	include_once("connect.php");
	include("listas_muestra.inc.php");
	echo '<center><font1>Los datos no se han eliminado</font1></center>';
	exit;

}


include_once("../../includes/connect.php");
echo "<center>";
include("listas_muestra.inc.php");

echo '
<form action="listas_eliminar.php" method="post">
		<input type="hidden" name="id_listas" value="'.$id_listas.'">
		<input type="hidden" name="accion" value="ELIMINAR">
		<input type="submit" name="decision" value="ELIMINAR">
		<input type="submit" name="decision" value="CANCELAR">
</form>
</center>';
?>
</center>
