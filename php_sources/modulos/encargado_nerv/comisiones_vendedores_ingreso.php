<?php
include_once("index.php");
include_once("cabecera.inc.php");
include_once("connect.php");
include_once("funciones.php");

include_once("datos_caja_listado.inc.php");

#--------------------------------------------------------------------------------
$query='select * from comisiones_vendedores where id_session="'.$id_session.'" order by vendedor';

$result=mysql_query($query)or die(mysql_error());
$rows=mysql_num_rows($result);

if($rows>0){
	include_once("comisiones_vendedores_listado.inc.php");
}
#--------------------------------------------------------------------------------

$fecha=date("d/n/Y");
$turno=$array_comisiones_vendedores["turno"];

?>
<center>
<form method="post" action="comisiones_vendedores_update.php">
<table border="1" class="t1">

<tr>
	<th>Fecha</th>
	<td><?php echo fecha_conv("-", $array_datos_caja["fecha"]); ?></td>
</tr>
<tr>
	<th>Turno</th>
	<td><?php echo $array_datos_caja["turno"]; ?></td>
</tr>
<tr>
	<th>Vendedor</th>
	<td><input type="text" name="vendedor" value="<?php if($array_comisiones_vendedores["vendedor"]){ echo $array_comisiones_vendedores["vendedor"]; } ?>" size="5"></td>
</tr>
<tr>
	<th>Linea</th>
	<td><?php include("linea.inc.php"); ?></td>
</tr>
<tr>
	<th>T.Linea</th>
	<td><input type="text" name="total" value="<?php if($array_comisiones_vendedores["total"]){ echo $array_comisiones_vendedores["total"]; }else{ echo "0.00"; }  ?>" size="6"></td>
</tr>

</table>
<?php

if($_GET["id_comisiones_vendedores"]){
	echo '<input type="hidden" name="accion" value="modificacion">';
	echo '<input type="hidden" name="id_comisiones_vendedores" value="'.$array_comisiones_vendedores["id"].'">';
}else{
	echo '<input type="hidden" name="accion" value="ingreso">';
}

echo '<input type="hidden" name="id_session" value="'.$id_session.'">';
echo '<input type="hidden" name="id_datos_caja" value="'.$array_datos_caja["id"].'">';
echo '<input type="hidden" name="fecha_ingresada" value="'.$array_datos_caja["fecha"].'">';
echo '<input type="hidden" name="turno" value="'.$array_datos_caja["turno"].'">';


?>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
