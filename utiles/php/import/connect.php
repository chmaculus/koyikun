<?php
$server="localhost";
$user="root";
$passwd="maculuss";
$base="koyikun";

$id_connection=mysql_connect($server,$user,$passwd);
if(mysql_error()){echo mysql_error();}


mysql_select_db($base,$id_connection);

if(mysql_error()){
	echo "No se pudo Abrir la Base de Datos";
}


?>
