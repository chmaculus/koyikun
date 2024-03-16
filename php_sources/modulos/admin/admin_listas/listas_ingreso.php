<?php
include("listas_base.php");
if($_GET["id_listas"]){
	include("../../includes/connect.php");
	$query='select * from listas where id="'.$_GET["id_listas"].'"';
	$array_listas=mysql_fetch_array(mysql_query($query));
}
?>
<center>
<form method="post" action="listas_update.php">
<table border="1" class="t1">

<tr>
	<th>Lista</th>
	<td><input type="text" name="nombre" value="<?php if($array_listas["nombre"]){ echo $array_listas["nombre"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>Porcentaje</th>
	<td><input type="text" name="porcentaje" value="<?php if($array_listas["porcentaje"]){ echo $array_listas["porcentaje"]; } ?>" size="10"></td>
</tr>

</table>
<?php
if($_GET["id_listas"]){
	echo '<input type="hidden" name="accion" value="modificacion">';
	echo '<input type="hidden" name="id_listas" value="'.$array_listas["id"].'">';
}else{
	echo '<input type="hidden" name="accion" value="ingreso">';
}
?>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
