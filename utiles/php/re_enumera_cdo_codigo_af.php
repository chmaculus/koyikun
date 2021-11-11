<?php
include("./includes/connect.php");

$q1='select distinct marca from articulos order by marca';
$res=mysql_query($q1);

while($row=mysql_fetch_array($res)){
	$ultimo=trae_ultimo($row["marca"]);
	$q2='select id from articulos where marca="'.$row[0].'" and codigo_af is null order by clasificacion,subclasificacion,contenido,presentacion';
#	echo "#".$q2.chr(10);
	$res2=mysql_query($q2);
	$count=$ultimo+1;
	while($row2=mysql_fetch_array($res2)){
		$count++;
		$q='update articulos set codigo_af="'.$count.'" where id="'.$row2["id"].'"';
		mysql_query($q);
	
	}
}

echo $count.chr(10);



function trae_ultimo($marca){
	$q='select codigo_af from articulos where marca="'.$marca.'" order by codigo_af desc limit 0,1';
	$array=mysql_fetch_array(mysql_query($q));
	return $array[0];
	
}



?>