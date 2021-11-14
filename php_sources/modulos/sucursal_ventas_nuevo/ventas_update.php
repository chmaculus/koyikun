<?php 
include_once("../../includes/connect.php");
include_once("../../includes/funciones_costos.php");
include_once("../../includes/funciones_precios.php");
include_once("../../includes/funciones_promocion.php");
include_once("../../includes/funciones_valores.php");
include_once("../../includes/funciones_varias.php");
include_once("../../includes/funciones_ventas.php");
include_once("../../includes/funciones_stock.php");
include_once("../../includes/funciones_articulos.php");
//include("cabecera.inc.php");

$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="2"){
	header('Location: login_nologin.php?nologin=6');
	exit;
} 


$id_session=$_COOKIE["id_session"];
$id_sucursal=$_COOKIE["id_sucursal"];

$nombre_sucursal=nombre_sucursal($id_sucursal);

$porcentaje_tarjeta=get_valor(7);
#-----------------------------------------
if($_POST["accion"]=="ACTUALIZAR"){
	include("actualizar.inc.php");
	Header ("location: venta_actual.php");
	exit;
}
#-----------------------------------------



#-----------------------------------------
if($_POST["accion"]=="FINALIZAR"){

	//include_once("cabecera.inc.php");
	include("finalizar.inc.php");
	#Header ("location: ../sucursal_novedades/novedades.php");
	exit;   	

}
#-----------------------------------------


#-----------------------------------------
if($_POST["accion"]=="CANCELAR"){
	$query='delete from ventas_temp where id_session="'.$id_session.'"';
	mysql_query($query)or die(mysql_error()." - ".$query);

#Header ("location: ../sucursal_consulta/consulta_precios.php");
exit;
}
#-----------------------------------------


#-----------------------------------------
if($_POST["accion"]=="vender"){
	if($_POST["id_articulo"]){
		$id_articulos=$_POST["id_articulo"];
	}else{
		exit;
	}

	$array_ventas_temp2=array_articulos($id_articulos);

	$query='insert into ventas_temp2 set
		id_session="'.$id_session.'",
		id_sucursal="'.$id_sucursal.'",
		id_articulos="'.$array_ventas_temp2["id_articulos."].'",
		codigo_interno="'.$array_ventas_temp2["codigo_interno."].'",
		marca="'.$array_ventas_temp2["marca."].'",
		descripcion="'.$array_ventas_temp2["descripcion."].'",
		contenido="'.$array_ventas_temp2["contenido."].'",
		presentacion="'.$array_ventas_temp2["presentacion."].'",
		codigo_barra="'.$array_ventas_temp2["codigo_barra."].'",
		clasificacion="'.$array_ventas_temp2["clasificacion."].'",
		subclasificacion="'.$array_ventas_temp2["subclasificacion."].'",
		cantidad="1",
		session_finaliza="'.$session_finaliza.'"';
	mysql_query($query);

	if(mysql_error()){
   	 echo $query."<br>";
    	echo mysql_error()."<br>";
	}

	$query='insert into ventas_temp set id_session="'.$id_session.'",
													id_sucursal="'.$id_sucursal.'",
													id_articulos="'.$id_articulos.'",
													cantidad="1"
													';
	mysql_query($query)or die(mysql_error()." - ".$query);

}
#-----------------------------------------






#-------------------------------------------------------------------------------------------------
#esta funcion a agrega los articulos de la tabla ventas_temp a la tabla ventas
function venta_temp_ventas($cantidad, $id_articulos, $numero_venta, $tipo_pago, $sucursal, $vendedor, $fecha, $hora, $id_sucursal ){
	$descripcion=detalle_articulo($id_articulos);
	$array_precios=precio_sucursal($id_articulos, $id_sucursal);

	$contado=$array_precios["precio_base"];
	$tarjeta=( ( $array_precios["precio_base"] * $porcentaje_tarjeta ) / 100 ) + $array_precios["precio_base"];
	

	$promocion="";
	$tr='<tr>';

	if($array_precios["promocion"]=="S"){
		$array_promocion=get_promo( $row["id_articulos"], $id_sucursal );
		$promo=$array_promocion["precio_promocion"];

		$contado = $promo;
		$tarjeta=$promo * ( $porcentaje_tarjeta / 100 ) + $promo;
		$promocion="  **PROMO AF**";
		$tr='<tr class="special">';
	}

//	echo $tr;


	if($tipo_pago=="contado"){
		$precio=$contado;
	}
	if($tipo_pago=="debito"){
		$precio=$contado;
	}
	if($tipo_pago=="tarjeta"){
		$precio=$tarjeta;
	}
	$costo=calcula_precio_costo( $id_articulos );
	$query='insert into ventas set cantidad="'.$cantidad.'",
												numero_venta="'.$numero_venta.'",
												marca="'.comilla($descripcion["marca"]).'",
												descripcion="'.comilla($descripcion["descripcion"]).$promocion.'",
												clasificacion="'.comilla($descripcion["clasificacion"]).'",
												subclasificacion="'.comilla($descripcion["subclasificacion"]).'",
												precio_unitario="'.$precio.'",
												tipo_pago="'.$tipo_pago.'",
												sucursal="'.$sucursal.'",
												vendedor="'.$vendedor.'",
												fecha="'.$fecha.'",
												hora="'.$hora.'",
												id_articulos="'.$id_articulos.'",
												contenido="'.comilla($descripcion["contenido"]).'",
												presentacion="'.comilla($descripcion["presentacion"]).'",
												costo="'.$costo.'"
												';

	mysql_query($query)or die(mysql_error()." ".$query);
	
	
	$id_sucursal=id_sucursal($sucursal);
	seguimiento_x_venta($id_articulos, $cantidad, $id_sucursal, $numero_venta, $vendedor);	
	
	

}
#-------------------------------------------------------------------------------------------------


?>
