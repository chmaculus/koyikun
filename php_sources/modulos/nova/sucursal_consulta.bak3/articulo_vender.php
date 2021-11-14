<?php 
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");
include_once("../../includes/funciones_articulos.php");
include_once("../includes/funciones_varias.php");
include_once("funciones_precios.php");
include_once("./includes/funciones_promocion.php");

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

$fecha=date("Y-n-d");

$array_articulos=detalle_articulo($id_articulos);
$array_precios=precio_sucursal2($id_articulos,$id_sucursal);










	#------------------------------------------------------------
	if($array_precios["promocion"]=="S"){
		$array_promo=get_promo( $id_articulos, $id_sucursal);
		$epoch_fecha_fin=strtotime($array_promo["fecha_finaliza"]);
		$epoch_fecha=strtotime($fecha);

		if($array_promo["habilitado"]=="S"){
			if($epoch_fecha_fin > $epoch_fecha ){
				//es promo
				$contado = $array_promo["precio_promocion"];
				$promocion="  **PROMO AF**";
				$tr='<tr class="special">';
				$promo="S";
				
			}else{
				//promo vencida
				$promo="N";
				$contado=$array_precios["precio_base"];
				$qq='update precios set promocion="N" where id_articulo="'.$row["id"].'" and id_sucursal="'.$id_sucursal.'"';
				//echo "q: ".$qq."<br>";
				mysql_query($qq);
			}
		}





	}	
	#------------------------------------------------------------





/*
		echo "idsession: ".$id_session."<br>";
		echo "id_suc: ".$id_sucursal."<br>";
		echo "a: ".$fecha."<br>";
		echo "query: ".$array_promo["query"]."<br>";
		echo "b: ".$array_promo["fecha_finaliza"]."<br>";
		echo "c: ".$array_promo["habilitado"]."<br>";
		echo "fecha: ".strtotime($fecha)."<br>";
		echo "fecha_fin: ".strtotime($array_promo["fecha_finaliza"])."<br>";
		echo "qq: ".$qq."<br>";

*/



$query='insert into ventas_temp2 set id_session="'.$id_session.'",
												codigo_interno="'.mysql_real_escape_string($array_articulos["codigo_interno"]).'",
												marca="'.mysql_real_escape_string($array_articulos["marca"]).'",
												descripcion="'.mysql_real_escape_string($array_articulos["descripcion"]).$promo_af.'",
												contenido="'.mysql_real_escape_string($array_articulos["contenido"]).'",
												presentacion="'.mysql_real_escape_string($array_articulos["presentacion"]).'",
												clasificacion="'.mysql_real_escape_string($array_articulos["clasificacion"]).'",
												subclasificacion="'.mysql_real_escape_string($array_articulos["subclasificacion"]).'",
												codigo_barra="'.$array_articulos["codigo_barra"].'",
												id_sucursal="'.$id_sucursal.'",
												id_articulos="'.$id_articulos.'",
												precio="'.$contado.'",
												cantidad="1",
												session_finaliza="'.$finaliza.'",
												promocion="'.$promo.'"
												
												';


echo $query."<br>";
mysql_query($query)or die(mysql_error()." - ".$query);

elimina_duplicados($id_session);


/*
echo "aa:".$array_precios["precio_base"]."<br>";
echo "aa:".$contado."<br>";

echo "id_articulos: ".$id_articulos."<br>";
echo "contado: ".$contado."<br>";
echo "query: ".$query."<br>";
exit;
*/

Header ("location: venta_actual.php");
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
