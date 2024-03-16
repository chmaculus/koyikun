<?php
include("connect.php");

$q='select distinct marca from articulos order by marca';
$r=mysql_query($q);
while($row=mysql_fetch_array($r)){
	$q2='select * from articulos where marca="'.$row[0].'"';
	$rows=mysql_num_rows(mysql_query($q2));
	echo "marca: ".$row[0]." rows: ".$rows.chr(10);
}
?>