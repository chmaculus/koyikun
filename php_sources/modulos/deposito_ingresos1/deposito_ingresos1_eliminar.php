<?php
include_once("deposito_ingresos1_base.php");





include_once("../includes/connect.php");


echo "<center>";

if($_GET["id_deposito_ingresos1"]){
	$id_deposito_ingresos1=$_GET["id_deposito_ingresos1"];
}
if($_POST["id_deposito_ingresos1"]){
	$id_deposito_ingresos1=$_POST["id_deposito_ingresos1"];
}
if($_POST["decision"]=="ELIMINAR"){
	include("deposito_ingresos1_update.php");
echo "<center>";
	echo '<font1>Los datos se eliminaron correctamente</font1>';
	exit;
}

if($_POST["decision"]=="CANCELAR"){
	include("deposito_ingresos1_muestra.inc.php");
	echo '<font1>Los datos no se han eliminado</font1>';
	exit;
}


$query='select * from deposito_ingresos1 where id="'.$id_deposito_ingresos1.'"';
$array_deposito_ingresos1=mysql_fetch_array(mysql_query($query));

include("deposito_ingresos1_muestra.inc.php");

echo '
<form action="deposito_ingresos1_eliminar.php" method="post">
		<input type="hidden" name="id_deposito_ingresos1" value="'.$id_deposito_ingresos1.'">
		<input type="hidden" name="accion" value="ELIMINAR">
		<input type="submit" name="decision" value="ELIMINAR">
		<input type="submit" name="decision" value="CANCELAR">
</form>';
?>
</center>


