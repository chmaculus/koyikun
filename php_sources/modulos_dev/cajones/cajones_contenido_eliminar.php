<?php
include_once("cajones_contenido_base.php");
echo "<center>";
if($_GET["id_cajones_contenido"]){
	$id_cajones_contenido=$_GET["id_cajones_contenido"];
}
if($_POST["id_cajones_contenido"]){
	$id_cajones_contenido=$_POST["id_cajones_contenido"];
}
if($_POST["decision"]=="ELIMINAR"){
	include("cajones_contenido_update.php");
echo "<center>";
	echo '<font1>Los datos se eliminaron correctamente</font1>';
	exit;
}

if($_POST["decision"]=="CANCELAR"){
	include_once("connect.php");
	include("cajones_contenido_muestra.inc.php");
	echo '<font1>Los datos no se han eliminado</font1>';
	exit;

}


include_once("connect.php");

$query='select * from cajones_contenido where id="'.$id_cajones_contenido.'"';
$array_cajones_contenido=mysql_fetch_array(mysql_query($query));

include("cajones_contenido_muestra.inc.php");

echo '
<form action="cajones_contenido_eliminar.php" method="post">
		<input type="hidden" name="id_cajones_contenido" value="'.$id_cajones_contenido.'">
		<input type="hidden" name="accion" value="ELIMINAR">
		<input type="submit" name="decision" value="ELIMINAR">
		<input type="submit" name="decision" value="CANCELAR">
</form>';
?>
</center>
