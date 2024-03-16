<?php
include("clientes_base.php");
include("../includes/connect.php");

include("clientes_muestra.inc.php");
 if(!$id_clientes){
 	exit;
 }
$query='select * from clientes where id="'.$id_clientes.'"';
$array_clientes=mysql_fetch_array(mysql_query($query));
?>
