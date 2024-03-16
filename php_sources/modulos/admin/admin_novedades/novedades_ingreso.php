<?php
include_once("connect.php");
include_once("../../includes/funciones_varias.php");

include_once("novedades_base.php");
if($_GET["id_novedades"]){
	$query='select * from novedades where id="'.$_GET["id_novedades"].'"';
	$array_novedades=mysql_fetch_array(mysql_query($query));
}
$fecha=date("d/n/Y");
?>
<center>
<form method="post" action="novedades_update.php" name="form_novedades">
<table class="t1">

<tr>
	<th>Sucursal</th>
	<td>
	<?php
		$id_sucursal=$array_novedades["id_sucursal"];
		include("sucursales.inc.php");
	?>
	</td>
</tr>
<tr>
	<th>Motivo</th>
	<td><input type="text" name="motivo" id="motivo" size="20" maxlenght="20" class="navegar" value="<?php if($array_novedades["motivo"]){ echo $array_novedades["motivo"]; } ?>"></td>
</tr>
<tr>
	<th>texto</th>
	<td><textarea name="texto" id="texto" rows="3" cols="30"><?php if($array_novedades["texto"]){ echo $array_novedades["texto"]; } ?></textarea></td>
</tr>
<tr>
	<th>Inicio vigencia</th>
	<td>
	<input type="text" name="fecha_desde" id="fecha_desde" value="<?php if($array_novedades["vigencia_inicio"]){ echo fecha_conv("-",$array_novedades["vigencia_inicio"]); }else{ echo $fecha; } ?>" />
	</td>
</tr>
<tr>
	<th>Finaliza vigencia</th>
	<td>
	<input type="text" name="fecha_hasta" id="fecha_hasta" value="<?php if($array_novedades["vigencia_finaliza"]){ echo fecha_conv("-",$array_novedades["vigencia_finaliza"]); }else{ echo $fecha; } ?>" />
	</td>
</tr>
</tr>

</table>
<?php
if($_GET["id_novedades"] OR $array_novedades["id"]){
	echo '<input type="hidden" name="accion" value="modificacion">';
	echo '<input type="hidden" name="id_novedades" value="'.$array_novedades["id"].'">';
}else{
	echo '<input type="hidden" name="accion" value="ingreso">';
}
?>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
