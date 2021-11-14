<?php
include("reportes_caja_base.php");
include("connect.php");

if(!$_GET["id_reportes_caja"]){
 	exit;
}
$id_reportes_caja=$_GET["id_reportes_caja"];

$query='select * from reportes_caja where id="'.$id_reportes_caja.'"';
$array_reportes_caja=mysql_fetch_array(mysql_query($query));

<center>
include("reportes_caja_muestra.inc.php");
</center>

?>
