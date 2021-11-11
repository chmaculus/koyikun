<?php



$fecha=date("Y-m-d");
$epoch=strtotime($fecha);

$days = array('Dom', 'Lun', 'Mar', 'Mie','Jue','Vie', 'Sab');

$epoch2=($epoch-(60*60*$i));
$fecha2=date("Y-n-d",$epoch2);
$week=date("w",$epoch2);
echo $days[$week];

$epoch1=strtotime($i." days", $epoch);
$epoch2=strtotime($i." month", $epoch);
$aa=date("Y-m-d",$epoch1);
$bb=date("Y-m",$epoch2);
$week=date("w",$epoch1);
echo date("M",$epoch2);//nombre mes
?>