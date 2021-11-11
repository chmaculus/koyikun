<?php
if($id_articulos){
	$id_articulo=$id_articulos;
}

if(!$id_articulo){
	exit;
}
if(!$color_fuente){
	$color_fuente="#000000";
}
if(!$t_fuente){
	$t_fuente="2";
}
muestra_texto("Precios",$t_fuente,$color_fuente);echo "<br>";
echo '<table border="1">';
echo "<tr>";
muestra_texto_tabla("Sucursal",$t_fuente,$color_fuente);
muestra_texto_tabla("Precio contado",$t_fuente,$color_fuente);
muestra_texto_tabla("Precio tarjeta",$t_fuente,$color_fuente);
muestra_texto_tabla("Fecha",$t_fuente,$color_fuente);
muestra_texto_tabla("Hora",$t_fuente,$color_fuente);
echo "</tr>";

$result=mysql_query("select * from sucursales");
while($row=mysql_fetch_array($result)){
	echo "<tr>";
	$precios=precio_sucursal($id_articulo,$row["id"]);
	$precio_contado=(($precios["precio_base"] * $precios["porcentaje_contado"]) / 100) + $precios["precio_base"];
	$precio_tarjeta=(($precios["precio_base"] * $precios["porcentaje_tarjeta"]) / 100) + $precios["precio_base"];
	
	muestra_texto_tabla($row["sucursal"],$t_fuente,$color_fuente);
	muestra_texto_tabla($precio_contado,$t_fuente,$color_fuente);
	muestra_texto_tabla($precio_tarjeta,$t_fuente,$color_fuente);
	muestra_texto_tabla($precios["fecha"],$t_fuente,$color_fuente);
	muestra_texto_tabla($precios["hora"],$t_fuente,$color_fuente);
	echo "</tr>";
}
mysql_free_result($result);
?>
</table>