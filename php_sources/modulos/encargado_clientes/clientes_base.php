<?php 
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");

$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a Megatron
if($jerarquia!="1"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
  <meta content="text/html; charset=UTF-8" http-equiv="content-type" />
  <title>Clientes</title>
</head>
<center>
<titulo>Clientes</titulo>

<br> <br> 
<br> <br> 
<table><tr>
<td><A class="myButton" href="clientes_busqueda.php">BUSCAR</a></td>

<td><A class="myButton" href="clientes_ingreso.php">INGRESAR</a></td>

<td><A class="myButton" href="clientes_listado.php">LISTADO</a></td>
</tr>
</table>

<br><br>
</center>
