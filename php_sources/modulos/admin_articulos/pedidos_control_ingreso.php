<?php 
include("../../login/login_verifica.inc.php");
$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="0"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 
include_once("../../includes/connect.php");
include_once("pedidos_control_base.php");

if($_GET["id_pedidos_control"]){
    include_once("connect.php");
    $query='select * from pedidos_control where id="'.$_GET["id_pedidos_control"].'"';
    $array_pedidos_control=mysql_fetch_array(mysql_query($query));
    if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
}

?>
<form method="post" action="pedidos_control_update.php" name="form_pedidos_control">

<center>
<table class="t1" border="1">
	<tr>
		<th>Empresa</th>
		<td><input type="text" name="empresa" id="empresa" value="<?php if($array_pedidos_control["empresa"]){echo $array_pedidos_control["empresa"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>Responsable</th>
		<td><input type="text" name="responsable" id="responsable" value="<?php if($array_pedidos_control["responsable"]){echo $array_pedidos_control["responsable"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>Importe pedido</th>
		<td><input type="text" name="importe_pedido" id="importe_pedido" value="<?php if($array_pedidos_control["importe_pedido"]){echo $array_pedidos_control["importe_pedido"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>Fecha envio</th>
		<td><input type="text" name="fecha_envio" id="fecha_envio" value="<?php if($array_pedidos_control["fecha_envio"]){echo $array_pedidos_control["fecha_envio"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>Receptor</th>
		<td><input type="text" name="rceptor" id="rceptor" value="<?php if($array_pedidos_control["rceptor"]){echo $array_pedidos_control["rceptor"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>Importe recibido A</th>
		<td><input type="text" name="import_recibido_a" id="import_recibido_a" value="<?php if($array_pedidos_control["import_recibido_a"]){echo $array_pedidos_control["import_recibido_a"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>Importe recibido B</th>
		<td><input type="text" name="import_recibido_b" id="import_recibido_b" value="<?php if($array_pedidos_control["import_recibido_b"]){echo $array_pedidos_control["import_recibido_b"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>Fecha recepcion</th>
		<td><input type="text" name="fecha_recepcion" id="fecha_recepcion" value="<?php if($array_pedidos_control["fecha_recepcion"]){echo $array_pedidos_control["fecha_recepcion"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>Numero de correo</th>
		<td><input type="text" name="n_correo" id="n_correo" value="<?php if($array_pedidos_control["n_correo"]){echo $array_pedidos_control["n_correo"];}?>" size="10"></td>
	</tr>

</table>


<?php
if($_GET["id_pedidos_control"] OR $array_pedidos_control["id"]){
    echo '<input type="hidden" name="accion" value="modificacion">';
    echo '<input type="hidden" name="id_pedidos_control" value="'.$array_pedidos_control["id"].'">';
    echo '<input type="hidden" name="uuid_pedidos_control" value="'.$array_pedidos_control["uuid"].'">';
}else{
    echo '<input type="hidden" name="accion" value="ingreso">';
}
?>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
