<?php
include_once("../../includes/connect.php");
include_once("../../includes/funciones_costos.php");

$fecha=date("Y-n-d");
$hora=date("H_i_s");

$user_path='/var/www/html/listas/';


	
	//$aa=str_replace("'"," ",$arr0["marca"]);
	// $aa=str_replace('"'," ",$aa);
	$nombre_archivo='listas_odoo.csv';
	$fopen = fopen($user_path.$nombre_archivo, 'w');

	$header = '"ID"';
	$header .= ';"Codigo"';
	$header .= ';"Marca"';
	$header .= ';"Descripcion"';
	$header .= ';"Color"';
	$header .= ';"Contenido"';
	$header .= ';"Presentacion"';
	$header .= ';"clasificacion"';
	$header .= ';"Sub clasificacion"';
	$header .= ';"Codigo barra"';
	$header .= ';"Costo"';
	$header .= ';"Des1"';
	$header .= ';"Des2"';
	$header .= ';"Des3"';
	$header .= ';"Des4"';
	$header .= ';"Des5"';
	$header .= ';"Des6"';
	$header .= ';"IVA"';
	$header .= ';"Margen"';
	$header .= ';"Descuento"';
	$header .= ';"Contado"';
	$header .= chr(10);
	fwrite($fopen, $header);

	$query='select * from articulos where marca!="" order by marca, clasificacion, subclasificacion, contenido, presentacion, descripcion';
	$result = mysql_query($query)or die(mysql_error());
	$rows2=mysql_num_rows($result);
	//echo "rows2: ".$rows2.$query.chr(10);
	//echo $query.chr(10); 
	


	while($array_articulo=mysql_fetch_array($result)){

		$array_costo=array_costo( $array_articulo["id"] );
		
		$precio=calcula_precio_venta( $array_costo );

		// $porc_peluquero=get_listas_porcentaje($array_articulo["id"], 4);
		// $porc_mayorista=get_listas_porcentaje($array_articulo["id"], 5);

		// $peluquero=((($precio * $porc_peluquero["porcentaje"])/100) + $precio) ;
		// $mayorista=((($precio * $porc_mayorista["porcentaje"])/100) + $precio) ;

		$linea='"'.$array_articulo["id"].'"';
		$linea.=';"'.$array_articulo["codigo_interno"].'"';
		$linea.=';"'.strtoupper($array_articulo["marca"]).'"';
		$linea.=';"'.str_replace('"','',strtoupper($array_articulo["descripcion"])).'"';
		$linea.=';"'.str_replace('"','',strtoupper($array_articulo["color"])).'"';
		$linea.=';"'.strtoupper($array_articulo["contenido"]).'"';
		$linea.=';"'.strtoupper($array_articulo["presentacion"]).'"';
		$linea.=';"'.strtoupper($array_articulo["clasificacion"]).'"';
		$linea.=';"'.strtoupper($array_articulo["subclasificacion"]).'"';
		$linea.=';"'.strtoupper($array_articulo["codigo_barra"]).'"';
		$linea.=';"'.elimina_decimal($array_costo["precio_costo"]).'"';
		$linea.=';"'.$array_costo["descuento1"].'"';
		$linea.=';"'.$array_costo["descuento2"].'"';
		$linea.=';"'.$array_costo["descuento3"].'"';
		$linea.=';"'.$array_costo["descuento4"].'"';
		$linea.=';"'.$array_costo["descuento5"].'"';
		$linea.=';"'.$array_costo["descuento6"].'"';
		$linea.=';"'.str_replace(".", ",", $array_costo["iva"]).'"';
		$linea.=';"'.$array_costo["margen"].'"';
		$linea.=';"'.elimina_decimal(trae_descuento($array_costo["margen"])).'"';
		$linea.=';"'.elimina_decimal($precio).'"';


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


#-----------------------------------------------------------------
function categoria_web($id_categorias_web){
	$query='select * from categorias_web where id="'.$id_categorias_web.'"';
	$array_categorias_web=mysql_fetch_array(mysql_query($query));
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
	return $array_categorias_web;
}
#-----------------------------------------------------------------


function elimina_decimal($value){
	// return $value;
    $aa=explode(".",$value);
    // echo "val $value | $aa[0]\n";
    return $aa[0];
}

function trae_descuento($margen){
    $q='select descuento from margenes_descuentos where margen='.$margen;
    $res=mysql_query($q);
    if(mysql_error()){
        echo $q."\n";
        echo mysql_error()."\n";
    }
    $rows=mysql_num_rows($res);
    if($rows<1){
        echo "rows: $rows \n";
    }
    $r=mysql_result($res,0,0);
    return $r;
}

?>