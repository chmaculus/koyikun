<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" href="style.css" type="text/css">
<meta content="text/html; charset=UTF-8" http-equiv="content-type" />
<title>Tablabla articulos By Christian Máculus</title>
</head>

<?php
include("vendedores_base.php");



if($_GET["id_vendedores"]){
include("../../includes/connect.php");
    $query='select * from vendedores where id="'.$_GET["id_vendedores"].'"';
    $array_vendedores=mysql_fetch_array(mysql_query($query));
    if(mysql_error()){echo "<br>".mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
}


?>

<form method="post" action="vendedores_update.php" name="form_vendedores">

<center>
<table class="t1" border="1">
	<tr>
		<th>numero</th>
		<td><input type="text" name="numero" id="numero" value="<?php if($array_vendedores["numero"]){echo $array_vendedores["numero"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>apellido</th>
		<td><input type="text" name="apellido" id="apellido" value="<?php if($array_vendedores["apellido"]){echo $array_vendedores["apellido"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>nombres</th>
		<td><input type="text" name="nombres" id="nombres" value="<?php if($array_vendedores["nombres"]){echo $array_vendedores["nombres"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>localidad</th>
		<td><input type="text" name="localidad" id="localidad" value="<?php if($array_vendedores["localidad"]){echo $array_vendedores["localidad"];}?>" size="10"></td>
	</tr>

</table>

<?php
if($_GET["id_vendedores"] OR $array_vendedores["id"]){
    echo '<input type="hidden" name="accion" value="modificacion">';
    echo '<input type="hidden" name="id_vendedores" value="'.$array_vendedores["id"].'">';
    echo '<input type="hidden" name="uuid_vendedores" value="'.$array_vendedores["uuid"].'">';
}else{
    echo '<input type="hidden" name="accion" value="ingreso">';
}
?>
<br>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
