<?php include("../../login/login_verifica.inc.php");

$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="0"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
}


include_once("cabecera.inc.php");

$count=0;

$fecha=date("Y-n-d");
$hora=date("H:i:s");

include_once("../../includes/connect.php");
include_once("../../includes/funciones_costos.php");
include_once("../../includes/funciones_precios.php");
include_once("../../includes/funciones_listas.php");


#---------------------------------------------------
if($_POST["detalle"] and $_POST["detalle"]!=""){
	$q='insert into costos_detalle set marca="'.$_POST["marca"].'", detalle="'.$_POST["detalle"].'", fecha="'.$fecha.'", hora="'.$hora.'"';
	mysql_query($q);
	$id_costos_detalle=mysql_insert_id($id_connection);
}else{
	$id_costos_detalle="";
}
#---------------------------------------------------






$query=base64_decode($_POST["query"]);
$result=mysql_query($query);
//echo "query: ".$query."<br>".chr(13);

#while---------
while($row=mysql_fetch_array($result)){
	$distinto=0;
	$array_precios=precio_sucursal( $row["id"], "1" );
	$array_costos=precio_costo( $row["id"] );



	#------------------------------
	if( $_POST["precio_costo".$row["id"]] != $array_costos["precio_costo"] ){
		$distinto=1;
	}
	if( $_POST["des0a".$row["id"]] != $array_costos["descuento1"] ){
		$distinto=1;
	}
	if( $_POST["des0b".$row["id"]] != $array_costos["descuento2"] ){
		$distinto=1;
	}
	if( $_POST["des0c".$row["id"]] != $array_costos["descuento3"] ){
		$distinto=1;
	}
	if( $_POST["des0d".$row["id"]] != $array_costos["descuento4"] ){
		$distinto=1;
	}
	if( $_POST["des0e".$row["id"]] != $array_costos["descuento5"] ){
		$distinto=1;
	}
	if( $_POST["des0f".$row["id"]] != $array_costos["descuento6"] ){
		$distinto=1;
	}
	if( $_POST["iva".$row["id"]] != $array_costos["iva"] ){
		$distinto=1;
	}
	if( $_POST["margen".$row["id"]] != $array_costos["margen"] ){
		$distinto=1;
	}
	#------------------------------

	echo "distinto: ".$distinto."<br>".chr(13);
	echo "ID: ".$row["id"]." precio_base: ".$array_precios["precio_base"]." post precio_venta: ".$_POST["precio_venta".$row["id"]]."<br>".chr(13);

	if( $distinto=="1" ){
		$costo_anterior=calcula_precio_costo( $row["id"] );
		verifica_tabla_costos( $row["id"] );
		verifica_tabla_precios( $row["id"], 1 );
		$count++;

		#---------------------------------------------------------------------------------------------
		if($_POST["tipo_cambio"]=="fabrica"){
			$query='update costos set 	precio_costo="'.$_POST["precio_costo".$row["id"]].'",
											descuento1="'.$_POST["des0a".$row["id"]].'",
											descuento2="'.$_POST["des0b".$row["id"]].'",
											descuento3="'.$_POST["des0c".$row["id"]].'",
											descuento4="'.$_POST["des0d".$row["id"]].'",
											descuento5="'.$_POST["des0e".$row["id"]].'",
											descuento6="'.$_POST["des0f".$row["id"]].'",
											descuento7="'.$_POST["des0g".$row["id"]].'",
											descuento8="'.$_POST["des0h".$row["id"]].'",
											descuento9="'.$_POST["des0i".$row["id"]].'",
											descuento10="'.$_POST["des0j".$row["id"]].'",
											iva="'.$_POST["iva".$row["id"]].'",
											margen="'.$_POST["margen".$row["id"]].'",
											fecha="'.$fecha.'",
											hora="'.$hora.'",
											modulo="24"
												where id_articulos="'.$row["id"].'"
											';
		}
		#---------------------------------------------------------------------------------------------

		#---------------------------------------------------------------------------------------------
		if($_POST["tipo_cambio"]=="gerencia"){
			$query='update costos set 	precio_costo="'.$_POST["precio_costo".$row["id"]].'",
											descuento1="'.$_POST["des0a".$row["id"]].'",
											descuento2="'.$_POST["des0b".$row["id"]].'",
											descuento3="'.$_POST["des0c".$row["id"]].'",
											descuento4="'.$_POST["des0d".$row["id"]].'",
											descuento5="'.$_POST["des0e".$row["id"]].'",
											descuento6="'.$_POST["des0f".$row["id"]].'",
											descuento7="'.$_POST["des0g".$row["id"]].'",
											descuento8="'.$_POST["des0h".$row["id"]].'",
											descuento9="'.$_POST["des0i".$row["id"]].'",
											descuento10="'.$_POST["des0j".$row["id"]].'",
											iva="'.$_POST["iva".$row["id"]].'",
											margen="'.$_POST["margen".$row["id"]].'",
											fecha_gerencia="'.$fecha.'",
											hora_gerencia="'.$hora.'"
												where id_articulos="'.$row["id"].'"
											';
		}
		#---------------------------------------------------------------------------------------------
		//echo "query: ".$query."<br>".chr(13);
		mysql_query($query)or die(mysql_error());
		if ($_POST["precio_costo".$row["id"]] > 0){
			$query='update precios set precio_base="'.$_POST["precio_venta".$row["id"]].'",
												porcentaje_contado="0", 
												porcentaje_tarjeta="'.$_POST["tarjeta".$row["id"]].'", 
												fecha="'.$fecha.'",
												hora="'.$hora.'" 
													where id_articulo="'.$row["id"].'"
												';
		}else{
			$query='update precios set precio_base="0",
												porcentaje_contado="0", 
												porcentaje_tarjeta="'.$_POST["tarjeta".$row["id"]].'", 
												fecha="1998-09-22",
												hora="11:22:33" 
													where id_articulo="'.$row["id"].'"
												';
		}
		//echo "query: ".$query."<br>".chr(13);
		mysql_query($query)or die(mysql_error());


	#----------------------------------------
	$array_costos["id_articulos"]=$row["id"];
	$array_costos["precio_costo"]=$_POST["precio_costo".$row["id"]];
	$array_costos["moneda"]="Pesos";
	$array_costos["descuento1"]=$_POST["des0a".$row["id"]];
	$array_costos["descuento2"]=$_POST["des0b".$row["id"]];
	$array_costos["descuento3"]=$_POST["des0c".$row["id"]];
	$array_costos["descuento4"]=$_POST["des0d".$row["id"]];
	$array_costos["descuento5"]=$_POST["des0e".$row["id"]];
	$array_costos["descuento6"]=$_POST["des0f".$row["id"]];
	$array_costos["iva"]=$_POST["iva".$row["id"]];
	$array_costos["margen"]=$_POST["margen".$row["id"]];
	$array_costos["fecha"]=$fecha;
	$array_costos["hora"]=$hora;
	#----------------------------------------





		#--------------------------------------------------
		#listas_porcentaje
		$aaa=listas_porcentaje_verifica( "2", $row["id"] );
		if($aaa==1){
			$query_lista='update listas_porcentaje set porcentaje="'.$_POST["tarjeta".$row["id"]].'" where id_articulos="'.$row["id"].'" and id_lista="2"';
		}else{
			$query_lista='insert into listas_porcentaje set porcentaje="'.$_POST["tarjeta".$row["id"]].'", id_articulos="'.$row["id"].'", id_lista="2"';
		}
		mysql_query($query_lista)or die(mysql_error());
		#--------------------------------------------------
		
		$costo_nuevo=calcula_precio_costo( $row["id"] );

		#------------------------------------------------------
		ingreso_seguimiento_costos($row["id"], $array_costos, $_POST["tipo_cambio"], $id_costos_detalle, $fecha, $hora);
		#------------------------------------------------------
	}
	
	echo "<br>";
}
#end while---------


if(!mysql_error()){
	echo "<center><font1>Se actualizaron ".$count." articulos correctamente</font1></center>";
}


?>
