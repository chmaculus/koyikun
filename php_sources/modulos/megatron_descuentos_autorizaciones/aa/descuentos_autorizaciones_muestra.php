<?php
include("descuentos_autorizaciones_base.php");
include("connect.php");

if(!$_GET["id_descuentos_autorizaciones"]){
 	exit;
}
$id_descuentos_autorizaciones=$_GET["id_descuentos_autorizaciones"];

$query='select * from descuentos_autorizaciones where id="'.$id_descuentos_autorizaciones.'"';
$array_descuentos_autorizaciones=mysql_fetch_array(mysql_query($query));

<center>
include("descuentos_autorizaciones_muestra.inc.php");
</center>

?>
