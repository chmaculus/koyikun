<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
  <meta content="text/html; charset=UTF-8" http-equiv="content-type" />
  <title>Koyi Kun control administrativo</title>
</head>
<body>
<center>
<?php
if(!$_POST["id_sucursal"] OR !$_POST["numero_venta"]){
	echo "salio aca";
	exit;
}

include("../../includes/connect.php");
include("../includes/funciones_varias.php");
$sucursal=nombre_sucursal($_POST["id_sucursal"]);
if($_POST["accion"]=="CANCELAR"){
	echo "No se ha eliminado la venta";
	exit;
}

if($_POST["accion"]=="ELIMINAR"){
	$query='delete from ventas where numero_venta="'.$_POST["numero_venta"].'" and sucursal="'.$sucursal.'"';
	mysql_query($query)or die(mysql_error());
	echo "query: ".$query."<br>".chr(13);
	if(!mysql_error()){
		echo "Se ha eliminado la venta"."<br>".chr(13);
	}
	exit;
}

?>