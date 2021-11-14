<?php
include_once("../../includes/connect.php");
#include_once("../../login/login_verifica.inc.php");
#include_once("seguridad_1.inc.php");

include_once("cabecera.inc.php");

$id_sucursal=$_COOKIE["id_sucursal"];
$fecha=date("Y-n-d");
$hora=date("H:i:s");


include_once("index.php");

echo "<br><br>";

verifica_tabla_stock( $_POST["id_articulos"], $id_sucursal );

$q='update stock set 
		    stock="'.$_POST["stock_nuevo"].'", 
		    minimo="'.$_POST["minimo"].'", 
		    maximo="'.$_POST["maximo"].'", 
		    fecha="'.$fecha.'", 
		    hora="'.$hora.'" where id_articulo="'.$_POST["id_articulos"].'" and id_sucursal="1"';
mysql_query($q);
echo $q."<br>";

if(mysql_error()){
  	 echo mysql_error()." ".$SCRIPT_NAME;
}else{
	echo "Se actualizo el stock correctamente<br>";
}


echo "q: $q <br>";

$query='insert into seguimiento_stock set
id_articulo="'.$_POST["id_articulos"].'",
stock_anterior="'.$_POST["stock"].'",
stock_nuevo="'.$_POST["stock_nuevo"].'",
origen="1",
destino="",
tipo="GM4",
fecha="'.$fecha.'",
hora="'.$hora.'"';

mysql_query($query);

if(mysql_error()){
    echo $query."<br>";
    echo mysql_error()."<br>";
    echo $_SERVER["SCRIPT_NAME"]."<br>";
}


echo "q2: $query <br>";

#-----------------------------------------------------------------
function verifica_tabla_stock( $id_articulo, $id_sucursal ){
	$query='select * from stock where 	id_articulo="'.$id_articulo.'" and id_sucursal="'.$id_sucursal.'"';
	$res=mysql_query($query) or die(mysql_error()." ".$SCRIPT_NAME);
	$rows=mysql_num_rows($res);
	if($rows==1){
		return 1;		
	}
	if($rows<1){
		$q='insert into stock set stock=0, id_articulo="'.$id_articulo.'", id_sucursal="'.$id_sucursal.'"';
		mysql_query($q);
		return;
	}
	if($rows>1){
		$q='delete from stock where id_articulo="'.$id_articulo.'" and id_sucursal="'.$id_sucursal.'"';
		mysql_query($q);
		$q='insert into stock set stock=0, id_articulo="'.$id_articulo.'", id_sucursal="'.$id_sucursal.'"';
		mysql_query($q);
		return;
	}
}
#-----------------------------------------------------------------

?>