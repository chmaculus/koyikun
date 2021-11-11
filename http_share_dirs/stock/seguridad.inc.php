<?php
$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 6 coresponde a deposito
if($jerarquia!="1"){
	header('Location: ./includes/login/login_nologin.php?nologin=6');
	exit;
} 
?>
