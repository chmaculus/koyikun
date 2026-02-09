<?php
include_once("viajante_visitas_base.php");



echo "<br><br>";
$query='select * from viajante_visitas where id="'.$id_viajante_visitas.'"';
$array_viajante_visitas=mysql_fetch_array(mysql_query($query));

include("viajante_visitas_muestra.inc.php");
?>

