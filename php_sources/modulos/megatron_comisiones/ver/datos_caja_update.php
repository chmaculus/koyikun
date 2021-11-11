<?php
include_once("datos_caja_base.php");
include_once("connect.php");

$fecha=date("Y-n-d");
$hora=date("H:i:s");

if($_POST["id_datos_caja"]){
    $id_datos_caja=$_POST["id_datos_caja"];
}

if((
	!$_POST["id"] OR 
	!$_POST["numero_suc"] OR 
	!$_POST["fecha"] OR 
	!$_POST["total_efectivo"] OR 
	!$_POST["total_tarjeta"] OR 
	!$_POST["sin_comision"] OR 
	!$_POST["turno"] OR 
	!$_POST["fecha_sistema"] OR 
	!$_POST["hora_sistema"] OR 
	!$_POST["id_sucursal"] OR 
	!$_POST["id_session"] OR 
) AND !$_POST["accion"]=="ELIMINAR")	{
		$array_datos_caja["id"]=$_POST["id"];
		$array_datos_caja["numero_suc"]=$_POST["numero_suc"];
		$array_datos_caja["fecha"]=$_POST["fecha"];
		$array_datos_caja["total_efectivo"]=$_POST["total_efectivo"];
		$array_datos_caja["total_tarjeta"]=$_POST["total_tarjeta"];
		$array_datos_caja["sin_comision"]=$_POST["sin_comision"];
		$array_datos_caja["turno"]=$_POST["turno"];
		$array_datos_caja["fecha_sistema"]=$_POST["fecha_sistema"];
		$array_datos_caja["hora_sistema"]=$_POST["hora_sistema"];
		$array_datos_caja["id_sucursal"]=$_POST["id_sucursal"];
		$array_datos_caja["id_session"]=$_POST["id_session"];
		include("datos_caja_ingreso.php");
		echo "<center><alerta1>Debe completar todos los campos</alerta1></center>";
		exit;
	}

if($_POST["accion"]=="ingreso"){
	$query='insert into datos_caja set
		id="'.$_POST["id"].'",
		numero_suc="'.$_POST["numero_suc"].'",
		fecha="'.$_POST["fecha"].'",
		total_efectivo="'.$_POST["total_efectivo"].'",
		total_tarjeta="'.$_POST["total_tarjeta"].'",
		sin_comision="'.$_POST["sin_comision"].'",
		turno="'.$_POST["turno"].'",
		fecha_sistema="'.$_POST["fecha_sistema"].'",
		hora_sistema="'.$_POST["hora_sistema"].'",
		id_sucursal="'.$_POST["id_sucursal"].'",
		id_session="'.$_POST["id_session"].'",
		';
	mysql_query($query)or die(mysql_error());
	$id_datos_caja=mysql_insert_id($id_connection);
}


if($_POST["accion"]=="modificacion"){
		$query='update datos_caja set
			id="'.$_POST["id"].'",
			numero_suc="'.$_POST["numero_suc"].'",
			fecha="'.$_POST["fecha"].'",
			total_efectivo="'.$_POST["total_efectivo"].'",
			total_tarjeta="'.$_POST["total_tarjeta"].'",
			sin_comision="'.$_POST["sin_comision"].'",
			turno="'.$_POST["turno"].'",
			fecha_sistema="'.$_POST["fecha_sistema"].'",
			hora_sistema="'.$_POST["hora_sistema"].'",
			id_sucursal="'.$_POST["id_sucursal"].'",
			id_session="'.$_POST["id_session"].'",
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
