<?php 
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");
include_once("seguridad.inc.php");
include("base.php");


include_once("../../includes/funciones_varias.php");
include_once("../../includes/funciones_stock.php");
include_once("../../includes/funciones_precios.php");
include_once("../../includes/funciones_articulos.php");
include_once("../../includes/funciones_valores.php");
include_once("../includes/funciones_costos.php");

$id_session=$_COOKIE["id_session"];
$id_sucursal=$_COOKIE["id_sucursal"];
$id_destino=$_POST["id_destino"];

$nombre_sucursal=nombre_sucursal($id_sucursal);

$fecha=date("Y-n-d");
$hora=date("H:i:s");


#--------------------------------------------------
if($_POST["cuotas"]<1){
	$cuotas=0;
}else{
	$cuotas=$_POST["cuotas"];
}
$q='update stock_movimiento_interno_datos set 
		apellido="'.$_POST["apellido"].'",
		nombre="'.$_POST["nombre"].'",
		direccion="'.$_POST["direccion"].'",
		localidad="'.$_POST["localidad"].'",
		cuotas='.$cuotas.',
		fecha="'.$fecha.'",
		hora="'.$hora.'"
		where numero_movimiento="'.$_POST["numero_envio"].'"
';
echo $q."<br>";

mysql_query($q);
if(mysql_error()){echo mysql_error()."<br>".$q."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}	

#--------------------------------------------------



#--------------------------------------------------
$query=base64_decode($_POST["query"]);
$res=mysql_query($query);
while($row=mysql_fetch_array($res)){
	if($_POST["cantidad".$row["id"]]<1){
		$q='delete from stock_movimiento_interno where id="'.$row["id"].'"';
	}else{
		$q='update stock_movimiento_interno set cantidad="'.$_POST["cantidad".$row["id"]].'", descuento="'.$_POST["descuento".$row["id"]].'" where id="'.$row["id"].'"';
	}
	echo $q."<br>";
	mysql_query($q);
	if(mysql_error()){
		log_this("update3".date("Ym").".log",$q);
		log_this("update3".date("Ym").".log",mysql_error());

	}
}
#--------------------------------------------------





?>
