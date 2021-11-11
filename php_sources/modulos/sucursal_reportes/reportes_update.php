<?php
include_once("cabecera.inc.php");
include_once("../../includes/connect.php");

echo "<center><titulo>Reporte</titulo><br>";

$fecha=date("Y-n-d");
$hora=date("H:i:s");

if($_POST["id_reportes"]){
    $id_reportes=$_POST["id_reportes"];
}

if($_POST["accion"]=="ingreso"){
	$query='insert into reportes set
		id="'.$_POST["id"].'",
		id_sucursal="'.$_POST["id_sucursal"].'",
		motivo="'.$_POST["motivo"].'",
		texto="'.$_POST["texto"].'",
		fecha="'.$fecha.'",
		hora="'.$hora.'"
		';
	mysql_query($query)or die(mysql_error());
	$id_reportes=mysql_insert_id($id_connection);
}


if($_POST["accion"]=="modificacion"){
		$query='update reportes set
			id="'.$_POST["id"].'",
			id_sucursal="'.$_POST["id_sucursal"].'",
			motivo="'.$_POST["motivo"].'",
			texto="'.$_POST["texto"].'",
			fecha="'.$fecha.'",
			hora="'.$hora.'"
				where id="'.$_POST["id_reportes"].'"
	';
	mysql_query($query)or die(mysql_error());
	$id_reportes=$_POST["id_reportes"];
}

#muestra registro ingresado
$query='select * from reportes where id="'.$id_reportes.'"';
$array_reportes=mysql_fetch_array(mysql_query($query));

echo "<center>";
include("reportes_muestra.inc.php");

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
 	$query='delete from reportes where id="'.$id_reportes.'"';
 	mysql_query($query)or die(mysql_error());
 }

?>
</center>
