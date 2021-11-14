<?php

include_once("index.php");
include_once("cabecera.inc.php");
include_once("funciones.php");
include_once("connect.php");

#--------------------------------------------------------------------------------
$query='select * from datos_caja where id_session="'.$id_session.'"';

$result=mysql_query($query)or die(mysql_error());
$rows=mysql_num_rows($result);
$array=mysql_fetch_array($result);

if($rows>0){
	$id_datos_caja=$array["id"];
}
#--------------------------------------------------------------------------------
if( $_GET["id_datos_caja"] ){
	$id_datos_caja=$_GET["id_datos_caja"];
}

if( $id_datos_caja ){
	$query='select * from datos_caja where id="'.$id_datos_caja.'"';
	$array_datos_caja=mysql_fetch_array(mysql_query($query));
	$array_datos_caja["fecha"]=fecha_conv("-", $array_datos_caja["fecha"]);

}

$fecha=date("d/n/Y");
$turno=$array_datos_caja["turno"];

?>
<center>
<titulo>Eva00</titulo><br>
<form method="post" action="datos_caja_update.php">
<table border="1" class="t1">

<tr>
	<th>N</th>
	<td><input type="text" name="numero_suc" value="<?php if($array_datos_caja["numero_suc"]){ echo $array_datos_caja["numero_suc"]; } ?>" size="5"></td>
</tr>
<tr>
	<th>F</th>
	<td><input type="text" name="fecha" value="<?php if($array_datos_caja["fecha"]){ echo $array_datos_caja["fecha"]; }else{ echo "00/00/0000"; } ?>" size="8"></td>
</tr>
<tr>
	<th>Te</th>
	<td><input type="text" name="total_efectivo" value="<?php if($array_datos_caja["total_efectivo"]){ echo $array_datos_caja["total_efectivo"]; }else{ echo "0.00"; }  ?>" size="6"></td>
</tr>
<tr>
	<th>Tt</th>
	<td><input type="text" name="total_tarjeta" value="<?php if($array_datos_caja["total_tarjeta"]){ echo $array_datos_caja["total_tarjeta"]; }else{ echo "0.00"; }  ?>" size="6"></td>
</tr>
<tr>
	<th>Sc</th>
	<td><input type="text" name="sin_comision" value="<?php if($array_datos_caja["sin_comision"]){ echo $array_datos_caja["sin_comision"]; }else{ echo "0.00"; } ?>" size="6"></td>
</tr>
<tr>
	<th>T</th>
	<td><?php include("turno.inc.php"); ?></td>
</tr>

</table>
<?php
if( $id_datos_caja OR $array_datos_caja["id"]){
	echo '<input type="hidden" name="accion" value="modificacion">';
	echo '<input type="hidden" name="id_datos_caja" value="'.$id_datos_caja.'">';
}else{
	echo '<input type="hidden" name="accion" value="ingreso">';
}
echo '<input type="hidden" name="id_session" value="'.$id_session.'">';

if($_GET["falta"]==1){
	echo '<br><alerta1>Debe ingresar datos de caja</alerta1><br><br>';
}


?>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
