<?php
include_once("../../includes/connect.php");
include_once("../../includes/funciones_costos.php");

$fecha=date("Y-n-d");
$hora=date("H_i_s");

$user_path='/var/www/temp/listas/';


$q0='select distinct marca from articulos where marca !="" and id_web>=1';
$q0='select distinct marca from articulos where marca !=""';
$res0=mysql_query($q0);
//echo $q0." ".mysql_num_rows($res).chr(10);

#----------------------------------------------------------------------------------------------------
while($arr0=mysql_fetch_array($res0)){
	echo $arr0["marca"].chr(10);
	
	$aa=str_replace("'"," ",$arr0["marca"]);
	$aa=str_replace('"'," ",$aa);
	$nombre_archivo=$aa.'.csv';
	$fopen = fopen($user_path.$nombre_archivo, 'w');

	$header = '"ID"';
	$header .= ';"Codigo"';
	$header .= ';"Marca"';
	$header .= ';"Descripcion"';
	$header .= ';"Contenido"';
	$header .= ';"Presentacion"';
	$header .= ';"clasificacion"';
	$header .= ';"Sub clasificacion"';
	$header .= ';"Codigo barra"';
	$header .= ';"Imagen"';
	$header .= ';"Contado"';
	$header .= ';"Tarjeta"';
	$header .= ';"Peluquero"';
	$header .= ';"Mayorista"';
	$header .= ';"Publicado"';
	$header .= ';"Categoria Web"';
	$header .= ';"Sub-categoria Web"';
	$header .= chr(10);
	fwrite($fopen, $header);

	$query='select * from articulos where marca="'.$arr0["marca"].'" and id_web>=1 order by clasificacion, subclasificacion, contenido, presentacion, descripcion';
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

		$linea='"'.$array_articulo["id"].'"';
		$linea.=';"'.$array_articulo["codigo_interno"].'"';
		$linea.=';"'.$array_articulo["marca"].'"';
		$linea.=';"'.str_replace('"','',$array_articulo["descripcion"]).'"';
		$linea.=';"'.$array_articulo["contenido"].'"';
		$linea.=';"'.$array_articulo["presentacion"].'"';
		$linea.=';"'.$array_articulo["clasificacion"].'"';
		$linea.=';"'.$array_articulo["subclasificacion"].'"';
		$linea.=';"'.$array_articulo["codigo_barra"].'"';
		$linea.=';"'.$array_articulo["id"].'.jpg"';

		$linea.=';"'.str_replace(',','.',round($precio,2)).'"';
		$linea.=';"'.str_replace(',','.',round($tarjeta,2)).'"';

		$linea.=';"'.str_replace(',','.',round($peluquero,2)).'"';
		$linea.=';"'.str_replace(',','.',round($mayorista,2)).'"';

		$linea.=';"publish"';
		if($array_articulo["id_web"]!=""){
			$array_categoria=categoria_web($array_articulo["id_web"]);
			$linea.=';"'.strtoupper($array_categoria["categoria"]).'"';
			$linea.=';"'.strtoupper($array_categoria["subcategoria"]).'"';
		}else{
			$linea.=";";
			$linea.=";";
		}

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


?>