<center>
<table class="t1">
<tr>
	<th>Fecha</th>
	<th>Turno</th>
	<th>Vendedor</th>
	<th>Linea</th>
	<th>Total</th>
	<th>Accion</th>
	<th>Accion</th>
</tr>

<?php
while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.fecha_conv( "-", $row["fecha"] ).'</td>';
	echo '<td>'.$row["turno"].'</td>';
	echo '<td>'.$row["vendedor"].'</td>';
	echo '<td>'.$row["linea"].'</td>';
	echo '<td>'.$row["total"].'</td>';
	echo '<td><A HREF="comisiones_vendedores_modificacion.php?id_comisiones_vendedores='.$row["id"].'"><button>Modificar</button></A></td>';
	echo '<td><A HREF="comisiones_vendedores_eliminar.php?id_comisiones_vendedores='.$row["id"].'"><button>Eliminar</button></A></td>';
	echo "</tr>";
}



echo "<br>";

$q='select distinct vendedor from comisiones_vendedores where id_session="'.$id_session.'" order by vendedor';
$res=mysql_query($q);

while($row=mysql_fetch_array($res)){
	$total_vendedor=calcula_total_vendedor($id_session, $row["vendedor"]);
	echo '<font1>Total vendedor '.$row["vendedor"].': $'.$total_vendedor.'.-</font1><br>';
}
echo "<br>";

?>
</center>
