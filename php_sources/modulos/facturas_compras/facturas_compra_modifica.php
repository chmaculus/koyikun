<?php
include("facturas_compra_base.php");



if($_GET["id_facturas_compra"]){
    include_once("../includes/connect.php");
    $query='select * from facturas_compra where id="'.$_GET["id_facturas_compra"].'"';
    $array_facturas_compra=mysql_fetch_array(mysql_query($query));
    if(mysql_error()){echo "<br>".mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
}
if($_GET["uuid_facturas_compra"]){
    include_once("connect.php");
    $query='select * from facturas_compra where uuid="'.$_GET["uuid_facturas_compra"].'"';
    $array_facturas_compra=mysql_fetch_array(mysql_query($query));
}
?>

<form method="post" action="facturas_compra_update.php" name="form_facturas_compra">
<center>
<table class="t1" border="1">
	<tr>
		<th>fecha factura</th>
		<td><input type="text" name="fecha_factura" id="fecha_factura" value="<?php if($array_facturas_compra["fecha_factura"]){echo $array_facturas_compra["fecha_factura"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>proveedor</th>
		<td>
		<?php include_once("../includes/proveedores.inc.php");?>
		</td>
	</tr>
	<tr>
		<th>numero factura</th>
		<td><input type="text" name="numero_factura" id="numero_factura" value="<?php if($array_facturas_compra["numero_factura"]){echo $array_facturas_compra["numero_factura"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>importe</th>
		<td><input type="text" name="importe" id="importe" value="<?php if($array_facturas_compra["importe"]){echo $array_facturas_compra["importe"];}?>" size="10"></td>
	</tr>

</table>

<?php
if($_GET["id_facturas_compra"] OR $array_facturas_compra["id"]){
    echo '<input type="hidden" name="accion" value="modificacion">';
    echo '<input type="hidden" name="id_facturas_compra" value="'.$array_facturas_compra["id"].'">';
    echo '<input type="hidden" name="uuid_facturas_compra" value="'.$array_facturas_compra["uuid"].'">';
}else{
    echo '<input type="hidden" name="accion" value="ingreso">';
}
?>
<br>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
