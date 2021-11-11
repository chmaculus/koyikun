<?php

#no sirve peligroso con codigo af exixtentes

include("./includes/connect.php");

$q1='select distinct marca from articulos order by marca';
$res=mysql_query($q1);

while($row=mysql_fetch_array($res)){
	$q2='select id from articulos where marca="'.$row[0].'" order by clasificacion,subclasificacion,contenido,presentacion';
	$res2=mysql_query($q2);
	$count=0;
	while($row2=mysql_fetch_array($res2)){
		$count++;
		$q='update articulos set codigo_af="'.$count.'" where id="'.$row2["id"].'"';
		echo $q.";".chr(10);
	
	}
}
?>
