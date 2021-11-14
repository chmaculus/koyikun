
<center>
<?php
include("../../includes/connect.php");
$query="select * from pedidos_temp_nuevo order by sucursal,pedido_numero";
echo $query."<br>";
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table border="1">';
echo "<tr>";
	echo "<th>id</th>";
	echo "<th>id_sucursal</th>";
	echo "<th>id_articulos</th>";
	echo "<th>cantidad</th>";
	echo "<th>marca</th>";
	echo "<th>descripcion</th>";
	echo "<th>color</th>";
	echo "<th>clasificacion</th>";
	echo "<th>subclasificacion</th>";
	echo "<th>contenido</th>";
	echo "<th>presentacion</th>";
	echo "<th>codigo_barra</th>";
	echo "<th>fecha</th>";
	echo "<th>hora</th>";
	echo "<th>zona</th>";
	echo "<th>pedido_numero</th>";
	echo "<th>sucursal</th>";
	echo "<th>tipo</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["id_sucursal"].'</td>';
	echo '<td>'.$row["id_articulos"].'</td>';
	echo '<td>'.$row["cantidad"].'</td>';
	echo '<td>'.$row["marca"].'</td>';
	echo '<td>'.$row["descripcion"].'</td>';
	echo '<td>'.$row["color"].'</td>';
	echo '<td>'.$row["clasificacion"].'</td>';
	echo '<td>'.$row["subclasificacion"].'</td>';
	echo '<td>'.$row["contenido"].'</td>';
	echo '<td>'.$row["presentacion"].'</td>';
	echo '<td>'.$row["codigo_barra"].'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["hora"].'</td>';
	echo '<td>'.$row["zona"].'</td>';
	echo '<td>'.$row["pedido_numero"].'</td>';
	echo '<td>'.$row["sucursal"].'</td>';
	echo '<td>'.$row["tipo"].'</td>';
	echo "</tr>".chr(10);
}
?>
</table></center>

