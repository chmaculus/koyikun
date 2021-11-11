<?php 
include_once("../includes/connect.php");
include_once("../login/login_verifica.inc.php");
include_once("seguridad.inc.php");
//include("cabecera.inc.php");

include_once("../includes/funciones2.php");

$id_session=$_COOKIE["id_session"];
$id_sucursal=$_COOKIE["id_sucursal"];
$id_destino=$_POST["id_destino"];

$nombre_sucursal=nombre_sucursal($id_sucursal);

$fecha=date("Y-n-d");
$hora=date("H:i:s");


#-----------------------------------------
if($_POST["accion"]=="ACTUALIZAR"){
	$query='select * from ventas_temp where id_session="'.$id_session.'"';
	$result=mysql_query($query) or die(mysql_error()." ".$query);

	$rows=mysql_num_rows($result);
	if($rows<1){ exit; }

	while($row=mysql_fetch_array($result)){
		$cantidad=$_POST['cantidad'.$row["id"]];
		if($cantidad<"1"){
			$query2='delete from ventas_temp where id="'.$row["id"].'"';
		}
		if($cantidad>="1"){
			$query2='update ventas_temp set cantidad="'.$cantidad.'" where id="'.$row["id"].'"';
		}
		mysql_query($query2)or die(mysql_error());
	}

Header ("location: venta_actual.php");
exit;
}
#-----------------------------------------



#-----------------------------------------
if($_POST["accion"]=="FINALIZAR"){
	$fecha=date("Y-n-d");
	$hora=date("H:i:s");


	#-------------------------------------------
	#redirecciona a venta finaliza en caso que se haya llamado desde venta actual 
	if(!$_POST["id_destino"]){
		Header ("location: venta_finaliza.php");
		exit;   	
	}
	#-------------------------------------------
	
	$array_valor=mysql_fetch_array(mysql_query('select valor from valores where id=4'));	

	$query='select * from ventas_temp where id_session="'.$id_session.'"';
	$result=mysql_query($query) or die(mysql_error()." ".$query);
	$rows=mysql_num_rows($result);
	if($rows<1){ exit; }

	while($row=mysql_fetch_array($result)){
		$array_articulos=detalle_articulo($row["id_articulos"]);
		#--------------------------------------------------------------------------------------------------------
		$q='insert into stock_movimiento set 	id_articulos="'.$row["id_articulos"].'",
															numero_envio="'.$array_valor["valor"].'",
															marca="'.$array_articulos["marca"].'",
															descripcion="'.$array_articulos["descripcion"].'",
															contenido="'.$array_articulos["contenido"].'",
															presentacion="'.$array_articulos["presentacion"].'",
															clasificacion="'.$array_articulos["clasificacion"].'",
															subclasificacion="'.$array_articulos["subclasificacion"].'",
															cantidad="'.$row["cantidad"].'",
															id_origen="'.$id_sucursal.'",
															id_destino="'.$_POST["id_destino"].'",
															fecha="'.$fecha.'",
															hora="'.$hora.'",
															verificado="N"
		';
		#--------------------------------------------------------------------------------------------------------
		/* query movimientos de stock origen / destino */
		//echo "q: ".$q."<br><br>".chr(13);
		mysql_query($q)or die(mysql_error()." ".$q);

		$stock_origen=verifica_stock_sucursal($row["id_articulos"], $id_sucursal);
		$stock_destino=verifica_stock_sucursal($row["id_articulos"], $id_destino);

		//echo "stock_origen: ".$stock_origen["stock"]."<br>".chr(13);
		//echo "stock_destino: ".$stock_destino["stock"]."<br>".chr(13);

		descuenta_stock($row["cantidad"], $row["id_articulos"], $id_sucursal);
		descuenta_stock(( $row["cantidad"] * -1 ), $row["id_articulos"], $id_destino);
		
	}
	$valor_nuevo=( $array_valor["valor"] + 1 );
	$q2='update valores set valor="'.$valor_nuevo.'" where id=4';
	mysql_query($q2);

	$query='delete from ventas_temp where id_session="'.$id_session.'"';
	mysql_query($query) or die(mysql_error()." ".$query);

	exit;   	

}
#-----------------------------------------


#-----------------------------------------
if($_POST["accion"]=="CANCELAR"){
	$query='delete from ventas_temp where id_session="'.$id_session.'"';
	mysql_query($query)or die(mysql_error()." - ".$query);

Header ("location: ../consulta/consulta_precios.php");
exit;
}
#-----------------------------------------


#-----------------------------------------
if($_POST["accion"]=="vender"){
	if($_POST["id_articulo"]){
		$id_articulos=$_POST["id_articulo"];
	}else{
		exit;
	}

	$query='insert into ventas_temp set id_session="'.$id_session.'",
													id_sucursal="'.$id_sucursal.'",
													id_articulos="'.$id_articulos.'",
													cantidad="1"
													';
	mysql_query($query)or die(mysql_error()." - ".$query);

}
#-----------------------------------------




?>
