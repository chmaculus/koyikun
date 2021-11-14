<?php
include_once("clientes_base.php");

if($_GET["id_clientes"]){
	$id_clientes=$_GET["id_clientes"];
}
if($_POST["id_clientes"]){
	$id_clientes=$_POST["id_clientes"];
}
if($_POST["decision"]=="ELIMINAR"){
	include("clientes_update.php");
	echo '<center><font1>Los datos se eliminaron correctamente</font1></center>';
	exit;
}

if($_POST["decision"]=="CANCELAR"){
	include_once("connect.php");
	include("clientes_muestra.inc.php");
	echo '<center><font1>Los datos no se han eliminado</font1></center>';
	exit;

}


include_once("connect.php");
echo "<center>";
include("clientes_muestra.inc.php");

echo '
<form action="clientes_eliminar.php" method="post">
		<input type="hidden" name="id_clientes" value="'.$id_clientes.'">
		<input type="hidden" name="accion" value="ELIMINAR">
		<input type="submit" name="decision" value="ELIMINAR">
		<input type="submit" name="decision" value="CANCELAR">
</form>
</center>';
?>
</center>
