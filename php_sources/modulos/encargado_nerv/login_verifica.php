<?php
include_once("cabecera.inc.php");

$login=$_POST["login"];
$password=$_POST["pass"];

if($_POST["ubicacion"]){
	$ubicacion=base64_decode($_POST["ubicacion"]);
}

if(!$login){
   header('Location: login_nologin.php?nologin=5');
   exit;
}
if(!$password){
   header('Location: login_nologin.php?nologin=5');
   exit;
}
if($login==""){
   header('Location: login_nologin.php?nologin=5');
   exit;
}
if($password==""){
   header('Location: login_nologin.php?nologin=5');
   exit;
}

include("../includes/connect.php");
$query='SELECT * FROM usuarios WHERE usuario="'.$login.'"';
$result = mysql_query($query)or die(mysql_error());

$numrows = mysql_num_rows($result);
$array_usuario= mysql_fetch_array($result);

if ($numrows < "1") {
	$verificado="0";
   header('Location: login_nologin.php?nologin=3');
	exit;
}

if($array_usuario["contrasena"]){
	if($array_usuario["contrasena"]==$password){
		$verificado="1";
	}else{
		$verificado="0";
   	header('Location: login_nologin.php?nologin=1');
		exit;
	}
}else{
   	header('Location: login_nologin.php?nologin=1');
		exit;
}

mysql_free_result($result);

if ($verificado == "1"){

	$inicio=time();
	$microtime=microtime();
	$id_session=substr( md5( $microtime ), 0,10);
	$finaliza=$inicio+21600;
	
	setcookie("inicio",$inicio, $finaliza );
	setcookie("id_sucursal", $array_usuario["id_sucursal"], $finaliza);
	setcookie("id_session", $id_session, $finaliza);
	setcookie("usuario", $array_usuario["usuario"], $finaliza);
	setcookie("permisos", $array_usuario["permisos"], $finaliza);
	setcookie("jerarquia", $array_usuario["jerarquia"], $finaliza);

	graba_session( $id_session, $array_usuario["usuario"], $array_usuario["jerarquia"], $finaliza );
	if($ubicacion){
		   header('Location: index.php');
	}else{
		   header('Location: index.php');
	}
   exit;
}

if($verificado!="1"){
	setcookie("inicio","");
   header('Location: login_nologin.php?nologin=4');
}


function graba_session( $id_session, $usuario, $jerarquia, $finaliza ){
	$query='insert into sessiones_activas set id_session="'.$id_session.'", usuario="'.$usuario.'", jerarquia="'.$jerarquia.'", finaliza="'.$finaliza.'"';
	mysql_query($query);
}

?>
