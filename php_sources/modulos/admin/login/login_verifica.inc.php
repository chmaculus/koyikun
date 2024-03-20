<?php
include_once("../../includes/connect.php");

$ubicacion=base64_encode($_SERVER["SCRIPT_NAME"]);

$inicio=time();
$finaliza=$inicio+(60 * 60 * 1);

$path='/';


if(isset($_GET["ubicacion"])){
	$ubicacion=$_GET["ubicacion"];
}

if(!$_COOKIE["id_session"]){
	header('Location: ../login/login_nologin.php?nologin=6&ubicacion='.$ubicacion);
	exit;
	//echo "salio 2";
}
/*
echo "inicio: ".$_COOKIE["inicio"];echo "<br>";
echo "sucursal: ".$_COOKIE["id_sucursal"];echo "<br>";
echo "id_session: ".$_COOKIE["id_session"];echo "<br>";
echo "usuario: ".$_COOKIE["usuario"];echo "<br>";
echo "permisos: ".$_COOKIE["permisos"];echo "<br>";
echo "jerarquia: ".$_COOKIE["jerarquia"];echo "<br>";
exit;
*/

$id_session=$_COOKIE["id_session"];

$array_session=verifica_session($id_session, $inicio );

if($array_session=="0"){
	elimina_session($id_session);	
	killcookies();
	header('Location: ../../login/login_nologin.php?nologin=6&ubicacion='.$ubicacion);
	//echo "salio 4";
	exit;
}


if(isset($_COOKIE["inicio"])){
	actualizacookies( $inicio, $finaliza );
	actualiza_session($id_session, $finaliza);
}else{
	header('Location: ../../login/login_nologin.php?nologin=6&ubicacion='.$ubicacion);
	//echo "salio 3";
	exit;
}

$id_session=$array_session["id_session"];
$id_sucursal=$array_session["id_sucursal"];
$session_finaliza=$finaliza;
$id_usuario=$array_session["id_usuario"];
$nombre_usuario=$array_session["nombre_usuario"];
$usuario=$array_session["usuario"];
$jerarquia=$array_session["jerarquia"];
$permisos=$array_session["permisos"];




#-------------------------------------------------------------------------------------------------------------------------
function actualizacookies( $inicio, $finaliza  ){
	$path='/';

	$id_session=$_COOKIE["id_session"];

	setcookie("inicio",$inicio,$finaliza, $path );
	setcookie("id_sucursal",$_COOKIE["id_sucursal"],$finaliza, $path );
	setcookie("id_session",$_COOKIE["id_session"],$finaliza, $path );
	setcookie("id_usuario",$_COOKIE["id_usuario"],$finaliza, $path );
	setcookie("nombre_usuario",$_COOKIE["nombre_usuario"],$finaliza, $path );
	setcookie("usuario",$_COOKIE["usuario"],$finaliza, $path );
	setcookie("permisos",$_COOKIE["permisos"],$finaliza, $path );
	setcookie("jerarquia",$_COOKIE["jerarquia"],$finaliza, $path );

}
#-------------------------------------------------------------------------------------------------------------------------



#-------------------------------------------------------------------------------------------------------------------------
function killcookies(){
	$path='/';

	setcookie("inicio", "", "0", $path );
	setcookie("id_sucursal", "", "0", $path );
	setcookie("id_session", "", "0", $path );
	setcookie("usuario", "", "0", $path );
	setcookie("permisos", "", "0", $path );
	setcookie("jerarquia", "", "0", $path );
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