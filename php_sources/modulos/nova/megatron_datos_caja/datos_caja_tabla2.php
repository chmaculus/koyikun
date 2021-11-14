<?php 
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");
include("seguridad.inc.php");

include("cabecera.inc.php");
include("../../includes/funciones_varias.php");


?>
<center>
<form action="datos_caja_excel2.php" method="post">
<?php include("fecha_desde_hasta.inc.php"); ?>
<input type="submit" name="ACEPTAR" value="ACEPTAR" />
</form>

<?php
if(!$_POST["fecha_desde"] OR !$_POST["fecha_hasta"]){
//	echo "salio aca!";
	exit;
}


?>
