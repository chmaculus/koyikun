<?php
include("cajones_base.php");
include("connect.php");
$query="select * from cajones limit 0,100";
$result=mysql_query($query)or die(mysql_error());
?>

<center>
<table class="t1">
<tr>
	<th>id</th>
	<th>numero</th>
	<th>id_sucursal_origen</th>
	<th>id_sucursal_destino</th>
	<th>vendedor_envia</th>
	<th>vendedor_recibe</th>
	<th>fechao</th>
	<th>horao</th>
	<th>fechad</th>
	<th>horad</th>
	<th>estado</th>
	<th>Accion</th>
	<th>Accion</th>
</tr>

<?php
while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["numero"].'</td>';
	echo '<td>'.$row["id_sucursal_origen"].'</td>';
	echo '<td>'.$row["id_sucursal_destino"].'</td>';
	echo '<td>'.$row["vendedor_envia"].'</td>';
	echo '<td>'.$row["vendedor_recibe"].'</td>';
	echo '<td>'.$row["fechao"].'</td>';
	echo '<td>'.$row["horao"].'</td>';
	echo '<td>'.$row["fechad"].'</td>';
	echo '<td>'.$row["horad"].'</td>';
	echo '<td>'.$row["estado"].'</td>';
	echo '<td><A href="cajones_ingreso.php?id_cajones='.$row["id"].'"><button>Modificar</button></A></td>';
	echo '<td><A href="cajones_eliminar.php?id_cajones='.$row["id"].'"><button>Eliminar</button></A></td>';
	echo "</tr>";
}
?>
</center>
