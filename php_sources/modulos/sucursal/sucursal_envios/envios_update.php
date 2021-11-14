<?php 
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");
include_once("seguridad.inc.php");
include("cabecera.inc.php");

include_once("../../includes/funciones_varias.php");
include_once("../../includes/funciones_stock.php");
include_once("../../includes/funciones_articulos.php");
include_once("../../includes/funciones_valores.php");

$id_session=$_COOKIE["id_session"];
$id_sucursal=$_COOKIE["id_sucursal"];
$id_destino=$_POST["id_destino"];

$nombre_sucursal=nombre_sucursal($id_sucursal);

$fecha=date("Y-n-d");
$hora=date("H:i:s");


#-----------------------------------------
if($_POST["accion"]=="ACTUALIZAR"){
	$query='select * from envios_temp where id_sucursal="'.$id_sucursal.'"';
	$result=mysql_query($query) or die(mysql_error()." ".$query);

	$rows=mysql_num_rows($result);
	if($rows<1){ exit; }

	while($row=mysql_fetch_array($result)){
		$cantidad=$_POST['cantidad'.$row["id"]];
		if($cantidad<"1"){
			$query2='delete from envios_temp where id="'.$row["id"].'"';
		}
		if($cantidad>="1"){
			$query2='update envios_temp set cantidad="'.$cantidad.'" where id="'.$row["id"].'"';
		}
		mysql_query($query2)or die(mysql_error());
	}

Header ("location: envio_actual.php");
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
		Header ("location: envio_finaliza.php");
		exit;   	
	}
	#-------------------------------------------
	
	verifica_valor(4);
	$n_pedido=get_valor("4");	
	
	
	

	$query='select * from envios_temp where id_session="'.$id_session.'"';
	$result=mysql_query($query) or die(mysql_error()." ".$query);
	$rows=mysql_num_rows($result);
	if($rows<1){ exit; }

	while($row=mysql_fetch_array($result)){
		$array_articulos=detalle_articulo($row["id_articulos"]);
		//$array_stock_origen=array_stock($row["id_articulos"],$id_sucursal);
		//$array_stock_destino=array_stock($row["id_articulos"],$_POST["id_destino"]);
		
		#---------------------------------------------------------------------------------
		
		#---------------------------------------------------------------------------------
	}
	
	$query='delete from envios_temp where id_session="'.$id_session.'"';
	mysql_query($query) or die(mysql_error()." ".$query);

	Header ("location: articulos_busqueda.php");
	exit;   	
}
#-----------------------------------------


if($_POST["accion"]=="FINALIZADO"){
$n_pedido=get_numero_pedido($id_sucursal);
	$fecha=date("Y-n-d");
	$hora=date("H:i:s");
	
	$query='select * from envios_temp where id_session="'.$id_session.'"';
	$result=mysql_query($query) or die(mysql_error()." ".$query);
	$rows=mysql_num_rows($result);
	if($rows<1){ exit; }

	while($row=mysql_fetch_array($result)){
		$query='insert into pedidos set 
			id_articulo="'.$row["id_articulos"].'",
			numero_pedido="'.$n_pedido.'",
			marca="'.$row["marca"].'",
			descripcion="'.$row["descripcion"].'",
			contenido="'.$row["contenido"].'",
			presentacion="'.$row["presentacion"].'",
			clasificacion="'.$row["clasificacion"].'",
			subclasificacion="'.$row["subclasificacion"].'",
			cantidad_solicitada="'.$row["cantidad"].'",
			cantidad_recibida="'.$row["cantidad_recibida"].'",
			sucursal="'.$id_sucursal.'",
			fecha="'.$fecha.'",
			hora="'.$hora.'",
			finalizado="N"';

		//mysql_query($query) or die(mysql_error()." ".$query);
		echo $query."<br>";
		
		if(mysql_error()){
		   echo "Q: ".$query."<br>";
    		echo "E: ".mysql_error()."<br>";
    		echo "S: ".$_SERVER["SCRIPT_NAME"]."<br>";
    	
		}
	}
	incrementa_n_pedido($id_sucursal);

	$query='delete from pedidos_temp where id_session="'.$id_session.'"';
	mysql_query($query) or die(mysql_error()." ".$query);

echo '<font size="3" color="#000000">El pedido se ha enviado correntamente y en la brevedad será precesado"</font>';


}




#-----------------------------------------
if($_POST["accion"]=="CANCELAR"){
	$query='delete from pedidos_temp where id_session="'.$id_session.'"';
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

	$query='insert into pedidos_temp set id_session="'.$id_session.'",
													id_sucursal="'.$id_sucursal.'",
													id_articulos="'.$id_articulos.'",
													cantidad="1"
													';
	mysql_query($query)or die(mysql_error()." - ".$query);

}
#-----------------------------------------



#-----------------------------------------
function get_numero_pedido($id_sucursal){
	$query='select * from pedido_numero where id_sucursal="'.$id_sucursal.'"';
	$result=mysql_query($query) or die(mysql_error());
	$rows=mysql_num_rows($result);
	if($rows<"1"){
		$numero_venta="1";
		$q1='insert into pedido_numero set numero="1", id_sucursal="'.$id_sucursal.'"';
		mysql_query($q1)or die(mysql_error());
	}else{
		$array_nventa=mysql_fetch_array($result);
		$numero_venta=$array_nventa["numero"];
	}	
	
return $numero_venta;
}
#-----------------------------------------


#-----------------------------------------
function incrementa_n_pedido($id_sucursal){
	$query='select * from pedido_numero where id_sucursal="'.$id_sucursal.'"';
	$result=mysql_query($query) or die(mysql_error());
	$array_pedido=mysql_fetch_array($result);
	$numero_pedido=$array_pedido["numero"];
	$q1='update pedido_numero set numero="'.( $numero_pedido + 1 ).'" where  id_sucursal="'.$id_sucursal.'"';
	mysql_query($q1)or die(mysql_error());
}
#-----------------------------------------

//echo "Finalizado";


?>
