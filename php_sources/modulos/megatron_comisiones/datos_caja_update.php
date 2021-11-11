<?php
include_once("datos_caja_base.php");
include_once("connect.php");

$fecha=date("Y-n-d");
$hora=date("H:i:s");

if($_POST["id_datos_caja"]){
    $id_datos_caja=$_POST["id_datos_caja"];
}

if($_POST["accion"]=="ingreso"){
	$query='insert into datos_caja set
		numero_suc="'.$_POST["numero_suc"].'",
		fecha="'.$_POST["fecha"].'",
		total_efectivo="'.$_POST["total_efectivo"].'",
		total_tarjeta="'.$_POST["total_tarjeta"].'",
		sin_comision="'.$_POST["sin_comision"].'",
		turno="'.$_POST["turno"].'",
		fecha_sistema="'.$_POST["fecha_sistema"].'",
		hora_sistema="'.$_POST["hora_sistema"].'",
		id_sucursal="'.$_POST["id_sucursal"].'",
		id_session="'.$_POST["id_session"].'"
		';
	mysql_query($query)or die(mysql_error());
	$id_datos_caja=mysql_insert_id($id_connection);
}


if($_POST["accion"]=="modificacion"){
		$query='update datos_caja set
			numero_suc="'.$_POST["numero_suc"].'",
			fecha="'.$_POST["fecha"].'",
			total_efectivo="'.$_POST["total_efectivo"].'",
			total_tarjeta="'.$_POST["total_tarjeta"].'",
			sin_comision="'.$_POST["sin_comision"].'",
			turno="'.$_POST["turno"].'",
			fecha_sistema="'.$_POST["fecha_sistema"].'",
			hora_sistema="'.$_POST["hora_sistema"].'",
			id_sucursal="'.$_POST["id_sucursal"].'",
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
 	$query='delete from comisiones_vendedores where id_datos_caja="'.$id_datos_caja.'"';
 	mysql_query($query)or die(mysql_error());
 }

?>
</center>
