<?php
	$fecha=date("Y-n-d");
	$hora=date("H:i:s");
	$total_venta=0;

	#-------------------------------------------
	#redirecciona a venta finaliza en caso que se haya llamado desde venta actual 
	if(!$_POST["tipo_pago"]){
		Header ("location: venta_finaliza.php?pago=NO");
		exit;   	
	}
	#-------------------------------------------
//	$total_venta=calcula_total_venta_temp($id_session);
	if($_POST["tipo_pago"]=="contado"){	$total=$_POST["total_contado"]; }
	if($_POST["tipo_pago"]=="debito"){	$total=$_POST["total_contado"]; }
	if($_POST["tipo_pago"]=="tarjeta"){	$total=$_POST["total_tarjeta"]; }
	

	$numero_venta=get_numero_venta($id_sucursal);
	
	$total_contado=$_POST["total_contado"];
	$total_tarjeta=$_POST["total_tarjeta"];

	if(!$_POST["vendedor"] OR $_POST["vendedor"]==""){
		$vendedor="S/V";
	}else{
		$vendedor=$_POST["vendedor"];
	}


	#--------------------------------------------------
	if($_POST["descuento"]!="" OR $_POST["descuento"]!=0){
		$aaa=verifica_autorizacion($_POST["cod_autoriz"]);
		if($aaa==0){
		Header ("location: venta_finaliza.php?autoriz=NO");
		exit;   	
		}
	}
	$aaa=verifica_autorizacion($_POST["cod_autoriz"]);
	if($aaa==1){
			$cod_descuento=get_valor(8);
			$cod_nuevo=$cod_descuento+3;
			$q='update valores set valor="'.$cod_nuevo.'" where id=8';
			mysql_query($q);
	}
	#--------------------------------------------------

	$descuento=str_replace( "," , "\." , $_POST["descuento"] );
	
	#---------------------------------------------------------------------------
	
	$query='select * from ventas_temp2 where id_session="'.$id_session.'"';
	$result=mysql_query($query) or die(mysql_error()." ".$query);
	$rows=mysql_num_rows($result);
	if($rows<1){ exit; }


	while($row=mysql_fetch_array($result)){
	
		$array_stock=stock_sucursal($row["id_articulos"],$id_sucursal);
		$array_precios=array_precios($row["id_articulos"], $id_sucursal );

		if($array_precios["rows"]<1){
			$array_precios=array_precios($row["id_articulos"], 1 );
		}
		$precio=$array_precios["precio_base"];
	
	if($array_precios["promocion"]=="S"){
		$array_promocion=get_promo( $row["id_articulos"], $id_sucursal );
		$promo=$array_promocion["precio_promocion"];
		$contado=$array_promocion["precio_promocion"];

		$contado = $promo;
		$precio = $promo;
		// corregir
		$tarjeta=$promo * ( 20 / 100 ) + $promo;
		$promocion="  **PROMO AF**";
		$tr='<tr class="special">';
	}
	
	$array_stock=stock_sucursal($row["id_articulos"],$id_sucursal);
	
	
		$precio_costo=calcula_precio_costo( $row["id_articulos"] );
		
		//venta_temp_ventas(, $row["id_articulos"], $numero_venta, , $nombre_sucursal, $vendedor, $fecha, $hora, $id_sucursal );
			$query='insert into ventas set cantidad="'.$row["cantidad"].'",
												numero_venta="'.$numero_venta.'",
												marca="'.comilla($row["marca"]).'",
												descripcion="'.comilla($row["descripcion"]).$promocion.'",
												clasificacion="'.comilla($row["clasificacion"]).'",
												subclasificacion="'.comilla($row["subclasificacion"]).'",
												precio_unitario="'.$precio.'",
												tipo_pago="'.$_POST["tipo_pago"].'",
												sucursal="'.$nombre_sucursal.'",
												vendedor="'.$vendedor.'",
												fecha="'.$fecha.'",
												hora="'.$hora.'",
												id_articulos="'.$row["id_articulos"].'",
												contenido="'.comilla($row["contenido"]).'",
												presentacion="'.comilla($row["presentacion"]).'",
												costo="'.$precio_costo.'"
							';
		mysql_query($query);

		if(mysql_error()){
			echo mysql_error();
			exit;
		}
		#---------------------------------------------------------------------------
		
		#---------------------------------------------------------------------------
		//$total_venta=$total_venta + $array_precios["precio_base"] * $row["cantidad"];
		descuenta_stock($row["cantidad"], $row["id_articulos"], $id_sucursal);
	#----------------------------------------
	$stock_nuevo=($array_stock["stock"] - $row["cantidad"]);
	$query='insert into seguimiento_stock set
		id_articulo="'.$row["id_articulos"].'",
		stock_anterior="'.$array_stock["stock"].'",
		stock_nuevo="'.$stock_nuevo.'",
		tipo="VENTA",
		origen="'.$id_sucursal.'",
		destino="",
		fecha="'.$fecha.'",
		hora="'.$hora.'",
		cantidad="'.$row["cantidad"].'",
		numero_venta="'.$numero_venta.'"';
	mysql_query($query);

	if(mysql_error()){
   	 echo "Q: ".$query."<br><br>";
    	echo "E: ".mysql_error()."<br><br>";
    	echo "S: ".$_SERVER["SCRIPT_NAME"]."<br><br>";
    	echo "S: ".$_SERVER["SCRIPT_NAME"]."<br><br>";
	}	

	}//end while
	
	#---------------------------------------------------------------------------




	#-----------------------------------------------------
	if( $_POST["descuento"] ){
		$descuento=( ($total - $descuento) * (-1) );
		$query='insert into ventas set cantidad="1", 
													marca="Descuento",
													descripcion="Descuento",
													numero_venta="'.$numero_venta.'",
													tipo_pago="'.$_POST["tipo_pago"].'",
													precio_unitario="'.$descuento.'",
													sucursal="'.$nombre_sucursal.'",
													vendedor="'.$vendedor.'",
													fecha="'.$fecha.'",
													hora="'.$hora.'"
		';
		mysql_query($query) or die(mysql_error()." ".$query);
	}
	#-----------------------------------------------------

	#-----------------------------------------------------
	if($_POST["tipo_pago"]=="debito"){	
		$porcentaje_debito=get_valor(6);
		$dif=($total_venta * $porcentaje_debito) / 100;  
		$query='insert into ventas set cantidad="1", 
													marca="Dif x financiacion Debito",
													descripcion="Debito",
													numero_venta="'.$numero_venta.'",
													tipo_pago="'.$_POST["tipo_pago"].'",
													precio_unitario="'.$dif.'",
													sucursal="'.$nombre_sucursal.'",
													vendedor="'.$vendedor.'",
													fecha="'.$fecha.'",
													hora="'.$hora.'"
		';
		mysql_query($query) or die(mysql_error()." ".$query);
	}
	#-----------------------------------------------------
	#-----------------------------------------------------
	if($_POST["tipo_pago"]=="tarjeta"){	
		$porcentaje_credito=20;
		$dif=($total_contado * $porcentaje_credito ) / 100 ;  
		$query='insert into ventas set cantidad="1", 
													marca="Dif x financiacion Credito",
													descripcion="Credito",
													numero_venta="'.$numero_venta.'",
													tipo_pago="'.$_POST["tipo_pago"].'",
													precio_unitario="'.$dif.'",
													sucursal="'.$nombre_sucursal.'",
													vendedor="'.$vendedor.'",
													fecha="'.$fecha.'",
													hora="'.$hora.'"
		';
		mysql_query($query) or die(mysql_error()." ".$query);
	}
	#-----------------------------------------------------

	$query='delete from ventas_temp where id_session="'.$id_session.'"';
	mysql_query($query) or die(mysql_error()." ".$query);

	$query='delete from ventas_temp2 where id_session="'.$id_session.'"';
	mysql_query($query) or die(mysql_error()." ".$query);

	incrementa_n_venta($id_sucursal);

	
	function verifica_autorizacion($numero){
		$cod_descuento=get_valor(8);
		$cod_aut=($cod_descuento + 9 ) * 3;
		if($numero==$cod_aut){
			return 1;
		}else{
			return 0;
		}
	}

?>