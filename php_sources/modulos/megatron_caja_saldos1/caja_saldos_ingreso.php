
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" href="style.css" type="text/css">
<meta content="text/html; charset=UTF-8" http-equiv="content-type" />
<title>Tablabla articulos By Christian Máculus</title>
</head>

<?php
if($_GET["id_caja_saldos"]){
    $query='select * from caja_saldos where id="'.$_GET["id_caja_saldos"].'"';
    $array_caja_saldos=mysql_fetch_array(mysql_query($query));
    if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
}
    include_once("../includes/connect.php");

/*
$fecha=date("Y-n-d");
$hora=date("H:i:s");
*/
$codigo=date("YndHis");

?>


<form method="post" action="caja_saldos_update.php" name="form_caja_saldos">

<center>
<table class="t1" border="1">

	<tr>
		<th>codigo</th>
		<td><input type="text" name="codigo" id="codigo" value="<?php echo $_GET["codigo"]?>" size="10"></td>
	</tr>
	<tr>
		<th>entrega_recibe</th>
		<td>
			<?php include("deudores.inc.php");?>
		</td>
	</tr>
	<tr>
		<th>detalle</th>
			<td><textarea name="detalle" id="detalle" rows="10" cols="33"><?php if($array_caja_saldos["detalle"]){echo $array_caja_saldos["detalle"];}?></textarea></td>	</tr>
	<tr>
		<th>debe</th>
		<td><input type="text" name="debe" id="debe" value="<?php if($array_caja_saldos["debe"]){echo $array_caja_saldos["debe"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>haber</th>
		<td><input type="text" name="haber" id="haber" value="<?php if($array_caja_saldos["haber"]){echo $array_caja_saldos["haber"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>saldo</th>
		<td><input type="text" name="saldo" id="saldo" value="<?php if($array_caja_saldos["saldo"]){echo $array_caja_saldos["saldo"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>fecha</th>
		<td><input type="text" name="fecha" id="fecha" value="<?php if($array_caja_saldos["fecha"]){echo $array_caja_saldos["fecha"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>hora</th>
		<td><input type="text" name="hora" id="hora" value="<?php if($array_caja_saldos["hora"]){echo $array_caja_saldos["hora"];}?>" size="10"></td>
	</tr>

</table>


<?php
if($_GET["id_caja_saldos"] OR $array_caja_saldos["id"]){
    echo '<input type="hidden" name="accion" value="modificacion">';
    echo '<input type="hidden" name="id_caja_saldos" value="'.$array_caja_saldos["id"].'">';
    echo '<input type="hidden" name="uuid_caja_saldos" value="'.$array_caja_saldos["uuid"].'">';
}else{
    echo '<input type="hidden" name="accion" value="ingreso">';
}
?>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
