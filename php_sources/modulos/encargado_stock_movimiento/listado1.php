<?php
//include("stock_movimiento_base.php");
?>




<center>
<?php
include_once("../includes/connect.php");
$query='select * from stock_movimiento order by fecha desc, hora desc limit 0,1000';
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table border="1">';
echo "<tr>";
	echo "<th>id</th>";
	echo "<th>id_articulos</th>";
	echo "<th>numero_envio</th>";
	echo "<th>marca</th>";
	echo "<th>descripcion</th>";
	echo "<th>contenido</th>";
	echo "<th>presentacion</th>";
	echo "<th>clasificacion</th>";
	echo "<th>subclasificacion</th>";
	echo "<th>cantidad</th>";
	echo "<th>id_origen</th>";
	echo "<th>id_destino</th>";
	echo "<th>verificado</th>";
	echo "<th>fecha</th>";
	echo "<th>hora</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["id_articulos"].'</td>';
	echo '<td>'.$row["numero_envio"].'</td>';
	echo '<td>'.$row["marca"].'</td>';
	echo '<td>'.$row["descripcion"].'</td>';
	echo '<td>'.$row["contenido"].'</td>';
	echo '<td>'.$row["presentacion"].'</td>';
	echo '<td>'.$row["clasificacion"].'</td>';
	echo '<td>'.$row["subclasificacion"].'</td>';
	echo '<td>'.$row["cantidad"].'</td>';
	echo '<td>'.$row["id_origen"].'</td>';
	echo '<td>'.$row["id_destino"].'</td>';
	echo '<td>'.$row["verificado"].'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["hora"].'</td>';
	echo "</tr>".chr(10);
}
?>
</table></center>


