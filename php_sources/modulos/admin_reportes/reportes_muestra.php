<?php
include("reportes_base.php");
include("../../includes/connect.php");

if(!$_GET["id_reportes"]){
 	exit;
}
$id_reportes=$_GET["id_reportes"];

$query='select * from reportes where id="'.$id_reportes.'"';
$array_reportes=mysql_fetch_array(mysql_query($query));

<center>
include("reportes_muestra.inc.php");
</center>

?>
