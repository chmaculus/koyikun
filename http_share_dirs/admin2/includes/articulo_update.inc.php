<?php

$id_articulo=$_POST["id_articulo"];
$codigo_interno=$_POST["codigo_interno".$id_articulo];
$marca=$_POST["marca"];
$descripcion=$_POST["descripcion".$id_articulo];
$clasificacion=$_POST["clasificacion"];
$subclasificaion=$_POST["subclasificacion".$id_articulo];
$codigo_barra=$_POST["codigo_barra".$id_articulo];
$accion=$_POST["accion"];

$fecha=fecha_hora_actual("fecha");
$hora=fecha_hora_actual("hora");

if($_POST["accion"]=="modifica"){
	$query_articulo='update articulos set codigo_interno="'.$codigo_interno.'",
													marca="'.$marca.'",
													descripcion="'.$descripcion.'",
													clasificacion="'.$clasificacion.'",
													subclasificacion="'.$subclasificaion.'",
													codigo_barra="'.$codigo_barra.'",
													fecha="'.$fecha.'",
													hora="'.$hora.'"
														where id="'.$id_articulo.'"
														';
}
												
if($_POST["accion"]=="ingreso"){
	$query_articulo='insert into articulos set codigo_interno="'.$codigo_interno.'",
													marca="'.$marca.'",
													descripcion="'.$descripcion.'",
													clasificacion="'.$clasificacion.'",
													subclasificacion="'.$subclasificaion.'",
													codigo_barra="'.$codigo_barra.'",
													fecha="'.$fecha.'",
													hora="'.$hora.'"
														';
}

echo "query_articulo: ".$query_articulo."<br>".chr(13);

//mysql_query($query_articulo);
if(mysql_error()){
	muestra_texto("Fallo al modificar tabla articulos".$SCRIPT_NAME." ".$query_articulo,"",$color_fuente);
	return;
}
muestra_texto("Se actualizo articulo correctamente","",$color_fuente);echo "<br>";
?>
