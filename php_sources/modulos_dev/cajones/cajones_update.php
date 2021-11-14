<?php
include_once("cajones_base.php");
include_once("connect.php");

$fecha=date("Y-n-d");
$hora=date("H:i:s");

if($_POST["id_cajones"]){
    $id_cajones=$_POST["id_cajones"];
}

if($_POST["accion"]=="ingreso"){
	$query='insert into cajones set
		id="'.$_POST["id"].'",
		numero="'.$_POST["numero"].'",
		id_sucursal_origen="'.$_POST["id_sucursal_origen"].'",
		id_sucursal_destino="'.$_POST["id_sucursal_destino"].'",
		vendedor_envia="'.$_POST["vendedor_envia"].'",
		vendedor_recibe="'.$_POST["vendedor_recibe"].'",
		fechao="'.$_POST["fechao"].'",
		horao="'.$_POST["horao"].'",
		fechad="'.$_POST["fechad"].'",
		horad="'.$_POST["horad"].'",
		estado="'.$_POST["estado"].'",
		';
	mysql_query($query)or die(mysql_error());
	$id_cajones=mysql_insert_id($id_connection);
}


if($_POST["accion"]=="modificacion"){
		$query='update cajones set
		id="'.$_POST["id"].'",
		numero="'.$_POST["numero"].'",
		id_sucursal_origen="'.$_POST["id_sucursal_origen"].'",
		id_sucursal_destino="'.$_POST["id_sucursal_destino"].'",
		vendedor_envia="'.$_POST["vendedor_envia"].'",
		vendedor_recibe="'.$_POST["vendedor_recibe"].'",
		fechao="'.$_POST["fechao"].'",
		horao="'.$_POST["horao"].'",
		fechad="'.$_POST["fechad"].'",
		horad="'.$_POST["horad"].'",
		estado="'.$_POST["estado"].'",
			where id="'.$_POST["id_cajones"].'"
	';
	mysql_query($query)or die(mysql_error());
	$id_cajones=$_POST["id_cajones"];
}

#muestra registro ingresado
$query='select * from cajones where id="'.$id_cajones.'"';
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
