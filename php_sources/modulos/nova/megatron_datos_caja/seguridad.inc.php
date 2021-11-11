<?php

$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 5 coresponde a megatron
if($jerarquia!="5"){
        header('Location: ../../login/login_nologin.php?nologin=6');
        exit;
}
?>
