<?php
$server="localhost";
$user="root";
$passwd="maculuss";


$base="koyikun";
$base2="franquicias";


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
