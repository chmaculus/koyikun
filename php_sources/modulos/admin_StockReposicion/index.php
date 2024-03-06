<?php include_once("../../login/login_verifica.inc.php");

$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="0"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
  <meta content="text/html; charset=UTF-8" http-equiv="content-type" />
  <title>Koyi Kun control administrativo</title>
</head>
<body>
<center>


<titulo>Stock</titulo>
<table><tr>

<form action="stock_reposicion.php" method="post">
    <td><input type="submit" name="Reposicion" value="Reposicion"></td>
</form>

<form action="stock_listado.php" method="post">
    <td><input type="submit" name="Listado" value="Listado"></td>
</form>

</tr></table>

