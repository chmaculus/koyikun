<?php

include_once("cabecera.inc.php");

$nologin=$_GET["nologin"];

if($_GET["ubicacion"]){
	$ubicacion=$_GET["ubicacion"];
}


if($nologin=="1"){
	echo '<font1>El usuario y contrasena ingresados no coinciden</font1>';
}

if($nologin=="2"){
	echo '<font1>EL usuario y contrasena ingresados son correctos pero no estan activados</font1>';
}

if($nologin=="3"){
	echo '<font1>EL usuario ingresado no existe</font1>';
}

if($nologin=="4"){
	echo '<font1>Necesita autenticarse</font1>';
}

if($nologin=="5"){
	echo '<font1>Debe completar los campos usuario y contrasena</font1>';
}

if($nologin=="6"){
	echo '<font1>No ha iniciciado sesion o la sesion ha caducado</font1>';
}

if($nologin=="7"){
	echo '<font1>Login OK</font1>';
}

if($nologin=="8"){
	echo '<font1>No tiene permisos para acceder a este sitio</font1>';
}

if($nologin!="7"){
	include("login.php");
}

?>
</center>

</body>
</html>

