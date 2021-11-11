<?php
include_once("novedades_base.php");
include_once("connect.php");
include("../../includes/funciones_varias.php");

$fecha=date("Y-n-d");
$hora=date("H:i:s");

if($_POST["id_novedades"]){
    $id_novedades=$_POST["id_novedades"];
}

if($_POST["accion"]=="ingreso"){
	$query='insert into novedades set
		id_sucursal="'.$_POST["id_sucursal"].'",
		motivo="'.$_POST["motivo"].'",
		texto="'.$_POST["texto"].'",
		vigencia_inicio="'.fecha_conv("/", $_POST["fecha_desde"] ).'",
		vigencia_finaliza="'.fecha_conv("/", $_POST["fecha_hasta"] ).'",
		fecha="'.$fecha.'",
		hora="'.$hora.'"
		';
	mysql_query($query)or die(mysql_error());
	$id_novedades=mysql_insert_id($id_connection);
}


if($_POST["accion"]=="modificacion"){
		$query='update novedades set
			id_sucursal="'.$_POST["id_sucursal"].'",
			motivo="'.$_POST["motivo"].'",
			texto="'.$_POST["texto"].'",
		vigencia_inicio="'.fecha_conv("/", $_POST["fecha_desde"] ).'",
		vigencia_finaliza="'.fecha_conv("/", $_POST["fecha_hasta"] ).'",
			fecha="'.$fecha.'",
			hora="'.$hora.'"
				where id="'.$_POST["id_novedades"].'"
	';
	mysql_query($query)or die(mysql_error());
	$id_novedades=$_POST["id_novedades"];
}

#muestra registro ingresado
$query='select * from novedades where id="'.$id_novedades.'"';
$array_novedades=mysql_fetch_array(mysql_query($query));

echo "<center>";
include("novedades_muestra.inc.php");

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
 	$query='delete from novedades where id="'.$id_novedades.'"';
 	mysql_query($query)or die(mysql_error());
 }

?>
</center>
