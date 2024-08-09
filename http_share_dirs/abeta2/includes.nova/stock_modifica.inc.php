<?php
echo '</table>';echo "<br>";
muestra_texto("Stock","",$color_fuente);echo "<br>";
echo '<table border="1">';
echo "<tr>";
muestra_texto_tabla("Sucursal","",$color_fuente);
muestra_texto_tabla("Stock","",$color_fuente);
muestra_texto_tabla("Maximo","",$color_fuente);
muestra_texto_tabla("Minimo","",$color_fuente);
echo "</tr>";
input_hidden("stock","stock");

$result=mysql_query("select * from sucursales");
while($row=mysql_fetch_array($result)){
	echo "<tr>";
	$stock=stock_sucursal($id_articulo,$row["id"]);
	muestra_texto_tabla($row["sucursal"],"",$color_fuente);
	echo '<td><input type="text" name="stocksuc'.$row["id"].'" value="'.$stock["stock"].'" size="8" maxlength="8"></td>';
	echo '<td><input type="text" name="maxsuc'.$row["id"].'" value="'.$stock["maximo"].'" size="8" maxlength="8"></td>';
	echo '<td><input type="text" name="minsuc'.$row["id"].'" value="'.$stock["minimo"].'" size="8" maxlength="8"></td>';
	echo "</tr>";
}
mysql_free_result($result);

echo '</table>';echo "<br>";

?>
