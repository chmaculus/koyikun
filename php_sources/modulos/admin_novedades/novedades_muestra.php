<?php
include("novedades_base.php");
include("connect.php");

if(!$_GET["id_novedades"]){
 	exit;
}
$id_novedades=$_GET["id_novedades"];

$query='select * from novedades where id="'.$id_novedades.'"';
$array_novedades=mysql_fetch_array(mysql_query($query));

<center>
include("novedades_muestra.inc.php");
</center>

?>
