<?php
include_once("../../includes/connect.php");

$fecha=date("Y-n-d");
$hora=date("H_i_s");

$user_path='/var/www/temp/listas/';

#------------------------------------------------------
$res=mysql_query('select * from listas');
while($row=mysql_fetch_array($res)){
	$array_listas[]=$row;
}
#------------------------------------------------------






$q0='select distinct marca from articulos where marca !=""';
$res0=mysql_query($q0);
//echo $q0." ".mysql_num_rows($res).chr(10);

#----------------------------------------------------------------------------------------------------
while($arr0=mysql_fetch_array($res0)){
	echo $arr0["marca"].chr(10);
	
	$aa=str_replace("'"," ",$arr0["marca"]);
	$aa=str_replace('"'," ",$aa);
	$nombre_archivo=$aa.'.html';
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
	$header .= "<td>Precio</td>";
	$header .= "<td>Tarjeta</td>";
	#------------------------------
	foreach($array_listas as $listas){
		$header .= '<td>'.$listas["nombre"].'</td>';
	}
	#------------------------------
	$header .= chr(10);
	fwrite($fopen, $header);

	$query='select * from articulos where marca="'.$arr0["marca"].'" order by clasificacion, subclasificacion, contenido, presentacion, descripcion';
	$result = mysql_query($query)or die(mysql_error());
	$rows2=mysql_num_rows($result);

	while($array_articulo=mysql_fetch_array($result)){
		$array_costo=array_costo( $array_articulo["id"] );
		
		$precio=calcula_precio_venta( $array_costo );
		$tarjeta=($precio * 1.2) ;
		$linea="<tr>";

		$linea.="<td>".$array_articulo["id"]."</td>";
		$linea.="<td>".$array_articulo["codigo_interno"]."</td>";
		$linea.="<td>".$array_articulo["marca"]."</td>";
		$linea.="<td>".$array_articulo["descripcion"]."</td>";
		$linea.="<td>".$array_articulo["contenido"]."</td>";
		$linea.="<td>".$array_articulo["presentacion"]."</td>";
		$linea.="<td>".$array_articulo["clasificacion"]."</td>";
		$linea.="<td>".$array_articulo["subclasificacion"]."</td>";

		$linea.="<td>".str_replace('.',',',round($precio,2))."</td>";
		$linea.="<td>".str_replace('.',',',round($tarjeta,2))."</td>";

		#------------------------------
		#listas
		foreach($array_listas as $listas){
			$array_lista2=get_listas_porcentaje($array_articulo["id"], $listas["id"]);
			$porcentaje=$array_lista2["porcentaje"];
			$aaa=(($precio * $porcentaje) /100)+$precio;
			$linea.="<td>".str_replace('.',',',round($aaa,2))."</td>";
		}
		#------------------------------

		$linea.="</tr>".chr(10);
		$data = $linea;
		fwrite($fopen, $data);

}
	$header_cierra="</table>";
	fwrite($fopen, $header_cierra);
	fclose($fopen);

}
#----------------------------------------------------------------------------------------------------



#---------------------------------------------------------------------------------------------
function calcula_precio_venta( $array_costos ){
	$temp1=( ( $array_costos["precio_costo"] * ( $array_costos["descuento1"] * -1 ) ) / 100 )+ $array_costos["precio_costo"];
	$temp1=( ( $temp1 * ( $array_costos["descuento2"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento3"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento4"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento5"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento6"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento7"] * -1 ) ) / 100 )+ $temp1;
	//$temp1=( ( $temp1 * ( $array_costos["descuento8"] * -1 ) ) / 100 )+ $temp1;
	//$temp1=( ( $temp1 * ( $array_costos["descuento9"] * -1 ) ) / 100 )+ $temp1;
	//$temp1=( ( $temp1 * ( $array_costos["descuento10"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * $array_costos["iva"] ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * $array_costos["margen"] ) / 100 )+ $temp1;
	return round($temp1,6);
}
#---------------------------------------------------------------------------------------------

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

#-----------------------------------------------------------------
function get_listas_porcentaje($id_articulos, $id_lista){
        $query='select * from listas_porcentaje where id_lista="'.$id_lista.'" and id_articulos="'.$id_articulos.'"';
        $result=mysql_query($query);
        if(mysql_error()){
                echo mysql_error();
        }
        $rows=mysql_num_rows($result);
		if(isset($rows)){
			if($rows==1){
                $array_listas=mysql_fetch_array($result);
	            //$array_listas["rows"];
    	    }else{
                $array_listas["porcentaje"]=0;
                //$array_listas["rows"];
        	}
		} 
return $array_listas;
}

#-----------------------------------------------------------------

?>