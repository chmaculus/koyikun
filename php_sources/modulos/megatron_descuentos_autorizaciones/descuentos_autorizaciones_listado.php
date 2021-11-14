<?php
include("descuentos_autorizaciones_base.php");
include("connect.php");
$query="select * from descuentos_autorizaciones limit 0,100";
$result=mysql_query($query)or die(mysql_error());
?>

<center>
<table class="t1">
<tr>
	<th>id</th>
	<th>n_carnet</th>
	<th>nombre</th>
	<th>apellido</th>
	<th>id_sucursal</th>
	<th>codigo</th>
	<th>Accion</th>
	<th>Accion</th>
</tr>

<?php
while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["n_carnet"].'</td>';
	echo '<td>'.$row["nombre"].'</td>';
	echo '<td>'.$row["apellido"].'</td>';
	echo '<td>'.$row["id_sucursal"].'</td>';
	echo '<td>'.$row["codigo"].'</td>';
	echo '<td><A href="descuentos_autorizaciones_ingreso.php?id_descuentos_autorizaciones='.$row["id"].'"><button>Modificar</button></A></td>';
	echo '<td><A href="descuentos_autorizaciones_eliminar.php?id_descuentos_autorizaciones='.$row["id"].'"><button>Eliminar</button></A></td>';
	echo "</tr>";
}
?>
</center>
