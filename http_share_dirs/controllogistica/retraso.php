<?php
include_once("cabecera2.inc.php");
include_once("./connect.php");



//$q='select fecha from pedidos order by fecha desc limit 0,1';
$q='select fecha from pedidos where estado is NULL 
																		and finalizado is null
																		and fecha_envio is NULL
																		and estado !="Preparado"
																				 order by fecha limit 0,1';


$q='select fecha from pedidos where (finalizado="N" or finalizado is null)  and fecha_ped_prep is null and estado is null and (zona=1 or zona=2 or zona=3) order by fecha  limit 0,1' ;

$arr=mysql_fetch_array(mysql_query($q));


//echo $q;

$fecha=date("Y-n-d");
$time_stamp=time($fecha);

$f2=strtotime($arr[0]);
$retraso=($time_stamp - $f2);
$dias=($retraso / 60 / 60 / 24);
$aa=explode(".",$dias);

/*
echo "a:".$arr[0]."<br>";
echo "retr:".$retraso."<br>";
echo "dias:".$dias."<br>";
*/



echo chr(10).'<br><br><br><br><br><br>';
echo chr(10).'<font size="20">Dias atraso: </font>';

//echo chr(10).'<br><br><br><br><br><br>';
echo chr(10).'<font id="font4">'.$aa[0].'</font>';


$q='select distinct numero_pedido from pedidos where estado is NULL 
																		and finalizado is null
																		and fecha_envio is NULL
																		and estado !="Preparado"
																	';



$q='select distinct numero_pedido from pedidos where estado is NULL and fecha_envio is NULL';

$res=mysql_query($q);
if(mysql_error()){echo mysql_error();}
$rows=mysql_num_rows($res);

//echo chr(10).'<br><br><br><br><br><br>';
echo '&nbsp;&nbsp;&nbsp;';

echo chr(10).'<font size="20">Pedidos pendientes: </font><font id="font4">'.$rows.'</font>';
//echo $q."<br>";

?>