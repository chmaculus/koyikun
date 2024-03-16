<?php
include_once("../../includes/connect.php");

include("../../login/login_verifica.inc.php");
$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="0"){
	echo "No tiene Permiso para acceder<br>";
	exit;
} 
?>


<iframe src="costos_frame_query.php" name="FrameArriba2" title="principal" width="100%" height="25%" frameborder=1 scrolling="auto" style="margin-left: 0px; margin-right: 0px; margin-top: 0px; margin-bottom: 0px;"></iframe>

<iframe src="notas.php" name="FrameMedio2" title="principal" width="100%" height="25%" frameborder=1 scrolling="auto" style="margin-left: 0px; margin-right: 0px; margin-top: 0px; margin-bottom: 0px;"></iframe>

<iframe src="" name="FrameCuerpo2" title="principal" width="100%" height="50%" frameborder=1 scrolling="auto" style="margin-left: 0px; margin-right: 0px; margin-top: 0px; margin-bottom: 0px;"></iframe>
