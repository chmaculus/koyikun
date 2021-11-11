<?php
include("deposito_ingresos1_base.php");
?>




<center>
<?php
include('../includes/connect.php');
$query="select * from deposito_ingresos1 limit 0,1000";
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table class="t1">';
echo "<tr>";
	echo "<th>id</th>";
	echo "<th>proveedor</th>";
	echo "<th>bultos</th>";
	echo "<th>fecha</th>";
	echo "<th>fecha_sistema</th>";
	echo "<th>hora_sistema</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["proveedor"].'</td>';
	echo '<td>'.$row["bultos"].'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["fecha_sistema"].'</td>';
	echo '<td>'.$row["hora_sistema"].'</td>';
	echo '<td><A HREF="deposito_ingresos1_ingreso.php?id_deposito_ingresos1='.$row["id"].'"><button>Modificar</button></A></td>';
	echo '<td><A HREF="deposito_ingresos1_eliminar.php?id_deposito_ingresos1='.$row["id"].'"><button>Eliminar</button></A></td>';
	echo "</tr>".chr(10);
}
?>
</table></center>
