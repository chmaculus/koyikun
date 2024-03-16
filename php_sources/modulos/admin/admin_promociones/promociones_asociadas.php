<center>
<?php
include("promociones_base.php");
include("../../includes/connect.php");
include("../../includes/funciones_articulos.php");
include("../../includes/funciones_precios.php");
include("../../includes/funciones_promocion.php");
include("../../includes/funciones_varias.php");
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
  <meta content="text/html; charset=UTF-8" http-equiv="content-type" />
  <title>Promociones asociadas</title>
</head>
<body>


<?php

$fecha=date("d/n/Y");

$id_articulos=$_GET["id_articulos"];
$array_articulos=detalle_articulo($id_articulos);
$array_precios=precio_sucursal($id_articulos,"1");


?>
<table border="1" class="t1">
<tr>
	<td>ID</td>
	<td><?php echo $array_articulos["id"]; ?></td>
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
	<td><?php echo "$".$array_precios["precio_base"].".- // ".$array_precios["fecha"]." // ".$array_precios["hora"]; ?></td>
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

<form action="promociones_asociadas_update.php" method="post" enctype="multipart/form-data">
<table border="1" class="t1">

<?php

	echo '<tr>';
	echo "<th>id</th>";
	echo "<th>marca</th>";
	echo "<th>descripcion</th>";
	echo "<th>color</th>";
	echo "<th>contenido</th>";
	echo "<th>presentacion</th>";
	echo "<th>clasificacion</th>";
	echo "<th>subclasificacion</th>";
	echo '</tr>';

$query='select * from articulos_asociados where id_articulo="'.$id_articulos.'"';
$result=mysql_query($query)or die(mysql_error());

while($row=mysql_fetch_array($result)){
	$array_articulos=mysql_fetch_array(mysql_query('select * from articulos where id="'.$row["id_articulo_asociado"].'"'));
	echo "<tr>";
	echo '<td>'.$array_articulos["id"].'</td>';
	echo '<td>'.$array_articulos["marca"].'</td>';
	echo '<td>'.$array_articulos["descripcion"].'</td>';
	echo '<td>'.$array_articulos["color"].'</td>';
	echo '<td>'.$array_articulos["contenido"].'</td>';
	echo '<td>'.$array_articulos["presentacion"].'</td>';
	echo '<td>'.$array_articulos["clasificacion"].'</td>';
	echo '<td>'.$array_articulos["subclasificacion"].'</td>';
	echo '<td><A HREF="articulos_eliminar.php?id_articulos='.$row["id"].'"><button>Eliminar</button></A></td>';
	echo "</tr>".chr(10);
}
echo '</table>';

?>
<input type="hidden" name="accion" value="ingreso">
<input type="hidden" name="id_articulo" value="<?php echo $id_articulos; ?>">
<input type="text" size="6" name="id_articulo_asociado">
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
