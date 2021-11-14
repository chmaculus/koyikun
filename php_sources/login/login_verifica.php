<?php

$login=$_POST["login"];
$password=$_POST["pass"];

$hexlogin=bin2hex($_POST["login"]);
$hexpass=bin2hex($_POST["login"]);



$microtime=microtime();
$id_session=substr( md5( $microtime ), 0,10);
$inicio=time();
$finaliza=$inicio+(60 * 60 * 1);

$path='/';


if($_POST["ubicacion"]){
	$ubicacion=base64_decode($_POST["ubicacion"]);
}

if(!$login){
   header('Location: login_nologin.php?nologin=5&aa=1');
   exit;
}
if(!$password){
   header('Location: login_nologin.php?nologin=5&aa=1');
   exit;
}
if($login==""){
   header('Location: login_nologin.php?nologin=5&aa=1');
   exit;
}
if($password==""){
   header('Location: login_nologin.php?nologin=5&aa=1');
   exit;
}

include("../includes/connect.php");
$query='SELECT * FROM usuarios WHERE usuario="'.$login.'"';
$result = mysql_query($query)or die(mysql_error());

$numrows = mysql_num_rows($result);
$array_usuario= mysql_fetch_array($result);

$q2='insert into login_fail set usuario="'.$hexlogin.'", password="'.$hexpass.'"';
mysql_query($q2);
if(mysql_error()){
    	setcookie("mysql_error", mysql_error(), $finaliza,$path );
    	setcookie("sql", $q2, $finaliza,$path );
}else{
    	setcookie("sql", $q2, $finaliza,$path );
}



if ($numrows < "1") {
    $q2='insert into login_fail set usuario="'.$hexlogin.'", password="'.$hexpass.'"';
    mysql_query($q2);
if(mysql_error()){
    	setcookie("mysql_error", mysql_error(), $finaliza,$path );
    	setcookie("sql", $q2, $finaliza,$path );
}else{
    	setcookie("sql", $q2, $finaliza,$path );
}
	$verificado="0";
   header('Location: login_nologin.php?nologin=3');
	exit;
}

if($array_usuario["contrasena"]){
	if($array_usuario["contrasena"]==$password){
		$verificado="1";
	}else{
		$verificado="0";
		$q2='insert into login_fail set usuario="'.$hexlogin.'", password="'.$hexpass.'"';
		mysql_query($q2);
if(mysql_error()){
    	setcookie("mysql_error", mysql_error(), $finaliza,$path );
    	setcookie("sql", $q2, $finaliza,$path );
}else{
    	setcookie("sql", $q2, $finaliza,$path );
}
	   	header('Location: login_nologin.php?nologin=1');
		exit;
	}
}else{
   	header('Location: login_nologin.php?nologin=1');
		exit;
}

mysql_free_result($result);

if ($verificado == "1"){
	
	
	setcookie("inicio",$inicio, $finaliza,$path );
	setcookie("id_sucursal", $array_usuario["id_sucursal"], $finaliza,$path );
	setcookie("id_session", $id_session, $finaliza,$path );
	setcookie("id_usuario", $array_usuario["id"], $finaliza,$path );
	setcookie("nombre_usuraio", $array_usuario["nombre"], $finaliza,$path );
	setcookie("usuario", $array_usuario["usuario"], $finaliza,$path );
	setcookie("permisos", $array_usuario["permisos"], $finaliza,$path );
	setcookie("jerarquia", $array_usuario["jerarquia"], $finaliza,$path );

	#----------------------------
	//borra viejas
	$viejas=time()-(60 * 60 * 24 * 4);
	$q='delete from sessiones_activas where finaliza<="'.$viejas.'"';
	mysql_query($q);
	#----------------------------
		
	
	$query='insert into sessiones_activas set id_session="'.$id_session.'", 
															usuario="'.$array_usuario["usuario"].'", 
															id_sucursal="'.$array_usuario["id_sucursal"].'", 
															jerarquia="'.$array_usuario["jerarquia"].'", 
															inicio="'.$inicio.'",
															finaliza="'.$finaliza.'",
															ip="'.$_SERVER["REMOTE_ADDR"].'",
															navegador="'.$_SERVER["HTTP_USER_AGENT"].'"
															';
	mysql_query($query);
	if($ubicacion){
		   header('Location: '.$ubicacion);
	}else{
	    $q2='insert into login_fail set usuario="'.$hexlogin.'", password="'.$hexpass.'"';
	    mysql_query($q2);
		   header('Location: login_nologin.php?nologin=7');
if(mysql_error()){
    	setcookie("mysql_error", mysql_error(), $finaliza,$path );
    	setcookie("sql", $q2, $finaliza,$path );
}else{
    	setcookie("sql", $q2, $finaliza,$path );
}
	}
   exit;

}

if($verificado!="1"){
    $q2='insert into login_fail set usuario="'.$hexlogin.'", password="'.$hexpass.'"';
    mysql_query($q2);
	setcookie("inicio","");
if(mysql_error()){
    	setcookie("mysql_error", mysql_error(), $finaliza,$path );
    	setcookie("sql", $q2, $finaliza,$path );
}else{
    	setcookie("sql", $q2, $finaliza,$path );
}
   header('Location: login_nologin.php?nologin=4');
}



?>
