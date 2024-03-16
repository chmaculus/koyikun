<?php

include_once("../login/login_verifica.inc.php");
$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="0"){
	header('Location: ../login/login_nologin.php?nologin=6');
	exit;
} 

include_once("costos_detalle_base.php");
include_once("connect.php");

$fecha=date("Y-n-d");
$hora=date("H:i:s");

if($_POST["id_costos_detalle"]){
    $id_costos_detalle=$_POST["id_costos_detalle"];
}

if($_POST["accion"]=="ingreso"){
	$query='insert into costos_detalle set
		marca="'.$_POST["marca"].'",
		detalle="'.$_POST["detalle"].'",
		fecha="'.$fecha.'",
		hora="'.$hora.'"
		';
	mysql_query($query)or die(mysql_error());
	$id_costos_detalle=mysql_insert_id($id_connection);
}


if($_POST["accion"]=="modificacion"){
		$query='update costos_detalle set
		marca="'.$_POST["marca"].'",
		detalle="'.$_POST["detalle"].'",
		fecha="'.$fecha.'",
		hora="'.$hora.'"
			where id="'.$_POST["id_costos_detalle"].'"
	';
	mysql_query($query)or die(mysql_error());
	$id_costos_detalle=$_POST["id_costos_detalle"];
}

#muestra registro ingresado
$query='select * from costos_detalle where id="'.$id_costos_detalle.'"';
$array_costos_detalle=mysql_fetch_array(mysql_query($query));

echo "<center>";
include("costos_detalle_muestra.inc.php");

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
 	$query='delete from costos_detalle where id="'.$id_costos_detalle.'"';
 	mysql_query($query)or die(mysql_error());
 }

?>
</center>
