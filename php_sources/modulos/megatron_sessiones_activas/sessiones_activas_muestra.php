<?php
include("sessiones_activas_base.php");
include("connect.php");

if(!$_GET["id_sessiones_activas"]){
 	exit;
}
$id_sessiones_activas=$_GET["id_sessiones_activas"];

$query='select * from sessiones_activas where id="'.$id_sessiones_activas.'"';
$array_sessiones_activas=mysql_fetch_array(mysql_query($query));

<center>
include("sessiones_activas_muestra.inc.php");
</center>

?>
