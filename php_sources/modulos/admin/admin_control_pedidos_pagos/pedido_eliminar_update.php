<?php
include("../../login/login_verifica.inc.php");
include_once("../seguridad.inc.php"); 

include_once("../../includes/connect.php");
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="../css/style.css" type="text/css">
  <meta content="text/html; charset=UTF-8" http-equiv="content-type" />
  <title>Sucursal control administrativo</title>
</head>

<?php
$q='delete from pedidos_control where numero_pedido="'.$_POST["numero_pedido"].'"';
mysql_query($q);
if(!mysql_error()){
    echo "El pedido se elimino correctamente!<br>";
    
}
?>




</center>