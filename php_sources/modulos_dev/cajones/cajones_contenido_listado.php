<?php
include("cajones_contenido_base.php");
include("connect.php");
$query="select * from cajones_contenido limit 0,100";
$result=mysql_query($query)or die(mysql_error());
?>

<center>
<table class="t1">
<tr>
	<th>id</th>
	<th>id_cajon</th>
	<th>id_articulo</th>
	<th>marca</th>
	<th>descripcion</th>
	<th>contenido</th>
	<th>presentacion</th>
	<th>clasificacion</th>
	<th>subclasificacion</th>
	<th>precio_unitario</th>
	<th>cantidad</th>
	<th>Accion</th>
	<th>Accion</th>
</tr>

<?php
while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["id_cajon"].'</td>';
	echo '<td>'.$row["id_articulo"].'</td>';
	echo '<td>'.$row["marca"].'</td>';
	echo '<td>'.$row["descripcion"].'</td>';
	echo '<td>'.$row["contenido"].'</td>';
	echo '<td>'.$row["presentacion"].'</td>';
	echo '<td>'.$row["clasificacion"].'</td>';
	echo '<td>'.$row["subclasificacion"].'</td>';
	echo '<td>'.$row["precio_unitario"].'</td>';
	echo '<td>'.$row["cantidad"].'</td>';
	echo '<td><A href="cajones_contenido_ingreso.php?id_cajones_contenido='.$row["id"].'"><button>Modificar</button></A></td>';
	echo '<td><A href="cajones_contenido_eliminar.php?id_cajones_contenido='.$row["id"].'"><button>Eliminar</button></A></td>';
	echo "</tr>";
}
?>
</center>
