<?php
include("includes/connect.php");
include("includes/funciones_precios.php");
include("includes/funciones_costos.php");
$fecha=date("Y-n-d");

$q='select id_articulos,id_sucursal from promociones where fecha_finaliza>="'.$fecha.'"';
$res=mysql_query($q);
while($row=mysql_fetch_array($res)){
	$verif=verifica_tabla_precios($row[0], $row[1]);
	echo "#verif $verif".chr(10);
	if($verif==0){
		/*
		$array_costo=array_costo($row[0]);
		$precio_venta=calcula_precio_venta( $array_costo );
		*/
		$precio=array_precios($row[0],1);
		$q2='update precios set promocion="S", precio_base="'.$precio["precio_base"].'", porcentaje_tarjeta="'.$precio["porcentaje_tarjeta"].'", fecha="'.$precio["fecha"].'", hora="'.$precio["hora"].'", where id_articulo="'.$row[0].'"';
		echo $q2.";".chr(10);
		
	}
	$q2='update precios set promocion="S" where id_articulo="'.$row[0].'" and id_sucursal="'.$row[1].'"';
	mysql_query($q2);
	echo $q2.chr(10);
	$count++;
}
echo "count: ".$count.chr(10);
?>