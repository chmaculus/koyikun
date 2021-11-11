<?php
include("usuarios_base.php");
include("connect.php");

if(!$_GET["id_usuarios"]){
 	exit;
}
$id_usuarios=$_GET["id_usuarios"];

$query='select * from usuarios where id="'.$id_usuarios.'"';
$array_usuarios=mysql_fetch_array(mysql_query($query));

<center>
include("usuarios_muestra.inc.php");
</center>

?>
