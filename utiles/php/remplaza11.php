<?php
include("./includes/connect.php");

$q='select * from articulos where marca="framesi" and descripcion like "%ECLECTIC CARE %"';
$q='select * from articulos where marca="KOSTUME" and (clasificacion ="COLORACION KOSTUME" or clasificacion="CRAZY COLORS" or clasificacion="KOSTUME KOLOR" or clasificacion="AQUARELA") order by marca, descripcion, color, contenido';
$q='select * from articulos where marca="KOSTUME" and clasificacion="COLORACION KOSTUME" order by marca, descripcion, color, contenido';
$res=mysql_query($q);
echo $q.chr(10);

while($row=mysql_fetch_array($res)){
	$color=str_replace("ECLECTIC CARE ","",$row["descripcion"]);
	//$color=str_replace("POLICROM POMO ","",$color);
	//$color=str_replace("POLICROM ","",$color);

	$q2='update articulos set color="'.$color.'" where id="'.$row["id"].'"';
	//mysql_query($q2);
	echo $q2.";".chr(10);
}



?>