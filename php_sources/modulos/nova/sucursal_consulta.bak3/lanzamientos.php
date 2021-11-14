<?php
include_once("cabecera.inc.php");
echo "<center>";

if(!$_GET["id"]){
	exit;
}


if(file_exists ( "./lanzamientos/".$_GET["id"].".jpg" )==1){
     echo '<td><img  src="./lanzamientos/'.$_GET["id"].'".jpg" height="600" width="600"></td>';
     // width="150" height="100"
}



?>