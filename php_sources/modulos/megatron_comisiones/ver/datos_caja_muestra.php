<?php
include("datos_caja_base.php");
include("connect.php");

if(!$_GET["id_datos_caja"]){
 	exit;
}
$id_datos_caja=$_GET["id_datos_caja"];

$query='select * from datos_caja where id="'.$id_datos_caja.'"';
$array_datos_caja=mysql_fetch_array(mysql_query($query));

<center>
include("datos_caja_muestra.inc.php");
</center>

?>
