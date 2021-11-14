<?php
$qaa='select distinct hora_desde, hora_hasta from estadisticas_ventas_hora order by hora_desde';
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
	$tot=suma1($rowac["hora_desde"], $rowac["hora_hasta"]);
	echo "<tr>";
	echo '<td>'.$tot.'</td>';
	echo '<td>'.$rowac["hora_desde"].'</td>';
	echo '<td>'.$rowac["hora_hasta"].'</td>';
	echo '<td>'.round( (( $tot * 100 ) / $total_acum_mes) ,2).'%</td>';
	echo "</tr>".chr(10);
}
echo '</table>';	




#------------------------------------------------------------------------------------------	
$ttot_manana=suma2("08:00:00", "13:00:00");
$ttot_tarde=suma2("14:00:00", "22:00:00");
$porcentaje_manana=round( (( $ttot_manana * 100 ) / $total_acum_mes) ,2);
$porcentaje_tarde=round( (( $ttot_tarde * 100 ) / $total_acum_mes) ,2);

echo "<td>";
	echo '<table class="t1">';
	echo "<tr>";

	echo "<td>Total mañana<br>";
		echo $ttot_manana;
	echo "</td>";
	
	echo "<td>%";
		echo $porcentaje_manana;
	echo "</td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td>Total tarde<br>";
		echo $ttot_tarde;
	echo "</td>";

	echo "<td>%";
		echo $porcentaje_tarde;
	echo "</td>";
	echo "</tr>";
	echo '</table>';
echo "</td>";
#------------------------------------------------------------------------------------------	



#------------------------------------------------------------------------------------------	
function suma1($hora_desde, $hora_hasta){
	$q='select sum(importe) from estadisticas_ventas_hora where hora_desde="'.$hora_desde.'" and hora_hasta="'.$hora_hasta.'"';
	$a=mysql_fetch_array(mysql_query($q));
	return $a[0];
	#return $q;
} 
#------------------------------------------------------------------------------------------	

#------------------------------------------------------------------------------------------	
function suma2($hora_desde, $hora_hasta){
	$q='select sum(importe) from estadisticas_ventas_hora where hora_desde>="'.$hora_desde.'" and hora_desde<="'.$hora_hasta.'"';
	$a=mysql_fetch_array(mysql_query($q));
	return $a[0];
	#return $q;
} 
#------------------------------------------------------------------------------------------	


?>