<?php 
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");

$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a Megatron
if($jerarquia!="5"){
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

<table><tr>

<td><A href="clientes_busqueda.php"><button type="button">Buscar</button></a></td>

<td><A href="clientes_ingreso.php"><button type="button">Ingresar</button></a></td>

<td><A href="clientes_listado.php"><button type="button">Listado</button></a></td>
</tr>
</table>
</center>
