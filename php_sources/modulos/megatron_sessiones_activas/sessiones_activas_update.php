<?php
include_once("../includes/connect.php");
include_once("../../login/login_verifica.inc.php");
include_once("seguridad.inc.php");

include_once("cabecera.inc.php");

$fecha=date("Y-n-d");
$hora=date("H:i:s");

if($_POST["id_sessiones_activas"]){
    $id_sessiones_activas=$_POST["id_sessiones_activas"];
}


#muestra registro ingresado
$query='select * from sessiones_activas where id_session="'.$id_sessiones_activas.'"';
$array_sessiones_activas=mysql_fetch_array(mysql_query($query));

echo "<center>";
include("sessiones_activas_muestra.inc.php");

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
 	$query='delete from sessiones_activas where id_session="'.$id_sessiones_activas.'"';
 	mysql_query($query)or die(mysql_error());
 }

?>
</center>
