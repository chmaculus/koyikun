<?php
include_once("tarjetas_base.php")
echo "<br>";
include("../include/connect.php");
#muestra registro ingresado
$query='select * from tarjetas where id="'.$id_tarjetas.'"';
$array_tarjetas=mysql_fetch_array(mysql_query($query));

include("tarjetas_muestra.inc.php");
?>

