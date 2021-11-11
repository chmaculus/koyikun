<?php
include("../includes/connect.php");
$q1='select distinct id_articulo from seguimiento_stock';
$r1=mysql_query($q1);
if(mysql_error()){
	echo mysql_error();
}
while($row1=mysql_fetch_array($r1)){
	$q2='select id from seguimiento_stock where id_articulo="'.$row1[0].'"';
	$rows=mysql_num_rows(mysql_query($q2));
	echo "id: ".$row1[0]." rows: ".$rows.chr(10);
}

?>