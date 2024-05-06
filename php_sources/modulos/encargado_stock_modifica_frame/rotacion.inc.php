<?php
$q='select * from ventas_estadistica where id_articulo='.$row["id"];
$res=mysql_query($q);
if(mysql_error()){
	echo $q."<br>";
	echo mysql_error();
}
// echo "<td> $q </td>";
$array_estadistica=mysql_fetch_array($res);

echo '<table class="t1">';
echo "<tr><td>Mes</td>";
echo '<td>'.round($array_estadistica["mes"],0).'</td>';
echo "</tr>";
		
echo '<tr class="special1"><td>Tres</td>';
echo '<td>'.round($array_estadistica["tres"],0).'</td>';
echo "</tr>";

echo "<tr><td>Seis</td>";
echo '<td>'.round($array_estadistica["seis"],0).'</td>';
echo "</tr>";

echo "<tr><td>Nueve</td>";
echo '<td>'.round($array_estadistica["nueve"],0).'</td>';
echo "</tr>";

echo "<tr><td>Doce</td>";
echo '<td>'.round($array_estadistica["doce"],0).'</td>';
echo "</tr>";

echo "<tr><td>Min</td>";
echo '<td>'.round($array_estadistica["tres"],0).'</td>';
echo "</tr>";

echo "<tr><td>Max</td>";
echo '<td>'.round($maximo,0).'</td>';
echo "</tr>";

echo '<tr class="special1"><td>Stk</td>';
echo '<td>'.round($stock["stock"],0).'</td>';
echo "</tr>";
echo '</table>';
?>