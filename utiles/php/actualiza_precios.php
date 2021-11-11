<?php


include("../includes/connect.php");

$q='select id from articulos ';
$res=mysql_query($q);
while($row=mysql_fetch_array($res)){
	$rows=mysql_num_rows(mysql_query('select id from precios where id_articulo="'.$row[0].'"'));
	if($rows==0){echo "p: ".$row[0].chr(10);}

	$rows=mysql_num_rows(mysql_query('select id from costos where id_articulos="'.$row[0].'"'));
	if($rows==0){echo "c: ".$row[0].chr(10);}
}



?>