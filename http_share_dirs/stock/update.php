<?php
include("./includes/connect.php");
include("seguridad.inc.php");
include("./includes/funciones_stock.php");

verifica_tabla_stock($_POST["id_articulo"], $_COOKIE["id_sucursal"]);

$q='update stock set stock="'.$_POST["cantidad"].'" where id_articulo="'.$_POST["id_articulo"].'" and id_sucursal="'.$_COOKIE["id_sucursal"].'"';
mysql_query($q);
if(mysql_error()){echo mysql_error();}

/*
seguimiento_stock($id_articulo, $stock_anterior, $stock_nuevo, $tipo, $origen, $destino);
*/
seguimiento_stock($_POST["id_articulo"], $_POST["stock"], $_POST["cantidad"], "Mod /stock", $_COOKIE["id_sucursal"], $_COOKIE["id_sucursal"]);


header('Location: index.php?aa=updated');
exit;

?>
