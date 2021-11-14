<?php
include_once("../../includes/connect.php");
include_once("../../includes/funciones_articulos.php");
include_once("cabecera.inc.php");
?>
<center>
<titulo>Promociones vencidas</titulo><br>


<table border="1">
<tr>
<td>Marca</td>
<td>Clasificacion</td>
<td>Sub-clasificacion</td>
<td>Contenido</td>
<td>Presentacion</td>
</tr>
<?php
$fecha=date("Y-n-d");
$fecha2=resta_fecha($fecha , 4);

$query='select * from promociones where fecha_finaliza>="'.$fecha2.'" and fecha_finaliza<="'.$fecha.'" and id_sucursal="'.$id_sucursal.'"';
$result=mysql_query($query)or die(mysql_error());
$rows=mysql_num_rows($result);

while($row=mysql_fetch_array($result)){
	$array_articulo=detalle_articulo( $row["id_articulos"] );
	echo '<tr>';
	echo '<td>'.$array_articulo["marca"].'</td>';
	echo '<td>'.$array_articulo["clasificacion"].'</td>';
	echo '<td>'.$array_articulo["subclasificacion"].'</td>';
	echo '<td>'.$array_articulo["contenido"].'</td>';
	echo '<td>'.$array_articulo["presentacion"].'</td>';
	echo '</tr>';
}

echo "</table>";


?>
</center>

