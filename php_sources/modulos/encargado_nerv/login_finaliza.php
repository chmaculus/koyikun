<?php
include_once("cabecera.inc.php");
include_once("connect.php");
$id_session=$_COOKIE["id_session"];

elimina_session($id_session);
killcookies();


echo "<center>";
echo "<font1>Session Finalizada</font1>";
echo "</center>";


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

?>
