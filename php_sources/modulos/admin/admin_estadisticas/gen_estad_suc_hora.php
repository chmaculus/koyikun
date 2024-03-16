<?php
$mes=date("n");
$fecha_desde=date("Y-n-01");
$fecha_hasta=date("Y-n-31");
include("../includes/connect.php");

mysql_query('truncate table estadisticas_ventas_hora');

$result=mysql_query('select distinct sucursal from ventas order by sucursal');
while($row=mysql_fetch_array($result)){
	aaa($row["sucursal"], $fecha_desde, $fecha_hasta, "08:00:00", "09:00:00");
	aaa($row["sucursal"], $fecha_desde, $fecha_hasta, "09:00:00", "10:00:00");
	aaa($row["sucursal"], $fecha_desde, $fecha_hasta, "10:00:00", "11:00:00");
	aaa($row["sucursal"], $fecha_desde, $fecha_hasta, "11:00:00", "12:00:00");
	aaa($row["sucursal"], $fecha_desde, $fecha_hasta, "12:00:00", "13:00:00");
	aaa($row["sucursal"], $fecha_desde, $fecha_hasta, "13:00:00", "14:00:00");
	aaa($row["sucursal"], $fecha_desde, $fecha_hasta, "14:00:00", "15:00:00");
	aaa($row["sucursal"], $fecha_desde, $fecha_hasta, "15:00:00", "16:00:00");
	aaa($row["sucursal"], $fecha_desde, $fecha_hasta, "16:00:00", "17:00:00");
	aaa($row["sucursal"], $fecha_desde, $fecha_hasta, "17:00:00", "18:00:00");
	aaa($row["sucursal"], $fecha_desde, $fecha_hasta, "18:00:00", "19:00:00");
	aaa($row["sucursal"], $fecha_desde, $fecha_hasta, "19:00:00", "20:00:00");
	aaa($row["sucursal"], $fecha_desde, $fecha_hasta, "20:00:00", "21:00:00");
	aaa($row["sucursal"], $fecha_desde, $fecha_hasta, "21:00:00", "22:00:00");
}






function aaa($sucursal, $fecha_desde, $fecha_hasta, $hora_desde, $hora_hasta){
    $fecha=date("Y-n-d");
	$q='select sum(cantidad * precio_unitario) from ventas where sucursal="'.$sucursal.'" and fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'" and hora >="'.$hora_desde.'" and hora<="'.$hora_hasta.'"';
	//echo $q.chr(10);
	$res=mysql_query($q);
	$array=mysql_fetch_array($res);
	if($array[0]>0){
		$q='insert into estadisticas_ventas_hora set fecha="'.$fecha.'", sucursal="'.$sucursal.'", importe="'.$array[0].'", hora_desde="'.$hora_desde.'", hora_hasta="'.$hora_hasta.'"';
		mysql_query($q);
		echo $q.chr(10);
	}
}


/*
#----------------------------------------------------------------
DROP TABLE IF EXISTS estadisticas_ventas_hora;
create table estadisticas_ventas_hora (
        id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
        sucursal varchar(30),
        importe double(14,2),
        hora_desde time,
        hora_hasta time,
        PRIMARY KEY (id)
);
alter table estadisticas_ventas_hora add index sucursal(sucursal);
alter table estadisticas_ventas_hora add index hora_desde(hora_desde);
#----------------------------------------------------------------

*/

?>