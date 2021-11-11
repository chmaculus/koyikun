<?php
include("../conectar.php");
$q='select distinct provincia from pad.distritos';
$r=mysql_query($q);
if(mysql_error()){echo mysql_error();}
while($row=mysql_fetch_array($r)){
	$q2='insert into provincias set nombreprovincia="'.$row["provincia"].'";';
	echo $q2.chr(10);
//	mysql_query($q2);
}
?>