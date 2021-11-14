<?php
include("../conectar.php");
$q='select distinct rubro from blackcat.precios';
$r=mysql_query($q);
if(mysql_error()){echo mysql_error();}
while($row=mysql_fetch_array($r)){
	$q2='insert into familias set nombre="'.$row["rubro"].'";';
	echo $q2.chr(10);
//	mysql_query($q2);
}
?>