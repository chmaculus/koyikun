<?php

		$linea.='"$array_articulo["id"].",';
		$linea.=',"$array_articulo["codigo_interno"].",';
		$linea.=',"$array_articulo["marca"].",';
		$linea.=',"$array_articulo["descripcion"].",';
		$linea.=',"$array_articulo["contenido"].",';
		$linea.=',"$array_articulo["presentacion"].",';
		$linea.=',"$array_articulo["clasificacion"].",';
		$linea.=',"$array_articulo["subclasificacion"].",';
		$linea.=',"$array_articulo["id"].".jpg</td>";

		$linea.=',"str_replace('.',',',round($precio,2)).",';
		$linea.=',"str_replace('.',',',round($tarjeta,2)).",';

		$linea.=',"str_replace('.',',',round($peluquero,2)).",';
		$linea.=',"str_replace('.',',',round($mayorista,2)).",';

		if($array_articulo["id_web"]!=""){
			$array_categoria=categoria_web($array_articulo["id_web"]);
			$linea.=',"$array_categoria["categoria"].",';
			$linea.=',"$array_categoria["subcategoria"]."';
		}else{
			$linea.=",";
			$linea.=",";
		}

		$linea.=chr(10).chr(13);
		$data = $linea;
?>