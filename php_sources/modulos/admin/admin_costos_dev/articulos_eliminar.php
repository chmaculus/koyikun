<?php
include_once("../../includes/connect.php");

include_once("../../login/login_verifica.inc.php");
include_once("../seguridad.inc.php"); 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
  <meta content="text/html; charset=UTF-8" http-equiv="content-type" />
  <title>Xzone modificacion de descuentos</title>

<script>
function cerrarse(){
	window.close()
}
</script> 
</head>
<?php

echo "<center>";
if($_GET["id_articulos"]){
	$id_articulos=$_GET["id_articulos"];
}
if($_POST["id_articulos"]){
	$id_articulos=$_POST["id_articulos"];
}
if($_POST["decision"]=="ELIMINAR"){
	include("articulos_update.php");
echo "<center>";
	echo '<font1>Los datos se eliminaron correctamente, tendran efecto cuando vuelva a recargar el formulario de costos datos</font1>';
	echo '<br><td><A HREF="" onClick="cerrarse();"><button>cerrar ventana</button></A></td>';

	exit;
}

if($_POST["decision"]=="CANCELAR"){
	include_once("connect.php");
	include("articulos_muestra.inc.php");
	echo '<font1>Los datos no se han eliminado</font1>';
	exit;

}



$query='select * from articulos where id="'.$id_articulos.'"';
$result=mysql_query($query);
$rows=mysql_num_rows($result);
$array_articulos=mysql_fetch_array($result);

if($rows<1){
	echo '<font1>Los datos ya se encuentra eliminado</font1>';
	echo '<br><td><A HREF="" onClick="cerrarse();"><button>cerrar ventana</button></A></td>';
	exit;
}

include("articulos_muestra.inc.php");

echo '
<form action="articulos_eliminar.php" method="post">
		<input type="hidden" name="id_articulos" value="'.$id_articulos.'">
		<input type="hidden" name="accion" value="ELIMINAR">
		<input type="submit" name="decision" value="ELIMINAR">
		<input type="submit" name="decision" value="CANCELAR">
</form>';
?>
</center>
