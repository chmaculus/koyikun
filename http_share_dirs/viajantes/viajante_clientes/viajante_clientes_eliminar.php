<?php
include_once("viajante_clientes_base.php");





include_once("connect.php");


echo "<center>";

if($_GET["id_viajante_clientes"]){
	$id_viajante_clientes=$_GET["id_viajante_clientes"];
}
if($_POST["id_viajante_clientes"]){
	$id_viajante_clientes=$_POST["id_viajante_clientes"];
}
if($_POST["decision"]=="ELIMINAR"){
	include("viajante_clientes_update.php");
echo "<center>";
	echo '<font1>Los datos se eliminaron correctamente</font1>';
	exit;
}

if($_POST["decision"]=="CANCELAR"){
	include("viajante_clientes_muestra.inc.php");
	echo '<font1>Los datos no se han eliminado</font1>';
	exit;
}


$query='select * from viajante_clientes where id="'.$id_viajante_clientes.'"';
$array_viajante_clientes=mysql_fetch_array(mysql_query($query));

include("viajante_clientes_muestra.inc.php");

echo '
<form action="viajante_clientes_eliminar.php" method="post">
		<input type="hidden" name="id_viajante_clientes" value="'.$id_viajante_clientes.'">
		<input type="hidden" name="accion" value="ELIMINAR">
		<input type="submit" name="decision" value="ELIMINAR">
		<input type="submit" name="decision" value="CANCELAR">
</form>';
?>
</center>


