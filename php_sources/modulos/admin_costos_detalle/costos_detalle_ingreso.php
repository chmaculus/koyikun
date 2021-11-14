<?php

include_once("../login/login_verifica.inc.php");
$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="0"){
	header('Location: ../login/login_nologin.php?nologin=6');
	exit;
} 

include_once("costos_detalle_base.php");
include_once("connect.php");

if($_GET["id_costos_detalle"]){
	$query='select * from costos_detalle where id="'.$_GET["id_costos_detalle"].'"';
	$array_costos_detalle=mysql_fetch_array(mysql_query($query));
}
?>
<center>
<form method="post" action="costos_detalle_update.php" name="form_costos_detalle">
<table class="t1">

<tr>
	<th>Marca</th>
	<?php
		if($array_costos_detalle["marca"]){
			$marca=$array_costos_detalle["marca"];
		}
	?>
	<td><?php include("marca.inc.php"); ?></td>
</tr>
<tr>
	<th>Detalle</th>
	<td><textarea name="detalle" id="detalle" rows="3" cols="30"><?php if($array_costos_detalle["detalle"]){ echo $array_costos_detalle["detalle"]; } ?></textarea></td>
</tr>

</table>
<?php
if($_GET["id_costos_detalle"] OR $array_costos_detalle["id"]){
	echo '<input type="hidden" name="accion" value="modificacion">';
	echo '<input type="hidden" name="id_costos_detalle" value="'.$array_costos_detalle["id"].'">';
}else{
	echo '<input type="hidden" name="accion" value="ingreso">';
}
?>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
