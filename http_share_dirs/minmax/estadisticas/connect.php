<?php
$server="localhost";
$user="root";
$passwd="sulucam";
$base="koyikun";
$id_connection=mysql_connect($server,$user,$passwd);

if(mysql_error()){
	echo "no se pudo conectar con el Servidor";
}

mysql_select_db($base);

if(mysql_error()){
	echo "No se pudo Abrir la Base de Datos";
}

?>