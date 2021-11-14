<?php 
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");
include_once("seguridad.inc.php");
include("cabecera.inc.php");



if($_GET["id_articulo"]){
	$id_articulos=$_GET["id_articulo"];
}else{
	exit;
}
$id_session=$_COOKIE["id_session"];
$id_sucursal=$_COOKIE["id_sucursal"];


#----------------------------------------
#coloca en array
$query='select * from articulos where id="'.$id_articulos.'"';
$array_articulos=mysql_fetch_array(mysql_query($query));
if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
#----------------------------------------

$fecha=date("Y-n-d");
$hora=date("H:i:s");


      	
#----------------------------------------
$query='insert into pedidos_temp_nuevo set
id_sucursal="'.$id_sucursal.'",
id_articulos="'.$array_articulos["id"].'",
marca="'.$array_articulos["marca"].'",
descripcion="'.$array_articulos["descripcion"].'",
color="'.$array_articulos["color"].'",
contenido="'.$array_articulos["contenido"].'",
presentacion="'.$array_articulos["presentacion"].'",
codigo_barra="'.$array_articulos["codigo_barra"].'",
clasificacion="'.$array_articulos["clasificacion"].'",
subclasificacion="'.$array_articulos["subclasificacion"].'",
fecha="'.$fecha.'",
hora="'.$hora.'",
cantidad="1"
';											
												
mysql_query($query)or die(mysql_error()." - ".$query);
//pedidos_elimina_duplicados($id_session);

//echo $query;

//Header ("location: venta_actual.php");
include_once ("pedido_actual.php");
exit;


#4703
#----------------------------------------------------------------------
function pedidos_elimina_duplicados( $id_articulos ){
	$query='select * from pedidos_temp_nuevo where id_articulo="'.$id_session.'" order by id_articulos';
	$result=mysql_query($query) or die(mysql_error());
	while($row=mysql_fetch_array($result)){

		if($id_articulos==$row["id_articulos"]){
			$q='delete from pedidos_temp where id="'.$row["id"].'"';
			mysql_query($q);
		}else{
			$id_articulos=$row["id_articulos"];
		}
	}
}
#----------------------------------------------------------------------


?>