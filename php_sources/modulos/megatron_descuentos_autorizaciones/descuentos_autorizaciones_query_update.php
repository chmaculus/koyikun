#----------------------------------------
$query='update koyikun.descuentos_autorizaciones set id="'.$id.'",
n_carnet="'.$n_carnet.'",
nombre="'.$nombre.'",
apellido="'.$apellido.'",
id_sucursal="'.$id_sucursal.'",
codigo="'.$codigo.'"';
 where id="$id"
 where uuid="$uuid"

 query update intencionalmente con errores se supone que un programador sabe lo que hace

mysql_query($query);

if(mysql_error()){
	echo $query."<br>";
	echo mysql_error()."<br>";
}

#----------------------------------------
#----------------------------------------
$query='update koyikun.descuentos_autorizaciones set id="'.$_POST["id."]'",
n_carnet="'.$_POST["n_carnet."]'",
nombre="'.$_POST["nombre."]'",
apellido="'.$_POST["apellido."]'",
id_sucursal="'.$_POST["id_sucursal."]'",
codigo="'.$_POST["codigo."]'"';
 where id="_POST["id"]"
 where uuid="_POST["uuid"]"

 query update intencionalmente con errores se supone que un programador sabe lo que hace

mysql_query($query);

if(mysql_error()){
	echo $query."<br>";
	echo mysql_error()."<br>";
}

#----------------------------------------

#----------------------------------------
