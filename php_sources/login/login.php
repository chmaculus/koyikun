<?php
include_once("cabecera.inc.php");
?>

<center>
<form action="login_verifica.php" method="post">
<table class="t1">
<tr>
	<td><font1>Usuario</font1></td>
	<td><input type="text" name="login" size="10"></td>
</tr>

<tr>
	<td><font1>Pass</font1></td>
	<td><input type="password" name="pass" size="10"></td>
</tr>
</table>
<input type="hidden" name="ubicacion" value="<?php if($ubicacion){ echo $ubicacion; }?>">
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>

</body>
</html>
