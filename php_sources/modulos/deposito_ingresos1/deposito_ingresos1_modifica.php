<?php
include("deposito_ingresos1_base.php");

//$fecha=date("Y-n-d");
$fecha=date("d/n/Y");


if($_GET["id_deposito_ingresos1"]){
include('../includes/connect.php');
    $query='select * from deposito_ingresos1 where id="'.$_GET["id_deposito_ingresos1"].'"';
    $array_deposito_ingresos1=mysql_fetch_array(mysql_query($query));
    if(mysql_error()){echo "<br>".mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
}
if($_GET["uuid_deposito_ingresos1"]){
include('../includes/connect.php');
    $query='select * from deposito_ingresos1 where uuid="'.$_GET["uuid_deposito_ingresos1"].'"';
    $array_deposito_ingresos1=mysql_fetch_array(mysql_query($query));
}
?>

<form method="post" action="deposito_ingresos1_update.php" name="form_deposito_ingresos1">

<center>
<table class="t1" border="1">
	<tr>
		<th>proveedor</th>
		<td>
		<?php include("./includes/proveedores.inc.php");?>
		</td>
	</tr>
	<tr>
		<th>bultos</th>
		<td><input type="text" name="bultos" id="bultos" value="<?php if($array_deposito_ingresos1["bultos"]){echo $array_deposito_ingresos1["bultos"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>fecha</th>
		<td><input type="text" name="fecha" id="fecha" value="<?php if($array_deposito_ingresos1["fecha"]){echo $array_deposito_ingresos1["fecha"];}else{echo $fecha;}?>" size="10"></td>
	</tr>
	</tr>

</table>

<?php
/*
<table class="t1" border="1">
	<tr>
		<th>id</th>
		<th>proveedor</th>
		<th>bultos</th>
		<th>fecha</th>
		<th>fecha_sistema</th>
		<th>hora_sistema</th>
	</tr>
*/
/*
	<tr>
		<td><input type="text" name="id" id="id" value="<?php if($array_deposito_ingresos1["id"]){echo $array_deposito_ingresos1["id"];}?>" size="10"></td>
		<td><input type="text" name="proveedor" id="proveedor" value="<?php if($array_deposito_ingresos1["proveedor"]){echo $array_deposito_ingresos1["proveedor"];}?>" size="10"></td>
		<td><input type="text" name="bultos" id="bultos" value="<?php if($array_deposito_ingresos1["bultos"]){echo $array_deposito_ingresos1["bultos"];}?>" size="10"></td>
		<td><input type="text" name="fecha" id="fecha" value="<?php if($array_deposito_ingresos1["fecha"]){echo $array_deposito_ingresos1["fecha"];}?>" size="10"></td>
		<td><input type="text" name="fecha_sistema" id="fecha_sistema" value="<?php if($array_deposito_ingresos1["fecha_sistema"]){echo $array_deposito_ingresos1["fecha_sistema"];}?>" size="10"></td>
		<td><input type="text" name="hora_sistema" id="hora_sistema" value="<?php if($array_deposito_ingresos1["hora_sistema"]){echo $array_deposito_ingresos1["hora_sistema"];}?>" size="10"></td>
	</tr>
*/
?>

</table>

<?php
if($_GET["id_deposito_ingresos1"] OR $array_deposito_ingresos1["id"]){
    echo '<input type="hidden" name="accion" value="modificacion">';
    echo '<input type="hidden" name="id_deposito_ingresos1" value="'.$array_deposito_ingresos1["id"].'">';
    echo '<input type="hidden" name="uuid_deposito_ingresos1" value="'.$array_deposito_ingresos1["uuid"].'">';
}else{
    echo '<input type="hidden" name="accion" value="ingreso">';
}
?>
<br>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
