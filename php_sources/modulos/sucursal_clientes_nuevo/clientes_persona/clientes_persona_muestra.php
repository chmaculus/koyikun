<?php
include("clientes_persona_base.php");
include("connect.php");

if(!$_GET["id_clientes_persona"]){
 	exit;
}
$id_clientes_persona=$_GET["id_clientes_persona"];

$query='select * from clientes_persona where id="'.$id_clientes_persona.'"';
$array_clientes_persona=mysql_fetch_array(mysql_query($query));

<center>
include("clientes_persona_muestra.inc.php");
</center>

?>
