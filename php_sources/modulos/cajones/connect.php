<?php
$server="localhost";
$user="root";
$passwd="sulucam";
$base="koyikun";

$id_connection=mysql_connect($server,$user,$passwd) or die ("no se pudo conectar con el Servidor");
mysql_select_db($base) or die ("No se pudo Abrir la Base de Datos");

?>
