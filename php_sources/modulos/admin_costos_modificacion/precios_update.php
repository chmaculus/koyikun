<?php include("../../login/login_verifica.inc.php");

$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="0"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 
include_once('cabecera.inc.php');
?>
<center>

<?php

include("../../includes/connect.php");
include("funciones.php");

$fecha=date("Y-n-d");
$hora=date("H:i:s");


#---------------------------------------------------
if($_POST["detalle"] and $_POST["detalle"]!=""){
	$q='insert into costos_detalle set detalle="'.$_POST["detalle"].'", fecha="'.$fecha.'", hora="'.$hora.'"';
	mysql_query($q);
	$id_costos_detalle=mysql_insert_id($id_connection);
}
#---------------------------------------------------

$query=base64_decode($_POST["query"]);
$result=mysql_query($query)or die(mysql_error());

$count=0;
$count_costos=0;

while($row=mysql_fetch_array($result)){
	$array_costo=precio_costo( $row["id"] );
	$costo_anterior=calcula_precio_costo( $row["id"] );
	
	if( $_POST["porcentaje_incremento".$row["id"]] >0 OR $array_costo["precio_costo"] != $_POST["precio_costo".$row["id"]] ){
		verifica_tabla_costos( $row["id"] );
		$costo_nuevo=(( $array_costo["precio_costo"] * $_POST["porcentaje_incremento".$row["id"]] ) / 100) + $array_costo["precio_costo"];

		if($_POST["tipo_cambio"]=="fabrica"){
			$q2='update costos set precio_costo="'.$costo_nuevo.'", fecha="'.$fecha.'", hora="'.$hora.'", modulo="25" where id="'.$array_costo["id"].'"';
		}
		if($_POST["tipo_cambio"]=="gerencia"){
			$q2='update costos set precio_costo="'.$costo_nuevo.'", fecha_gerencia="'.$fecha.'", hora_gerencia="'.$hora.'", modulo="26" where id="'.$array_costo["id"].'"';
		}

		mysql_query($q2);
		if(mysql_error()){
			echo mysql_error()."<br>";
			echo $q2."<br>";
		}
		$count_costos++;

		verifica_tabla_precios( $row["id"] );

		$precio_nuevo=calcula_precio_venta( $row["id"] );
		$query_precios='update precios set precio_base="'.$precio_nuevo.'", fecha="'.$fecha.'", hora="'.$hora.'", modulo="27" where id_articulo="'.$row["id"].'"';
		mysql_query($query_precios);		
		if(mysql_error()){
			echo mysql_error()."<br>";
			echo $query_precios."<br>";
		}
		$costo_nuevo=calcula_precio_costo( $row["id"] );
		#------------------------------------------------------
		ingreso_seguimiento_costos($row["id"], $costo_anterior, $costo_nuevo, $_POST["tipo_cambio"], $id_costos_detalle, $fecha, $hora);
		#------------------------------------------------------
	}
}

if(!mysql_error()){
	echo '<font1>Se actualizaron '.$count_costos.' costos correctamente</font1>';
}


?>
</center>
</body>
</html>

