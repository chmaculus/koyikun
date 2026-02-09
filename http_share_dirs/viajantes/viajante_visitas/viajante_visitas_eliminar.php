<?php
include_once("viajante_visitas_base.php");





include_once("connect.php");


echo "<center>";

if($_GET["id_viajante_visitas"]){
	$id_viajante_visitas=$_GET["id_viajante_visitas"];
}
if($_POST["id_viajante_visitas"]){
	$id_viajante_visitas=$_POST["id_viajante_visitas"];
}
if($_POST["decision"]=="ELIMINAR"){
	include("viajante_visitas_update.php");
echo "<center>";
	echo '<font1>Los datos se eliminaron correctamente</font1>';
	exit;
}

if($_POST["decision"]=="CANCELAR"){
	include("viajante_visitas_muestra.inc.php");
	echo '<font1>Los datos no se han eliminado</font1>';
	exit;
}


$query='select * from viajante_visitas where id="'.$id_viajante_visitas.'"';
$array_viajante_visitas=mysql_fetch_array(mysql_query($query));

include("viajante_visitas_muestra.inc.php");

echo '
<form action="viajante_visitas_eliminar.php" method="post">
		<input type="hidden" name="id_viajante_visitas" value="'.$id_viajante_visitas.'">
		<input type="hidden" name="accion" value="ELIMINAR">
		<input type="submit" name="decision" value="ELIMINAR">
		<input type="submit" name="decision" value="CANCELAR">
</form>';
?>
</center>


