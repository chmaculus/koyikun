<?php

if($_POST["Pelu1"]!=NULL){
	$q1='insert into clientes_persona_valores set id_clientes_persona="'.$id_clientes_persona.'", llave="Pelu1", valor="'.$_POST["Pelu1"].'"';
}else{
	$q1='insert into clientes_persona_valores set id_clientes_persona="'.$id_clientes_persona.'", llave="Pelu1", valor=""';
}
mysql_query($q1);
if(mysql_error()){ echo mysql_error()." ".$q1; }
if($_POST["Pelu2"]!=NULL){
	$q1='insert into clientes_persona_valores set id_clientes_persona="'.$id_clientes_persona.'", llave="Pelu2", valor="'.$_POST["Pelu2"].'"';
}else{
	$q1='insert into clientes_persona_valores set id_clientes_persona="'.$id_clientes_persona.'", llave="Pelu2", valor=""';
}
mysql_query($q1);
if(mysql_error()){ echo mysql_error()." ".$q1; }
if($_POST["Pelu3"]!=NULL){
	$q1='insert into clientes_persona_valores set id_clientes_persona="'.$id_clientes_persona.'", llave="Pelu3", valor="'.$_POST["Pelu3"].'"';
}else{
	$q1='insert into clientes_persona_valores set id_clientes_persona="'.$id_clientes_persona.'", llave="Pelu3", valor=""';
}
mysql_query($q1);
if(mysql_error()){ echo mysql_error()." ".$q1; }
if($_POST["Pelu4"]!=NULL){
	$q1='insert into clientes_persona_valores set id_clientes_persona="'.$id_clientes_persona.'", llave="Pelu4", valor="'.$_POST["Pelu4"].'"';
}else{
	$q1='insert into clientes_persona_valores set id_clientes_persona="'.$id_clientes_persona.'", llave="Pelu4", valor=""';
}
mysql_query($q1);
if(mysql_error()){ echo mysql_error()." ".$q1; }
if($_POST["Pelu5"]!=NULL){
	$q1='insert into clientes_persona_valores set id_clientes_persona="'.$id_clientes_persona.'", llave="Pelu5", valor="'.$_POST["Pelu5"].'"';
}else{
	$q1='insert into clientes_persona_valores set id_clientes_persona="'.$id_clientes_persona.'", llave="Pelu5", valor=""';
}
mysql_query($q1);
if(mysql_error()){ echo mysql_error()." ".$q1; }
if($_POST["Pelu6"]!=NULL){
	$q1='insert into clientes_persona_valores set id_clientes_persona="'.$id_clientes_persona.'", llave="Pelu6", valor="'.$_POST["Pelu6"].'"';
}else{
	$q1='insert into clientes_persona_valores set id_clientes_persona="'.$id_clientes_persona.'", llave="Pelu6", valor=""';
}
mysql_query($q1);
if(mysql_error()){ echo mysql_error()." ".$q1; }
if($_POST["Pelu7"]!=NULL){
	$q1='insert into clientes_persona_valores set id_clientes_persona="'.$id_clientes_persona.'", llave="Pelu7", valor="'.$_POST["Pelu7"].'"';
}else{
	$q1='insert into clientes_persona_valores set id_clientes_persona="'.$id_clientes_persona.'", llave="Pelu7", valor=""';
}
mysql_query($q1);
if(mysql_error()){ echo mysql_error()." ".$q1; }
if($_POST["Pelu8"]!=NULL){
	$q1='insert into clientes_persona_valores set id_clientes_persona="'.$id_clientes_persona.'", llave="Pelu8", valor="'.$_POST["Pelu8"].'"';
}else{
	$q1='insert into clientes_persona_valores set id_clientes_persona="'.$id_clientes_persona.'", llave="Pelu8", valor=""';
}
mysql_query($q1);
if(mysql_error()){ echo mysql_error()." ".$q1; }



$q1='insert into clientes_persona_valores set id_clientes_persona="'.$id_clientes_persona.'", llave="pelmarcaotros", valor="'.$_POST["pelmarcaotros"].'"';
mysql_query($q1);
if(mysql_error()){ echo mysql_error()." ".$q1; }	


?>