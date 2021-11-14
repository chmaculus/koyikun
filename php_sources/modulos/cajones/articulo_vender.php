<?php 
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");
include_once("seguridad.inc.php");
include("cabecera.inc.php");

$id_session=$_COOKIE["id_session"];
$id_sucursal=$_COOKIE["id_sucursal"];


if($_GET["id_articulo"]){
	$id_articulos=$_GET["id_articulo"];
}else{
	exit;
}

$rows_cajon=verifica_cajon($id_session);

if($rows_cajon<1){
	echo '<font1>Debe ingresar un cajon<font1><br>';
	exit; 
}


$query='insert into ventas_temp set id_session="'.$id_session.'",
												id_sucursal="'.$id_sucursal.'",
												id_articulos="'.$id_articulos.'",
												cantidad="1",
												session_finaliza="'.$finaliza.'"
												';
mysql_query($query)or die(mysql_error()." - ".$query);
elimina_duplicados($id_session);

//Header ("location: venta_actual.php");
include_once ("venta_actual.php");
exit;

#----------------------------------------------------------------------
function elimina_duplicados( $id_session ){
	$query='select * from ventas_temp where id_session="'.$id_session.'" order by id_articulos';
	$result=mysql_query($query) or die(mysql_error());
	while($row=mysql_fetch_array($result)){

		if($id_articulos==$row["id_articulos"]){
			$q='delete from ventas_temp where id="'.$row["id"].'"';
			mysql_query($q);
		}else{
			$id_articulos=$row["id_articulos"];
		}
	}
}
#----------------------------------------------------------------------

#----------------------------------------------------------------------
function verifica_cajon($id_session){
		$q='select * from cajones where id_session="'.$id_session.'"';
		$r=mysql_query($q);
		$rows=mysql_num_rows($r);
		return $rows;
}
#----------------------------------------------------------------------

?>