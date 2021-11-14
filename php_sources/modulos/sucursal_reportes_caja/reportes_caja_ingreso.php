<?php
include_once("../../includes/connect.php");


$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="2"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
}

include_once("cabecera.inc.php");


$fecha=date("d/n/Y");
$hora=date("H:i:s");
?>
<center>
<titulo>Reportes</titulo><BR>
<?php
if($_GET["faltan"]){
	echo '<alerta1>Debe completar todos los campos '.$_GET["faltan"].'</alerta1><BR>';
}


?>
<form method="post" action="reportes_caja_update.php" name="form_reportes_caja">
<table class="t1">

<tr>
	<th>Motivo</th>
	<td>
	<select id="motivo" name="motivo" size="0">
		<option value="">Seleccione</option>
		<option value="G">Gasto</option>
		<option value="ZM">Zeta mañana</option>
		<option value="ZT">Zeta tarde</option>
		<option value="B">Buzon</option>
		<option value="T">Tarjeta</option>
	</select>
	
	</td>
</tr>
<tr>
	<th>Importe</th>
	<td><input type="text" name="importe" id="importe" value="" size="10"></td>
</tr>
<tr>
	<th>Vendedor</th>
	<td><input type="text" name="vendedor" id="vendedor" value="" size="10"></td>
</tr>
<tr>
	<th>fecha</th>
	<td><input type="text" name="fecha" id="fecha" value="<?php echo $fecha ?>" size="10" readonly="readonly"></td>
</tr>
<tr>
	<th>hora</th>
	<td><input type="text" name="hora" id="hora" value="<?php echo $hora ?>" size="10" readonly="readonly"></td>
</tr>

</table>

<?php
if($_GET["id_reportes_caja"] OR $array_reportes_caja["id"]){
	echo '<input type="hidden" name="accion" value="modificacion">';
	echo '<input type="hidden" name="id_reportes_caja" value="'.$array_reportes_caja["id"].'">';
}else{
	echo '<input type="hidden" name="accion" value="ingreso">';
}
?>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>

<br>
Por favor antes de ACEPTAR verifique que los datos esten correctos.<br>
En el importe ingrese solo datos numericos.<br>


</center>
