<?php

include_once("index.php");

include_once("cabecera.inc.php");
include_once("connect.php");
include_once("funciones.php");

$fecha=date("Y-n-d");
$hora=date("H:i:s");



if((
	!$_POST["vendedor"] OR 
	!$_POST["linea"] OR 
	!$_POST["total"]) AND $_POST["accion"]=="ingreso"
){
	$array_comisiones_vendedores["vendedor"]=$_POST["vendedor"];
	$array_comisiones_vendedores["linea"]=$_POST["linea"];
	$array_comisiones_vendedores["total"]=$_POST["total"];

	include("comisiones_vendedores_ingreso.php");
	echo "<center><alerta1>Debe completar todos los campos</alerta1></center>";
	exit;
}

$fecha_ing=fecha_conv( "/", $_POST["fecha"] );


if($_POST["id_comisiones_vendedores"]){
    $id_comisiones_vendedores=$_POST["id_comisiones_vendedores"];
}

if($_POST["accion"]=="ingreso"){
	$query='insert into comisiones_vendedores set
		id_datos_caja="'.$_POST["id_datos_caja"].'",
		fecha="'.$_POST["fecha_ingresada"].'",
		turno="'.$_POST["turno"].'",
		vendedor="'.$_POST["vendedor"].'",
		linea="'.$_POST["linea"].'",
		total="'.$_POST["total"].'",
		fecha_sistema="'.$fecha.'",
		hora_sistema="'.$hora.'",
		id_session="'.$_POST["id_session"].'"
		';
	mysql_query($query)or die(mysql_error());
	$id_comisiones_vendedores=mysql_insert_id($id_connection);
}

if($_POST["accion"]=="modificacion"){
		$query='update comisiones_vendedores set
			id_datos_caja="'.$_POST["id_datos_caja"].'",
			fecha="'.$_POST["fecha_ingresada"].'",
			turno="'.$_POST["turno"].'",
			vendedor="'.$_POST["vendedor"].'",
			linea="'.$_POST["linea"].'",
			total="'.$_POST["total"].'",
			fecha_sistema="'.$fecha.'",
			hora_sistema="'.$hora.'",
			id_session="'.$_POST["id_session"].'"
				where id="'.$_POST["id_comisiones_vendedores"].'"
	';
	mysql_query($query)or die(mysql_error());
	$id_comisiones_vendedores=$_POST["id_comisiones_vendedores"];
}

#muestra registro ingresado
$query='select * from comisiones_vendedores where id="'.$id_comisiones_vendedores.'"';
$array_comisiones_vendedores=mysql_fetch_array(mysql_query($query));

echo "<center>";
include("comisiones_vendedores_muestra.inc.php");

if(!mysql_error()){
	if($_POST["accion"]=="ingreso"){
		echo '<td>Los datos se ingresaron correctamente</td>';
	}
	if($_POST["accion"]=="modificacion"){
		echo '<td>Los datos se actualizaron correctamente</td>';
	}
}

echo "</center>";

 if($_POST["accion"]=="ELIMINAR"){
 	$query='delete from comisiones_vendedores where id="'.$id_comisiones_vendedores.'"';
 	mysql_query($query)or die(mysql_error());
 }

?>
</center>
