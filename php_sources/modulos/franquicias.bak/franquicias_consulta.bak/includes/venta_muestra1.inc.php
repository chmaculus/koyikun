
<table class="t1">
<tr>
	<th>Cantidad</th>
	<th>Marca</th>
	<th>descripcion</th>
	<th>Clasificacion</th>
	<th>Subclasificacion</th>
	<th>contenido</th>
	<th>Presentacion</th>
	<th>Precio unitario</th>
	<th>Sub-Total contado</th>
</tr>

<?php
//$porcentaje_tarjeta=get_valor(7);

$query='select * from ventas_temp2 where id_session="'.$id_session.'" order by id';
$result=mysql_query($query) or die(mysql_error());
$rows=mysql_num_rows($result);

while($row=mysql_fetch_array($result)){
$count++;
		$query='select * from koyikun.articulos where id="'.$row["id_articulos"].'"';
 		$array_articulos=mysql_fetch_array(mysql_query($query));
	
	$array_precios=precio_sucursal($row["id_articulos"], $id_sucursal);
	if($array_precios["rows"]<1){
		$array_precios=precio_sucursal($row["id_articulos"], 1);
	}

	//$contado=$array_precios["precio_base"] * ( $array_precios["porcentaje_contado"] / 100 ) + $array_precios["precio_base"];
	$contado=$array_precios["precio_base"];

	$promocion="";
	$tr='<tr>';

	if($array_precios["promocion"]=="S"){
		$array_promocion=get_promo( $row["id_articulos"], $id_sucursal );
		$promo=$array_promocion["precio_promocion"];
		$contado=$array_promocion["precio_promocion"];

		$contado = $promo;
		$promocion="  **PROMO AF**";
		$tr='<tr class="special">';
	}
	if($count==$rows){
		$tr='<tr class="special3">';
	}
	

	echo $tr;
	echo '<td><input type="text" name="cantidad'.$row["id"].'" value="'.$row["cantidad"].'" size="3" maxlength="3"></td>';
	echo "<td>".$array_articulos["marca"]."</td>";
	echo "<td>".$array_articulos["descripcion"]."</td>";
	echo "<td>".$array_articulos["clasificacion"]."</td>";
	echo "<td>".$array_articulos["subclasificacion"]."</td>";
	echo "<td>".$array_articulos["contenido"]."</td>";
	echo "<td>".$array_articulos["presentacion"]."</td>";
	echo '<td><input type="text" name="contado'.$row["id"].'" value="'.$contado.'" size="10" readonly="readonly"></td>';
	echo '<td><input type="text" name="sub_contado'.$row["id"].'" value="'.( $contado * $row["cantidad"] ).'" size="10" readonly="readonly"></td>';
#	echo "<td>".accion($row["id"])."</td>";
	$total_contado=$total_contado + ( $contado * $row["cantidad"] ); 
	echo "</tr>".chr(13);
}
echo '<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td>Totales:</td>
		<td></td>';
		echo '<td><input type="text" name="total_contado" value="'.$total_contado.'" size="10" readonly="readonly"></td>';
		echo '</tr>';
echo '</table>';


?>