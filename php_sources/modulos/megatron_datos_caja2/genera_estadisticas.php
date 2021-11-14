<?php

$hora=time();

$ultimo_mes=$hora-(60 * 60 * 24 * 30);
$ultimo_tres=$hora-(60 * 60 * 24 * 30 * 3);
$ultimo_seis=$hora-(60 * 60 * 24 * 30 * 6);
$ultimo_nueve=$hora-(60 * 60 * 24 * 30 * 9 );
$ultimo_doce=$hora-(60 * 60 * 24 * 365);



$fecha=date("Y-n-d");

$u_mes=date("Y-n-d",$ultimo_mes);
$u_tres=date("Y-n-d",$ultimo_tres);
$u_seis=date("Y-n-d",$ultimo_seis);
$u_nueve=date("Y-n-d",$ultimo_nueve);
$u_doce=date("Y-n-d",$ultimo_doce);


include("../includes/connect.php");

$q='truncate table estadisticas_vendedores';
mysql_query($q);


//Ultimo Mes
$q='select distinct vendedor from ventas where fecha>="'.$u_mes.'"';
$r=mysql_query($q);
if(mysql_error()){
	echo mysql_error().chr(10);
}
while($row=mysql_fetch_array($r)){
	$q2='select sum(cantidad * precio_unitario) from ventas where fecha>="'.$u_mes.'" and vendedor="'.$row["vendedor"].'"';
	$r2=mysql_query($q2);
	if(mysql_error()){
		echo mysql_error().chr(10);
		echo "q: ".$q2.chr(10);
	}
	$array=mysql_fetch_array($r2);
	if(verifica_en_tabla($row["vendedor"])<1){
		$qa='insert into estadisticas_vendedores set vendedor="'.$row["vendedor"].'", mes="'.$array[0].'" ';
	}else{
		$qa='update estadisticas_vendedores set mes="'.$array[0].'" where vendedor="'.$row["vendedor"].'" ';
	}
	echo $qa.chr(10);
}



//Ultimo tres
$q='select distinct vendedor from ventas where fecha>="'.$u_tres.'"';
$r=mysql_query($q);
while($row=mysql_fetch_array($r)){
	$q2='select sum(cantidad * precio_unitario) from ventas where fecha>="'.$u_tres.'" and vendedor="'.$row["vendedor"].'"';
	$r2=mysql_query($q2);
	$array=mysql_fetch_array($r2);
	if(verifica_en_tabla($row["vendedor"])<1){
		$qa='insert into estadisticas_vendedores set vendedor="'.$row["vendedor"].'", tres="'.$array[0].'" ';
	}else{
		$qa='update estadisticas_vendedores set tres="'.$array[0].'" where vendedor="'.$row["vendedor"].'" ';
	}
	
}


//Ultimo seis
$q='select distinct vendedor from ventas where fecha>="'.$u_seis.'"';
$r=mysql_query($q);
while($row=mysql_fetch_array($r)){
	$q2='select sum(cantidad * precio_unitario) from ventas where fecha>="'.$u_seis.'" and vendedor="'.$row["vendedor"].'"';
	$r2=mysql_query($q2);
	$array=mysql_fetch_array($r2);
	if(verifica_en_tabla($row["vendedor"])<1){
		$qa='insert into estadisticas_vendedores set vendedor="'.$row["vendedor"].'", seis="'.$array[0].'" ';
	}else{
		$qa='update estadisticas_vendedores set seis="'.$array[0].'" where vendedor="'.$row["vendedor"].'" ';
	}
	echo $qa.chr(10);
	
}




//Ultimo nueve
$q='select distinct vendedor from ventas where fecha>="'.$u_nueve.'"';
$r=mysql_query($q);
while($row=mysql_fetch_array($r)){
	$q2='select sum(cantidad * precio_unitario) from ventas where fecha>="'.$u_nueve.'" and vendedor="'.$row["vendedor"].'"';
	$r2=mysql_query($q2);
	$array=mysql_fetch_array($r2);
	if(verifica_en_tabla($row["vendedor"])<1){
		$qa='insert into estadisticas_vendedores set vendedor="'.$row["vendedor"].'", nueve="'.$array[0].'" ';
	}else{
		$qa='update estadisticas_vendedores set nueve="'.$array[0].'" where vendedor="'.$row["vendedor"].'" ';
	}
	echo $qa.chr(10);
	
}


//Ultimo doce
$q='select distinct vendedor from ventas where fecha>="'.$u_doce.'"';
$r=mysql_query($q);
while($row=mysql_fetch_array($r)){
	$q2='select sum(cantidad * precio_unitario) from ventas where fecha>="'.$u_doce.'" and vendedor="'.$row["vendedor"].'"';
	$r2=mysql_query($q2);
	if(mysql_error()){
		echo mysql_error().chr(10);
		echo "q: ".$q2.chr(10);
	}
	$array=mysql_fetch_array($r2);
	if(verifica_en_tabla($row["vendedor"])<1){
		$qa='insert into estadisticas_vendedores set vendedor="'.$row["vendedor"].'", doce="'.$array[0].'" ';
	}else{
		$qa='update estadisticas_vendedores set doce="'.$array[0].'" where vendedor="'.$row["vendedor"].'" ';
	}
	echo $qa.chr(10);
	
}






function verifica_en_tabla($vendedor){
	$q='select * from estadisticas_vendedores where vendedor="'.$vendedor.'"';
	$r=mysql_query($q);
	$rows=mysql_num_rows($r);
	return $rows; 
}

?>