<?php
include("cabecera.inc.php");

?>


<center>
<?php
include('./connect.php');

$fecha=date("Y-n-");
$fecha2=date("Y-n-d");

$query='select * from deposito_ingresos1 where (fecha_sistema>="'.$fecha.'01" and  fecha_sistema<="'.$fecha.'31") or (fecha>="'.$fecha.'01" and fecha<="'.$fecha.'31")';
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}

echo '<table class="t1">';
echo "<tr>";
echo '<td>';

echo '<table class="t1">';
echo "<tr>";
	echo "<th>fecha</th>";
	echo "<th>proveedor</th>";
	echo "<th>bultos</th>";
	echo "<th>fecha_sistema</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	$count++;
	if($fecha2==$row["fecha"]){
		echo '<tr class="especial">';
	}else{
		echo '<tr>';
	}
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["proveedor"].'</td>';
	echo '<td>'.$row["bultos"].'</td>';
	echo '<td>'.$row["fecha_sistema"].'</td>';
	echo "</tr>".chr(10);

	if($count==10){
		echo '</table></td><td>';
		echo '<table class="t1">';
		echo "<tr>";
		echo "	<th>fecha</th>";
		echo "	<th>proveedor</th>";
		echo "	<th>bultos</th>";
		echo "	<th>fecha_sistema</th>";
		echo "</tr>".chr(10);
	}
}


?>
</table></center>
