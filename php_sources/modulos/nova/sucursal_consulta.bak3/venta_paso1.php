<?php 
include_once("../../includes/connect.php");
include_once("../../includes/funciones_costos.php");
include_once("../../includes/funciones_precios.php");
include_once("../../includes/funciones_promocion.php");
include_once("../../includes/funciones_valores.php");
include_once("../../includes/funciones_varias.php");
include_once("../../includes/funciones_ventas.php");
include_once("../../includes/funciones_stock.php");
include_once("../../includes/funciones_articulos.php");


include("cabecera.inc.php");


$id_session=$_COOKIE["id_session"];
$id_sucursal=$_COOKIE["id_sucursal"];

$nombre_sucursal=nombre_sucursal($id_sucursal);

$porcentaje_tarjeta=get_valor(7);

#-----------------------------------------
if($_POST["accion"]=="ACTUALIZAR"){
	include("venta_actualiza.php");
	Header ("location: venta_actual.php");
	exit;
}
#-----------------------------------------



#-----------------------------------------
if($_POST["accion"]=="FINALIZAR"){

	//include_once("cabecera.inc.php");
	include("venta_actualiza.php");
	Header ("location: venta_paso2.php");
	exit;   	

}
#-----------------------------------------



#-----------------------------------------
if($_POST["accion"]=="CANCELAR"){
	$query='delete from ventas_temp2 where id_session="'.$id_session.'"';
	mysql_query($query)or die(mysql_error()." - ".$query);

Header ("location: venta_actual.php");
exit;
}
#-----------------------------------------


?>
