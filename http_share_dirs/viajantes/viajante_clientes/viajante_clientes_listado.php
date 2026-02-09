<?php
include("viajante_clientes_base.php");
?>




<center>
<?php
include("connect.php");
$query="select * from viajante_clientes limit 0,1000";
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table class="t1">';
echo "<tr>";
	echo "<th>id</th>";
	echo "<th>id_viajante</th>";
	echo "<th>apellido</th>";
	echo "<th>nombres</th>";
	echo "<th>localidad</th>";
	echo "<th>codigo_postal</th>";
	echo "<th>celular</th>";
	echo "<th>fecha</th>";
	echo "<th>hora</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["id_viajante"].'</td>';
	echo '<td>'.$row["apellido"].'</td>';
	echo '<td>'.$row["nombres"].'</td>';
	echo '<td>'.$row["localidad"].'</td>';
	echo '<td>'.$row["codigo_postal"].'</td>';
	echo '<td>'.$row["celular"].'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["hora"].'</td>';
	echo '<td><A HREF="viajante_clientes_ingreso.php?id_viajante_clientes='.$row["id"].'"><button>Modificar</button></A></td>';
	echo '<td><A HREF="viajante_clientes_eliminar.php?id_viajante_clientes='.$row["id"].'"><button>Eliminar</button></A></td>';
	echo "</tr>".chr(10);
}
?>
</table></center>
