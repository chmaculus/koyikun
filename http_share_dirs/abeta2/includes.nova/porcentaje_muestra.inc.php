<?php
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
muestra_texto_tabla("Precio base",$t_fuente,$color_fuente);
muestra_texto_tabla("Porcentaje contado",$t_fuente,$color_fuente);
muestra_texto_tabla("Porcentaje tarjeta",$t_fuente,$color_fuente);
echo "</tr>";

$result=mysql_query("select * from sucursales");
while($row=mysql_fetch_array($result)){
	echo "<tr>";
	$precios=precio_sucursal($id_articulo,$row["id"]);
	muestra_texto_tabla($row["sucursal"],$t_fuente,$color_fuente);
	muestra_texto_tabla($precios["precio_base"],$t_fuente,$color_fuente);
	muestra_texto_tabla($precios["porcentaje_contado"],$t_fuente,$color_fuente);
	muestra_texto_tabla($precios["porcentaje_tarjeta"],$t_fuente,$color_fuente);
	echo "</tr>";
}
mysql_free_result($result);
?>
</table>