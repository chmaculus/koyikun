<?php
include_once("cajones_contenido_base.php");
include_once("connect.php");

$fecha=date("Y-n-d");
$hora=date("H:i:s");

if($_POST["id_cajones_contenido"]){
    $id_cajones_contenido=$_POST["id_cajones_contenido"];
}

if($_POST["accion"]=="ingreso"){
	$query='insert into cajones_contenido set
		id="'.$_POST["id"].'",
		id_cajon="'.$_POST["id_cajon"].'",
		id_articulo="'.$_POST["id_articulo"].'",
		marca="'.$_POST["marca"].'",
		descripcion="'.$_POST["descripcion"].'",
		contenido="'.$_POST["contenido"].'",
		presentacion="'.$_POST["presentacion"].'",
		clasificacion="'.$_POST["clasificacion"].'",
		subclasificacion="'.$_POST["subclasificacion"].'",
		precio_unitario="'.$_POST["precio_unitario"].'",
		cantidad="'.$_POST["cantidad"].'",
		';
	mysql_query($query)or die(mysql_error());
	$id_cajones_contenido=mysql_insert_id($id_connection);
}


if($_POST["accion"]=="modificacion"){
		$query='update cajones_contenido set
		id="'.$_POST["id"].'",
		id_cajon="'.$_POST["id_cajon"].'",
		id_articulo="'.$_POST["id_articulo"].'",
		marca="'.$_POST["marca"].'",
		descripcion="'.$_POST["descripcion"].'",
		contenido="'.$_POST["contenido"].'",
		presentacion="'.$_POST["presentacion"].'",
		clasificacion="'.$_POST["clasificacion"].'",
		subclasificacion="'.$_POST["subclasificacion"].'",
		precio_unitario="'.$_POST["precio_unitario"].'",
		cantidad="'.$_POST["cantidad"].'",
			where id="'.$_POST["id_cajones_contenido"].'"
	';
	mysql_query($query)or die(mysql_error());
	$id_cajones_contenido=$_POST["id_cajones_contenido"];
}

#muestra registro ingresado
$query='select * from cajones_contenido where id="'.$id_cajones_contenido.'"';
$array_cajones_contenido=mysql_fetch_array(mysql_query($query));

echo "<center>";
include("cajones_contenido_muestra.inc.php");

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
 	$query='delete from cajones_contenido where id="'.$id_cajones_contenido.'"';
 	mysql_query($query)or die(mysql_error());
 }

?>
</center>
