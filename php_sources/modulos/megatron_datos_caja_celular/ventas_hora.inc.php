<?php
$qaa='select * from estadisticas_ventas_hora where sucursal="'.$rowab["sucursal"].'" order by sucursal, hora_desde';
$resaa=mysql_query($qaa);
if(mysql_error()){echo mysql_error()."<br>".$qaa."<br>";}


echo '<table class="t1">';
echo "<tr>";
	echo "<th>importe</th>";
	echo "<th>hora desde</th>";
	echo "<th>hora hasta</th>";
	echo "<th>%</th>";
echo "</tr>";

while($rowac=mysql_fetch_array($resaa)){
	echo "<tr>";
	echo '<td>'.$rowac["importe"].'</td>';
	echo '<td>'.$rowac["hora_desde"].'</td>';
	echo '<td>'.$rowac["hora_hasta"].'</td>';
	echo '<td>'.round( (( $rowac["importe"] *100 ) / $acum_mes) ,2).'%</td>';
	echo "</tr>".chr(10);
}
echo '</table>';	
	
	

?>