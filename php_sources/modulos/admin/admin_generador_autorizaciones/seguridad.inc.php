<?php
$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 1 coresponde a encargado de sucursal
if($jerarquia!="0"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 
?>
