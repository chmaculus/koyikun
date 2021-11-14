<?php
include("promociones_base.php");
?>




<center>
<?php
include("connect.php");
$query="select distinct id_articulo from articulos_asociados";
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table class="t1">';
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

while($row=mysql_fetch_array($result)){
	$array_articulos=mysql_fetch_array(mysql_query('select * from articulos where id="'.$row["id_articulo"].'"'));
	echo "<tr>";
	echo '<td>'.$array_articulos["id"].'</td>';
	echo '<td>'.$array_articulos["marca"].'</td>';
	echo '<td>'.$array_articulos["descripcion"].'</td>';
	echo '<td>'.$array_articulos["color"].'</td>';
	echo '<td>'.$array_articulos["contenido"].'</td>';
	echo '<td>'.$array_articulos["presentacion"].'</td>';
	echo '<td>'.$array_articulos["clasificacion"].'</td>';
	echo '<td>'.$array_articulos["subclasificacion"].'</td>';
	
	echo '<td>'.$row["id_articulo_asociado"].'</td>';
	echo '<td><A HREF="promociones_asociadas.php?id_articulos_asociados='.$array_articulos["id"].'"><button>Modificar</button></A></td>';
	echo '<td><A HREF="promociones_eliminar.php.php?id_articulos_asociados='.$array_articulos["id"].'"><button>Eliminar</button></A></td>';
	echo "</tr>".chr(10);
}
?>
</table></center>
