<?php 
include("../../login/login_verifica.inc.php");
$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="1"){
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

$fecha=date("Y-n-d");
?>
<form method="post" action="pedidos_control_update.php" name="form_pedidos_control">

<center>
<table class="t1" border="1">

<?php
	echo '<tr>';
		echo '<th>id</th>';
		echo '<td>'.$array_pedidos_control["id"].'</td>';
	echo '</tr>';

	echo '<tr>';
		echo '<th>numero_pedido</th>';
		echo '<td>'.$array_pedidos_control["numero_pedido"].'</td>';
	echo '</tr>';

	echo '<tr>';
		echo '<th>empresa</th>';
		echo '<td>'.$array_pedidos_control["empresa"].'</td>';
	echo '</tr>';

	echo '<tr>';
		echo '<th>responsable_pedido</th>';
		echo '<td>'.$array_pedidos_control["responsable_pedido"].'</td>';
	echo '</tr>';

	echo '<tr>';
		echo '<th>responsable_envio</th>';
		echo '<td>'.$array_pedidos_control["responsable_envio"].'</td>';
	echo '</tr>';
?>

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
		<td><input type="text" name="fecha_recepcion" id="fecha_recepcion" value="<?php echo $fecha; ?>" size="10"></td>
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
