<?php
include_once("cabecera.inc.php");
include_once("connect.php");
include_once("funciones.php");

$query='select * from comisiones_vendedores where id_datos_caja="'.$_GET["id_datos_caja"].'" order by vendedor';
$result=mysql_query($query)or die(mysql_error());
?>

<center>
<table class="t1">
<tr>
	<th>Fecha</th>
	<th>T.</th>
	<th>Vendedor</th>
	<th>Linea</th>
	<th>Total</th>
	<th>Fecha sistema</th>
	<th>Hora sistema</th>
</tr>

<?php
while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["turno"].'</td>';
	echo '<td>'.$row["vendedor"].'</td>';
	echo '<td>'.$row["linea"].'</td>';
	echo '<td>'.$row["total"].'</td>';
	echo '<td>'.$row["fecha_sistema"].'</td>';
	echo '<td>'.$row["hora_sistema"].'</td>';
	echo "</tr>";
}

echo "</table>";
echo "<br>";

$q='select distinct vendedor from comisiones_vendedores where id_datos_caja="'.$_GET["id_datos_caja"].'" order by vendedor';
$res=mysql_query($q)or die(mysql_error()." ".$q);

while($row=mysql_fetch_array($res)){
	$total_vendedor=calcula_total_vendedor( $_GET["id_datos_caja"], $row["vendedor"] );
	echo '<font1>Total vendedor '.$row["vendedor"].': $'.$total_vendedor.'.-</font1><br>';
}
echo "<br>";


?>
</center>
