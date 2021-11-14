<?php
include_once("cajones_base.php");
include_once("connect.php");
include_once("../../includes/funciones_varias.php");

$fecha=date("Y-n-d");
$hora=date("H:i:s");

if($_POST["id_cajones"]){
    $id_cajones=$_POST["id_cajones"];
}

if($_POST["accion"]=="ingreso"){
	$query='insert into koyikun.cajones_temp set
	id_session="'.$_POST["id_session"].'",
	sucursal_origen="'.$_POST["sucursal_origen"].'",
	sucursal_destino="'.$_POST["sucursal_destino"].'",
	vendedor_envia="'.$_POST["vendedor_envia"].'"
	';
	mysql_query($query)or die(mysql_error());
	$id_cajones=mysql_insert_id($id_connection);
}


if($_POST["accion"]=="modificacion"){
	$query='update koyikun.cajones_temp set id="'.$_POST["id"].'",
	id_session="'.$_POST["id_session"].'",
	sucursal_origen="'.$_POST["sucursal_origen"].'",
	sucursal_destino="'.$_POST["sucursal_destino"].'",
	vendedor_envia="'.$_POST["vendedor_envia"].'"
 		where id="'.$_POST["id"].'"
	';
	mysql_query($query)or die(mysql_error());
	$id_cajones=$_POST["id_cajones"];
}

#muestra registro ingresado
$query='select * from cajones_temp where id="'.$id_cajones.'"';
$array_cajones=mysql_fetch_array(mysql_query($query));

echo "<center>";
include("cajones_muestra.inc.php");

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
 	$query='delete from cajones where id="'.$id_cajones.'"';
 	mysql_query($query)or die(mysql_error());
 }

?>
</center>
