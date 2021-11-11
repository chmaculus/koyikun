<?php

include_once("../../login/login_verifica.inc.php");
include_once("../../includes/connect.php");

$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="1"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
}

include_once("cabecera.inc.php");
include_once("../../includes/funciones_varias.php");
include_once("../../includes/funciones_valores.php");


$id_sucursal=$_COOKIE["id_sucursal"];
$sucursal=nombre_sucursal($id_sucursal);

$fecha=date("Y-n-d");
$hora=date("H:i:s");


if($hora>"00:00:00" AND $hora <"13:00:00"){
	$turno="M";
	$h_entrada=get_valor(4);
}
if($hora>"13:00:01" AND $hora <"21:00:00"){
	$turno="T";
	$h_entrada=get_valor(4);
}


if($_POST["id_asistencias"]){
    $id_asistencias=$_POST["id_asistencias"];
}

if($_POST["accion"]=="ingreso"){
	$query='insert into asistencias set
		id_sucursal="'.$id_sucursal.'",
		vendedor="'.$_POST["vendedor"].'",
		turno="'.$turno.'",
		h_entrada="'.$h_entrada.'",
		fecha="'.$fecha.'",
		hora="'.$hora.'"
		';
	mysql_query($query)or die(mysql_error());
	$id_asistencias=mysql_insert_id($id_connection);
}



#muestra registro ingresado
$query='select * from asistencias where id="'.$id_asistencias.'"';
$array_asistencias=mysql_fetch_array(mysql_query($query));

echo "<center>";
include("asistencias_muestra.inc.php");

if(!mysql_error()){
	if($_POST["accion"]=="ingreso"){
		echo '<td>Los datos se ingresaron correctamente</td>';
	}
}

echo "</center>";

?>
</center>
