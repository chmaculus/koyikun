<?php
include("clientes_base.php");
include("connect.php");

if(!$_GET["id_clientes"]){
 	exit;
}
$id_clientes=$_GET["id_clientes"];

$query='select * from clientes where id="'.$id_clientes.'"';
$array_clientes=mysql_fetch_array(mysql_query($query));

<center>
include("clientes_muestra.inc.php");
</center>

?>
