<?php

$query='select * from datos_caja where id_session="'.$id_session.'" limit 0,1';

$result=mysql_query($query)or die(mysql_error());
$rows=mysql_num_rows($result);
if($rows<1){
	header('Location: datos_caja_ingreso.php?falta=1');
	exit;
}
$array_datos_caja=mysql_fetch_array($result);

$result=mysql_query($query)or die(mysql_error());
?>

<center>
<titulo>Eva00</titulo>
<table class="t1">
<tr>
	<th>N</th>
	<th>F</th>
	<th>Te</th>
	<th>Tt</th>
	<th>Tc</th>
	<th>Sc</th>
	<th>T</th>
	<th>Accion</th>
</tr>

<?php
while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["numero_suc"].'</td>';
	echo '<td>'.fecha_conv( "-", $row["fecha"] ).'</td>';
	echo '<td>'.$row["total_efectivo"].'</td>';
	echo '<td>'.$row["total_tarjeta"].'</td>';
	echo '<td>'.( $row["total_tarjeta"] + $row["total_efectivo"] ).'</td>';
	echo '<td>'.$row["sin_comision"].'</td>';
	echo '<td>'.$row["turno"].'</td>';
	echo '<td><A HREF="datos_caja_ingreso.php?id_datos_caja='.$row["id"].'"><button>Modificar</button></A></td>';
	echo "</tr>";
}

?>
</center>
