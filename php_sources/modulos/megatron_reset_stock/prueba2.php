<?php

include_once("../../includes/connect.php");

include("../../login/login_verifica.inc.php");
$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="0"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 

?>


<link rel="StyleSheet" href="estructura/css/main.css" media="screen" type="text/css">

</head><body>
<div id="Superior">
	<iframe name="FrameArriba" class="FrameArriba" src="prueba1.php"></iframe>
</div>
<div id="Izquierda" src="panel_left.php">
	<iframe name="FrameCentralLeft" class="FrameCentralLeft" src=""></iframe>
</div>
<!-- 
<div id="Derecha">
	<iframe name="FrameCentralRight" class="FrameCentralRight" src=""></iframe>
</div>
 -->


</body></html>