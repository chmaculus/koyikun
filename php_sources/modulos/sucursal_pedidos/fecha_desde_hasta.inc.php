
asdfasdfsadfsadf

<?php



$fecha=date("n/Y");

if($_POST["fecha_desde"]){
	$fecha_desde=$_POST["fecha_desde"];
}else{
	$fecha_desde='01/'.$fecha;
}

if($_POST["fecha_hasta"]){
	$fecha_hasta=$_POST["fecha_hasta"];
}else{
	$fecha_hasta='31/'.$fecha;
}

?>

<table>
<tr>
<td> Desde:</td><td><input type="text" name="fecha_desde" id="fecha_desde" value="<?php echo $fecha_desde;?>" /></td>
</tr>
<tr>
<td>Hasta:</td> <td> <input type="text" name="fecha_hasta" id="fecha_hasta" value="<?php echo $fecha_hasta;?>" /></td>
</tr>
</table>
