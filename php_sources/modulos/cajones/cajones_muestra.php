<?php
include("cajones_base.php");
include("connect.php");

if(!$_GET["id_cajones"]){
 	exit;
}
$id_cajones=$_GET["id_cajones"];

$query='select * from cajones where id="'.$id_cajones.'"';
$array_cajones=mysql_fetch_array(mysql_query($query));

<center>
include("cajones_muestra.inc.php");
</center>

?>
