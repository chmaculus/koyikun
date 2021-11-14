<?php 
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");

$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a Megatron
if($jerarquia!="2"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 

$fecha=date("Y-n-d");
$hora=date("H:i:s");

#----------------------------------------
$query='DELETE FROM datos_temporales where 
id_session="'.$id_session.'" and
tipo="id_cliente"';
mysql_query($query);

if(mysql_error()){
	echo $query."<br>";
	echo mysql_error()."<br>";
	echo $_SERVER["SCRIPT_NAME"]."<br>";
}

#----------------------------------------

#----------------------------------------
$query='insert into datos_temporales set 
id_session="'.$id_session.'",
tipo="id_cliente",
dato="'.$_GET["id_clientes"].'",
fecha="'.$fecha.'",
hora="'.$hora.'"';

mysql_query($query);

if(mysql_error()){
	echo $query."<br>";
	echo mysql_error()."<br>";
	echo $_SERVER["SCRIPT_NAME"]."<br>";
}

#----------------------------------------



header("Location: consulta_precios.php");

?>