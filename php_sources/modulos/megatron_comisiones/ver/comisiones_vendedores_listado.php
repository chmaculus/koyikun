<?php
include("comisiones_vendedores_base.php");
include("connect.php");
$query="select * from comisiones_vendedores limit 0,100";
$result=mysql_query($query)or die(mysql_error());
?>

<center>
<table class="t1">
<tr>
	<th>id</th>
	<th>id_datos_caja</th>
	<th>fecha</th>
	<th>turno</th>
	<th>vendedor</th>
	<th>linea</th>
	<th>total</th>
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
	echo '<td>'.$row["id_datos_caja"].'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["turno"].'</td>';
	echo '<td>'.$row["vendedor"].'</td>';
	echo '<td>'.$row["linea"].'</td>';
	echo '<td>'.$row["total"].'</td>';
	echo '<td>'.$row["fecha_sistema"].'</td>';
	echo '<td>'.$row["hora_sistema"].'</td>';
	echo '<td>'.$row["id_sucursal"].'</td>';
	echo '<td>'.$row["id_session"].'</td>';
	echo '<td><A HREF="comisiones_vendedores_ingreso.php?id_comisiones_vendedores='.$row["id"].'"><button>Modificar</button></A></td>';
	echo '<td><A HREF="comisiones_vendedores_eliminar.php?id_comisiones_vendedores='.$row["id"].'"><button>Eliminar</button></A></td>';
	echo "</tr>";
}
?>
</center>
