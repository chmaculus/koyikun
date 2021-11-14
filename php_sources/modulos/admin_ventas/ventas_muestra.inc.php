<?php
 if(!$id_ventas){
 	exit;
 }
$query='select * from ventas where id="'.$id_ventas.'"';
$array_ventas=mysql_fetch_array(mysql_query($query));
?>

<center>
<table border="1">


<tr>
	<td><font1>id</font1></td>
	<td><font1><?php echo $array_ventas["id"]; ?></font1></td>
</tr>
<tr>
	<td><font1>numero_venta</font1></td>
	<td><font1><?php echo $array_ventas["numero_venta"]; ?></font1></td>
</tr>
<tr>
	<td><font1>marca</font1></td>
	<td><font1><?php echo $array_ventas["marca"]; ?></font1></td>
</tr>
<tr>
	<td><font1>descripcion</font1></td>
	<td><font1><?php echo $array_ventas["descripcion"]; ?></font1></td>
</tr>
<tr>
	<td><font1>clasificacion</font1></td>
	<td><font1><?php echo $array_ventas["clasificacion"]; ?></font1></td>
</tr>
<tr>
	<td><font1>subclasificacion</font1></td>
	<td><font1><?php echo $array_ventas["subclasificacion"]; ?></font1></td>
</tr>
<tr>
	<td><font1>cantidad</font1></td>
	<td><font1><?php echo $array_ventas["cantidad"]; ?></font1></td>
</tr>
<tr>
	<td><font1>precio_unitario</font1></td>
	<td><font1><?php echo $array_ventas["precio_unitario"]; ?></font1></td>
</tr>
<tr>
	<td><font1>sucursal</font1></td>
	<td><font1><?php echo $array_ventas["sucursal"]; ?></font1></td>
</tr>
<tr>
	<td><font1>tipo_pago</font1></td>
	<td><font1><?php echo $array_ventas["tipo_pago"]; ?></font1></td>
</tr>
<tr>
	<td><font1>vendedor</font1></td>
	<td><font1><?php echo $array_ventas["vendedor"]; ?></font1></td>
</tr>
<tr>
	<td><font1>fecha</font1></td>
	<td><font1><?php echo $array_ventas["fecha"]; ?></font1></td>
</tr>
<tr>
	<td><font1>hora</font1></td>
	<td><font1><?php echo $array_ventas["hora"]; ?></font1></td>
</tr>

</table>
</center>
