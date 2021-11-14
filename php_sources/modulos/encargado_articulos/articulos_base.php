<?php
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");

include_once("seguridad.inc.php");

include_once("cabecera.inc.php");
?>
<center>
<titulo>Articulos</titulo>

<table><tr>

<form action="articulos_busqueda.php" method="post">
<td><input type="submit" name="Buscar" value="Buscar"></td>
</form>

<form action="articulos_ingreso.php" method="post">
<td><input type="submit" name="Ingresar" value="Ingresar"></td>
</form>

</tr>
</table>
</center>
</html>
