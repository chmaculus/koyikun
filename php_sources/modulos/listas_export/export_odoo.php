<?php

// error_reporting(E_ERROR);
// ini_set("display_errors", 1);

include_once("../../includes/connect.php");
//include_once("../../includes/funciones_costos.php");

$fecha=date("Y-n-d");
$hora=date("H_i_s");

$user_path='/var/www/html/listas/';


$q0='select distinct marca from articulos where marca !=""';
$res0=mysql_query($q0);
//echo $q0." ".mysql_num_rows($res).chr(10);

#----------------------------------------------------------------------------------------------------
while($arr0=mysql_fetch_array($res0)){
	echo $arr0["marca"].chr(10);
	
	$aa=str_replace("'"," ",$arr0["marca"]);
	$aa=str_replace('"'," ",$aa);
	$nombre_archivo=$aa.'.csv';
	$fopen = fopen($user_path.$nombre_archivo, 'w+');

        // Nombre	
        // Referencia interna
        // Precio de venta	
        // Coste	
        // Disponible en TPV	
        // Categoría del TPV/Categoría padre/Categoría padre	
        // Categoría del TPV/Categoría padre/Categorías hijas	
        // Categoría del Producto/Categoría padre/Categoría padre
        // Categoría del Producto/Categoría padre/Categorías hijas

        // Categoría del Producto/Categorías hijas/Categoría padre	
        // Categoría del Producto/Categorías hijas/Categorías hijas	
        // Categoría del Producto/Nombre	
        // Código de barras	
        // Nombre mostrado

	$header = '"'.convert_charset("Nombre").'"';
	$header .= ';"'.convert_charset("Referencia interna").'"';
	$header .= ';"'.convert_charset("Precio de venta").'"';
	$header .= ';"'.convert_charset("Coste").'"';
	$header .= ';"'.convert_charset("Disponible en TPV").'"';
	$header .= ';"'.convert_charset("Categoría del Producto/Categoría padre/Categoría padre").'"';
	$header .= ';"'.convert_charset("Categoría del Producto/Categoría padre/Categorías hijas").'"';
	$header .= ';"'.convert_charset("Categoría del TPV/Categoría padre/Categoría padre").'"';
	$header .= ';"'.convert_charset("Categoría del TPV/Categoría padre/Categorías hijas").'"';
	$header .= ';"'.convert_charset("Categoría del Producto/Categorías hijas/Categoría padre").'"';
	$header .= ';"'.convert_charset("Categoría del Producto/Categorías hijas/Categorías hijas").'"';
	$header .= ';"'.convert_charset("Categoría del Producto/Nombre").'"';
	$header .= ';"'.convert_charset("Código de barras").'"';
	$header .= ';"'.convert_charset("Descripción").'"';
	$header .= chr(10);

    fwrite($fopen, $header);

	$query='select * from articulos where marca="'.$arr0["marca"].'" order by clasificacion, subclasificacion, contenido, presentacion, descripcion';
	$result = mysql_query($query)or die(mysql_error());
	$rows2=mysql_num_rows($result);
	//echo "rows2: ".$rows2.$query.chr(10);
	//echo $query.chr(10); 
	
	while($array_articulo=mysql_fetch_array($result)){
		$array_costo=array_costo( $array_articulo["id"] );
		$precio=calcula_precio_venta( $array_costo );
		$costo=calcula_precio_costo( $array_costo );
	
       	$linea='"'.$array_articulo["marca"].'"';
		$linea.=';"'.$array_articulo["codigo_interno"].'"';
		$linea.=';"'.$precio.'"';
		$linea.=';"'.$costo.'"';
		$linea.=';"1"';
		$linea.=';"'.$array_articulo["clasificacion"].'"';
		$linea.=';"'.$array_articulo["subclasificacion"].'"';
		$linea.=';"'.$array_articulo["clasificacion"].'"';
		$linea.=';"'.$array_articulo["subclasificacion"].'"';
		$linea.=';"'.$array_articulo["clasificacion"].'"';
		$linea.=';"'.$array_articulo["subclasificacion"].'"';
		$linea.=';"'.$array_articulo["marca"].'"';
		$linea.=';"'.$array_articulo["codigo_barra"].'"';
		$linea.=';"'.str_replace('"','',$array_articulo["descripcion"]).' '.$array_articulo["contenido"].' '.$array_articulo["presentacion"].'"';
//		$linea.=';"'.$array_articulo["id"].'.jpg"';

		$linea.=chr(10);
		$data = $linea;

		fwrite($fopen, $data);

	}
	fclose($fopen);

}
#----------------------------------------------------------------------------------------------------



#-----------------------------------------------------------------
function get_listas_porcentaje($id_articulos, $id_lista){
        $query='select * from listas_porcentaje where id_lista="'.$id_lista.'" and id_articulos="'.$id_articulos.'"';
        $result=mysql_query($query);
        if(mysql_error()){
                echo mysql_error();
        }
        $rows=mysql_num_rows($result);
        if($rows==1){
                $array_listas=mysql_fetch_array($result);
                $array_listas["rows"];
        }else{
                $array_listas["porcentaje"]=0;
                $array_listas["rows"];
        }
return $array_listas;
}

#-----------------------------------------------------------------


#-----------------------------------------------------------------
function categoria_web($id_categorias_web){
	$query='select * from categorias_web where id="'.$id_categorias_web.'"';
	$array_categorias_web=mysql_fetch_array(mysql_query($query));
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
	return $array_categorias_web;
}
#-----------------------------------------------------------------


#---------------------------------------------------------------------------------------------
function array_costo($id_articulos){
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
	//$temp1=( ( $temp1 * $array_costos["iva"] ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * $array_costos["margen"] ) / 100 )+ $temp1;
	return round($temp1,2);
}
#---------------------------------------------------------------------------------------------


#---------------------------------------------------------------------------------------------
function calcula_precio_costo( $array_costos ){
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
	//$temp1=( ( $temp1 * $array_costos["margen"] ) / 100 )+ $temp1;
	return round($temp1,2);
}
#---------------------------------------------------------------------------------------------


#---------------------------------------------------------------------------------------------
function convert_charset($string){
	return mb_convert_encoding($string, "ISO-8859-1");
	//return $string;
}
#---------------------------------------------------------------------------------------------




?>