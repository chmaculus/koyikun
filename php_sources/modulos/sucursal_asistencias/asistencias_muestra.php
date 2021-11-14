<?php
include("asistencias_base.php");
include("../../includes/connect.php");

if(!$_GET["id_asistencias"]){
 	exit;
}
$id_asistencias=$_GET["id_asistencias"];

$query='select * from asistencias where id="'.$id_asistencias.'"';
$array_asistencias=mysql_fetch_array(mysql_query($query));

<center>
include("asistencias_muestra.inc.php");
</center>

?>
