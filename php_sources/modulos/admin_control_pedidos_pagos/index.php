<?php
include_once("cabecera.inc.php");
?>
<center>
<titulo>Control pedidos</titulo>

<table><tr>

<form action="pedidos_control_listado.php" method="post">
<td><input type="submit" name="Listado" value="Listado"></td>
</form>

<form action="pedidos_control_ingreso.php" method="post">
<td><input type="submit" name="Ingresar" value="Ingresar"></td>
</form>

</tr>
</table>
</center>
</html>
