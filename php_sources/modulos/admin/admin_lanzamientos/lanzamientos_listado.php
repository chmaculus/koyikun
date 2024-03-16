<?php
include("lanzamientos_base.php");
?>
<center>
<?php
include("../includes/connect.php");
$query="select * from articulos_lanzamientos limit 0,1000";
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table class="t1">';
echo "<tr>";
	echo "<th>id</th>";
	echo "<th>descripcion</th>";
	echo "<th>fecha_inicio</th>";
	echo "<th>fecha_finaliza</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["descripcion"].'</td>';
	echo '<td>'.$row["fecha_inicio"].'</td>';
	echo '<td>'.$row["fecha_finaliza"].'</td>';
	echo '<td><A HREF="lanzamientos_modifica.php?id_articulos_lanzamientos='.$row["id"].'"><button>Modificar</button></A></td>';
	echo '<td><A HREF="lanzamientos_eliminar.php?id_articulos_lanzamientos='.$row["id"].'"><button>Eliminar</button></A></td>';
	echo "</tr>".chr(10);
}
?>
</table></center>

