<?php
include("cabecera.inc.php");
if(!$_POST["id_sucursal"] OR !$_POST["numero_venta"]){
	echo "salio aca";
	exit;
}

include("../../includes/connect.php");
include("../../includes/funciones_varias.php");
include("../../includes/funciones_sucursal.php");
include("../../includes/funciones_stock.php");

$sucursal=nombre_sucursal($_POST["id_sucursal"]);
$id_sucursal=$_POST["id_sucursal"];

if($_POST["accion"]=="CANCELAR"){
	echo "No se ha eliminado la venta";
	exit;
}

if($_POST["accion"]=="ELIMINAR"){

	$q1='select * from ventas where numero_venta="'.$_POST["numero_venta"].'" and sucursal="'.$sucursal.'"';
	echo "1: ".$q1."<br>";
	$res=mysql_query($q1);
	if(mysql_error()){
	    echo "1: ".mysql_error();
	}
	while($row=mysql_fetch_array($res)){
//		descuenta_stock( ($row["cantidad"] * (-1)), $row["id_articulos"], $id_sucursal );
	}
	$query='delete from ventas where numero_venta="'.$_POST["numero_venta"].'" and sucursal="'.$sucursal.'" ';
	
	echo "qq2:   query: ".$query."<br>".chr(13);
	mysql_query($query);
	if(mysql_error()){
	    echo "err2: ".mysql_error()."<br>";
	}else{
	    echo "Se ha eliminado la venta"."<br>".chr(13);
	}
	exit;
}

?>