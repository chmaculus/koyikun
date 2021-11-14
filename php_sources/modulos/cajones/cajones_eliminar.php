<?php
include_once("cajones_base.php");
echo "<center>";
if($_GET["id_cajones"]){
	$id_cajones=$_GET["id_cajones"];
}
if($_POST["id_cajones"]){
	$id_cajones=$_POST["id_cajones"];
}
if($_POST["decision"]=="ELIMINAR"){
	include("cajones_update.php");
echo "<center>";
	echo '<font1>Los datos se eliminaron correctamente</font1>';
	exit;
}

if($_POST["decision"]=="CANCELAR"){
	include_once("connect.php");
	include("cajones_muestra.inc.php");
	echo '<font1>Los datos no se han eliminado</font1>';
	exit;

}


include_once("connect.php");

$query='select * from cajones where id="'.$id_cajones.'"';
$array_cajones=mysql_fetch_array(mysql_query($query));

include("cajones_muestra.inc.php");

echo '
<form action="cajones_eliminar.php" method="post">
		<input type="hidden" name="id_cajones" value="'.$id_cajones.'">
		<input type="hidden" name="accion" value="ELIMINAR">
		<input type="submit" name="decision" value="ELIMINAR">
		<input type="submit" name="decision" value="CANCELAR">
</form>';
?>
</center>
