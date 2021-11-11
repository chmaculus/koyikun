<?php

#jrarquia 0 coresponde a administrador
$jerarquia=$_COOKIE["jerarquia"];
if($jerarquia!="8"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 

?>