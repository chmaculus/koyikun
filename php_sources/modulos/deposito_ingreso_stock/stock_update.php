<?php 
include_once("../../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");
include_once("seguridad.inc.php");

include_once("cabecera.inc.php");
//include_once("../includes/funciones.php");

//$id_sucursal=$_COOKIE["id_sucursal"];

#fundamental agregar encargados correspondintes a sucursal

if($_POST["confirma"]=="ACEPTAR"){
	$query=base64_decode($_POST["query"]);
	//echo $query."<br>";
	mysql_query($query)or die(mysql_error());
	header('location: stock_ingreso.php?confirma=1');
}

if($_POST["confirma"]=="CANCELAR"){
	header('location: stock_ingreso.php?confirma=0');
}




?>
</center>

</body>
</html>