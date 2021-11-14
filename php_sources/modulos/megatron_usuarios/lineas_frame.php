<?php

include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");
include_once("seguridad.inc.php");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN"
	"http://www.w3.org/TR/html4/frameset.dtd">
<html>
<head>
<title>jejej</title>
</head>
<frameset cols="50%,50%">
<frame name="izquierda" src="lineas.php?id_usuarios=<?php echo $_GET["id_usuarios"];?>">
<frame name="derecha" src="lineas_graba.php?id_usuarios=<?php echo $_GET["id_usuarios"];?>">
<noframes>

</noframes>
</frameset>
</html>
