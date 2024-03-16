<?php

include_once("../login/login_verifica.inc.php");
$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="0"){
	header('Location: ../login/login_nologin.php?nologin=6');
	exit;
} 

include("costos_detalle_base.php");
include_once("connect.php");

if(!$_GET["id_costos_detalle"]){
 	exit;
}
$id_costos_detalle=$_GET["id_costos_detalle"];

$query='select * from costos_detalle where id="'.$id_costos_detalle.'"';
$array_costos_detalle=mysql_fetch_array(mysql_query($query));

<center>
include("costos_detalle_muestra.inc.php");
</center>

?>
