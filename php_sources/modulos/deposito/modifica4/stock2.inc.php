<?php
//$array_stock=stock_sucursal($array_articulos["id"],$_POST["id_sucursal"]);


#----------------------------------------
echo '<table border="1">';
 echo '<tr>';
	echo '<th>stock</th>';
	if($array_stock["stock"]<1){
		$stockaa=0;
	}else{
		$stockaa=$array_stock["stock"];
	}
	echo '<td>'.$stockaa.'</td>';
 echo '</tr>';
 echo '<tr>';
	echo '<th>fecha</th>';
	echo '<td>'.$array_stock["fecha"].'</td>';
 echo '</tr>';
 echo '<tr>';
	echo '<th>hora</th>';
	echo '<td>'.$array_stock["hora"].'</td>';
 echo '</tr>';
	echo '<th>fecha modificacion</th>';
	echo '<td>'.$array_stock["fecha_modificacion"].'</td>';
 echo '</tr>';
 echo '<tr>';
	echo '<th>hora modificacion</th>';
	echo '<td>'.$array_stock["hora_modificacion"].'</td>';
 echo '</tr>';
 echo '<tr>';
	echo '<th>fijo</th>';
	echo '<td>'.$array_stock["fijo"].'</td>';
 echo '</tr>';
echo "</table>";
#----------------------------------------


?>