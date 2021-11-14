<?php
$server="190.15.205.132";
$user="koyi";
$passwd="koyindami";
$base="gastos";
$id_connection_kaiser=mysql_connect($server,$user,$passwd);

if(mysql_error()){
	echo "no se pudo conectar con el Servidor";
}

mysql_select_db($base,$id_connection_kaiser);

if(mysql_error()){
	echo "No se pudo Abrir la Base de Datos";
}

?>