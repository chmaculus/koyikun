<?php
$q1='update clientes_persona_valores set valor="'.$_POST["Cosme1"].'" where id_clientes_persona="'.$id_clientes_persona.'" and llave="Cosme1"';
mysql_query($q1);
if(mysql_error()){ echo mysql_error()." ".$q1; }
$q1='update clientes_persona_valores set valor="'.$_POST["Cosme2"].'" where id_clientes_persona="'.$id_clientes_persona.'" and llave="Cosme2"';
mysql_query($q1);
if(mysql_error()){ echo mysql_error()." ".$q1; }
$q1='update clientes_persona_valores set valor="'.$_POST["Cosme3"].'" where id_clientes_persona="'.$id_clientes_persona.'" and llave="Cosme3"';
mysql_query($q1);
if(mysql_error()){ echo mysql_error()." ".$q1; }
$q1='update clientes_persona_valores set valor="'.$_POST["Cosme4"].'" where id_clientes_persona="'.$id_clientes_persona.'" and llave="Cosme4"';
mysql_query($q1);
if(mysql_error()){ echo mysql_error()." ".$q1; }



if($_POST["cosmarcaotros"]!=""){
	$q1='update clientes_persona_valores set valor="'.$_POST["cosmarcaotros"].'" where id_clientes_persona="'.$id_clientes_persona.'" and llave="cosmarcaotros"';
	echo $q1;mysql_query($q1);
	if(mysql_error()){ echo mysql_error()." ".$q1; }	
}


?>