<?php


include("./includes/connect.php");

$q='select id from articulos ';
$res=mysql_query($q);
while($row=mysql_fetch_array($res)){
	$rows=mysql_num_rows(mysql_query('select id from precios where id_articulo="'.$row[0].'"'));
	if($rows==0){
		echo "#p: ".$row[0].chr(10);
		$q='delete from precios where id_articulo="'.$row[0].'"';
#		echo $q.";".chr(10);
	}

	$rows=mysql_num_rows(mysql_query('select id from costos where id_articulos="'.$row[0].'"'));
	if($rows==0){
		echo "#ID: ".$row[0].chr(10);
		$q='delete from costos where id_articulos="'.$row[0].'"';
#		echo $q.";".chr(10);
	}
}



?>