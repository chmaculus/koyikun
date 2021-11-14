<?php


$q1='update clientes_persona_valores set valor="'.$_POST["Pelu1"].'" where id_clientes_persona="'.$id_clientes_persona.'" and llave="Pelu1"';
mysql_query($q1);
if(mysql_error()){ echo mysql_error()." ".$q1; }
$q1='update clientes_persona_valores set valor="'.$_POST["Pelu2"].'" where id_clientes_persona="'.$id_clientes_persona.'" and llave="Pelu2"';
mysql_query($q1);
if(mysql_error()){ echo mysql_error()." ".$q1; }
$q1='update clientes_persona_valores set valor="'.$_POST["Pelu3"].'" where id_clientes_persona="'.$id_clientes_persona.'" and llave="Pelu3"';
mysql_query($q1);
if(mysql_error()){ echo mysql_error()." ".$q1; }
$q1='update clientes_persona_valores set valor="'.$_POST["Pelu4"].'" where id_clientes_persona="'.$id_clientes_persona.'" and llave="Pelu4"';
mysql_query($q1);
if(mysql_error()){ echo mysql_error()." ".$q1; }
$q1='update clientes_persona_valores set valor="'.$_POST["Pelu5"].'" where id_clientes_persona="'.$id_clientes_persona.'" and llave="Pelu5"';
mysql_query($q1);
if(mysql_error()){ echo mysql_error()." ".$q1; }
$q1='update clientes_persona_valores set valor="'.$_POST["Pelu6"].'" where id_clientes_persona="'.$id_clientes_persona.'" and llave="Pelu6"';
mysql_query($q1);
if(mysql_error()){ echo mysql_error()." ".$q1; }
$q1='update clientes_persona_valores set valor="'.$_POST["Pelu7"].'" where id_clientes_persona="'.$id_clientes_persona.'" and llave="Pelu7"';
mysql_query($q1);
if(mysql_error()){ echo mysql_error()." ".$q1; }
$q1='update clientes_persona_valores set valor="'.$_POST["Pelu8"].'" where id_clientes_persona="'.$id_clientes_persona.'" and llave="Pelu8"';
mysql_query($q1);
if(mysql_error()){ echo mysql_error()." ".$q1; }



$q1='update clientes_persona_valores set valor="'.$_POST["pelmarcaotros"].'" where id_clientes_persona="'.$id_clientes_persona.'" and llave="pelmarcaotros"';
echo $q1;mysql_query($q1);
if(mysql_error()){ echo mysql_error()." ".$q1; }	


?>