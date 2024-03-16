<?php
include("../../login/login_verifica.inc.php");
include_once("../seguridad.inc.php"); 

include_once("../../includes/connect.php");
include_once("pedidos_control_base.php");
echo "<br>";


$fecha=date("Y-n-d");
$hora=date("H:i:s");

$q='update pedidos_control set fecha_envio="'.$fecha.'", 
																hora_envio="'.$hora.'",
																responsable_envio="'.$_POST["responsable"].'"
																where id="'.$_POST["id_pedido_control"].'"
																
';

echo "q: ".$q;

mysql_query($q);


?>


</center>
