<?php
include_once("deposito_ingresos1_base.php");
include('../includes/connect.php');



echo "<br><br>";
$query='select * from deposito_ingresos1 where id="'.$id_deposito_ingresos1.'"';
$array_deposito_ingresos1=mysql_fetch_array(mysql_query($query));

include("deposito_ingresos1_muestra.inc.php");
?>

