<?php
include("../includes/connect.php");
$q='select id_articulos,count(*) as count from stock_movimiento_interno group by id_articulos';
$res=mysql_query($q);

while($row=mysql_fetch_array($res)){
	$res1=mysql_query('select stock from stock where id_articulo="'.$row[0].'" and id_sucursal=1');
	if(mysql_error())
		{echo mysql_error();}
	$stock=mysql_result($res1,0,0);
	echo "#a: $stock".chr(10);
	echo "#b: $row[0]".chr(10);
	echo "#c: $row[1]".chr(10);
	$q2='update stock set stock="'.($stock + $row[1]).'" where id_articulo="'.$row[0].'" and id_sucursal=1';
	echo $q2.";".chr(10);
}




?>