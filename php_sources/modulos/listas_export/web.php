<?php
include_once("../../includes/connect.php");
include_once("../../includes/funciones_costos.php");

$fecha=date("Y-n-d");
$hora=date("H_i_s");

$user_path='/var/www/temp/listas/';
#$user_path='/tmp/';


	$nombre_archivo='web.html';
	$fopen = fopen($user_path.$nombre_archivo, 'w');

	$header='<html>
		<head>
		<title>Lista de precios</title>
		</head>
		<table border="1">
	';

	$header_cierra="</table>";

	$header .= "<tr>";
	$header .= "<td>ID</td>";
	$header .= "<td>Codigo</td>";
	$header .= "<td>Marca</td>";
	$header .= "<td>Descripcion</td>";
	$header .= "<td>Contenido</td>";
	$header .= "<td>Presentacion</td>";
	$header .= "<td>clasificacion</td>";
	$header .= "<td>Sub clasificacion</td>";
	$header .= "<td>Imagen</td>";
	$header .= "<td>Contado</td>";
	$header .= "<td>Tarjeta</td>";
	$header .= "<td>Peluquero</td>";
	$header .= "<td>Mayorista</td>";
	$header .= "<td>Categoria Web</td>";
	$header .= "<td>Sub-categoria Web</td>";
	fwrite($fopen, $header);

	$query='select * from articulos order by marca, clasificacion, subclasificacion, contenido, presentacion, descripcion';
	$result = mysql_query($query)or die(mysql_error());
	$rows2=mysql_num_rows($result);
	//echo "rows2: ".$rows2.$query.chr(10);
	//echo $query.chr(10); 
	


	while($array_articulo=mysql_fetch_array($result)){
		$array_costo=array_costo( $array_articulo["id"] );
		
		$precio=calcula_precio_venta( $array_costo );
		$tarjeta=($precio * 1.2) ;

		$porc_peluquero=get_listas_porcentaje($array_articulo["id"], 4);
		$porc_mayorista=get_listas_porcentaje($array_articulo["id"], 5);

		$peluquero=((($precio * $porc_peluquero["porcentaje"])/100) + $precio) ;
		$mayorista=((($precio * $porc_mayorista["porcentaje"])/100) + $precio) ;

		$linea="<tr>";

		$linea.="<td>".$array_articulo["id"]."</td>";
		$linea.="<td>".$array_articulo["codigo_interno"]."</td>";
		$linea.="<td>".$array_articulo["marca"]."</td>";
		$linea.="<td>".$array_articulo["descripcion"]."</td>";
		$linea.="<td>".$array_articulo["contenido"]."</td>";
		$linea.="<td>".$array_articulo["presentacion"]."</td>";
		$linea.="<td>".$array_articulo["clasificacion"]."</td>";
		$linea.="<td>".$array_articulo["subclasificacion"]."</td>";
		$linea.="<td>".$array_articulo["id"].".jpg</td>";

		$linea.="<td>".str_replace('.',',',round($precio,2))."</td>";
		$linea.="<td>".str_replace('.',',',round($tarjeta,2))."</td>";

		$linea.="<td>".str_replace('.',',',round($peluquero,2))."</td>";
		$linea.="<td>".str_replace('.',',',round($mayorista,2))."</td>";

		if($array_articulo["id_web"]!=""){
			$array_categoria=categoria_web($array_articulo["id_web"]);
			$linea.="<td>".$array_categoria["categoria"]."</td>";
			$linea.="<td>".$array_categoria["subcategoria"]."</td>";
		}else{
			$linea.="<td></td>";
			$linea.="<td></td>";
		}

		$linea.="</tr>".chr(10);
		$data = $linea;
		fwrite($fopen, $data);

}
	$header_cierra="</table>";
	fwrite($fopen, $header_cierra);
	fclose($fopen);

#----------------------------------------------------------------------------------------------------



/*
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

*/


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

?>