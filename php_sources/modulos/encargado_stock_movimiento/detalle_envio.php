<?php
include("cabecera.inc.php");
include("base.php");
?>




<center>
<?php
include_once("../includes/connect.php");
include_once("../includes/funciones_varias.php");

$array=mysql_fetch_array(mysql_query('select * from stock_movimiento where numero_envio="'.$_GET["numero_envio"].'" '));


echo '<table class="t1">';
echo '<tr>';
echo '<td>Numero envio</td><td>'.$array["numero_envio"].'</td>';
echo '</tr>';
echo '<tr>';
echo '<td>Fecha</td><td>'.$array["fecha"].'</td>';
echo '</tr>';
echo '<tr>';
echo '<td>Hora</td><td>'.$array["hora"].'</td>';
echo '</tr>';
echo '<tr>';
echo '<td>Origen</td><td>'.nombre_sucursal($array["origen"]).'</td>';
echo '</tr>';
echo '<tr>';
echo '<td>Destino</td><td>'.nombre_sucursal($array["destino"]).'</td>';
echo '</tr>';
echo '</table><br>';















$query='select * from stock_movimiento where numero_envio="'.$_GET["numero_envio"].'" order by fecha desc, hora desc limit 0,500';
echo $query."<br>";
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table class="t1">';
echo "<tr>";
	echo "<th>id_articulos</th>";
	echo "<th>marca</th>";
	echo "<th>descripcion</th>";
	echo "<th>contenido</th>";
	echo "<th>presentacion</th>";
	echo "<th>clasificacion</th>";
	echo "<th>subclasificacion</th>";
	echo "<th>cantidad</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["id_articulos"].'</td>';
	echo '<td>'.$row["marca"].'</td>';
	echo '<td>'.$row["descripcion"].'</td>';
	echo '<td>'.$row["contenido"].'</td>';
	echo '<td>'.$row["presentacion"].'</td>';
	echo '<td>'.$row["clasificacion"].'</td>';
	echo '<td>'.$row["subclasificacion"].'</td>';
	echo '<td>'.$row["cantidad"].'</td>';
	echo "</tr>".chr(10);
}
?>
</table></center>


