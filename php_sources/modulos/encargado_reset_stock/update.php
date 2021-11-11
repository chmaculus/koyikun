<?php
include_once("../../includes/connect.php");

$fecha=date("Y-n-d");
$hora=date("H:i:s");


include("../../login/login_verifica.inc.php");
$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="1"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 

include_once("cabecera.inc.php");
echo '<center>';
if(!$_POST["id_sucursal"]){
	echo "Debe seleccionar sucursal<br>";
	exit;
}

$query=base64_decode($_POST["query"]);
echo $query;

$result=mysql_query($query);
while($row=mysql_fetch_array($result)){
	$q1='update stock set stock=0, fecha="'.$fecha.'", hora="'.$hora.'" where id_articulo="'.$row["id"].'" and id_sucursal="'.$_POST["id_sucursal"].'"';
	mysql_query($q1);
	if(mysql_error()){
		echo mysql_error();
		echo $q1."<br><br>";
	}
	$q2='insert into seguimiento_stock set id_articulo="'.$row["id"].'", tipo="CERO", origen="'.$_POST["id_sucursal"].'", destino="'.$_POST["id_sucursal"].'", fecha="'.$fecha.'", hora="'.$hora.'", cantidad="0"';
	mysql_query($q2);
	if(mysql_error()){
		echo mysql_error();
		echo $q2."<br><br>";
	}
}

?>