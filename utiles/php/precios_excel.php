<?php

echo '<table border="1">';
echo "<tr>";
echo "<td>id</td>";
echo "<td>codigo_interno</td>";
echo "<td>marca</td>";
echo "<td>descripcion</td>";
echo "<td>contenido</td>";
echo "<td>presentacion</td>";
echo "<td>clasificacion</td>";
echo "<td>subclasificacion</td>";
echo "<td>codigo_barra</td>";
echo "<td>Precio</td>";
echo "<td>Fecha</td>";
echo "<td>Hora</td>";
echo "<td>Costo</td>";
echo "</tr>".chr(13);

include("../../includes/connect.php");

$q1='select * from articulos order by marca, clasificacion, subclasificacion, descripcion';
$result=mysql_query($q1);
while($row=mysql_fetch_array($result)){
	$array_costo=precio_costo( $row["id"] );
	$precio_venta=calcula_precio_venta( $array_costo );

	if( $array_costo["fecha"] < $array_costo["fecha_gerencia"] ){
		$fecha=$array_costo["fecha_gerencia"];
		$hora=$array_costo["hora_gerencia"];
	}else{
		$fecha=$array_costo["fecha"];
		$hora=$array_costo["hora"];
	}

	if ( $array_costo["precio_costo"] > 0 ){
		$precio=$precio_venta;
		$aaa="C/C";
	}else{
		 $array_precios=precio_sucursal( $row["id"], 1 );
		 $precio=$array_precios["precio_base"];
		 $fecha=$array_precios["fecha"];
		 $hora=$array_precios["hora"];
		 $aaa="S/C";
	}
	echo "<tr>";
	echo "<td>". $row["id"]."</td>";
	echo "<td>". $row["codigo_interno"]."</td>";
	echo "<td>". $row["marca"]."</td>";
	echo "<td>". $row["descripcion"]."</td>";
	echo "<td>". $row["contenido"]."</td>";
	echo "<td>". $row["presentacion"]."</td>";
	echo "<td>". $row["clasificacion"]."</td>";
	echo "<td>". $row["subclasificacion"]."</td>";
	echo "<td>". $row["codigo_barra"]."</td>";
	echo "<td>". str_replace( '.' , ',' ,$precio)."</td>";
	echo "<td>". $fecha."</td>";
	echo "<td>". $hora."</td>";
	echo "<td>". $aaa."</td>";
	
	echo "</tr>".chr(13);

}

#---------------------------------------------------------------------------------------------
function precio_costo($id_articulos){
	$query='select * from costos where id_articulos="'.$id_articulos.'"';
	$result=mysql_query($query);
	$rows=mysql_num_rows($result);
	if($rows=="1"){
		$array=mysql_fetch_array($result);
		return $array;
	}else{
		return "0";
	}
}
#---------------------------------------------------------------------------------------------


#---------------------------------------------------------------------------------------------
function calcula_precio_venta( $array_costos ){
	$temp1=( ( $array_costos["precio_costo"] * ( $array_costos["descuento1"] * -1 ) ) / 100 )+ $array_costos["precio_costo"];
	$temp1=( ( $temp1 * ( $array_costos["descuento2"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento3"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento4"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento5"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento6"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento7"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento8"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento9"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento10"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * $array_costos["iva"] ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * $array_costos["margen"] ) / 100 )+ $temp1;
	return round($temp1,6);
}
#---------------------------------------------------------------------------------------------

#-----------------------------------------------------------------
function verifica_tabla_precios($id_articulos){
	$query='select id_articulo from precios where id_articulo="'.$id_articulos.'" and id_sucursal="1"';
	$rows=mysql_num_rows( mysql_query($query) );
	return $rows;
}
#-----------------------------------------------------------------

#---------------------------------------------------------------------------------------------
function precio_sucursal( $id_articulo, $id_sucursal ){
	$query='select * from precios where id_articulo="'.$id_articulo.'" and id_sucursal="'.$id_sucursal.'"';
	$res=mysql_query($query) or die(mysql_error()." ".$SCRIPT_NAME);
	$rows=mysql_num_rows($res);
	if($rows==1){
		$array_precios=mysql_fetch_array($res);
		$array_precios["query"]=$query;
		$array_precios["rows"]=$rows;
		return $array_precios;		
	}
	if($rows<1){
		$array_precios["precio_base"]="0";
		$array_precios["porcentaje_contado"]="0";
		$array_precios["porcentaje_tarjeta"]="0";
		$array_precios["rows"]=$rows;
		$array_precios["query"]=$query;
		return $array_precios;		
	}
return $array_precios;
}
#---------------------------------------------------------------------------------------------



?>