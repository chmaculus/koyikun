<?php
include("datos_caja_base.php");
include("connect.php");
$query="select * from datos_caja limit 0,100";
$result=mysql_query($query)or die(mysql_error());
?>

<center>
<table class="t1">
<tr>
	<th>id</th>
	<th>numero_suc</th>
	<th>fecha</th>
	<th>total_efectivo</th>
	<th>total_tarjeta</th>
	<th>sin_comision</th>
	<th>turno</th>
	<th>fecha_sistema</th>
	<th>hora_sistema</th>
	<th>id_sucursal</th>
	<th>id_session</th>
	<th>Accion</th>
	<th>Accion</th>
</tr>

<?php
while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["numero_suc"].'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["total_efectivo"].'</td>';
	echo '<td>'.$row["total_tarjeta"].'</td>';
	echo '<td>'.$row["sin_comision"].'</td>';
	echo '<td>'.$row["turno"].'</td>';
	echo '<td>'.$row["fecha_sistema"].'</td>';
	echo '<td>'.$row["hora_sistema"].'</td>';
	echo '<td>'.$row["id_sucursal"].'</td>';
	echo '<td>'.$row["id_session"].'</td>';
	echo '<td><A HREF="datos_caja_ingreso.php?id_datos_caja='.$row["id"].'"><button>Modificar</button></A></td>';
	echo '<td><A HREF="datos_caja_eliminar.php?id_datos_caja='.$row["id"].'"><button>Eliminar</button></A></td>';
	echo "</tr>";
}
?>
</center>
