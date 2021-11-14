<?php
include_once("reportes_base.php");
echo "<center>";
if($_GET["id_reportes"]){
	$id_reportes=$_GET["id_reportes"];
}
if($_POST["id_reportes"]){
	$id_reportes=$_POST["id_reportes"];
}
if($_POST["decision"]=="ELIMINAR"){
	include("reportes_update.php");
echo "<center>";
	echo '<font1>Los datos se eliminaron correctamente</font1>';
	exit;
}

if($_POST["decision"]=="CANCELAR"){
	include_once("connect.php");
	include("reportes_muestra.inc.php");
	echo '<font1>Los datos no se han eliminado</font1>';
	exit;

}


include_once("../../includes/connect.php");

$query='select * from reportes where id="'.$id_reportes.'"';
$array_reportes=mysql_fetch_array(mysql_query($query));

include("reportes_muestra.inc.php");

echo '
<form action="reportes_eliminar.php" method="post">
		<input type="hidden" name="id_reportes" value="'.$id_reportes.'">
		<input type="hidden" name="accion" value="ELIMINAR">
		<input type="submit" name="decision" value="ELIMINAR">
		<input type="submit" name="decision" value="CANCELAR">
</form>';
?>
</center>
