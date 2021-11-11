<?php 
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");
include_once("../../seguridad_1.inc.php");
include_once("cabecera.inc.php");

include_once("../../includes/funciones_stock.php");

?>
<center>
<?php
	if($_GET["confirma"]==1){
		echo "Se actualizo un articulo<br>";
	}
	if($_GET["confirma"]==0){
		echo "Se cancelo un ingreso<br>";
	}
?>
<form action="stock_ingreso_confirma.php" method="post">

<table>
	<tr>
		<th>Cantidad</th>
		<th>Codigo de Barras</th>
	</tr>
	<tr>
		<td><input type="text" name="cantidad" size="5" value="<?php if($_POST["cantidad"]){echo $_POST["cantidad"];}else{echo "0";}?>"></td>
		<td><input type="text" name="barras" size="15" value="<?php if($_POST["barras"]){echo $_POST["barras"];}else{echo "4015600021498";}?>"></td>
	</tr>
</table>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>

