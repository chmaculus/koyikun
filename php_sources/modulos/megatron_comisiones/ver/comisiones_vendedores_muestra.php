<?php
include("comisiones_vendedores_base.php");
include("connect.php");

if(!$_GET["id_comisiones_vendedores"]){
 	exit;
}
$id_comisiones_vendedores=$_GET["id_comisiones_vendedores"];

$query='select * from comisiones_vendedores where id="'.$id_comisiones_vendedores.'"';
$array_comisiones_vendedores=mysql_fetch_array(mysql_query($query));

<center>
include("comisiones_vendedores_muestra.inc.php");
</center>

?>
