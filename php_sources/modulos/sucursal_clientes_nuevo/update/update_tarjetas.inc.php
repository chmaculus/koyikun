<?php
$q1='update clientes_persona_valores set valor="'.$_POST["tarjeta1"].'" where id_clientes_persona="'.$id_clientes_persona.'" and llave="tarjeta1"';
echo $q1;mysql_query($q1);
if(mysql_error()){ echo mysql_error()." ".$q1; }
$q1='update clientes_persona_valores set valor="'.$_POST["tarjeta2"].'" where id_clientes_persona="'.$id_clientes_persona.'" and llave="tarjeta2"';
echo $q1;mysql_query($q1);
if(mysql_error()){ echo mysql_error()." ".$q1; }
$q1='update clientes_persona_valores set valor="'.$_POST["tarjeta3"].'" where id_clientes_persona="'.$id_clientes_persona.'" and llave="tarjeta3"';
echo $q1;mysql_query($q1);
if(mysql_error()){ echo mysql_error()." ".$q1; }
$q1='update clientes_persona_valores set valor="'.$_POST["tarjeta4"].'" where id_clientes_persona="'.$id_clientes_persona.'" and llave="tarjeta4"';
echo $q1;mysql_query($q1);
if(mysql_error()){ echo mysql_error()." ".$q1; }
$q1='update clientes_persona_valores set valor="'.$_POST["tarjeta5"].'" where id_clientes_persona="'.$id_clientes_persona.'" and llave="tarjeta5"';
echo $q1;mysql_query($q1);
if(mysql_error()){ echo mysql_error()." ".$q1; }
$q1='update clientes_persona_valores set valor="'.$_POST["tarjeta6"].'" where id_clientes_persona="'.$id_clientes_persona.'" and llave="tarjeta6"';
echo $q1;mysql_query($q1);
if(mysql_error()){ echo mysql_error()." ".$q1; }
$q1='update clientes_persona_valores set valor="'.$_POST["tarjeta7"].'" where id_clientes_persona="'.$id_clientes_persona.'" and llave="tarjeta7"';
echo $q1;mysql_query($q1);
if(mysql_error()){ echo mysql_error()." ".$q1; }
$q1='update clientes_persona_valores set valor="'.$_POST["tarjeta8"].'" where id_clientes_persona="'.$id_clientes_persona.'" and llave="tarjeta8"';
echo $q1;mysql_query($q1);
if(mysql_error()){ echo mysql_error()." ".$q1; }



$q1='update clientes_persona_valores set  valor="'.$_POST["otra_tarjeta"].'" where id_clientes_persona="'.$id_clientes_persona.'" and llave="otra_tarjeta"';
echo $q1;mysql_query($q1);
if(mysql_error()){ echo mysql_error()." ".$q1; }	


?>