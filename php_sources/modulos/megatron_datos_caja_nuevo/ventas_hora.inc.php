<?php
$qac='select * from estadisticas_ventas_hora where sucursal="'.$row["sucursal"].'" order by sucursal, hora_desde';
$rac=mysql_query($qac);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table class="t1">';
echo "<tr>";
	echo "<th>importe</th>";
	echo "<th>hora desde</th>";
	echo "<th>hora hasta</th>";
	echo "<th>%</th>";
echo "</tr>";

while($rowac=mysql_fetch_array($rac)){
	echo "<tr>";
	echo '<td>'.$rowac["importe"].'</td>';
	echo '<td>'.$rowac["hora_desde"].'</td>';
	echo '<td>'.$rowac["hora_hasta"].'</td>';
	echo '<td>'.round( (( $rowac["importe"] *100 ) / $acum_mes) ,2).'%</td>';
	echo "</tr>".chr(10);
}
echo '</table>';	
	
	

?>