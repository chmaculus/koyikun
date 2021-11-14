<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type" />
  <title>Tablabla cuota_alquiler By Christian Máculus</title>
</head>



#----------------------------------------
$query='update cuota_alquiler set sucursal="'.$sucursal.'",
valor="'.$valor.'"
 where id="$id"';

mysql_query($query);

if(mysql_error()){
	echo "Q: ".$query."<br>";
	echo "E: ".mysql_error()."<br>";
	echo "S: ".$_SERVER["SCRIPT_NAME"]."<br>";
}

#----------------------------------------
#----------------------------------------
$query='insert cuota_alquiler set sucursal="'.$_POST["sucursal"].'",
valor="'.$_POST["valor"].'"
 where id="_POST["id"]"';


mysql_query($query);

if(mysql_error()){
	echo "Q: ".$query."<br>";
	echo "E: ".mysql_error()."<br>";
	echo "S: ".$_SERVER["SCRIPT_NAME"]."<br>";
}

#----------------------------------------

#----------------------------------------
#----------------------------------------
$query='insert cuota_alquiler set sucursal="'.$array_cuota_alquiler["sucursal"].'",
valor="'.$array_cuota_alquiler["valor"].'"';
 where id="$id"
 where uuid="$uuid"

 query update intencionalmente con errores se supone que un programador sabe lo que hace

mysql_query($query);

if(mysql_error()){
	echo "Q: ".$query."<br>";
	echo "E: ".mysql_error()."<br>";
	echo "S: ".$_SERVER["SCRIPT_NAME"]."<br>";
}

#----------------------------------------
