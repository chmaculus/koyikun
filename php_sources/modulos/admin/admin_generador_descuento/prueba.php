<?php

$codigo=date("mdHis");
$codigo="012".$codigo;
#$codigo="9876543210123";

//Creamos la base de la imagen donde colocaremos luego las otras dos
$baseimagen = ImageCreateTrueColor(1280,1175);

//Le damos un color a la base, en este caso se utiliza el negro
$black = ImageColorAllocate($baseimagen, 0, 0, 0);

//Cargamos la primera imagen(cabecera)
$logo = ImageCreateFromJpeg("./imagen1.jpg");

//Unimos la primera imagen con la imagen base
imagecopymerge($baseimagen, $logo, 0, 0, 0, 0, 1280, 1175, 100);

//Cargamos la segunda imagen(cuerpo)
#./431439961725759846903039362761215744/modulos/codigo_barra/index.php?encode=EAN-13&bdata=9876543210123&height=25&scale=2&bgcolor=%23FFFFEC&color=%23333366&type=jpg
$ts_viewer = ImageCreateFromJpeg("http://190.15.204.116/431439961725759846903039362761215744/modulos/codigo_barra/index.php?encode=EAN-13&bdata=".$codigo."&height=45&scale=3&bgcolor=%23FFFFEC&color=%23333366&type=jpg");

//Juntamos la segunda imagen con la imagen base
imagecopymerge($baseimagen, $ts_viewer, 800, 800, 0, 0, 350, 120, 100);

#Paul_6x12_BE.gdf

imagettftext($baseimagen, 30, 0, 820, 955, 0, "./ttf/arial.ttf", $codigo);

#array imagettftext ( resource $image , float $size , float $angle , int $x , int $y , int $color , string $fontfile , string $text )

#$fuente = imageloadfont('./Paul_6x12_BE.gdf');

#imagestring($baseimagen,$fuente,850,920,$codigo,0);  


//Mostramos la imagen en el navegador
header("Content-Type: image/png");
ImagePng($baseimagen);

//Limpiamos la memoria utilizada con las imagenes
ImageDestroy($logo);
ImageDestroy($ts_viewer);
ImageDestroy($baseimagen);
?>
