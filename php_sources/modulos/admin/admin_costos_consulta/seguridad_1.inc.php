<?php
$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 1 coresponde a encargado
if($jerarquia!="1"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 
?>
