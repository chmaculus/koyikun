<?php
$server="localhost";
$user="sistema";
$passwd="sistema";
$base="koyikun";
$base2="franquicias";
$id_connection=mysql_connect($server,$user,$passwd);

if(mysql_error()){
	echo "no se pudo conectar con el Servidor";
}

mysql_select_db($base,$id_connection);

if(mysql_error()){
	echo "No se pudo Abrir la Base de Datos";
}


$link1=mysqli_connect($server,$user,$passwd,$base);
if (!$link1) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL."<br>";
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL."<br>";
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL."<br>";
}



$link2=mysqli_connect($server,$user,$passwd,$base2);
if (!$link2) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL."<br>";
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL."<br>";
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL."<br>";
}


?>
