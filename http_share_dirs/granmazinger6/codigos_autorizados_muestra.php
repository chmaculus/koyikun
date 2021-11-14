<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type" />
  <title>Tablabla codigos_autorizados By Christian Máculus</title>
</head>



<?php
#muestra registro ingresado
$query='select * from codigos_autorizados where id="'.$id_codigos_autorizados.'"';
$array_codigos_autorizados=mysql_fetch_array(mysql_query($query));

include(codigos_autorizados"_muestra.inc.php");
?>

