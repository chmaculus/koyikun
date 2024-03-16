<?php
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");
include_once("../seguridad.inc.php"); 
include("cabecera.inc.php");

echo "<center>";
if($_GET["id_reportes_caja"]){
	$id_reportes_caja=$_GET["id_reportes_caja"];
}
if($_POST["id_reportes_caja"]){
	$id_reportes_caja=$_POST["id_reportes_caja"];
}

if($_POST["decision"]=="ELIMINAR"){

 	$query='delete from reportes_caja where id="'.$id_reportes_caja.'"';
 	mysql_query($query)or die(mysql_error());
	
	echo "<center>";
	echo '<font1>Los datos se eliminaron correctamente</font1>';
	exit;
}

if($_POST["decision"]=="CANCELAR"){
	include_once("connect.php");
	include_once("reportes_caja_muestra.inc.php");
	echo '<font1>Los datos no se han eliminado</font1>';
	exit;

}


$query='select * from reportes_caja where id="'.$id_reportes_caja.'"';
$array_reportes_caja=mysql_fetch_array(mysql_query($query));

include_once("reportes_caja_muestra.inc.php");

echo '
<form action="reportes_caja_eliminar.php" method="post">
		<input type="hidden" name="id_reportes_caja" value="'.$id_reportes_caja.'">
		<input type="hidden" name="accion" value="ELIMINAR">
		<input type="submit" name="decision" value="ELIMINAR">
		<input type="submit" name="decision" value="CANCELAR">
</form>';
?>
</center>
