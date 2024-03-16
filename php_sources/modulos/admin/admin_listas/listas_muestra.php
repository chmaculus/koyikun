<?php
include("listas_base.php");
include_once("../../includes/connect.php");

include("listas_muestra.inc.php");
 if(!$id_listas){
 	exit;
 }
$query='select * from listas where id="'.$id_listas.'"';
$array_listas=mysql_fetch_array(mysql_query($query));
?>
