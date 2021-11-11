<?php

if($_POST["Cosme1"]!=NULL){
	$q1='insert into clientes_persona_valores set id_clientes_persona="'.$id_clientes_persona.'", llave="Cosme1", valor="'.$_POST["Cosme1"].'"';
}else{
	$q1='insert into clientes_persona_valores set id_clientes_persona="'.$id_clientes_persona.'", llave="Cosme1", valor=""';
}
mysql_query($q1);
if(mysql_error()){ echo mysql_error()." ".$q1; }
if($_POST["Cosme2"]!=NULL){
	$q1='insert into clientes_persona_valores set id_clientes_persona="'.$id_clientes_persona.'", llave="Cosme2", valor="'.$_POST["Cosme2"].'"';
}else{
	$q1='insert into clientes_persona_valores set id_clientes_persona="'.$id_clientes_persona.'", llave="Cosme2", valor=""';
}
mysql_query($q1);
if(mysql_error()){ echo mysql_error()." ".$q1; }
if($_POST["Cosme3"]!=NULL){
	$q1='insert into clientes_persona_valores set id_clientes_persona="'.$id_clientes_persona.'", llave="Cosme3", valor="'.$_POST["Cosme3"].'"';
}else{
	$q1='insert into clientes_persona_valores set id_clientes_persona="'.$id_clientes_persona.'", llave="Cosme3", valor=""';
}
mysql_query($q1);
if(mysql_error()){ echo mysql_error()." ".$q1; }
if($_POST["Cosme4"]!=NULL){
	$q1='insert into clientes_persona_valores set id_clientes_persona="'.$id_clientes_persona.'", llave="Cosme4", valor="'.$_POST["Cosme4"].'"';
}else{
	$q1='insert into clientes_persona_valores set id_clientes_persona="'.$id_clientes_persona.'", llave="Cosme4", valor=""';
}
mysql_query($q1);
if(mysql_error()){ echo mysql_error()." ".$q1; }

$q1='insert into clientes_persona_valores set id_clientes_persona="'.$id_clientes_persona.'", llave="cosmarcaotros", valor="'.$_POST["cosmarcaotros"].'"';
mysql_query($q1);
if(mysql_error()){ echo mysql_error()." ".$q1; }	

?>