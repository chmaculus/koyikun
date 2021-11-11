<?php
include_once("clientes_persona_base.php");
echo "<center>";
if($_GET["id_clientes_persona"]){
	$id_clientes_persona=$_GET["id_clientes_persona"];
}
if($_POST["id_clientes_persona"]){
	$id_clientes_persona=$_POST["id_clientes_persona"];
}
if($_POST["decision"]=="ELIMINAR"){
	include("clientes_persona_update.php");
echo "<center>";
	echo '<font1>Los datos se eliminaron correctamente</font1>';
	exit;
}

if($_POST["decision"]=="CANCELAR"){
	include_once("connect.php");
	include("clientes_persona_muestra.inc.php");
	echo '<font1>Los datos no se han eliminado</font1>';
	exit;

}


include_once("connect.php");

$query='select * from clientes_persona where id="'.$id_clientes_persona.'"';
$array_clientes_persona=mysql_fetch_array(mysql_query($query));

include("clientes_persona_muestra.inc.php");

echo '
<form action="clientes_persona_eliminar.php" method="post">
		<input type="hidden" name="id_clientes_persona" value="'.$id_clientes_persona.'">
		<input type="hidden" name="accion" value="ELIMINAR">
		<input type="submit" name="decision" value="ELIMINAR">
		<input type="submit" name="decision" value="CANCELAR">
</form>';
?>
</center>
