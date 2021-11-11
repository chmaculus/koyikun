<?php

include_once("../../includes/connect.php");
include_once("../../includes/funciones_varias.php");
include_once("../../login/login_verifica.inc.php");
//include_once("../../includes/funciones_stock.php");

#jrarquia 0 coresponde a administrador
if($jerarquia!="1"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 

echo "<center>";
echo "Sucursal: ".nombre_sucursal($id_sucursal)."<br>";


$fecha=date("Y-n-d");
$hora=date("H:i:s");


include_once("pedidos_base.php");


$q='update pedidos set responsable="'.$_POST["responsable"].'" where numero_pedido="'.$_POST["numero_pedido"].'" and sucursal="'.$_POST["sucursal"].'"';

echo $q."<br>";



?>