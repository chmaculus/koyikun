<?php
include_once("asistencias_base.php");
echo "<center>";
if($_GET["id_asistencias"]){
	$id_asistencias=$_GET["id_asistencias"];
}
if($_POST["id_asistencias"]){
	$id_asistencias=$_POST["id_asistencias"];
}
if($_POST["decision"]=="ELIMINAR"){
	include("asistencias_update.php");
echo "<center>";
	echo '<font1>Los datos se eliminaron correctamente</font1>';
	exit;
}

if($_POST["decision"]=="CANCELAR"){
	include_once("connect.php");
	include("asistencias_muestra.inc.php");
	echo '<font1>Los datos no se han eliminado</font1>';
	exit;

}


include_once("connect.php");

$query='select * from asistencias where id="'.$id_asistencias.'"';
$array_asistencias=mysql_fetch_array(mysql_query($query));

include("asistencias_muestra.inc.php");

echo '
<form action="asistencias_eliminar.php" method="post">
		<input type="hidden" name="id_asistencias" value="'.$id_asistencias.'">
		<input type="hidden" name="accion" value="ELIMINAR">
		<input type="submit" name="decision" value="ELIMINAR">
		<input type="submit" name="decision" value="CANCELAR">
</form>';
?>
</center>
