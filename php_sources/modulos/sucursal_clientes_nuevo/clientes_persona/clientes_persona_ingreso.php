<?php
include_once("clientes_persona_base.php");
if($_GET["id_clientes_persona"]){
	include_once("connect.php");
	$query='select * from clientes_persona where id="'.$_GET["id_clientes_persona"].'"';
	$array_clientes_persona=mysql_fetch_array(mysql_query($query));
}
?>
<center>
<form method="post" action="clientes_persona_update.php" name="form_clientes_persona">
<table class="t1">

<tr>
	<th>id</th>
	<td><input type="text" name="id" id="id" value="<?php if($array_clientes_persona["id"]){ echo $array_clientes_persona["id"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>apellido</th>
	<td><input type="text" name="apellido" id="apellido" value="<?php if($array_clientes_persona["apellido"]){ echo $array_clientes_persona["apellido"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>nombres</th>
	<td><input type="text" name="nombres" id="nombres" value="<?php if($array_clientes_persona["nombres"]){ echo $array_clientes_persona["nombres"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>dni</th>
	<td><input type="text" name="dni" id="dni" value="<?php if($array_clientes_persona["dni"]){ echo $array_clientes_persona["dni"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>estado_civil</th>
	<td><input type="text" name="estado_civil" id="estado_civil" value="<?php if($array_clientes_persona["estado_civil"]){ echo $array_clientes_persona["estado_civil"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>telefono</th>
	<td><input type="text" name="telefono" id="telefono" value="<?php if($array_clientes_persona["telefono"]){ echo $array_clientes_persona["telefono"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>celular</th>
	<td><input type="text" name="celular" id="celular" value="<?php if($array_clientes_persona["celular"]){ echo $array_clientes_persona["celular"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>email</th>
	<td><input type="text" name="email" id="email" value="<?php if($array_clientes_persona["email"]){ echo $array_clientes_persona["email"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>profesion</th>
	<td><input type="text" name="profesion" id="profesion" value="<?php if($array_clientes_persona["profesion"]){ echo $array_clientes_persona["profesion"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>usa_tarjeta</th>
	<td><input type="text" name="usa_tarjeta" id="usa_tarjeta" value="<?php if($array_clientes_persona["usa_tarjeta"]){ echo $array_clientes_persona["usa_tarjeta"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>vendedor</th>
	<td><input type="text" name="vendedor" id="vendedor" value="<?php if($array_clientes_persona["vendedor"]){ echo $array_clientes_persona["vendedor"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>sucursal</th>
	<td><input type="text" name="sucursal" id="sucursal" value="<?php if($array_clientes_persona["sucursal"]){ echo $array_clientes_persona["sucursal"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>tel_comercial</th>
	<td><input type="text" name="tel_comercial" id="tel_comercial" value="<?php if($array_clientes_persona["tel_comercial"]){ echo $array_clientes_persona["tel_comercial"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>dom_comercial</th>
	<td><input type="text" name="dom_comercial" id="dom_comercial" value="<?php if($array_clientes_persona["dom_comercial"]){ echo $array_clientes_persona["dom_comercial"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>ciudad</th>
	<td><input type="text" name="ciudad" id="ciudad" value="<?php if($array_clientes_persona["ciudad"]){ echo $array_clientes_persona["ciudad"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>provincia</th>
	<td><input type="text" name="provincia" id="provincia" value="<?php if($array_clientes_persona["provincia"]){ echo $array_clientes_persona["provincia"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>carnet</th>
	<td><input type="text" name="carnet" id="carnet" value="<?php if($array_clientes_persona["carnet"]){ echo $array_clientes_persona["carnet"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>codigo_barras</th>
	<td><input type="text" name="codigo_barras" id="codigo_barras" value="<?php if($array_clientes_persona["codigo_barras"]){ echo $array_clientes_persona["codigo_barras"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>fecha_entrega</th>
	<td><input type="text" name="fecha_entrega" id="fecha_entrega" value="<?php if($array_clientes_persona["fecha_entrega"]){ echo $array_clientes_persona["fecha_entrega"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>radio</th>
	<td><input type="text" name="radio" id="radio" value="<?php if($array_clientes_persona["radio"]){ echo $array_clientes_persona["radio"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>canal</th>
	<td><input type="text" name="canal" id="canal" value="<?php if($array_clientes_persona["canal"]){ echo $array_clientes_persona["canal"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>programas</th>
	<td><input type="text" name="programas" id="programas" value="<?php if($array_clientes_persona["programas"]){ echo $array_clientes_persona["programas"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>fecha</th>
	<td><input type="text" name="fecha" id="fecha" value="<?php if($array_clientes_persona["fecha"]){ echo $array_clientes_persona["fecha"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>hora</th>
	<td><input type="text" name="hora" id="hora" value="<?php if($array_clientes_persona["hora"]){ echo $array_clientes_persona["hora"]; } ?>" size="10"></td>
</tr>

</table>
<?php
if($_GET["id_clientes_persona"] OR $array_clientes_persona["id"]){
	echo '<input type="hidden" name="accion" value="modificacion">';
	echo '<input type="hidden" name="id_clientes_persona" value="'.$array_clientes_persona["id"].'">';
}else{
	echo '<input type="hidden" name="accion" value="ingreso">';
}
?>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
