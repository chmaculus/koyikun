<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="../css/style.css" type="text/css">
  <meta content="text/html; charset=UTF-8" http-equiv="content-type" />
  <title>Tablabla cuota_alquiler By Christian Máculus</title>
</head>




<?php
if($_GET["id_cuota_alquiler"]){
    include_once("../includes/connect.php");
    $query='select * from cuota_alquiler where id="'.$_GET["id_cuota_alquiler"].'"';
    $array_cuota_alquiler=mysql_fetch_array(mysql_query($query));
    if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
}
?>
<form method="post" action="cuota_alquiler_update.php" name="form_cuota_alquiler">

<center>
<table class="t1" border="1">

	<tr>
		<th>sucursal</th>
		<td><input type="text" name="sucursal" id="sucursal" value="<?php if($array_cuota_alquiler["sucursal"]){echo $array_cuota_alquiler["sucursal"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>a</th>
		<td><input type="text" name="a" id="a" value="<?php if($array_cuota_alquiler["a"]){echo $array_cuota_alquiler["a"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>b</th>
		<td><input type="text" name="b" id="b" value="<?php if($array_cuota_alquiler["b"]){echo $array_cuota_alquiler["b"];}?>" size="10"></td>
	</tr>

</table>


<?php
if($_GET["id_cuota_alquiler"] OR $array_cuota_alquiler["id"]){
    echo '<input type="hidden" name="accion" value="modificacion">';
    echo '<input type="hidden" name="id_cuota_alquiler" value="'.$array_cuota_alquiler["id"].'">';
    echo '<input type="hidden" name="uuid_cuota_alquiler" value="'.$array_cuota_alquiler["uuid"].'">';
}else{
    echo '<input type="hidden" name="accion" value="ingreso">';
}
?>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
