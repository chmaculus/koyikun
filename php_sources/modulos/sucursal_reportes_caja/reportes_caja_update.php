<?php
include_once("../../login/login_verifica.inc.php");
include_once("../../includes/connect.php");

$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="2"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
}

if(!$_POST["motivo"]  ){
	header('Location: reportes_caja_ingreso.php?faltan=motivo');
	exit;
}

if( !$_POST["importe"]  ){
	header('Location: reportes_caja_ingreso.php?faltan=importe');
	exit;
}

if( !$_POST["vendedor"] ){
	header('Location: reportes_caja_ingreso.php?faltan=vendedor');
	exit;
}


include_once("cabecera.inc.php");

$fecha=date("Y-n-d");
$hora=date("H:i:s");
$id_sucursal=$_COOKIE["id_sucursal"];
$codigo_buzon=date("nd His");
$importe=str_replace(',' , '.' ,$_POST["importe"]);


if($_POST["id_reportes_caja"]){
    $id_reportes_caja=$_POST["id_reportes_caja"];
}

if($_POST["accion"]=="ingreso"){
	$query='insert into reportes_caja set
		motivo="'.$_POST["motivo"].'",
		importe="'.$importe.'",
		vendedor="'.$_POST["vendedor"].'",
		fecha="'.$fecha.'",
		hora="'.$hora.'",
		codigo_buzon="'.$codigo_buzon.'",
		sucursal="'.$id_sucursal.'"
		';

	mysql_query($query)or die(mysql_error());
	$id_reportes_caja=mysql_insert_id($id_connection);
}


if($_POST["accion"]=="modificacion"){
		$query='update reportes_caja set
		motivo="'.$_POST["motivo"].'",
		importe="'.$importe.'",
		vendedor="'.$_POST["vendedor"].'",
		fecha="'.$fecha.'",
		hora="'.$hora.'",
		codigo_buzon="'.$codigo_buzon.'",
		sucursal="'.$id_sucursal.'"
			where id="'.$_POST["id_reportes_caja"].'"
	';
	mysql_query($query)or die(mysql_error());
	$id_reportes_caja=$_POST["id_reportes_caja"];
}

#muestra registro ingresado
$query='select * from reportes_caja where id="'.$id_reportes_caja.'"';
$array_reportes_caja=mysql_fetch_array(mysql_query($query));

echo "<center>";
include("reportes_caja_muestra.inc.php");
echo "<br>Escriba solo el codigo de buzon en el sobre y coloquelo en el buzon.<br>";
echo "En caso se ser un gasto recuerde colocar el tiquet / factura en el sobre.<br>";
echo "<br>Codigo de buzon: ".$codigo_buzon."<br><br>";

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
 	$query='delete from reportes_caja where id="'.$id_reportes_caja.'"';
 	mysql_query($query)or die(mysql_error());
 }

?>
</center>
