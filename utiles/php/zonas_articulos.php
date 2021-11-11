<?php
include("./includes/connect.php");

$q='select * from marcas_zonas where clasificacion is not NULL';
$res=mysql_query($q);
while($row=mysql_fetch_array($res)){
	$q2='update articulos set zona="'.$row["zona"].'" where marca="'.$row["marca"].'" and clasificacion="'.$row["clasificacion"].'"';
	echo $q2.";".chr(10);
}



?>