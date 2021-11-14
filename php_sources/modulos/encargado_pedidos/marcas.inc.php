<?php

echo '<table>';
//echo "<tr>";

$q='select distinct articulos.marca from articulos,pedidos where 	pedidos.numero_pedido="'.$row["numero_pedido"].'" and 
																						pedidos.sucursal="'.$row["sucursal"].'" and
																						articulos.id=pedidos.id_articulo 
																							order by articulos.marca';
$res=mysql_query($q);
if(mysql_error()){
	echo "<td>".mysql_error()."</td>";
}

while($row2=mysql_fetch_array($res)){
	//echo "<td>".str_replace(chr(10),"<br>",$q)."</td>";
	echo "<tr>";

	echo "<td>".$row2[0]."</td>";
	echo '<td>'.contar1($row2[0],$row["numero_pedido"],$row["sucursal"]).'</td>';
	$zona=mysql_result(mysql_query('select zona from marcas_zonas where marca="'.$row2[0].'"'),0,0);
	echo "<td>".$zona."</td>";

	echo "</tr>";
}

echo "</table>";














?>