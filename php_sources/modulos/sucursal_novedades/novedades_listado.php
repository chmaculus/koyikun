<?php
include("cabecera.inc.php");
include("../../includes/connect.php");

$fecha=date("Y-n-d");


$query='select * from novedades where ( id_sucursal="'.$id_sucursal.'" OR id_sucursal="T" ) and vigencia_inicio<="'.$fecha.'" and vigencia_finaliza>="'.$fecha.'" order by fecha';  
$result=mysql_query($query)or die(mysql_error());
$rows=mysql_num_rows($result);

?>

<center>
<table class="t1">
<tr>
	<th>Motivo</th>
	<th>Texto</th>
</tr>

<?php
while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["motivo"].'</td>';
	echo '<td>'.str_replace( chr(13), "<br>", $row["texto"] ).'</td>';
	echo "</tr>";
}
?>
</center>
