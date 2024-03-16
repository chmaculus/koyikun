<?php
include_once("promociones_base.php");
include_once("../../includes/connect.php");
include("../../includes/funciones_articulos.php");
include("../../includes/funciones_precios.php");
include("../../includes/funciones_promocion.php");
include("../../includes/funciones_varias.php");

$id_articulos=$_POST["id_articulos"];

echo "Base: ".$base."<br><br>";
//$query=base64_decode($_POST["query"]);

$query='select * from sucursales';
$result=mysql_query($query)or die(mysql_error());
while($row=mysql_fetch_array($result)){
	
	$array_precios=precio_sucursal( $id_articulos, 1 );
	$existe=verifica_promocion( $id_articulos, $row["id"] );
	
	$query='select * from precios where id_articulo="'.$id_articulos.'" and id_sucursal="'.$row["id"].'"';
	$rows=mysql_num_rows( mysql_query($query) );
	if($rows < 1 AND $row["id"] != 1 AND $_POST["habilitado".$row["id"]]=="S"){
		$q='insert into precios set
			id_articulo="'.$id_articulos.'",
			precio_base="'.$array_precios["precio_base"].'",
			porcentaje_contado="'.$array_precios["porcentaje_contado"].'",
			porcentaje_tarjeta="'.$array_precios["porcentaje_tarjeta"].'",
			id_sucursal="'.$row["id"].'",
			fecha="'.$array_precios["fecha"].'",
			hora="'.$array_precios["hora"].'",
			modulo="39",
			promocion="S"';
			echo "q0".$q."<br><br>";		
			mysql_query($q);
			if(mysql_error()){
				echo mysql_error();
			}
	}

	if($rows == 1 AND $row["id"] != 1 AND $_POST["habilitado".$row["id"]]=="S"){
		$q='update precios set
			precio_base="'.$array_precios["precio_base"].'",
			porcentaje_contado="'.$array_precios["porcentaje_contado"].'",
			porcentaje_tarjeta="'.$array_precios["porcentaje_tarjeta"].'",
			fecha="'.$array_precios["fecha"].'",
			hora="'.$array_precios["hora"].'",
			modulo="40",
			promocion="S"
				where id_articulo="'.$id_articulos.'" and
				id_sucursal="'.$row["id"].'"
			';
			echo "q1".$q."<br><br>";		
			mysql_query($q);
			if(mysql_error()){
				echo mysql_error();
			}
	}
	

	$fecha_inicio=fecha_conv( "/", $_POST["fecha_inicio".$row["id"]] );
	$fecha_finaliza=fecha_conv( "/", $_POST["fecha_finaliza".$row["id"]] );

	if( $_POST["precio_promocion".$row["id"]] == $array_precios["precio_base"] ){
		/* no es promocion */
	}
	if( $_POST["precio_promocion".$row["id"]] != $array_precios["precio_base"] ){
		/* es promocion */
		$query=query_promocion($id_articulos, $row["id"], $_POST["precio_promocion".$row["id"]], $fecha_inicio, $fecha_finaliza, $_POST["habilitado".$row["id"]], $existe);
		mysql_query($query);
			if(mysql_error()){
				echo mysql_error();
			}
		
	}
}

if(!mysql_error()){
	echo "<center>OK</center>";
}	



?>