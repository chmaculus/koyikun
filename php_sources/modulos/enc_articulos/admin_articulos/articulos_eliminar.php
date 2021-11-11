<?php
include("../../login/login_verifica.inc.php");
$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="0"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 

include_once("articulos_base.php");

if($_GET["id_articulos"]){
	$id_articulos=$_GET["id_articulos"];
}
if($_POST["id_articulos"]){
	$id_articulos=$_POST["id_articulos"];
}
if($_POST["decision"]=="ELIMINAR"){
	include("articulos_update.php");
	echo '<center><font1>Los datos se eliminaron correctamente</font1></center>';
	exit;
}

if($_POST["decision"]=="CANCELAR"){
	include_once("../../includes/connect.php");
	include("articulos_muestra.inc.php");
	echo '<center><font1>Los datos no se han eliminado</font1></center>';
	exit;

}


include_once("../../includes/connect.php");
echo "<center>";
include("articulos_muestra.inc.php");

echo '
<form action="articulos_eliminar.php" method="post">
		<input type="hidden" name="id_articulos" value="'.$id_articulos.'">
		<input type="hidden" name="accion" value="ELIMINAR">
		<input type="submit" name="decision" value="ELIMINAR">
		<input type="submit" name="decision" value="CANCELAR">
</form>
</center>';
?>
</center>
