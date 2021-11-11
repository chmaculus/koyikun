<?php include_once("../../login/login_verifica.inc.php");

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
//include_once("funciones.php");
include_once("../../includes/funciones_listas.php");
include_once("../../includes/funciones_precios.php");
include_once("../../includes/funciones_costos.php");


#---------------------------------------------------
if($_POST["detalle"] and $_POST["detalle"]!=""){
	$q='insert into costos_detalle set marca="'.$_POST["marca"].'", detalle="'.$_POST["detalle"].'", fecha="'.$fecha.'", hora="'.$hora.'"';
	mysql_query($q);
	$id_costos_detalle=mysql_insert_id($id_connection);
}
#---------------------------------------------------




$query=base64_decode($_POST["query"]);
echo $query."<br>";
$result=mysql_query($query)or die(mysql_error());
while($row=mysql_fetch_array($result)){
	$distinto=0;
	$costo_anterior=calcula_precio_costo( $row["id"] );
	verifica_tabla_costos( $row["id"] );
	verifica_tabla_precios( $row["id"], 1 );
	$array_costo=array_costo($row["id"]);
	
    if($_POST["precio_costo"]!="" AND $array_costo["precio_costo"]!=$_POST["precio_costo"]){
        $array_costos_nuevo["precio_costo"]=$_POST["precio_costo"];
        $distinto=1;
    }else{
        $array_costos_nuevo["precio_costo"]=$array_costo["precio_costo"];
    }
    if($_POST["descuento1"]!="" AND $array_costo["descuento1"]!=$_POST["descuento1"]){
        $array_costos_nuevo["descuento1"]=$_POST["descuento1"];
        $distinto=1;
    }else{
        $array_costos_nuevo["descuento1"]=$array_costo["descuento1"];
    }
    if($_POST["descuento2"]!="" AND $array_costo["descuento2"]!=$_POST["descuento2"]){
        $array_costos_nuevo["descuento2"]=$_POST["descuento2"];
        $distinto=1;
    }else{
        $array_costos_nuevo["descuento2"]=$array_costo["descuento2"];
    }
    if($_POST["descuento3"]!="" AND $array_costo["descuento3"]!=$_POST["descuento3"]){
        $array_costos_nuevo["descuento3"]=$_POST["descuento3"];
        $distinto=1;
    }else{
        $array_costos_nuevo["descuento3"]=$array_costo["descuento3"];
    }
    if($_POST["descuento4"]!="" AND $array_costo["descuento4"]!=$_POST["descuento4"]){
        $array_costos_nuevo["descuento4"]=$_POST["descuento4"];
        $distinto=1;
    }else{
        $array_costos_nuevo["descuento4"]=$array_costo["descuento4"];
    }
    if($_POST["descuento5"]!="" AND $array_costo["descuento5"]!=$_POST["descuento5"]){
        $array_costos_nuevo["descuento5"]=$_POST["descuento5"];
        $distinto=1;
    }else{
        $array_costos_nuevo["descuento5"]=$array_costo["descuento5"];
    }
    if($_POST["descuento6"]!="" AND $array_costo["descuento6"]!=$_POST["descuento6"]){
        $array_costos_nuevo["descuento6"]=$_POST["descuento6"];
        $distinto=1;
    }else{
        $array_costos_nuevo["descuento6"]=$array_costo["descuento6"];
    }
    if($_POST["iva"]!="" AND $array_costo["iva"]!=$_POST["iva"]){
        $array_costos_nuevo["iva"]=$_POST["iva"];
        $distinto=1;
    }else{
        $array_costos_nuevo["iva"]=$array_costo["iva"];
    }
    if($_POST["margen"]!="" AND $array_costo["margen"]!=$_POST["margen"]){
        $array_costos_nuevo["margen"]=$_POST["margen"];
        $distinto=1;
    }else{
        $array_costos_nuevo["margen"]=$array_costo["margen"];
    }
	

	#------------------------------------------------------
	//query update
	$query_costos='update costos set 
		descuento1="'.$array_costos_nuevo["descuento1"].'",
		descuento2="'.$array_costos_nuevo["descuento2"].'",
		descuento3="'.$array_costos_nuevo["descuento3"].'",
		descuento4="'.$array_costos_nuevo["descuento4"].'",
		descuento5="'.$array_costos_nuevo["descuento5"].'",
		descuento6="'.$array_costos_nuevo["descuento6"].'",
		iva="'.$array_costos_nuevo["iva"].'",
		margen="'.$array_costos_nuevo["margen"].'",
		modulo="11",
		';
	if($_POST["tipo_cambio"]=="fabrica"){
		$query_costos.='	fecha="'.$fecha.'",
		hora="'.$hora.'"';
	}
	if($_POST["tipo_cambio"]=="gerencia"){
		$query_costos.='	fecha_gerencia="'.$fecha.'",
		hora_gerencia="'.$hora.'"
		';
	}
	$query_costos.=' where id_articulos="'.$row["id"].'"';
	//query update
	#------------------------------------------------------

	#listas_porcentaje
	$aaa=listas_porcentaje_verifica( "2", $row["id"] );
	if($aaa==1){
		$query_lista='update listas_porcentaje set porcentaje="'.$_POST["tarjeta"].'" where id_articulos="'.$row["id"].'" and id_lista="2"';
	}else{
		$query_lista='insert into listas_porcentaje set porcentaje="'.$_POST["tarjeta"].'", id_articulos="'.$row["id"].'", id_lista="2"';
	}
	mysql_query($query_lista)or die(mysql_error());
	#--------------------------------------------------


	if($distinto==1){
		$count++;
		$precio_nuevo=calcula_precio_venta( $array_costos_nuevo );
		$query_precios='update precios set precio_base="'.$precio_nuevo.'", 
														porcentaje_tarjeta="'.$_POST["tarjeta"].'",
														fecha="'.$fecha.'", 
														hora="'.$hora.'",
														modulo="12"
															where id_articulo="'.$row["id"].'"';
		//echo "query_precios: ".$query_precios."<br>".chr(13);
		mysql_query($query_precios);
		if(mysql_error()){
			echo mysql_error()." ".$query_precios."<br>";
		}
		
		mysql_query($query_costos);
		if(mysql_error()){
			echo mysql_error()." ".$query_costos."<br>";
		}
	}

	#------------------------------------------------------
	ingreso_seguimiento_costos($row["id"], $array_costos_nuevo, $_POST["tipo_cambio"], $id_costos_detalle, $fecha, $hora);		
	#------------------------------------------------------
	
}

if(!mysql_error()){
	echo "<center><font1>Se actualizaron ".$count." articulos correctamente</font1></center>";
}


?>