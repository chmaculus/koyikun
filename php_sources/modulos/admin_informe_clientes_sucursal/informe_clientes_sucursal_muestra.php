<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
  <meta content="text/html; charset=UTF-8" http-equiv="content-type" />
  <title>Tablabla informe_clientes_sucursal By Christian Máculus</title>
</head>



<?php
#muestra registro ingresado
$query='select * from informe_clientes_sucursal where id="'.$id_informe_clientes_sucursal.'"';
$array_informe_clientes_sucursal=mysql_fetch_array(mysql_query($query));

include(informe_clientes_sucursal"_muestra.inc.php");
?>

