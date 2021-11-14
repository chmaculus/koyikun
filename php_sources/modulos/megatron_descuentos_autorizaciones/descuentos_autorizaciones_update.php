<?php
include_once("descuentos_autorizaciones_base.php");
include_once("connect.php");

$fecha=date("Y-n-d");
$hora=date("H:i:s");


if($_POST["id_descuentos_autorizaciones"]){
    $id_descuentos_autorizaciones=$_POST["id_descuentos_autorizaciones"];
}

if($_POST["accion"]=="ingreso"){
	$hash=md5(microtime());
	$q2='select id from sucursales'
	$r2=mysql_query($q2);
	while($row2=mysql_fetch_array($r2)){
		if($_POST["id_suc"].$row2["id"]=="si"){
			$query='insert into descuentos_autorizaciones set 	hash="'.$hash.'" n_carnet="'.$_POST["n_carnet"].'", nombre="'.$_POST["nombre"].'", apellido="'.$_POST["apellido"].'", id_sucursal="'.$row2["id"].'", codigo="'.$_POST["codigo"].'"';
			mysql_query($query)or die(mysql_error());
			$id_descuentos_autorizaciones=mysql_insert_id($id_connection);
		}
	}
}


if($_POST["accion"]=="modificacion"){
	$q2='select id from sucursales'
	$r2=mysql_query($q2);
	while($row2=mysql_fetch_array($r2)){
		if($_POST["id_suc"].$row2["id"]=="si"){
			$query='insert into descuentos_autorizaciones set 	hash="'.$hash.'" n_carnet="'.$_POST["n_carnet"].'", nombre="'.$_POST["nombre"].'", apellido="'.$_POST["apellido"].'", id_sucursal="'.$row2["id"].'", codigo="'.$_POST["codigo"].'"';
			mysql_query($query)or die(mysql_error());
			$id_descuentos_autorizaciones=mysql_insert_id($id_connection);
		}
	}
	
}

#muestra registro ingresado
$query='select * from descuentos_autorizaciones where id="'.$id_descuentos_autorizaciones.'"';
$array_descuentos_autorizaciones=mysql_fetch_array(mysql_query($query));

echo "<center>";
include("descuentos_autorizaciones_muestra.inc.php");

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
 	$query='delete from descuentos_autorizaciones where id="'.$id_descuentos_autorizaciones.'"';
 	mysql_query($query)or die(mysql_error());
 }

?>
</center>
