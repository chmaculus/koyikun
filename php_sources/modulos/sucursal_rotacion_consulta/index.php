<?php
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");
include_once("seguridad_1.inc.php");

include_once("cabecera.inc.php");
include_once("../../includes/funciones_varias.php");
$id_sucursal=$_COOKIE["id_sucursal"];
?>

<body onLoad=document.aa.busqueda.focus()>
<center>

<titulo>MODIFICACION DE STOCK X CODIGO BARRA / ID</titulo><br>
<font1><?php echo "Sucursal: ".nombre_sucursal($id_sucursal);?></font1><br>
<form name="aa" action="articulos_resultados.php" method="post">

<input type="text" name="busqueda" <?php if($_POST["busqueda"]){echo $_POST["busqueda"];} ?>/>
<input type="submit" name="ACEPTAR" value="ACEPTAR" />
</form>


