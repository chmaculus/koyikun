<?php

include_once("cabecera.inc.php");
include_once("../includes/connect.php");

$id_session=$_COOKIE["id_session"];

killcookies();
elimina_session($id_session,time()-1);


echo "<center>";
echo "<font1>Session Finalizada</font1>";
echo "</center>";


#-------------------------------------------------------------------------------------------------------------------------
function killcookies(){
	setcookie("inicio", "", "0", "/");
	setcookie("id_sucursal", "", "0", "/");
	setcookie("id_session", "", "0", "/");
	setcookie("usuario", "", "0", "/");
	setcookie("permisos", "", "0", "/");
	setcookie("jerarquia", "", "0", "/");
}
#-------------------------------------------------------------------------------------------------------------------------



#-------------------------------------------------------------------------------------------------------------------------
function elimina_session($id_session, $time){
//	$query='delete from sessiones_activas where id_session="'.$id_session.'"';
	$query='update sessiones_activas set finaliza="'.$time.'" where id_session="'.$id_session.'"';
	mysql_query($query);
	if(mysql_error()){echo mysql_error();}
}
#-------------------------------------------------------------------------------------------------------------------------

?>
