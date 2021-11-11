<?php

include_once("../../includes/connect.php");
include_once("../../includes/funciones_varias.php");
include_once("../../login/login_verifica.inc.php");
include_once("cabecera.inc.php");

#jrarquia 0 coresponde a administrador
if($jerarquia!="1"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 
?>


<form method="post" action="pedidos_proveedor_envio_update.php" name="form_pedidos_proveedor_envio">

<center>

<font1>Numero de pedido <?php echo $_GET["numero_pedido"]?></font1><br>
<font1><?php echo $_GET["sucursal"]?></font1><br>

<table class="t1" border="1">
	<tr>
		<th>Operador</th>
		<td><input type="text" name="operado" id="operado" value="" size="10"></td>
		<input type="hidden" name="numero_pedido" id="numero_pedido" value="<?php echo $_GET["numero_pedido"]?>" size="10">
	</tr>
</table>
<input type="hidden" name="accion" value="ingreso" />
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>