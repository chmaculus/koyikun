<?php
$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="1"){
	header('Location: ../login/login_nologin.php?nologin=6');
	exit;
}
?>