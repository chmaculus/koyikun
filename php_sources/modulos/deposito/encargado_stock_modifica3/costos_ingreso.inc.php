`<tr>
   <th>P./costo</th>
   <th>Desc1</th>
	<th>Desc2</th>
	<th>Desc3</th>
	<th>Desc4</th>
	<th>Desc5</th>
	<th>Desc6</th>
	<th>IVA</th>
	<th>Margen</th>
	<th>% Tarj.</th>
	<th>P./venta</th>
	<th>Fecha Fab</th>
	<th>Fecha Ger</th>
</tr>
                                                                                                                                                                                
<?php
$array_costos=array_costos($id_articulos);

//$array=$array_articulos["id"];

echo '<td><input type="text" name="precio_costo" id="precio_costo" size="4" onchange="cal3($array);" value="'.$array_costos["precio_costo"].'"></td>';
echo '<td><input type="text" name="des0a" id="des0a" size="4" onchange="cal3($array);" value="'.$array_costos["descuento1"].'"></td>';
echo '<td><input type="text" name="des0b" id="des0b" size="4" onchange="cal3($array);" value="'.$array_costos["descuento2"].'"></td>';
echo '<td><input type="text" name="des0c" id="des0c" size="4" onchange="cal3($array);" value="'.$array_costos["descuento3"].'"></td>';
echo '<td><input type="text" name="des0d" id="des0d" size="4" onchange="cal3($array);" value="'.$array_costos["descuento4"].'"></td>';
echo '<td><input type="text" name="des0e" id="des0e" size="4" onchange="cal3($array);" value="'.$array_costos["descuento5"].'"></td>';
echo '<td><input type="text" name="des0f" id="des0f" size="4" onchange="cal3($array);" value="'.$array_costos["descuento6"].'"></td>';
echo '<td><input type="text" name="iva" id="iva" size="4" onchange="cal3($array);" value="'.$array_costos["iva"].'"></td>';
echo '<td><input type="text" name="margen" id="margen" size="4" onchange="cal3($array);" value="'.$array_costos["margen"].'"></td>';
echo '<td><input type="text" name="tarjeta" id="tarjeta" size="4" value="'.$array_precios["porcentaje_tarjeta"].'"></td>';
echo '<td><input type="text" name="precio_venta" id="precio_venta" size="8" value="'.$precio_venta.'"></td>';

function array_costos($id_articulo){
 $q='select * from costos where id_articulos="'.$id_articulo.'"';
 $r=mysql_query($q);
 echo "rows: ".mysql_num_rows($r);
 $array=mysql_fetch_array($r);
 return $array;
}

?>
