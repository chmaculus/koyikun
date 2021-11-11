<?php
include_once("asistencias_base.php");
include_once("connect.php");

$fecha=date("Y-n-d");
$hora=date("H:i:s");

if($_POST["id_asistencias"]){
    $id_asistencias=$_POST["id_asistencias"];
}

if($_POST["accion"]=="ingreso"){
	$query='insert into asistencias set
		id="'.$_POST["id"].'",
		id_sucursal="'.$_POST["id_sucursal"].'",
		vendedor="'.$_POST["vendedor"].'",
		fecha="'.$_POST["fecha"].'",
		hora="'.$_POST["hora"].'",
		';
	mysql_query($query)or die(mysql_error());
	$id_asistencias=mysql_insert_id($id_connection);
}


if($_POST["accion"]=="modificacion"){
		$query='update asistencias set
		id="'.$_POST["id"].'",
		id_sucursal="'.$_POST["id_sucursal"].'",
		vendedor="'.$_POST["vendedor"].'",
		fecha="'.$_POST["fecha"].'",
		hora="'.$_POST["hora"].'",
			where id="'.$_POST["id_asistencias"].'"
	';
	mysql_query($query)or die(mysql_error());
	$id_asistencias=$_POST["id_asistencias"];
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
	if($_POST["accion"]=="modificacion"){
		echo '<td>Los datos se actualizaron correctamente</td>';
	}
}

echo "</center>";

 if($_POST["accion"]=="ELIMINAR"){
 	$query='delete from asistencias where id="'.$id_asistencias.'"';
 	mysql_query($query)or die(mysql_error());
 }

?>
</center>
