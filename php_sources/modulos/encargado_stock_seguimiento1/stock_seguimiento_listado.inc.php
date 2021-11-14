<?php

echo '<table class="t1">';
echo "<tr>";
	echo "<th>id</th>";
	echo "<th>id_articulo</th>";
	echo "<th>stock_anterior</th>";
	echo "<th>stock_nuevo</th>";
	echo "<th>tipo</th>";
	echo "<th>origen</th>";
	echo "<th>destino</th>";
	echo "<th>fecha</th>";
	echo "<th>hora</th>";
	echo "<th>cantidad</th>";
	echo "<th>numero_venta</th>";
	echo "<th>vendedor</th>";
	echo "<th>envio</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	$tipo=$row["tipo"];
	if($row["tipo"]=="CERO"){
		$tipo="RESET DE STOCK";
	}
	if($row["tipo"]=="P_EN"){
		$tipo="ENVIO A SUCURSAL";
	}
	if($row["tipo"]=="P_RE"){
		$tipo="RECIBIDO EN SUCURSAL";
	}
	if($row["tipo"]=="MD5"){
		$tipo="MODIFICACION DE STOCK";
	}
	echo "<tr>";
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["id_articulo"].'</td>';
	echo '<td>'.$row["stock_anterior"].'</td>';
	echo '<td>'.$row["stock_nuevo"].'</td>';
	echo '<td>'.$tipo.'</td>';
	echo '<td>'.nombre_sucursal($row["origen"]).'</td>';
	echo '<td>'.nombre_sucursal($row["destino"]).'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["hora"].'</td>';
	echo '<td>'.$row["cantidad"].'</td>';
	echo '<td>'.$row["numero_venta"].'</td>';
	echo '<td>'.$row["vendedor"].'</td>';
	echo '<td>'.$row["envio"].'</td>';
	echo "</tr>".chr(10);
}
?>
</table></center>
