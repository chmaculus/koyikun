<?php
include("./includes/connect.php");
include("./includes/funciones_stock.php");


// rutina para copiar los stock fijos de una sucursal a todas las sucursales

$q='select id from articulos where marca="arex" or marca="artez westerley"';

$res=mysql_query($q);

while($row=mysql_fetch_array($res)){

	verifica_tabla_stock($row["id"],2);
	$q='update stock set fijo=2 where id_articulo="'.$row["id"].'" and id_sucursal="2"';
	echo $q.";".chr(10);

	verifica_tabla_stock($row["id"],3);
	$q='update stock set fijo=2 where id_articulo="'.$row["id"].'" and id_sucursal="3"';
	echo $q.";".chr(10);

	verifica_tabla_stock($row["id"],4);
	$q='update stock set fijo=2 where id_articulo="'.$row["id"].'" and id_sucursal="4"';
	echo $q.";".chr(10);

	verifica_tabla_stock($row["id"],5);
	$q='update stock set fijo=2 where id_articulo="'.$row["id"].'" and id_sucursal="5"';
	echo $q.";".chr(10);

	verifica_tabla_stock($row["id"],7);
	$q='update stock set fijo=2 where id_articulo="'.$row["id"].'" and id_sucursal="7"';
	echo $q.";".chr(10);

	verifica_tabla_stock($row["id"],8);
	$q='update stock set fijo=2 where id_articulo="'.$row["id"].'" and id_sucursal="8"';
	echo $q.";".chr(10);

	verifica_tabla_stock($row["id"],9);
	$q='update stock set fijo=2 where id_articulo="'.$row["id"].'" and id_sucursal="9"';
	echo $q.";".chr(10);

	verifica_tabla_stock($row["id"],10);
	$q='update stock set fijo=2 where id_articulo="'.$row["id"].'" and id_sucursal="10"';
	echo $q.";".chr(10);

	verifica_tabla_stock($row["id"],25);
	$q='update stock set fijo=2 where id_articulo="'.$row["id"].'" and id_sucursal="25"';
	echo $q.";".chr(10);

	verifica_tabla_stock($row["id"],26);
	$q='update stock set fijo=2 where id_articulo="'.$row["id"].'" and id_sucursal="26"';
	echo $q.";".chr(10);

	verifica_tabla_stock($row["id"],27);
	$q='update stock set fijo=2 where id_articulo="'.$row["id"].'" and id_sucursal="27"';
	echo $q.";".chr(10);

	verifica_tabla_stock($row["id"],28);
	$q='update stock set fijo=2 where id_articulo="'.$row["id"].'" and id_sucursal="28"';
	echo $q.";".chr(10);
}



?>