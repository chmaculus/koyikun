<?php
include_once("./includes/connect.php");
include_once("./includes/funciones_costos.php");

$fecha=date("Y-n-d");
$hora=date("H_i_s");

#$user_path='/var/www/temp/listas/';
$user_path='./';


	
	$aa=str_replace("'"," ",$arr0["marca"]);
	$aa=str_replace('"'," ",$aa);

	$nombre_archivo='listas_web_geneneral_nuevo.csv';
	$fopen = fopen($user_path.$nombre_archivo, 'w');

	$header = '"Identificador de URL"';
	$header .= ',"Nombre"';
	$header .= ',"Categorias"';
	$header .= ',"Precio"';
	$header .= ',"Precio promocional"';
	$header .= ',"Peso"';
	$header .= ',"Stock"';
	$header .= ',"SKU"';
	$header .= ',"Codigo de barras"';
	$header .= ',"Mostrar en tienda"';
	$header .= ',"Envio sin cargo"';
	$header .= ',"Descripcion"';
	$header .= ',"Tags"';
	$header .= ',"Titulo para SEO"';
	$header .= ',"Descripcion para SEO"';
	$header .= ',"Marca"';
	$header .= chr(10);
	fwrite($fopen, $header);

$query='select * from articulos where id_web>=1 and marca="EL GRAN BASTARDO" order by marca, clasificacion, subclasificacion, contenido, presentacion, descripcion';
$result = mysql_query($query)or die(mysql_error());
$rows2=mysql_num_rows($result);

	while($array_articulo=mysql_fetch_array($result)){

		$array_costo=array_costo( $array_articulo["id"] );
		
		$precio=calcula_precio_venta( $array_costo );
		$tarjeta=($precio * 1.2) ;

		$porc_peluquero=get_listas_porcentaje($array_articulo["id"], 4);
		$porc_mayorista=get_listas_porcentaje($array_articulo["id"], 5);

		$peluquero=((($precio * $porc_peluquero["porcentaje"])/100) + $precio) ;
		$mayorista=((($precio * $porc_mayorista["porcentaje"])/100) + $precio) ;

		$linea='"'.$array_articulo["id"].'"';//identificador URL

		#-----------------------------------------
		# descripcion
		$linea.=',"'.str_replace('"','',$array_articulo["descripcion"]).
		' - '.$array_articulo["color"].
		' - '.$array_articulo["contenido"].
		' - '.$array_articulo["presentacion"].'"';
		# fin descrpcion
		#-----------------------------------------



		#-------------------------------
		#categoria
		if($array_articulo["id_web"]!=""){
			$array_categoria=categoria_web($array_articulo["id_web"]);
			$linea.=',"'.strtoupper($array_categoria["categoria"]).' - ' . strtoupper($array_categoria["subcategoria"]).'"';
		}else{
			$linea.=",";
		}
		#fin categoria
		#-------------------------------

		$linea.=',"'.str_replace(',','.',round($precio,2)).'"';//precio
		$linea.=',"'.str_replace(',','.',round($peluquero,2)).'"';//precio promocional

//		$linea.=',"'.str_replace(',','.',round($tarjeta,2)).'"';
	//	$linea.=',"'.str_replace(',','.',round($mayorista,2)).'"';

		$linea.=',';//Peso
		$linea.=',';//Stock
		$linea.=',';//SKU
		$linea.=',"'.$array_articulo["codigo_barra"].'"';//codigo de barra
		$linea.=',"SI"';//mostrar en tienda
		$linea.=',"NO"';//envio sin cargo

		#-----------------------------------------
		# descrpcion
		$linea.=',"'.str_replace('"','',$array_articulo["descripcion"]).' - '.$array_articulo["color"].' - '.$array_articulo["contenido"].' - '.$array_articulo["presentacion"].'"';
		# fin descrpcion
		#-----------------------------------------

		$linea.=',"'.str_replace('"','',$array_articulo["descripcion"]).'"';//Tags
		$linea.=',"'.str_replace('"','',$array_articulo["descripcion"]).'"';//Titulo para SEO
		$linea.=',"'.str_replace('"','',$array_articulo["descripcion"]).'"';//Descripcion para SEO
		$linea.=';"'.$array_articulo["marca"].'"';



		$linea.=chr(10);
		$data = $linea;
		fwrite($fopen, $data);

	}
	fclose($fopen);


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