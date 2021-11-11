<?php
include("cajones_contenido_base.php");
include("connect.php");

if(!$_GET["id_cajones_contenido"]){
 	exit;
}
$id_cajones_contenido=$_GET["id_cajones_contenido"];

$query='select * from cajones_contenido where id="'.$id_cajones_contenido.'"';
$array_cajones_contenido=mysql_fetch_array(mysql_query($query));

<center>
include("cajones_contenido_muestra.inc.php");
</center>

?>
