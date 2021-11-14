<?php
$file="frame_articulos.php";
$nombre_archivo = $file ;
$gestor = fopen($nombre_archivo, "r");
$contenido = fread($gestor, filesize($nombre_archivo));
fclose($gestor);

$contenido=str_replace( chr(13), "" , $contenido );

$gestor = fopen($nombre_archivo, "w");

if (fwrite($gestor, $contenido) == FALSE) {
   echo "No se puede escribir al archivo ($nombre_archivo)";
   exit;
}
fclose($gestor);

?>