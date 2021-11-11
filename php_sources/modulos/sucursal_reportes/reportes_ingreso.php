<?php
include_once("cabecera.inc.php");

if($_GET["id_reportes"]){
	include_once("connect.php");
	$query='select * from reportes where id="'.$_GET["id_reportes"].'"';
	$array_reportes=mysql_fetch_array(mysql_query($query));
}
?>
<center>
<titulo>Reporte</titulo><br>
<form method="post" action="reportes_update.php" name="form_reportes">
<table class="t1">

<tr>
	<th>Motivo</th>
	<td><input type="text" name="motivo" id="motivo" size="40" maxlenght="40" value="<?php if($array_reportes["motivo"]){ echo $array_reportes["motivo"]; } ?>"></td>
</tr>
<tr>
	<th>Detalle</th>
	<td><textarea name="texto" id="texto" rows="5" cols="50"><?php if($array_reportes["texto"]){ echo $array_reportes["texto"]; } ?></textarea></td>
</tr>
</table>
<input type="hidden" name="id_sucursal" value="<?php echo $id_sucursal; ?>">
<?php
if($_GET["id_reportes"] OR $array_reportes["id"]){
	echo '<input type="hidden" name="accion" value="modificacion">';
	echo '<input type="hidden" name="id_reportes" value="'.$array_reportes["id"].'">';
}else{
	echo '<input type="hidden" name="accion" value="ingreso">';
}
?>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
