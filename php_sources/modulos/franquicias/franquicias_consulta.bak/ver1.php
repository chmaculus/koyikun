<center>
<?php
include_once("../../includes/connect.php");

include_once('../../includes/funciones_varias.php');
include_once('../../includes/funciones_precios.php');
include_once('../../includes/funciones_stock.php');
include_once('../../includes/funciones_promocion.php');

$id_articulo="30287";


$query='select * from promociones where id_articulos="'.$id_articulo.'"';
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo "promociones<br>";
echo '<table border="1">';
echo "<tr>";
	echo "<th>id</th>";
	echo "<th>id_articulos</th>";
	echo "<th>id_sucursal</th>";
	echo "<th>fecha_inicio</th>";
	echo "<th>fecha_finaliza</th>";
	echo "<th>precio_promocion</th>";
	echo "<th>habilitado</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["id_articulos"].'</td>';
	echo '<td>'.$row["id_sucursal"].'</td>';
	echo '<td>'.$row["fecha_inicio"].'</td>';
	echo '<td>'.$row["fecha_finaliza"].'</td>';
	echo '<td>'.$row["precio_promocion"].'</td>';
	echo '<td>'.$row["habilitado"].'</td>';
	echo "</tr>".chr(10);
}
echo "</table><br>";


$query='select * from koyikun.articulos where id="'.$id_articulo.'"';
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo "articulos<br>";
echo '<table border="1">';
echo "<tr>";
	echo "<th>id</th>";
	echo "<th>codigo_interno</th>";
	echo "<th>marca</th>";
	echo "<th>descripcion</th>";
	echo "<th>contenido</th>";
	echo "<th>presentacion</th>";
	echo "<th>codigo_barra</th>";
	echo "<th>fecha</th>";
	echo "<th>hora</th>";
	echo "<th>clasificacion</th>";
	echo "<th>subclasificacion</th>";
	echo "<th>id_web</th>";
	echo "<th>publicar_web</th>";
	echo "<th>discontinuo</th>";
	echo "<th>lanzamiento</th>";
	echo "<th>codigo_af</th>";
	echo "<th>marca_corta</th>";
	echo "<th>color</th>";
	echo "<th>observaciones</th>";
	echo "<th>prom_asoc</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["codigo_interno"].'</td>';
	echo '<td>'.$row["marca"].'</td>';
	echo '<td>'.$row["descripcion"].'</td>';
	echo '<td>'.$row["contenido"].'</td>';
	echo '<td>'.$row["presentacion"].'</td>';
	echo '<td>'.$row["codigo_barra"].'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["hora"].'</td>';
	echo '<td>'.$row["clasificacion"].'</td>';
	echo '<td>'.$row["subclasificacion"].'</td>';
	echo '<td>'.$row["id_web"].'</td>';
	echo '<td>'.$row["publicar_web"].'</td>';
	echo '<td>'.$row["discontinuo"].'</td>';
	echo '<td>'.$row["lanzamiento"].'</td>';
	echo '<td>'.$row["codigo_af"].'</td>';
	echo '<td>'.$row["marca_corta"].'</td>';
	echo '<td>'.$row["color"].'</td>';
	echo '<td>'.$row["observaciones"].'</td>';
	echo '<td>'.$row["prom_asoc"].'</td>';
	echo "</tr>".chr(10);
}

echo '</table><br>';





$query='select * from koyikun.precios where id_articulo="'.$id_articulo.'"';
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo "precios<br>";
echo '<table border="1">';
echo "<tr>";
	echo "<th>id</th>";
	echo "<th>id_articulo</th>";
	echo "<th>precio_base</th>";
	echo "<th>porcentaje_contado</th>";
	echo "<th>porcentaje_tarjeta</th>";
	echo "<th>id_sucursal</th>";
	echo "<th>fecha</th>";
	echo "<th>hora</th>";
	echo "<th>promocion</th>";
	echo "<th>margen</th>";
	echo "<th>costo</th>";
	echo "<th>modulo</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["id_articulo"].'</td>';
	echo '<td>'.$row["precio_base"].'</td>';
	echo '<td>'.$row["porcentaje_contado"].'</td>';
	echo '<td>'.$row["porcentaje_tarjeta"].'</td>';
	echo '<td>'.$row["id_sucursal"].'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["hora"].'</td>';
	echo '<td>'.$row["promocion"].'</td>';
	echo '<td>'.$row["margen"].'</td>';
	echo '<td>'.$row["costo"].'</td>';
	echo '<td>'.$row["modulo"].'</td>';
	echo "</tr>".chr(10);
}

echo '</table>';















?>