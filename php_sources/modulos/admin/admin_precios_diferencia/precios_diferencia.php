<?php
include("connect.php");
include("funciones.php");

$query="select * from articulos order by marca, clasificacion, subclasificacion";
$result=mysql_query($query)or die(mysql_error());
?>

<center>
<table  border="1">
<tr>
	<th>cod int</th>
	<th>marca</th>
	<th>descr</th>
	<th>cont</th>
	<th>pres</th>
	<th>clas</th>
	<th>subclas</th>
	<th>p base</th>
	<th>p venta</th>
	
</tr>

<?php
while($row=mysql_fetch_array($result)){
	$array_precios=precio_sucursal($row["id"], 1);
	$precio_venta=calcula_precio_venta($row["id"]);

	if($array_precios["precio_base"] != $precio_venta ){
		echo "<tr>";
		echo '<td>'.$row["codigo_interno"].'</td>';
		echo '<td>'.$row["marca"].'</td>';
		echo '<td>'.$row["descripcion"].'</td>';
		echo '<td>'.$row["contenido"].'</td>';
		echo '<td>'.$row["presentacion"].'</td>';
		echo '<td>'.$row["clasificacion"].'</td>';
		echo '<td>'.$row["subclasificacion"].'</td>';
		echo '<td>'.$array_precios["precio_base"].'</td>';
		echo '<td>'.$precio_venta.'</td>';
		echo "</tr>";
		$count++;
	}
}
echo "</table>";
echo $count;
?>
</center>

