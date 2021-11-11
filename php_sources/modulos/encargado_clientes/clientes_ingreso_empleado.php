<?php
include("clientes_base.php");
echo "<center>";
echo "<titulo>Ingreso de clientes</titulo><br>";

include_once("../includes/connect.php");

if($_GET["id_clientes"]){
	$query='select * from clientes where id="'.$_GET["id_clientes"].'"';
	$array_clientes=mysql_fetch_array(mysql_query($query));
}
?>
<center>
<br>
<form method="post" action="clientes_update.php">
<table border="1" class="t1">

<tr>
	<th>Apellido</th>
	<td><input type="text" name="razon_social" value="<?php if($array_clientes["razon_social"]){ echo $array_clientes["razon_social"]; } ?>" size="20"></td>
</tr>
<tr>
	<th>Nombres</th>
	<td><input type="text" name="nombres" value="<?php if($array_clientes["nombres"]){ echo $array_clientes["nombres"]; } ?>" size="30"></td>
</tr>
<tr>
	<th>D.N.I.</th>
	<td><input type="text" name="cuit" value="<?php if($array_clientes["cuit"]){ echo $array_clientes["cuit"]; }else{ echo "( opcional )"; } ?>" size="13"></td>
</tr>


<input type="hidden" name="condicion_iva" value="DNI">
<input type="hidden" name="tipo_cliente" value="Empleado">


<tr>
	<th>N.Carnet</th>
	<td><input type="text" name="carnet" value="<?php if($array_clientes["carnet"]){ echo $array_clientes["carnet"]; } ?>" size="13"></td>
</tr>

<tr>
	<th>Direccion</th>
	<td><input type="text" name="direccion" value="<?php if($array_clientes["direccion"]){ echo $array_clientes["direccion"]; } ?>" size="30"></td>
</tr>
<tr>
	<th>Cdad/Dpto</th>
	<td><input type="text" name="ciudad" value="<?php if($array_clientes["ciudad"]){ echo $array_clientes["ciudad"]; }else{ echo "Ciudad";} ?>" size="20"></td>
</tr>
<tr>
	<th>Provincia</th>
	<td><input type="text" name="provincia" value="<?php if($array_clientes["provincia"]){ echo $array_clientes["provincia"]; }else{ echo "Mendoza";} ?>" size="13"></td>
</tr>
<tr>
	<th>Pais</th>
	<td><input type="text" name="pais" value="<?php if($array_clientes["pais"]){ echo $array_clientes["pais"]; }else{ echo "Argentina";} ?>" size="13"></td>
</tr>
<tr>
	<th>Codigo Postal</th>
	<td><input type="text" name="codigo_postal" value="<?php if($array_clientes["codigo_postal"]){ echo $array_clientes["codigo_postal"]; }else{ echo "5500";} ?>" size="8"></td>
</tr>
<tr>
	<th>E-mail</th>
	<td><textarea name="email" rows="1" cols="30"><?php if($array_clientes["email"]){ echo $array_clientes["email"]; } ?></textarea></td>
</tr>
<tr>
	<th>Facebook</th>
	<td><textarea name="facebook" rows="1" cols="30"><?php if($array_clientes["facebook"]){ echo $array_clientes["facebook"]; } ?></textarea></td>
</tr>
<tr>
	<th>telefonos</th>
	<td><textarea name="telefonos" rows="1" cols="30"><?php if($array_clientes["telefonos"]){ echo $array_clientes["telefonos"]; } ?></textarea></td>
</tr>
<?php
/*
<tr>
	<th>Vendedor/a</th>
	<td><input type="text" name="vendedor" value="<?php if($array_clientes["vendedor"]){ echo $array_clientes["vendedor"]; } ?>" size="3"></td>
</tr>
*/
?>
<tr>
	<th>Observaciones</th>
	<td><textarea name="observaciones" rows="3" cols="30"><?php if($array_clientes["observaciones"]){ echo $array_clientes["observaciones"]; } ?></textarea></td>
</tr>
<input type="hidden" name="sucursal" value="<?php echo $sucursal; ?>">


</table>
<?php
if($_GET["id_clientes"]){
	echo '<input type="hidden" name="accion" value="modificacion">';
	echo '<input type="hidden" name="id_clientes" value="'.$array_clientes["id"].'">';
}else{
	echo '<input type="hidden" name="accion" value="ingreso">';
}
?>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
