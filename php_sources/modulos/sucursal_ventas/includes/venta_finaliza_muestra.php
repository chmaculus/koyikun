
<table class="t1">
<tr>
	<th>Cantidad</th>
	<th>descripcion</th>
	<th>Precio unitario</th>
	<th>Sub-Total contado</th>
	<th>Precio Tarjeta</th>
	<th>Sub-total tarjeta</th>
</tr>
<?php


while($row=mysql_fetch_array($result)){
	$array_articulos=detalle_articulo($row["id_articulos"]);

	$array_precios=precio_sucursal($row["id_articulos"], $id_sucursal);
	if($array_precios["rows"]<1){
		$array_precios=precio_sucursal($row["id_articulos"], 1);
	}
	
	
	//echo "query: ".$array_precios["query"];

	$contado=$array_precios["precio_base"];
	$tarjeta=( ( $array_precios["precio_base"] * $porcentaje_tarjeta ) / 100 ) + $array_precios["precio_base"];

	$promocion="";
	$tr='<tr>';

	if($array_precios["promocion"]=="S"){
		$array_promocion=get_promo( $row["id_articulos"], $id_sucursal );
		$promo=$array_promocion["precio_promocion"];
		$contado=$array_promocion["precio_promocion"];

		$contado = $promo;
		$tarjeta=$promo * ( $porcentaje_tarjeta / 100 ) + $promo;
		$promocion="  **PROMO AF**";
		$tr='<tr class="special">';
	}

	echo $tr;

	echo "<td>".$row["cantidad"]."</td>";
	echo "<td>".$array_articulos["descripcion"]." - ".$array_articulos["clasificacion"]." - ".$array_articulos["subclasificacion"].$promocion."</td>";
	echo "<td>".$contado."</td>";
	echo "<td>".( $contado * $row["cantidad"] )."</td>";
	echo "<td>".$tarjeta."</td>";
	echo "<td>".($tarjeta * $row["cantidad"] )."</td>";
	$total_contado=$total_contado + ( $contado * $row["cantidad"] ); 
	$total_tarjeta=$total_tarjeta + ( $tarjeta * $row["cantidad"] ); 
	echo "</tr>".chr(13);
}
#-------------------------------------------------------------------

$cod_descuento=get_valor(8);

echo '<tr><td></td><td>Totales:</td><td></td><td>'.$total_contado.'</td><td></td><td>'.$total_tarjeta.'</td></tr>';
echo '</table>';
?>