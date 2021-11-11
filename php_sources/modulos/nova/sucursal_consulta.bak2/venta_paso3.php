<?php
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");
include_once("includes/funciones.php");

#jrarquia 0 coresponde a administrador
if($jerarquia!="2"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 

$fecha=date("Y-n-d");
$hora=date("H:i:s");
$total_venta=0;

$array["id_session"]=$id_session;
$array["id"]="1";
$array["descripcion"]="tipo_pago";
$array["valor"]=$tipo_pago;
insert_or_update_ventas_temp_valores($array);



	#-------------------------------------------
	#redirecciona a venta finaliza en caso que se haya llamado desde venta actual 
	if(!$_POST["tipo_pago"]){
		Header ("location: venta_paso2.php?pago=NO");
		exit;   	
	}
	#-------------------------------------------


	if($_POST["tipo_pago"]=="contado"){	
		Header ("location: venta_paso5.php?tipo_pago=co");

	}


	if($_POST["tipo_pago"]=="debito"){	
		Header ("location: venta_paso5.php?tipo_pago=de");
	}


	///////////////////////
	// pago tarjeta
	///////////////////////
	if($_POST["tipo_pago"]=="tarjeta"){	
		Header ("location: venta_paso4_tarjetas.php?tipo_pago=ta");
	}
	////////////////////////
	

?>