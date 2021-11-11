<?php
include_once("../../includes/connect.php");
include_once("../../includes/funciones_stock.php");
include_once("../../login/login_verifica.inc.php");
include_once("seguridad_1.inc.php");

include_once("cabecera.inc.php");

$id_sucursal=$_COOKIE["id_sucursal"];
$fecha=date("Y-n-d");
$hora=date("H:i:s");


include_once("index.php");

echo "<br><br>";


if($_POST["cantidad"]<=0){
    echo "La cantidad debe ser mayor que cero<br>";
    exit;
}


verifica_tabla_stock( $_POST["id_articulos"], $id_sucursal );

//ingresa_stock( $_POST["id_articulos"], $id_sucursal, $_POST["motivo"]);


$array_stock=array_stock($_POST["id_articulos"], $id_sucursal);

echo "id sucursal: ".$id_sucursal."<br>";
echo "stock ant: ".$array_stock["stock"]."<br>";



$q='select * from articulos where id="'.$_POST["id_articulos"].'"';

$result=mysql_query($q);
if(mysql_error()){
	echo mysql_error();
}
$array_articulos=mysql_fetch_array($result);

include_once("articulos_muestra.inc.php");


$stock_anterior=$array_stock["stock"];
if($stock_anterior<0){
    $stock_anterior=0;
}

$stock_nuevo=$stock_anterior + $_POST["cantidad"];

$qb='update stock set stock="'.$stock_nuevo.'", fecha="'.$fecha.'", hora="'.$hora.'" where id_articulo="'.$_POST["id_articulos"].'" and id_sucursal="'.$id_sucursal.'"';
mysql_query($qb);
if(mysql_error()){
    echo "<br>".mysql_error()."<br>".$qa."<br>";
}
echo "qb: ".$qb."<br>";


$qa='insert into seguimiento_stock set id_articulo="'.$_POST["id_articulos"].'",
					stock_anterior="'.$array_stock["stock"].'",
					stock_nuevo="'.$stock_nuevo.'",
					tipo="'.$_POST["motivo"].'",
					origen="19",
					destino="'.$id_sucursal.'",
					fecha="'.$fecha.'",
					hora="'.$hora.'",
					cantidad="'.$_POST["cantidad"].'"
					';

mysql_query($qa);
if(mysql_error()){
    echo "<br>".mysql_error()."<br>".$qa."<br>";
}


echo "<font1>Los datos se ingresaron correctamente</font1>";

?>