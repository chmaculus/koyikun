<tr>
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
$array_costos=array_costos($id_articulo);


echo '<td><input type="text" name="precio_costo'.$id_articulo.'" id="precio_costo'.$id_articulo.'" size="4" onchange="cal2($array);" value="'.$array_costos["precio_costo"].'"></td>';
echo '<td><input type="text" name="des0b'.$id_articulo.'" id="des0b'.$id_articulo.'" size="4" onchange="cal2('.$id_articulo.');" value="'.$array_costos["descuento2"].'"></td>';
echo '<td><input type="text" name="des0a'.$id_articulo.'" id="des0a'.$id_articulo.'" size="4" onchange="cal2('.$id_articulo.');" value="'.$array_costos["descuento1"].'"></td>';
echo '<td><input type="text" name="des0c'.$id_articulo.'" id="des0c'.$id_articulo.'" size="4" onchange="cal2('.$id_articulo.');" value="'.$array_costos["descuento3"].'"></td>';
echo '<td><input type="text" name="des0d'.$id_articulo.'" id="des0d'.$id_articulo.'" size="4" onchange="cal2('.$id_articulo.');" value="'.$array_costos["descuento4"].'"></td>';
echo '<td><input type="text" name="des0e'.$id_articulo.'" id="des0e'.$id_articulo.'" size="4" onchange="cal2('.$id_articulo.');" value="'.$array_costos["descuento5"].'"></td>';
echo '<td><input type="text" name="des0f'.$id_articulo.'" id="des0f'.$id_articulo.'" size="4" onchange="cal2('.$id_articulo.');" value="'.$array_costos["descuento6"].'"></td>';
echo '<td><input type="text" name="iva'.$id_articulo.'" id="iva" size="4" onchange="cal2('.$id_articulo.');" value="'.$array_costos["iva"].'"></td>';
echo '<td><input type="text" name="margen'.$id_articulo.'" id="margen'.$id_articulo.'" size="4" onchange="cal2('.$id_articulo.');" value="'.$array_costos["margen"].'"></td>';
echo '<td><input type="text" name="tarjeta" id="tarjeta" size="4" value="'.$array_precios["porcentaje_tarjeta"].'"></td>';
echo '<td><input type="text" name="precio_venta'.$id_articulo.'" id="precio_venta'.$id_articulo.'" size="8" value="'.$precio_venta.'"></td>';

function array_costos($id_articulo){
 $q='select * from costos where id_articulos="'.$id_articulo.'"';
 $r=mysql_query($q);
 echo "rows: ".mysql_num_rows($r);
 $array=mysql_fetch_array($r);
 return $array;
}

?>
