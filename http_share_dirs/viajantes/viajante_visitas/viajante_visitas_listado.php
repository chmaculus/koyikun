<?php
include("viajante_visitas_base.php");
?>




<center>
<?php
include("connect.php");
$query="select * from viajante_visitas limit 0,1000";
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table class="t1">';
echo "<tr>";
	echo "<th>id</th>";
	echo "<th>id_clientes</th>";
	echo "<th>id_viajante</th>";
	echo "<th>compro</th>";
	echo "<th>detalle</th>";
	echo "<th>marcas_ofrecidas</th>";
	echo "<th>fecha_visita</th>";
	echo "<th>hora_visita</th>";
	echo "<th>fecha</th>";
	echo "<th>hora</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["id_clientes"].'</td>';
	echo '<td>'.$row["id_viajante"].'</td>';
	echo '<td>'.$row["compro"].'</td>';
	echo '<td>'.$row["detalle"].'</td>';
	echo '<td>'.$row["marcas_ofrecidas"].'</td>';
	echo '<td>'.$row["fecha_visita"].'</td>';
	echo '<td>'.$row["hora_visita"].'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["hora"].'</td>';
	echo '<td><A HREF="viajante_visitas_ingreso.php?id_viajante_visitas='.$row["id"].'"><button>Modificar</button></A></td>';
	echo '<td><A HREF="viajante_visitas_eliminar.php?id_viajante_visitas='.$row["id"].'"><button>Eliminar</button></A></td>';
	echo "</tr>".chr(10);
}
?>
</table></center>
