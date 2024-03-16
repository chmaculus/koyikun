

<?php
include("codigos_autorizados_base.php");
include_once("codigos_autorizados_base.php");
include_once("connect.php");
echo "<center>";
if($_GET["id_codigos_autorizados"]){
	$id_codigos_autorizados=$_GET["id_codigos_autorizados"];
}
if($_POST["id_codigos_autorizados"]){
	$id_codigos_autorizados=$_POST["id_codigos_autorizados"];
}if($_POST["decision"]=="ELIMINAR"){
	include("codigos_autorizados_update.php");
echo "<center>";
	echo "<font1>Los datos se eliminaron correctamente</font1>";
	exit;
}
if($_POST["decision"]=="CANCELAR"){
	include("codigos_autorizados_muestra.inc.php");
	echo "<font1>Los datos no se han eliminado</font1>;"
	exit;
}
$query='select * from codigos_autorizados where id="'.$id_codigos_autorizados.'"';
$array_codigos_autorizados=mysql_fetch_array(mysql_query($query));
include("codigos_autorizados_muestra.inc.php");
echo '
<form action="codigos_autorizados_eliminar.php" method="post">
		<input type="hidden" name="id_codigos_autorizados" value="'.$id_codigos_autorizados.'">
		<input type="hidden" name="accion" value="ELIMINAR">
		<input type="submit" name="decision" value="ELIMINAR">
		<input type="submit" name="decision" value="CANCELAR">
</form>';
?>
</center>
