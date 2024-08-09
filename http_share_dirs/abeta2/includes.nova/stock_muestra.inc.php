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
muestra_texto("Stock",$t_fuente,$color_fuente);echo "<br>";
echo '<table border="1">';
echo "<tr>";
muestra_texto_tabla("Sucursal",$t_fuente,$color_fuente);
muestra_texto_tabla("Stock",$t_fuente,$color_fuente);
muestra_texto_tabla("Maximo",$t_fuente,$color_fuente);
muestra_texto_tabla("Minimo",$t_fuente,$color_fuente);
echo "</tr>";

$result=mysql_query("select * from sucursales");
while($row=mysql_fetch_array($result)){
	echo "<tr>";
	$stock=stock_sucursal($id_articulo,$row["id"]);
	muestra_texto_tabla($row["sucursal"],$t_fuente,$color_fuente);
	muestra_texto_tabla($stock["stock"],$t_fuente,$color_fuente);
	muestra_texto_tabla($stock["maximo"],$t_fuente,$color_fuente);
	muestra_texto_tabla($stock["minimo"],$t_fuente,$color_fuente);
	echo "</tr>";
}
mysql_free_result($result);

echo '</table>';

?>
