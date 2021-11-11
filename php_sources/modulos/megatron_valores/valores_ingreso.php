<?php
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");
include_once("../../includes/cabecera_utf-8.inc.php");

if($_GET["id_valores"]){
	
	$query='select * from valores where id="'.$_GET["id_valores"].'"';
	$array_valores=mysql_fetch_array(mysql_query($query));
}else{
	exit;
}
?>
<center>
<form method="post" action="valores_update.php" name="form_valores">
<table class="t1">

<tr>
	<th>id</th>
	<td><?php if($array_valores["id"]){ echo $array_valores["id"]; } ?></td>
</tr>
<tr>
	<th>descripcion</th>
	<td><?php if($array_valores["descripcion"]){ echo $array_valores["descripcion"]; } ?></td>
</tr>
<tr>
	<th>valor</th>
	<td><input type="text" name="valor" id="valor" value="<?php if($array_valores["valor"]){ echo $array_valores["valor"]; } ?>" size="15"></td>
</tr>

</table>
<?php
if($_GET["id_valores"] OR $array_valores["id"]){
	echo '<input type="hidden" name="accion" value="modificacion">';
	echo '<input type="hidden" name="id_valores" value="'.$array_valores["id"].'">';
}else{
	echo '<input type="hidden" name="accion" value="ingreso">';
}
?>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
