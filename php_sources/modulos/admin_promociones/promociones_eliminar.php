<?php
include_once("promociones_base.php");
include_once("../../includes/funciones.php");

echo "<center>";



if($_GET["id_promociones"]){
	$id_promociones=$_GET["id_promociones"];
}
if($_POST["id_promociones"]){
	$id_promociones=$_POST["id_promociones"];
}

if($_POST["decision"]=="ELIMINAR"){
	include("promociones_update2.php");
	echo "<center>";
	echo '<font1>Los datos se eliminaron correctamente</font1>';
	exit;
}

if($_POST["decision"]=="CANCELAR"){
	include_once("connect.php");
	include("promociones_muestra.inc.php");
	echo '<font1>Los datos no se han eliminado</font1>';
	exit;

}


include_once("connect.php");

$query='select * from promociones where id="'.$id_promociones.'"';

$array_promociones=mysql_fetch_array(mysql_query($query));
$array_articulos=detalle_articulo( $array_promociones["id_articulos"] );
$array_precios=precio_sucursal( $array_promociones["id_articulos"] ,"1" );
$nombre_sucursal=nombre_sucursal( $array_promociones["id_sucursal"] );

include("promociones_muestra.inc.php");

echo '
<form action="promociones_eliminar.php" method="post">
		<input type="hidden" name="id_promociones" value="'.$id_promociones.'">
		<input type="hidden" name="accion" value="ELIMINAR">
		<input type="submit" name="decision" value="ELIMINAR">
		<input type="submit" name="decision" value="CANCELAR">
</form>';
?>
</center>
