<?php
include("facturas_compra_base.php");
?>




<center>
<?php
include_once("../includes/connect.php");

$query='select * from facturas_compra limit 0,1000';
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table class="t1">';
echo "<tr>";
	echo "<th>id</th>";
	echo "<th>fecha_factura</th>";
	echo "<th>proveedor</th>";
	echo "<th>numero_factura</th>";
	echo "<th>importe</th>";
	echo "<th>fecha_ingreso</th>";
	echo "<th>hora_ingreso</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["fecha_factura"].'</td>';
	echo '<td>'.$row["proveedor"].'</td>';
	echo '<td>'.$row["numero_factura"].'</td>';
	echo '<td>'.$row["importe"].'</td>';
	echo '<td>'.$row["fecha_ingreso"].'</td>';
	echo '<td>'.$row["hora_ingreso"].'</td>';
	echo '<td><A HREF="facturas_compra_ingreso.php?id_facturas_compra='.$row["id"].'"><button>Modificar</button></A></td>';
	echo '<td><A HREF="facturas_compra_eliminar.php?id_facturas_compra='.$row["id"].'"><button>Eliminar</button></A></td>';
	echo "</tr>".chr(10);
}
?>
</table></center>
