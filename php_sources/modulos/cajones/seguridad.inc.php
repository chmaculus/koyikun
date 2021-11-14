<?php
$jerarquia=$_COOKIE["jerarquia"];
$id_session=$_COOKIE["id_session"];
$id_sucursal=$_COOKIE["id_sucursal"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="1"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
}
?>