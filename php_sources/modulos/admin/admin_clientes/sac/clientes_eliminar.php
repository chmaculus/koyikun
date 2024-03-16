<?php
include_once("clientes_base.php");
echo "<center>";
if($_GET["id_clientes"]){
	$id_clientes=$_GET["id_clientes"];
}
if($_POST["id_clientes"]){
	$id_clientes=$_POST["id_clientes"];
}
if($_POST["decision"]=="ELIMINAR"){
	include("clientes_update.php");
echo "<center>";
	echo '<font1>Los datos se eliminaron correctamente</font1>';
	exit;
}

if($_POST["decision"]=="CANCELAR"){
	include_once("connect.php");
	include("clientes_muestra.inc.php");
	echo '<font1>Los datos no se han eliminado</font1>';
	exit;

}


include_once("connect.php");

$query='select * from clientes where id="'.$id_clientes.'"';
$array_clientes=mysql_fetch_array(mysql_query($query));

include("clientes_muestra.inc.php");

echo '
<form action="clientes_eliminar.php" method="post">
		<input type="hidden" name="id_clientes" value="'.$id_clientes.'">
		<input type="hidden" name="accion" value="ELIMINAR">
		<input type="submit" name="decision" value="ELIMINAR">
		<input type="submit" name="decision" value="CANCELAR">
</form>';
?>
</center>
