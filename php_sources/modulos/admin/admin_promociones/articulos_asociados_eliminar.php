<?php





include_once("connect.php");


echo "<center>";

if($_GET["id_articulos_asociados"]){
	$id_articulos_asociados=$_GET["id_articulos_asociados"];
}
if($_POST["id_articulos_asociados"]){
	$id_articulos_asociados=$_POST["id_articulos_asociados"];
}
if($_POST["decision"]=="ELIMINAR"){
	include("articulos_asociados_update.php");
echo "<center>";
	echo '<font1>Los datos se eliminaron correctamente</font1>';
	exit;
}

if($_POST["decision"]=="CANCELAR"){
	include("articulos_asociados_muestra.inc.php");
	echo '<font1>Los datos no se han eliminado</font1>';
	exit;
}


$query='select * from articulos_asociados where id="'.$id_articulos_asociados.'"';
$array_articulos_asociados=mysql_fetch_array(mysql_query($query));

include("articulos_asociados_muestra.inc.php");

echo '
<form action="articulos_asociados_eliminar.php" method="post">
		<input type="hidden" name="id_articulos_asociados" value="'.$id_articulos_asociados.'">
		<input type="hidden" name="accion" value="ELIMINAR">
		<input type="submit" name="decision" value="ELIMINAR">
		<input type="submit" name="decision" value="CANCELAR">
</form>';
?>
</center>


