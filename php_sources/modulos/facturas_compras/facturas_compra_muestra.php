<?php
include_once("facturas_compra_base.php");



echo "<br><br>";
$query='select * from facturas_compra where id="'.$id_facturas_compra.'"';
$array_facturas_compra=mysql_fetch_array(mysql_query($query));

include("facturas_compra_muestra.inc.php");
?>

