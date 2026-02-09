<?php
include_once("viajante_clientes_base.php");



echo "<br><br>";
$query='select * from viajante_clientes where id="'.$id_viajante_clientes.'"';
$array_viajante_clientes=mysql_fetch_array(mysql_query($query));

include("viajante_clientes_muestra.inc.php");
?>

