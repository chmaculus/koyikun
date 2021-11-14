<?php
include_once("index.php");

if($_GET["id_comisiones_vendedores"]){
	$id_comisiones_vendedores=$_GET["id_comisiones_vendedores"];
}
if($_POST["id_comisiones_vendedores"]){
	$id_comisiones_vendedores=$_POST["id_comisiones_vendedores"];
}
if($_POST["decision"]=="ELIMINAR"){
	include("comisiones_vendedores_update.php");
	echo '<center><font1>Los datos se eliminaron correctamente</font1></center>';
	exit;
}

if($_POST["decision"]=="CANCELAR"){
	include_once("connect.php");
	include("comisiones_vendedores_muestra.inc.php");
	echo '<center><font1>Los datos no se han eliminado</font1></center>';
	exit;

}


include_once("connect.php");

$query='select * from comisiones_vendedores where id="'.$id_comisiones_vendedores.'"';
$array_comisiones_vendedores=mysql_fetch_array(mysql_query($query));

include("comisiones_vendedores_muestra.inc.php");

echo '
<form action="comisiones_vendedores_eliminar.php" method="post">
		<input type="hidden" name="id_comisiones_vendedores" value="'.$id_comisiones_vendedores.'">
		<input type="hidden" name="accion" value="ELIMINAR">
		<input type="submit" name="decision" value="ELIMINAR">
		<input type="submit" name="decision" value="CANCELAR">
</form>
</center>';
?>
</center>
