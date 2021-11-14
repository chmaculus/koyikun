<?php
include_once("../includes/connect.php");
include("cabecera.inc.php");
echo "<center>";

$q='update ventas set tiquet="'.$_POST["tiquet"].'" where numero_venta="'.$_POST["numero_venta"].'" and sucursal="'.$_POST["sucursal"].'"';
mysql_query($q);

if(!mysql_error()){
	echo "Se actualizo correctamente<br>";
}

echo $q;


?>

