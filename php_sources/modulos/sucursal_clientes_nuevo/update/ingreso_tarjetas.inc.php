<?php


if($_POST["tarjeta1"]!=NULL){
	$q1='insert into clientes_persona_valores set id_clientes_persona="'.$id_clientes_persona.'", llave="tarjeta1", valor="'.$_POST["tarjeta1"].'"';
}else{
	$q1='insert into clientes_persona_valores set id_clientes_persona="'.$id_clientes_persona.'", llave="tarjeta1", valor=""';
}
mysql_query($q1);
if(mysql_error()){ echo mysql_error()." ".$q1; }
if($_POST["tarjeta2"]!=NULL){
	$q1='insert into clientes_persona_valores set id_clientes_persona="'.$id_clientes_persona.'", llave="tarjeta2", valor="'.$_POST["tarjeta2"].'"';
}else{
	$q1='insert into clientes_persona_valores set id_clientes_persona="'.$id_clientes_persona.'", llave="tarjeta2", valor=""';
}
mysql_query($q1);
if(mysql_error()){ echo mysql_error()." ".$q1; }
if($_POST["tarjeta3"]!=NULL){
	$q1='insert into clientes_persona_valores set id_clientes_persona="'.$id_clientes_persona.'", llave="tarjeta3", valor="'.$_POST["tarjeta3"].'"';
}else{
	$q1='insert into clientes_persona_valores set id_clientes_persona="'.$id_clientes_persona.'", llave="tarjeta3", valor=""';
}
mysql_query($q1);
if(mysql_error()){ echo mysql_error()." ".$q1; }
if($_POST["tarjeta4"]!=NULL){
	$q1='insert into clientes_persona_valores set id_clientes_persona="'.$id_clientes_persona.'", llave="tarjeta4", valor="'.$_POST["tarjeta4"].'"';
}else{
	$q1='insert into clientes_persona_valores set id_clientes_persona="'.$id_clientes_persona.'", llave="tarjeta4", valor=""';
}
mysql_query($q1);
if(mysql_error()){ echo mysql_error()." ".$q1; }
if($_POST["tarjeta5"]!=NULL){
	$q1='insert into clientes_persona_valores set id_clientes_persona="'.$id_clientes_persona.'", llave="tarjeta5", valor="'.$_POST["tarjeta5"].'"';
}else{
	$q1='insert into clientes_persona_valores set id_clientes_persona="'.$id_clientes_persona.'", llave="tarjeta5", valor=""';
}
mysql_query($q1);
if(mysql_error()){ echo mysql_error()." ".$q1; }
if($_POST["tarjeta6"]!=NULL){
	$q1='insert into clientes_persona_valores set id_clientes_persona="'.$id_clientes_persona.'", llave="tarjeta6", valor="'.$_POST["tarjeta6"].'"';
}else{
	$q1='insert into clientes_persona_valores set id_clientes_persona="'.$id_clientes_persona.'", llave="tarjeta6", valor=""';
}
mysql_query($q1);
if(mysql_error()){ echo mysql_error()." ".$q1; }
if($_POST["tarjeta7"]!=NULL){
	$q1='insert into clientes_persona_valores set id_clientes_persona="'.$id_clientes_persona.'", llave="tarjeta7", valor="'.$_POST["tarjeta7"].'"';
}else{
	$q1='insert into clientes_persona_valores set id_clientes_persona="'.$id_clientes_persona.'", llave="tarjeta7", valor=""';
}
mysql_query($q1);
if(mysql_error()){ echo mysql_error()." ".$q1; }
if($_POST["tarjeta8"]!=NULL){
	$q1='insert into clientes_persona_valores set id_clientes_persona="'.$id_clientes_persona.'", llave="tarjeta8", valor="'.$_POST["tarjeta8"].'"';
}else{
	$q1='insert into clientes_persona_valores set id_clientes_persona="'.$id_clientes_persona.'", llave="tarjeta8", valor=""';
}
mysql_query($q1);
if(mysql_error()){ echo mysql_error()." ".$q1; }



$q1='insert into clientes_persona_valores set id_clientes_persona="'.$id_clientes_persona.'", llave="otra_tarjeta", valor="'.$_POST["otra_tarjeta"].'"';
mysql_query($q1);
if(mysql_error()){ echo mysql_error()." ".$q1; }	


?>