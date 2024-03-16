<?php include("../../login/login_verifica.inc.php");

include_once("../seguridad.inc.php"); 

include_once("cabecera.inc.php");
echo "<center>";

$count=0;
$fecha=date("Y-n-d");
$hora=date("H:i:s");

include("../../includes/connect.php");
include("../../includes/funciones_precios.php");
include("../../includes/funciones_costos.php");

if ($_POST["porcentaje_contado"]==""){
	echo 'Debe completar los campos porcentaje contado<br>';
	exit;
}
if ($_POST["marca"]=="TODAS" OR $_POST["marca"]==""){
	echo 'Marca sin completar<br>';
	
	exit;
}

#---------------------------------------------------
if($_POST["detalle"] and $_POST["detalle"]!=""){
	$q='insert into costos_detalle set marca="'.$_POST["marca"].'", detalle="'.$_POST["detalle"].'", fecha="'.$fecha.'", hora="'.$hora.'"';
	mysql_query($q);
	$id_costos_detalle=mysql_insert_id($id_connection);
}
#---------------------------------------------------



$query=base64_decode($_POST["query"]);
$result=mysql_query($query)or die(mysql_error());
$rows=mysql_num_rows($result);

while($row=mysql_fetch_array($result)){

	$array_precios=precio_sucursal( $row["id"], "1");
	$precio_base=$array_precios["precio_base"];
	$tcosto=verifica_tabla_costos( $row["id"] );
	$costo_anterior=calcula_precio_costo( $row["id"] );

	if( $tcosto =="1" ){
		incrementa_costo( $row["id"], $_POST["porcentaje_contado"], $fecha, $hora, $_POST["tipo_cambio"] );
		$array_costo=array_costo($row["id"]);
		$precio_nuevo=calcula_precio_venta( $array_costo );
	}else{
		$precio_nuevo=( ( $_POST["porcentaje_contado"] * $array_precios["precio_base"] ) / 100 )  + $array_precios["precio_base"];
	}

	$costo_nuevo=calcula_precio_costo( $row["id"] );

	$query_precios='update precios set precio_base="'.$precio_nuevo.'", porcentaje_contado="0", porcentaje_tarjeta="20", fecha="'.$fecha.'", hora="'.$hora.'" where id_articulo="'.$row["id"].'"';

	echo "query_precios: ".$query_precios."<br>".chr(10);										
	mysql_query($query_precios);
	if(mysql_error()){	
		echo mysql_error()."<br><br>";
		echo $query_precios."<br>";	
	}

	$count++;
	#------------------------------------------------------

	#------------------------------------------------------
	$array_costos_nuevo=array_costo($row["id"]);
	ingreso_seguimiento_costos($row["id"], $array_costos_nuevo, $_POST["tipo_cambio"], $id_costos_detalle, $fecha, $hora);
	#------------------------------------------------------
	
}

if(!mysql_error()){
	echo "<font1>Se actualizaron ".$count." articulos correctamente!</font1>";
}




?>
</center>
</body>
</html>