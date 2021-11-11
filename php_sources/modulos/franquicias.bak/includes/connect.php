<?php

define('constbase1', 'koyikun');
define('constbase2', 'franquicias');

$server="localhost";
$user="sistema";
$passwd="sistema";
$base="franquicias";
$base2="koyikun";
$id_connection=mysql_connect($server,$user,$passwd);

if(mysql_error()){
	echo "no se pudo conectar con el Servidor";
}

$db2=mysql_select_db($base,$id_connection);
$db1=mysql_select_db($base,$id_connection);

if(mysql_error()){
	echo "No se pudo Abrir la Base de Datos";
}

?>
