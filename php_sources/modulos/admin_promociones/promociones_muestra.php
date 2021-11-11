<?php
include("promociones_base.php");
include("../../includes/connect.php");

if(!$_GET["id_promociones"]){
 	exit;
}
$id_promociones=$_GET["id_promociones"];

$query='select * from promociones where id="'.$id_promociones.'"';
$array_promociones=mysql_fetch_array(mysql_query($query));

<center>
include("promociones_muestra.inc.php");
</center>

?>
