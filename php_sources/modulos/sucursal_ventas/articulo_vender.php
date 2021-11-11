<?php 
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");
include_once("../../includes/funciones_articulos.php");
include_once("../../includes/funciones_precios.php");

$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="2"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 


if($_GET["id_articulo"]){
	$id_articulos=$_GET["id_articulo"];
}else{
	exit;
}
$id_session=$_COOKIE["id_session"];
$id_sucursal=$_COOKIE["id_sucursal"];

$array_articulos=detalle_articulo($id_articulos);
$array_precios=array_precios($id_articulos,$id_sucursal);

if($array_precios["promocion"]=="S"){
 $promocion="S";
 $promo_af=" ** Promo AF";
}else{
 $promocion="N";
 $promo_af="";
}


$query='insert into ventas_temp2 set id_session="'.$id_session.'",
												codigo_interno="'.str_replace('"','\\"',$array_articulos["codigo_interno"]).'",
												marca="'.str_replace('"','\\"',$array_articulos["marca"]).'",
												descripcion="'.str_replace('"','\\"',$array_articulos["descripcion"]).$promo_af.'",
												contenido="'.str_replace('"','\\"',$array_articulos["contenido"]).'",
												presentacion="'.str_replace('"','\\"',$array_articulos["presentacion"]).'",
												clasificacion="'.str_replace('"','\\"',$array_articulos["clasificacion"]).'",
												subclasificacion="'.str_replace('"','\\"',$array_articulos["subclasificacion"]).'",
												codigo_barra="'.$array_articulos["codigo_barra"].'",
												id_sucursal="'.$id_sucursal.'",
												id_articulos="'.$id_articulos.'",
												cantidad="1",
												session_finaliza="'.$finaliza.'",
												promocion="'.$promocion.'"
												
												';
//echo $query."<br>";
mysql_query($query)or die(mysql_error()." - ".$query);

elimina_duplicados($id_session);

Header ("location: venta_actual.php");
//include_once ("venta_actual.php");
exit;

#------------------------------------------------------
function elimina_duplicados( $id_session ){
	$query='select * from ventas_temp2 where id_session="'.$id_session.'" order by id_articulos';
	$result=mysql_query($query) or die(mysql_error());
	while($row=mysql_fetch_array($result)){

		if($id_articulos==$row["id_articulos"]){
			$q='delete from ventas_temp2 where id="'.$row["id"].'"';
			//echo $q."<br>";
			mysql_query($q);
		}else{
			$id_articulos=$row["id_articulos"];
		}
	}
}
#------------------------------------------------------
?>