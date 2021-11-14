<?php
include_once("seguridad.inc.php");

$query='select * from articulos where id="'.$id_articulos.'"';
$array_articulos=mysql_fetch_array(mysql_query($query));

$query='select * from precios where id_articulo="'.$id_articulos.'"';
$array_precios=mysql_fetch_array(mysql_query($query));
?>

<center>
<table border="1">

<tr>
	<td>Codigo interno</td>
	<td><?php echo $array_articulos["codigo_interno"]; ?></td>
</tr>
<tr>
	<td>Marca</td>
	<td><?php echo $array_articulos["marca"]; ?></td>
</tr>
<tr>
	<td>Descripcion</td>
	<td><?php echo $array_articulos["descripcion"]; ?></td>
</tr>
<tr>
	<td>Contenido</td>
	<td><?php echo $array_articulos["contenido"]; ?></td>
</tr>
<tr>
	<td>Presentacion</td>
	<td><?php echo $array_articulos["presentacion"]; ?></td>
</tr>
<tr>
	<td>Codigo barras</td>
	<td><?php echo $array_articulos["codigo_barra"]; ?></td>
</tr>
<tr>
	<td>Fecha</td>
	<td><?php echo $array_articulos["fecha"]; ?></td>
</tr>
<tr>
	<td>Hora</td>
	<td><?php echo $array_articulos["hora"]; ?></td>
</tr>
<tr>
	<td>Clasificacion</td>
	<td><?php echo $array_articulos["clasificacion"]; ?></td>
</tr>
<tr>
	<td>Subclasificacion</td>
	<td><?php echo $array_articulos["subclasificacion"]; ?></td>
</tr>
<tr>
	<td>Precio base</td>
	<td><?php echo $array_precios["precio_base"]; ?></td>
</tr>
<tr>
	<td>Porcentaje contado</td>
	<td><?php echo $array_precios["porcentaje_contado"]; ?></td>
</tr>
<tr>
	<td>Porcentaje Tarjeta</td>
	<td><?php echo $array_precios["porcentaje_tarjeta"]; ?></td>
</tr>
</table>
