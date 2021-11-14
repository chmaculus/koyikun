<?php
if(!$id_articulo){
	exit;
}
$query='select * from articulos where id="'.$id_articulo.'"';
$array_articulo=mysql_fetch_array(mysql_query($query));

$marca=$array_articulo["marca"];
$clasificacion=$array_articulo["clasificacion"];

echo '<table border="1">';
echo "<tr>";muestra_texto_tabla("Codigo interno","",$color_fuente);
echo '<td><input type="text" name="codigo_interno'.$array_articulo["id"].'" value="'.$array_articulo["codigo_interno"].'" size="5" maxlength="5"></td>';
echo "</tr>";

echo "<tr>";muestra_texto_tabla("Marca","",$color_fuente);
echo "<td>";include("articulos_select_marca.inc.php");echo "</td>";
//echo '<td><input type="text" name="marca'.$array_articulo["id"].'" value="'.$array_articulo["marca"].'" size="10" maxlength="30"></td>';

echo "<tr>";muestra_texto_tabla("Descripcion","",$color_fuente);
echo '<td><input type="text" name="descripcion'.$array_articulo["id"].'" value="'.$array_articulo["descripcion"].'" size="30" maxlength="80"></td>';

echo "<tr>";muestra_texto_tabla("Clasificacion","",$color_fuente);
echo '<td><input type="text" name="clasificacion'.$array_articulo["id"].'" value="'.$array_articulo["clasificacion"].'" size="30" maxlength="30"></td>';
//echo "<td>";include("articulos_select_clasificacion.inc.php");echo "</td>";

echo "<tr>";muestra_texto_tabla("Sub clasificacion","",$color_fuente);
echo '<td><input type="text" name="subclasificacion'.$array_articulo["id"].'" value="'.$array_articulo["subclasificacion"].'" size="30" maxlength="30"></td>';

echo "<tr>";muestra_texto_tabla("Fecha","",$color_fuente);
muestra_texto_tabla($array_articulo["fecha"],"",$color_fuente);echo "</tr>";

echo "<tr>";muestra_texto_tabla("hora","",$color_fuente);
muestra_texto_tabla($array_articulo["hora"],"",$color_fuente);echo "</tr>";

echo "<tr>";muestra_texto_tabla("Codigo barra","",$color_fuente);
echo '<td><input type="text" name="codigo_barra'.$array_articulo["id"].'" value="'.$array_articulo["codigo_barra"].'" size="13" maxlength="30"></td>';

echo "</tr>";echo '</table>';echo "<br>";

?>
