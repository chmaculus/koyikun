<?php
muestra_texto("Precios","",$color_fuente);echo "<br>";
echo '<table border="1">';
echo "<tr>";
muestra_texto_tabla("Sucursal","",$color_fuente);
muestra_texto_tabla("Precio base","",$color_fuente);
muestra_texto_tabla("Porcentaje publico","",$color_fuente);
muestra_texto_tabla("Porcentaje tarjeta","",$color_fuente);
echo "</tr>";
input_hidden("precios","precios");
$result=mysql_query("select * from sucursales");
while($row=mysql_fetch_array($result)){
	echo "<tr>";
	$precios=precio_sucursal($id_articulo,$row["id"]);
	muestra_texto_tabla($row["sucursal"],"",$color_fuente);
	echo '<td><input type="text" name="precio_base'.$row["id"].'" value="'.$precios["precio_base"].'" size="8" maxlength="8"></td>';
	echo '<td><input type="text" name="porcentaje_contado'.$row["id"].'" value="'.$precios["porcentaje_contado"].'" size="8" maxlength="8"></td>';
	echo '<td><input type="text" name="porcentaje_tarjeta'.$row["id"].'" value="'.$precios["porcentaje_tarjeta"].'" size="8" maxlength="8"></td>';
	echo "</tr>";
}
mysql_free_result($result);
?>
