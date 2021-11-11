<?php
include_once("facturas_compra_base.php");





include_once("connect.php");


echo "<center>";

if($_GET["id_facturas_compra"]){
	$id_facturas_compra=$_GET["id_facturas_compra"];
}
if($_POST["id_facturas_compra"]){
	$id_facturas_compra=$_POST["id_facturas_compra"];
}
if($_POST["decision"]=="ELIMINAR"){
	include("facturas_compra_update.php");
echo "<center>";
	echo '<font1>Los datos se eliminaron correctamente</font1>';
	exit;
}

if($_POST["decision"]=="CANCELAR"){
	include("facturas_compra_muestra.inc.php");
	echo '<font1>Los datos no se han eliminado</font1>';
	exit;
}


$query='select * from facturas_compra where id="'.$id_facturas_compra.'"';
$array_facturas_compra=mysql_fetch_array(mysql_query($query));

include("facturas_compra_muestra.inc.php");

echo '
<form action="facturas_compra_eliminar.php" method="post">
		<input type="hidden" name="id_facturas_compra" value="'.$id_facturas_compra.'">
		<input type="hidden" name="accion" value="ELIMINAR">
		<input type="submit" name="decision" value="ELIMINAR">
		<input type="submit" name="decision" value="CANCELAR">
</form>';
?>
</center>


