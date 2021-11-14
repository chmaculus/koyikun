<?php
include_once("connect.php");

$ubicacion=base64_encode($_SERVER["SCRIPT_NAME"]);

$inicio=time();
$finaliza=$inicio+21600;

if($_GET["ubicacion"]){
	$ubicacion=$_GET["ubicacion"];
}


$id_session=$_COOKIE["id_session"];

$array_session=verifica_session($id_session, $inicio );

if($array_session=="0"){
	elimina_session($id_session);	
	killcookies();
	header('Location: login_nologin.php?nologin=6&ubicacion='.$ubicacion);
	exit;
}


if(isset($_COOKIE["inicio"])){
	actualizacookies( $inicio, $finaliza );
	actualiza_session($id_session, $finaliza);
}else{
	header('Location: login_nologin.php?nologin=6&ubicacion='.$ubicacion);
	exit;
}

$id_session=$array_session["id_session"];
$usuario=$array_session["usuario"];
$jerarquia=$array_session["jerarquia"];
$permisos=$_COOKIE["permisos"];




#-------------------------------------------------------------------------------------------------------------------------
function actualizacookies( $inicio, $finaliza  ){
	$id_session=$_COOKIE["id_session"];

	setcookie("inicio",$inicio,$finaliza);
	setcookie("id_sucursal",$_COOKIE["id_sucursal"],$finaliza);
	setcookie("id_session",$_COOKIE["id_session"],$finaliza);
	setcookie("usuario",$_COOKIE["usuario"],$finaliza);
	setcookie("permisos",$_COOKIE["permisos"],$finaliza);
	setcookie("jerarquia",$_COOKIE["jerarquia"],$finaliza);

}
#-------------------------------------------------------------------------------------------------------------------------



#-------------------------------------------------------------------------------------------------------------------------
function killcookies(){
	setcookie("inicio","");
	setcookie("id_sucursal","");
	setcookie("id_session","");
	setcookie("usuario","");
	setcookie("permisos","");
	setcookie("jerarquia","");
}
#-------------------------------------------------------------------------------------------------------------------------



#-------------------------------------------------------------------------------------------------------------------------
function elimina_session($id_session){
	$query='delete from sessiones_activas where id_session="'.$id_session.'"';
	mysql_query($query);
}
#-------------------------------------------------------------------------------------------------------------------------



#-------------------------------------------------------------------------------------------------------------------------
function actualiza_session($id_session, $finaliza){
	$query='update sessiones_activas set finaliza="'.$finaliza.'" where id_session="'.$id_session.'" ';
	mysql_query($query);
}
#-------------------------------------------------------------------------------------------------------------------------


#-------------------------------------------------------------------------------------------------------------------------
function verifica_session($id_session, $inicio ){
	$query='select * from sessiones_activas where id_session="'.$id_session.'" and finaliza>="'.$inicio.'"';
	$result=mysql_query($query) or die(mysql_error());
	$rows=mysql_num_rows($result);
	$array=mysql_fetch_array($result);
	if($rows=="1"){
		return $array;
	}else{
		return "0";
	}
}
#-------------------------------------------------------------------------------------------------------------------------
?>
