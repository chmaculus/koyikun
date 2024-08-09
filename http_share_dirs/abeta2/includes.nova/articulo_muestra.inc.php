<?php
if($id_articulos){
	$id_articulo=$id_articulos;
}

if(!$id_articulo){
	exit;
}
$t_fuente="2";
$query='select * from articulos where id="'.$id_articulo.'"';
$result=mysql_query($query)or die(mysql_error());
$array_articulo=mysql_fetch_array($result);

echo '<table border=1>';
echo "<tr>";
muestra_texto_tabla("Marca",$t_fuente,"#000000");
muestra_texto_tabla($array_articulo["marca"],$t_fuente,"#000000");
echo "</tr>";

echo "<tr>";
muestra_texto_tabla("Descripcion",$t_fuente,"#000000");
muestra_texto_tabla($array_articulo["descripcion"],$t_fuente,"#000000");
echo "</tr>";

echo "<tr>";
muestra_texto_tabla("Codigo Barra",$t_fuente,"#000000");
muestra_texto_tabla($array_articulo["codigo_barra"],$t_fuente,"#000000");
echo "</tr>";

echo "<tr>";
muestra_texto_tabla("Fecha",$t_fuente,"#000000");
muestra_texto_tabla($array_articulo["fecha"],$t_fuente,"#000000");
echo "</tr>";

echo "<tr>";
muestra_texto_tabla("Hora",$t_fuente,"#000000");
muestra_texto_tabla($array_articulo["hora"],$t_fuente,"#000000");
echo "</tr>";

echo "<tr>";
muestra_texto_tabla("Clasificacion",$t_fuente,"#000000");
muestra_texto_tabla($array_articulo["clasificacion"],$t_fuente,"#000000");
echo "</tr>";

echo "<tr>";
muestra_texto_tabla("Sub-clasificacion",$t_fuente,"#000000");
muestra_texto_tabla($array_articulo["subclasificacion"],$t_fuente,"#000000");
echo "</tr>";


echo '</table>';
?>
