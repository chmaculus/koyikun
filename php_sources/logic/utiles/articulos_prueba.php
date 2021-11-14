<?php
include("../conectar.php");
$fecha=date("Y-n-d");
$q='select * from blackcat.precios order by rubro, descripcion';
$r=mysql_query($q);
if(mysql_error()){echo mysql_error();}
$count=0;

while($row=mysql_fetch_array($r)){
	$count++;
	$codfamilia=get_codigofamilia($row["rubro"]);
	$q2='insert into logic.articulos set 
		codfamilia="'.$codfamilia.'",
		referencia="'.$row["codigo"].'",
		descripcion="'.$row["descripcion"].'",
		impuesto="2",
		codproveedor1="1",
		codproveedor2="2",
		descripcion_corta="'.$row["rubro"].$row["descripcion"].$count.'",
		codubicacion="1",
		stock="'.rand(500,1000).'",
		stock_minimo="'.rand(100,499).'",
		aviso_minimo="0",
		datos_producto="jejejejejeje",
		fecha_alta="'.$fecha.'",
		codembalaje="'.$count.'",
		unidades_caja="1",
		precio_ticket="'.($row["precio_c_iva"] * 1.1 ).'",
		modificar_ticket="0",
		observaciones="blablablablablablabla",
		precio_compra="'.$row["precio_s_iva"].'",
		precio_almacen="'.$row["precio_c_iva"].'",
		precio_tienda="'.($row["precio_c_iva"] * 1.2 ).'",
		precio_pvp="'.($row["precio_c_iva"] * 1.1 ).'",
		precio_iva="'.$row["precio_c_iva"].'",
		codigobarras="779'.$count.'",
		imagen="jeje.jpg",
		borrado="0";';
	echo $q2.chr(10);
//	mysql_query($q2);
}

function get_codigofamilia($rubro){
	$q='select codfamilia from logic.familias where nombre ="'.$rubro.'"';
	$r=mysql_query($q);
	$rows=mysql_num_rows($r);
	if($rows>0){
		$codfamilia=mysql_result($r,0,0);
		return $codfamilia;
		
	}else{
		return 0;
	}
}

?>