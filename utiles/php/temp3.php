<?php
include("./includes/connect.php");


$q='select id, fecha, fecha_ped_prep, finalizado, fecha_envio from pedidos where fecha_ped_prep is null and estado="Preparado"';
$q='select id, marca, fecha, fecha_envio, hora_envio, fecha_ped_prep, hora_ped_prep, finalizado, estado from pedidos where estado="Preparado" and fecha>="2020-08-31"';

$res=mysql_query($q);

while($row=mysql_fetch_array($res)){
	if($row["hora_envio"]==NULL){$envio="NULL";}else{$envio=$row["hora_envio"];}
	echo '#id:'.$row["id"]."fec: ".$row["fecha"]," ".$row["fecha_envio"]." ".$envio.chr(10);
	$q2='update pedidos set fecha_ped_prep="'.$row["fecha_envio"].'", hora_ped_prep="'.$row["hora_envio"].'" where id="'.$row["id"].'"';
	echo $q2.";".chr(10);
}




?>