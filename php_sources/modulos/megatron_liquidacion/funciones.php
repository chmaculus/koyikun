<?php
#-----------------------------------------------------------------
function calcula_total_marca( $sucursal, $marca, $fecha_desde, $fecha_hasta){
	$query='select sum( cantidad * precio_unitario ) from ventas where marca="'.$marca.'" and sucursal="'.$sucursal.'" and fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'"';
	$result=mysql_query($query)or die(mysql_error());
	$total=mysql_result($result,0);	
return $total;
}				
#-----------------------------------------------------------------

#-----------------------------------------------------------------
#calcula el total de ventas de un vendedor en un rango de fechas especificado 
function calcula_total_vendedor($vendedor, $fecha_desde, $fecha_hasta){
	$query='select sum( cantidad * precio_unitario ) from ventas where vendedor="'.$vendedor.'" and fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'"';
	$result=mysql_query($query)or die(mysql_error());
	$total=mysql_result($result,0);	
return $total;
}				
#-----------------------------------------------------------------


#-----------------------------------------------------------------
#tabla comisiones 
function calcula_total_mes($vendedor, $mes_anio ){
	$query='select sum(total) from comisiones_vendedores where vendedor="'.$vendedor.'" and fecha like "'.$mes_anio.'%"';
	$result=mysql_query($query)or die(mysql_error());
	$total=mysql_result($result,0);	
return $total;
}				
#-----------------------------------------------------------------


#-----------------------------------------------------------------
#tabla comisiones 
function lineas_vendedor($vendedor, $mes_anio ){
	$query='select distinct linea from comisiones_vendedores where vendedor="'.$vendedor.'" and fecha like "'.$mes_anio.'%" order by linea';
	$result=mysql_query($query)or die(mysql_error());
	while($row=mysql_fetch_array($result)){
		$total_linea=calcula_total_linea_xmes($vendedor, $row[0], $mes_anio );
		echo "<tr>";
		echo "<td>total_linea</td><td>".$row[0]."</td><td>".str_replace('.' , ',' , $total_linea)."</td>".chr(13);
		echo "</tr>";
	}
}				
#-----------------------------------------------------------------

#-----------------------------------------------------------------
#tabla comisiones 
function calcula_total_linea_xmes($vendedor, $linea, $mes_anio ){
	$query='select sum(total) from comisiones_vendedores where vendedor="'.$vendedor.'" and fecha like "'.$mes_anio.'%" and linea="'.$linea.'"';
	$result=mysql_query($query)or die(mysql_error());
	$array=mysql_fetch_array($result);
	return $array[0];
}				
#-----------------------------------------------------------------



?>