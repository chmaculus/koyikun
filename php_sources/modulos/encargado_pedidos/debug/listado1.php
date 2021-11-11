<?php
#include("pedidos_base.php");
?>




<center>
<?php
include("../../includes/connect.php");

$query='select * from pedidos where numero_pedido is null group by id_articulo order by marca,clasificacion, subclasificacion, descripcion';
$query='select * from pedidos where fecha="2020-12-17" and hora="00:22:01" and sucursal=11  group by id_articulo order by marca,clasificacion, subclasificacion, descripcion';
$query='select * from pedidos where numero_pedido is null order by sucursal';
#$query='select distinct * from pedidos where numero_pedido is null order by marca,clasificacion, subclasificacion, descripcion';

echo $query."<br>";


$result=mysql_query($query);
echo "Rows: ".mysql_num_rows($result)."<br>";
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table border="1">';
echo "<tr>";
	echo "<th>id</th>";
	echo "<th>id_articulo</th>";
	echo "<th>numero_pedido</th>";
	echo "<th>marca</th>";
	echo "<th>descripcion</th>";
	echo "<th>contenido</th>";
	echo "<th>presentacion</th>";
	echo "<th>clasificacion</th>";
	echo "<th>subclasificacion</th>";
	echo "<th>cantidad_solicitada</th>";
	echo "<th>cantidad_recibida</th>";
	echo "<th>sucursal</th>";
	echo "<th>fecha</th>";
	echo "<th>hora</th>";
	echo "<th>finalizado</th>";
	echo "<th>fecha_envio</th>";
	echo "<th>hora_envio</th>";
	echo "<th>tipo</th>";
	echo "<th>fecha_ped_prep</th>";
	echo "<th>fecha_ped_tran</th>";
	echo "<th>fecha_ped_rec</th>";
	echo "<th>hora_ped_rec</th>";
	echo "<th>hora_ped_prep</th>";
	echo "<th>hora_ped_tran</th>";
	echo "<th>responsable</th>";
	echo "<th>bultos</th>";
	echo "<th>estado</th>";
	echo "<th>zona</th>";
	echo "<th>color</th>";
	echo "<th>codigo_af</th>";
	echo "<th>cajon</th>";
	echo "<th>cantidad_recibida_real</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["id_articulo"].'</td>';
	echo '<td>'.$row["numero_pedido"].'</td>';
	echo '<td>'.$row["marca"].'</td>';
	echo '<td>'.$row["descripcion"].'</td>';
	echo '<td>'.$row["contenido"].'</td>';
	echo '<td>'.$row["presentacion"].'</td>';
	echo '<td>'.$row["clasificacion"].'</td>';
	echo '<td>'.$row["subclasificacion"].'</td>';
	echo '<td>'.$row["cantidad_solicitada"].'</td>';
	echo '<td>'.$row["cantidad_recibida"].'</td>';
	echo '<td>'.$row["sucursal"].'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["hora"].'</td>';
	echo '<td>'.$row["finalizado"].'</td>';
	echo '<td>'.$row["fecha_envio"].'</td>';
	echo '<td>'.$row["hora_envio"].'</td>';
	echo '<td>'.$row["tipo"].'</td>';
	echo '<td>'.$row["fecha_ped_prep"].'</td>';
	echo '<td>'.$row["fecha_ped_tran"].'</td>';
	echo '<td>'.$row["fecha_ped_rec"].'</td>';
	echo '<td>'.$row["hora_ped_rec"].'</td>';
	echo '<td>'.$row["hora_ped_prep"].'</td>';
	echo '<td>'.$row["hora_ped_tran"].'</td>';
	echo '<td>'.$row["responsable"].'</td>';
	echo '<td>'.$row["bultos"].'</td>';
	echo '<td>'.$row["estado"].'</td>';
	echo '<td>'.$row["zona"].'</td>';
	echo '<td>'.$row["color"].'</td>';
	echo '<td>'.$row["codigo_af"].'</td>';
	echo '<td>'.$row["cajon"].'</td>';
	echo '<td>'.$row["cantidad_recibida_real"].'</td>';
	echo '<td><A HREF="pedidos_ingreso.php?id_pedidos='.$row["id"].'"><button>Modificar</button></A></td>';
	echo '<td><A HREF="pedidos_eliminar.php?id_pedidos='.$row["id"].'"><button>Eliminar</button></A></td>';
	echo "</tr>".chr(10);
}
?>
</table></center>

