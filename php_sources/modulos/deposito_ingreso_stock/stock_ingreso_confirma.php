<?php
include_once("../../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");
include_once("seguridad.inc.php");
include_once("../../../includes/funciones_stock.php");
//include_once("../../../includes/funciones_articulos.php");

include_once("cabecera.inc.php");
echo "<center>";
if( $_POST["cantidad"]==0 OR !$_POST["barras"]){
	echo "exit 1";
	exit;
}

$id_sucursal=$_COOKIE["id_sucursal"];

$q='select * from articulos where codigo_barra="'.$_POST["barras"].'"';
echo $q;
$r=mysql_query($q);
$rows=mysql_num_rows($r);
$array_articulos=mysql_fetch_array($r);

if($rows==1){
	verifica_tabla_stock( $array_articulos["id"], $id_sucursal );
	$array_stock=stock_sucursal($array_articulos["id"],$id_sucursal);

	$stock_anterior=$array_stock["stock"];
	$stock_nuevo=$stock_anterior + $_POST["cantidad"];
	include("articulo_muestra.inc.php");
	$q2='update stock set stock="'.$stock_nuevo.'" where id_articulo="'.$array_articulos["id"].'" and id_sucursal="'.$id_sucursal.'"';
	echo '<form action="stock_update.php" method="post">';
	echo '<input type="hidden" name="query" value="'.base64_encode($q2).'" />';
	echo '<input type="hidden" name="stock_nuevo" value="'.$stock_nuevo.'" />';
	echo '<input type="submit" name="confirma" value="ACEPTAR" />';
	echo '<input type="submit" name="confirma" value="CANCELAR" />';
	echo '</form>';
}
if($rows>1){
	include("articulos_listado.inc.php");
	// elije 1
	//verifica tabla stock
	//actualiza tabla stock
}
?>