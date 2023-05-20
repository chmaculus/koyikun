<?php
include("./includes/connect.php");

$q='select
	id_articulos,
	(vs.mes - vv.cantidad ) as tt
	from
	ventas vv
	join ventas_estadistica vs
	on vv.id_articulos = vs.id_articulo 
	where
	vv.fecha >= "2023-05-01"
	and vs.mes>0
	and (vs.mes - vv.cantidad )>0
	group by
	id_articulos';

$res=mysql_query($q);
while($row=mysql_fetch_array($res)){
	$array=mysql_fetch_array(mysql_query('select * from articulos where id="'.$row[0].'"'));
	//echo print_r($array,true);
	$precio=mysql_result(mysql_query('select precio_base from precios where id_articulo="'.$row[0].'" and id_sucursal=1'),0,0);
	$query='insert into koyikun.ventas set 
		marca="'.$array["marca"].'",
		descripcion="'.$array["descripcion"].'",
		clasificacion="'.$array["clasificacion"].'",
		subclasificacion="'.$array["subclasificacion"].'",
		cantidad="'.$row[1].'",
		precio_unitario="'.$precio.'",
		sucursal="100",
		tipo_pago="CO",
		vendedor="99999",
		fecha="2023-05-14",
		hora="22:09:33",
		id_articulos="'.$row[0].'",
		contenido="'.$array["contenido"].'",
		presentacion="'.$array["presentacion"].'",
		color="'.$array["color"].'"
		';
	echo $query.";\n";
}


?>