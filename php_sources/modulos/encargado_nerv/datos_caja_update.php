<?php

include_once("index.php");
include_once("connect.php");
include_once("funciones.php");

$fecha=date("Y-n-d");
$hora=date("H:i:s");

if($_POST["id_datos_caja"]){
    $id_datos_caja=$_POST["id_datos_caja"];
}

if(
	!$_POST["numero_suc"] OR 
	!$_POST["fecha"] OR 
	!$_POST["total_efectivo"] OR 
	!$_POST["total_tarjeta"] OR 
	!$_POST["sin_comision"] OR 
	!$_POST["turno"]
)	{
	$array_datos_caja["id"]=$_POST["id_datos_caja"];
	$array_datos_caja["numero_suc"]=$_POST["numero_suc"];
	$array_datos_caja["fecha"]=$_POST["fecha"];
	$array_datos_caja["total_efectivo"]=$_POST["total_efectivo"];
	$array_datos_caja["total_tarjeta"]=$_POST["total_tarjeta"];
	$array_datos_caja["sin_comision"]=$_POST["sin_comision"];
	$array_datos_caja["turno"]=$_POST["turno"];
	include("datos_caja_ingreso.php");
	echo "<center><alerta1>Debe completar todos los campos</alerta1></center>";
	exit;
	}
$fecha_ing=fecha_conv( "/", $_POST["fecha"] );

if($_POST["accion"]=="ingreso"){
	$query='insert into datos_caja set
		numero_suc="'.$_POST["numero_suc"].'",
		fecha="'.$fecha_ing.'",
		total_efectivo="'.$_POST["total_efectivo"].'",
		total_tarjeta="'.$_POST["total_tarjeta"].'",
		sin_comision="'.$_POST["sin_comision"].'",
		turno="'.$_POST["turno"].'",
		fecha_sistema="'.$fecha.'",
		hora_sistema="'.$hora.'",
		id_session="'.$_POST["id_session"].'"
		';
	mysql_query($query)or die(mysql_error());
	$id_datos_caja=mysql_insert_id($id_connection);
}

if($_POST["accion"]=="modificacion"){
		$query='update datos_caja set
			numero_suc="'.$_POST["numero_suc"].'",
			fecha="'.$fecha_ing.'",
			total_efectivo="'.$_POST["total_efectivo"].'",
			total_tarjeta="'.$_POST["total_tarjeta"].'",
			sin_comision="'.$_POST["sin_comision"].'",
			turno="'.$_POST["turno"].'",
			fecha_sistema="'.$fecha.'",
			hora_sistema="'.$hora.'",
			id_session="'.$_POST["id_session"].'"
				where id="'.$_POST["id_datos_caja"].'"
	';
	mysql_query($query)or die(mysql_error());
	$id_datos_caja=$_POST["id_datos_caja"];
}

#muestra registro ingresado
$query='select * from datos_caja where id="'.$id_datos_caja.'"';
$array_datos_caja=mysql_fetch_array(mysql_query($query));

echo "<center>";
include("datos_caja_muestra.inc.php");

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
 	$query='delete from datos_caja where id="'.$id_datos_caja.'"';
 	mysql_query($query)or die(mysql_error());
 }


?>
</center>
