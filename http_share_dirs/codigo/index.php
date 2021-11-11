<?php
include_once("cabecera.inc.php");


echo '<br><br><br><titulo>Generador de codigos de autorizacion</titulo><br><br>';

echo '<form action="'.$_SERVER["SCRIPT_NAME"].'" method="post" enctype="multipart/form-data">';
echo '<input type="text" name="codigo" size="10"><br>';
echo '<br><input type="submit" name="ACEPTAR" value="ACEPTAR"><br>';
echo '</form>';

if($_POST["codigo"]){
	echo '<br>el codigo de autorizacion es: <titulo>'.crc32($_POST["codigo"])."</titulo><br>";
	
}else{
	exit;
}

?>
