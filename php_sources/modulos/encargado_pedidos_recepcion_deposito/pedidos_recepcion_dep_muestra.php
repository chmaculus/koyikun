<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type" />
  <title>Tablabla pedidos_recepcion_d By Christian Máculus</title>
</head>



<?php
#muestra registro ingresado
$query='select * from pedidos_recepcion_d where id="'.$id_pedidos_recepcion_d.'"';
$array_pedidos_recepcion_d=mysql_fetch_array(mysql_query($query));

include(pedidos_recepcion_d"_muestra.inc.php");
?>

