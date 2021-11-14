<?php
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");

$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="1"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
}

include_once("cabecera.inc.php");
include_once("../../includes/funciones_varias.php");


$id_sucursal=$_COOKIE["id_sucursal"];
$sucursal=nombre_sucursal($id_sucursal);

?>
<center>
<form method="post" action="asistencias_update.php" name="form_asistencias">
<table class="t1">

<tr>
	<th>Sucursal</th>
	<td><input type="text" name="sucursal" id="sucursal" value="<?php echo $sucursal; ?>" size="10" readonly="readonly">
	<input type="hidden" name="id_sucursal" id="id_sucursal" value="<?php echo $id_sucursal; ?>" size="10" readonly="readonly"></td>
</tr>
<tr>
	<th>Vendedor</th>
	<td><input type="text" name="vendedor" id="vendedor" value="" size="10"></td>
</tr>

</table>
<?php
	echo '<input type="hidden" name="accion" value="ingreso">';
?>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
