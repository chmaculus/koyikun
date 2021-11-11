<?php 
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");
include_once("seguridad.inc.php");
//include("cabecera.inc.php");

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


#-----------------------------------------
if($_POST["accion"]=="ACTUALIZAR"){
	$query='select * from ventas_temp where id_session="'.$id_session.'"';
	$result=mysql_query($query) or die(mysql_error()." ".$query);

	$rows=mysql_num_rows($result);
	if($rows<1){ exit; }

	while($row=mysql_fetch_array($result)){
		$array_costo=array_costo($row["id_articulos"]);
		$q3='select descuento from margenes_descuentos where margen="'.$array_costo["margen"].'"';
		$array3=mysql_fetch_array(mysql_query($q3));


		if($_POST['descuento'.$row["id"]]>$array3[0]){
			//echo "des:".$_POST['descuento'.$row["id"]]."<br>";
			//echo "arr: ".$array3[0]."<br>";
			Header ("location: venta_actual.php?error=1");
			exit;
		}


		$cantidad=$_POST['cantidad'.$row["id"]];
		$descuento=$_POST['descuento'.$row["id"]];
		$array_precios=precio_sucursal($row["id_articulos"], 1);
		if($cantidad<"1"){
			$query2='delete from ventas_temp where id="'.$row["id"].'"';
		}
		if($cantidad>="1"){
			$query2='update ventas_temp set 	cantidad="'.$cantidad.'", 
														descuento="'.$descuento.'", 
														contado="'.$array_precios["precio_base"].'" 
															where id="'.$row["id"].'"';
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

		$array_costo=array_costo($row["id_articulos"]);
		$q3='select descuento from margenes_descuentos where margen="'.$array_costo["margen"].'"';
		$array3=mysql_fetch_array(mysql_query($q3));

		if($_POST['descuento'.$row["id"]]>$array3[0]){
			//echo "des:".$_POST['descuento'.$row["id"]]."<br>";
			//echo "arr: ".$array3[0]."<br>";
			Header ("location: venta_actual.php?error=1");
			exit;
		}

	#-------------------------------------------
	#redirecciona a venta finaliza en caso que se haya llamado desde venta actual 
	if(!$_POST["nombre"] or !$_POST["apellido"]){
		Header ("location: venta_finaliza.php");
		echo '<br><br><font size="20" color="#000000">Debe ingresar nombre</font><br><br>';
		exit;   	
	}
	#-------------------------------------------
	
	verifica_valor(12);
	$n_movimiento=get_valor(12);	

	$query='select * from ventas_temp where id_session="'.$id_session.'"';
	$result=mysql_query($query) or die(mysql_error()." ".$query);
	$rows=mysql_num_rows($result);
	if($rows<1){ exit; }

	while($row=mysql_fetch_array($result)){
		$array_articulos=detalle_articulo($row["id_articulos"]);
		$array_precios=precio_sucursal($row["id_articulos"],1);
		$array_stock_origen=array_stock($row["id_articulos"],1);
		$array_stock_destino=array_stock($row["id_articulos"],32);
		#--------------------------------------------------------------------------------------------------------
		$q='insert into stock_movimiento_interno set id_articulos="'.$row["id_articulos"].'",
															numero_envio="'.$n_movimiento.'",
															marca="'.$array_articulos["marca"].'",
															descripcion="'.$array_articulos["descripcion"].'",
															contenido="'.$array_articulos["contenido"].'",
															presentacion="'.$array_articulos["presentacion"].'",
															clasificacion="'.$array_articulos["clasificacion"].'",
															subclasificacion="'.$array_articulos["subclasificacion"].'",
															cantidad="'.$row["cantidad"].'",
															id_origen="1",
															id_destino="32",
															nombre="'.$_POST["nombre"].'",
															contado="'.$array_precios["precio_base"].'",
															descuento="'.$row["descuento"].'",
															fecha="'.$fecha.'",
															hora="'.$hora.'",
															verificado="N"
		';
		#--------------------------------------------------------------------------------------------------------
		/* query movimientos de stock origen / destino */
		//echo "q: ".$q."<br><br>".chr(13);
		mysql_query($q)or die(mysql_error()." ".$q);

		verifica_tabla_stock($row["id_articulos"], 1);
		//verifica_tabla_stock($row["id_articulos"], 32);

		descuenta_stock($row["cantidad"], $row["id_articulos"], $id_sucursal);
		
		#---------------------------------------------------------------------------------
		//inserta movimiento origen
		$ant1=$array_stock_origen["stock"];
		$nuevo1=( $ant1 - $row["cantidad"] );
		$query='insert into seguimiento_stock set
			id_articulo="'.$row["id_articulos"].'",
			stock_anterior="'.$ant1.'",
			stock_nuevo="'.$nuevo1.'",
			tipo="Tiquet interno",
			origen="1",
			destino="32",
			fecha="'.$fecha.'",
			hora="'.$hora.'",
			cantidad="'.$row["cantidad"].'",
			envio="'.$n_movimiento.'"';

		mysql_query($query);
		if(mysql_error()){ echo $query."<br>"; echo mysql_error()."<br>"; echo $_SERVER["SCRIPT_NAME"]."<br>"; 	}		
		#---------------------------------------------------------------------------------

	}
	set_valor(12, ($n_movimiento + 1) );
	
	$query='delete from ventas_temp where id_session="'.$id_session.'"';
	mysql_query($query) or die(mysql_error()." ".$query);

	$q='insert into stock_movimiento_interno_datos set apellido="'.$_POST["apellido"].'",
																		nombre="'.$_POST["nombre"].'",
																		direccion="'.$_POST["direccion"].'",
																		localidad="'.$_POST["localidad"].'",
																		cuotas="'.$_POST["cuotas"].'",
																		numero_movimiento="'.$n_movimiento.'",
																		fecha="'.$fecha.'",
																		hora="'.$hora.'"
																		';
	mysql_query($q);
	//echo $q."<br>";exit;
	if(mysql_error()){echo mysql_error()."<br>".$q."<br>".$_SERVER["SCRIPT_NAME"]."<br>";exit;}	
	Header ("location: articulos_busqueda.php");
	exit;   	
}
#-----------------------------------------


#-----------------------------------------
if($_POST["accion"]=="CANCELAR"){
	$query='delete from ventas_temp where id_session="'.$id_session.'"';
	mysql_query($query)or die(mysql_error()." - ".$query);

Header ("location: articulos_busqueda.php");
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
