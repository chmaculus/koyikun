<?php
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");

#jrarquia 0 coresponde a administrador
if($jerarquia!="2"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 

include_once("../../includes/funciones_costos.php");
include_once("../../includes/funciones_promocion.php");
include_once("../../includes/funciones_valores.php");
include_once("../../includes/funciones_precios.php");
include_once("../../includes/funciones_varias.php");
include_once("../../includes/funciones_ventas.php");
include_once("../../includes/funciones_stock.php");
include_once("../../includes/funciones_articulos.php");

$query='select * from ventas_temp2 where id_session="'.$id_session.'" order by marca, clasificacion, subclasificacion, contenido, presentacion';
$result=mysql_query($query) or die(mysql_error());
$rows=mysql_num_rows($result);
if($rows<1){
	Header ("location: index.php");
}


include("cabecera.inc.php");

echo '<body>'; 
echo '<center>'; 




/*
cuando graba en ventas_temp2 tiene que verificar la promocion x fecha

logica grabar en ventas
1 verifica la autorizacion
2 trae precio y verifica precio promocion
3 tipo de pago, el caso de pago con tarjeta registrar pagos e interes

numero ventas
vendedor

descuenta stock
seguimiento stock


#cuando trae precio tiene que verificar el precio de promocion


*/

$fecha=date("Y-n-d");
$hora=date("H:i:s");
$id_session=$_COOKIE["id_session"];
$id_sucursal=$_COOKIE["id_sucursal"];

$nombre_sucursal=nombre_sucursal($id_sucursal);

include("includes/venta_muestra1.inc.php");



if($_GET["tipo_pago"]){
	$tipo_pago=$_GET["tipo_pago"];
}elseif($_POST["tipo_pago"]){
	$tipo_pago=$_POST["tipo_pago"];
}



#-------------------------------------------------------------------------------------------------
#graba valores temporales en tabla
if($_POST["tipo_pago"]){
	$array["id_session"]=$id_session;
	$array["id"]="1";
	$array["descripcion"]="tipo_pago";
	$array["valor"]=$_POST["tipo_pago"];
	insert_or_update_ventas_temp_valores($array);
	$tipo_pago=$_POST["tipo_pago"];
}else{
	$tipo_pago=get_ventas_temp_valores($id_session,1);
}


if($_POST["id_tarjeta"]){
	$array["id_session"]=$id_session;
	$array["id"]="2";
	$array["descripcion"]="id_tarjeta";
	$array["valor"]=$_POST["id_tarjeta"];
	insert_or_update_ventas_temp_valores($array);
	$id_tarjeta=$_POST["id_tarjeta"];
}else{
	$id_tarjeta=get_ventas_temp_valores($id_session,2);
}


if($_POST["tarjeta"]){
	$array["id_session"]=$id_session;
	$array["id"]="3";
	$array["descripcion"]="tarjeta";
	$array["valor"]=$_POST["tarjeta"];
	insert_or_update_ventas_temp_valores($array);
	$tarjeta=$_POST["tarjeta"];
}else{
	$tarjeta=get_ventas_temp_valores($id_session,3);
}


if($_POST["pagos"]){
	$array["id_session"]=$id_session;
	$array["id"]="4";
	$array["descripcion"]="pagos";
	$array["valor"]=$_POST["pagos"];
	insert_or_update_ventas_temp_valores($array);
	$pagos=$_POST["pagos"];
}else{
	$pagos=get_ventas_temp_valores($id_session,4);
}
#fin graba valores temporales en tabla
#-------------------------------------------------------------------------------------------------






#------------------------------------------------------------------------------------
# preveer que redireccione a volver a ingresar vendedor
	if($_POST["vendedor"]<=1 OR $_POST["vendedor"]>=100000){
		Header ("location: venta_paso5.php?vendedor=NO");
		exit;
	}else{
		$vendedor=$_POST["vendedor"];
	}
#------------------------------------------------------------------------------------






#---------------------------------------------------------------------------
#descuentos
if($_POST["descuento"]!="" OR $_POST["descuento"]!=0){
		$aaa=verifica_autorizacion($_POST["cod_autoriz"]);
		if($aaa==0){
			Header ("location: venta_paso5.php?autoriz=NO");
			exit;   	
		}
		if($aaa==1){
			$cod_descuento=get_valor(8);
			$cod_nuevo=$cod_descuento+3;
			$q='update valores set valor="'.$cod_nuevo.'" where id=8';
			mysql_query($q);
	
		}
}
#---------------------------------------------------------------------------


	

#--------------------------------------------------------------------------------------------------------------------
$numero_venta=incrementa_n_venta($id_sucursal);
#--------------------------------------------------------------------------------------------------------------------





#---------------------------------------------------------------------------
//total venta
$q='select sum(cantidad * precio) from ventas_temp2 where id_session="'.$id_session.'"';
$arrayab=mysql_fetch_array(mysql_query($q));
$total_venta=$arrayab[0];
#---------------------------------------------------------------------------





/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
#---------------------------------------------------------------------------
$query='select * from ventas_temp2 where id_session="'.$id_session.'"';
$result=mysql_query($query) or die(mysql_error()." ".$query);
$rows=mysql_num_rows($result);
if($rows<1){ exit; }









#obtiene tasa de interes	
#--------------------------------------------------------------------------------------------------------------------
if($tipo_pago=="ta"){
	
$q='select * from  tarjetas_coeficientes where id_tarjeta="'.$id_tarjeta.'" and cantidad_pagos="'.$pagos.'"';
$r=mysql_query($q);
$rows=mysql_num_rows($r);
if($rows==1){
	$array1=mysql_fetch_array($r);
	$coeficiente=$array1["coeficiente"];
}else{
	echo "No se pudo obtener tasa de interes";
}
}
#--------------------------------------------------------------------------------------------------------------------
	






	



#---------------------------------------------------------------------------
if($tipo_pago=="ta"){
	$total_financiado=round(($total_venta * $coeficiente),2);
	$diferencia_financiado=round(($total_financiado - $total_venta),2);
	$valor_cuota=round(($total_financiado / $pagos),2);
}
#---------------------------------------------------------------------------
















#--------------------------------------------------------------------------------------------------------------------
#while
	while($row=mysql_fetch_array($result)){
	
		######array precios
		$array_stock=stock_sucursal($row["id_articulos"],$id_sucursal);
		$array_precios=array_precios($row["id_articulos"], $id_sucursal );

		if($array_precios["rows"]<1){
			$array_precios=array_precios($row["id_articulos"], 1 );
		}
		$precio=$array_precios["precio_base"];
		######array precios
	
	if($array_precios["promocion"]=="S"){
		$array_promocion=get_promo( $row["id_articulos"], $id_sucursal );
		$promo=$array_promocion["precio_promocion"];
		$contado=$array_promocion["precio_promocion"];

		$contado = $promo;
		$precio = $promo;
		$str1="S";
		$promocion="  **PROMO AF**";
		$tr='<tr class="special">';
	}else{
		$str1="N";
	}
		$precio_costo=calcula_precio_costo( $row["id_articulos"] );
	
		//venta_temp_ventas(, $row["id_articulos"], $numero_venta, , $nombre_sucursal, $vendedor, $fecha, $hora, $id_sucursal );
	$query='insert into ventas set cantidad="'.$row["cantidad"].'",
												numero_venta="'.$numero_venta.'",
												marca="'.mysql_real_escape_string($row["marca"]).'",
												descripcion="'.mysql_real_escape_string($row["descripcion"]).$promocion.'",
												clasificacion="'.mysql_real_escape_string($row["clasificacion"]).'",
												subclasificacion="'.mysql_real_escape_string($row["subclasificacion"]).'",
												precio_unitario="'.$precio.'",
												
												sucursal="'.$nombre_sucursal.'",
												vendedor="'.$vendedor.'",
												fecha="'.$fecha.'",
												hora="'.$hora.'",
												id_articulos="'.$row["id_articulos"].'",
												contenido="'.mysql_real_escape_string($row["contenido"]).'",
												presentacion="'.mysql_real_escape_string($row["presentacion"]).'",
												costo="'.$precio_costo.'",
												
												tipo_pago="'.$tipo_pago.'",
												tarjeta="'.$tarjeta.'",
												tarjeta_pagos="'.$pagos.'",
												tarjeta_monto_pagos="'.$monto.'",

												promocion="'.$str1.'"
												
							';

							//echo $query."<br><br>";

	mysql_query($query);
	if(mysql_error()){ 	echo mysql_error(); exit; }
		

		
	#---------------------------------------------------------------------------
	//$total_venta=$total_venta + $array_precios["precio_base"] * $row["cantidad"];
	$arraya=descuenta_stock($row["cantidad"], $row["id_articulos"], $id_sucursal);
		
	

	#----------------------------------------
	# seguimiento stock
	$stock_nuevo=($array_stock["stock"] - $row["cantidad"]);
	$query='insert into seguimiento_stock set
		id_articulo="'.$row["id_articulos"].'",
		stock_anterior="'.$array_stock["stock"].'",
		stock_nuevo="'.$stock_nuevo.'",
		tipo="VENTA",
		origen="'.$id_sucursal.'",
		destino="CLIENTE",
		fecha="'.$fecha.'",
		hora="'.$hora.'",
		cantidad="'.$row["cantidad"].'",
		vendedor="'.$vendedor.'",
		numero_venta="'.$numero_venta.'"';

//	echo $query."<br><br>";

	mysql_query($query);

	if(mysql_error()){
   	 echo "Q: ".$query."<br><br>";
    	echo "E: ".mysql_error()."<br><br>";
    	echo "S: ".$_SERVER["SCRIPT_NAME"]."<br><br>";
	}
	# fin seguimiento stock
	#-------------------------------------------------------

	
	echo '-----------------------------------------------<br>';
}//end while
#---------------------------------------------------------------------------
/////////////////////////////////////////////////////////////////////////////////////////////////////





#---------------------------------------------------------------------------
#---------------------------------------------------------------------------
echo '<table border="1">';
echo '	<tr>';
echo '		<td>numero venta</td>';
echo '		<td>'. $numero_venta.'</td>';
echo '	</tr>';

echo '	<tr>';
echo '		<td>Total venta</td>';
echo '		<td>$ '. $total_venta.'</td>';
echo '	</tr>';

if($tipo_pago=="ta"){
	echo '	<tr>';
	echo '		<td>Total financiado</td>';
	echo '		<td>'. $total_financiado.'</td>';
	echo '	</tr>';
	echo '	<tr>';
	echo '		<td>Cuotas</td>';
	echo '		<td>'. $pagos.'</td>';
	echo '	</tr>';
	echo '	<tr>';
	echo '		<td>Valor cuota</td>';
	echo '		<td>$ '. $valor_cuota.'</td>';
	echo '	</tr>';
}

echo '	<tr>';
echo '		<td>Sucursal</td>';
echo '		<td>'. $sucursal.'</td>';
echo '	</tr>';

echo '	<tr>';
echo '		<td>Vendedor</td>';
echo '		<td>'. $vendedor.'</td>';
echo '	</tr>';

echo '	<tr>';
echo '		<td>Tipo de pago</td>';
echo '		<td>'. $tipo_pago.'</td>';
echo '	</tr>';

echo '</table>';	
#---------------------------------------------------------------------------
#---------------------------------------------------------------------------

















#---------------------------------------------------------------------------
# descuentos
$descuento=str_replace( "," , "\." , $_POST["descuento"] );
//echo "POST descuento: ".$_POST["descuento"]."<br><br>";
	
if( $_POST["descuento"] ){
		$des=( ($total_venta - $descuento) * (-1) );
		$query='insert into ventas set cantidad="1", 
													marca="Descuento",
													descripcion="Descuento",
													numero_venta="'.$numero_venta.'",
													tipo_pago="'.$_POST["tipo_pago"].'",
													precio_unitario="'.$des.'",
													sucursal="'.$nombre_sucursal.'",
													vendedor="'.$vendedor.'",
													fecha="'.$fecha.'",
													hora="'.$hora.'"
		';
		mysql_query($query);
		if(mysql_error()){echo mysql_error()." ".$query."<br>"; }
	
}
# fin descuentos
#---------------------------------------------------------------------------

	




	
	
	#-----------------------------------------------------
	if($_POST["tipo_pago"]=="de"){	
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
	
//echo "query tarjeta: ".$query."<br><br>";
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



	#-----------------------------------------------------
	if($_POST["tipo_pago"]=="ta"){	
		$dif=($total_contado * $porcentaje_credito ) / 100 ;  
		$query='insert into ventas set cantidad="1", 
													marca="Dif x financiacion Credito",
													descripcion="Credito",
													numero_venta="'.$numero_venta.'",
													tipo_pago="'.$_POST["tipo_pago"].'",
													precio_unitario="'.$diferencia_financiado.'",
													sucursal="'.$nombre_sucursal.'",
													vendedor="'.$vendedor.'",
													fecha="'.$fecha.'",
													hora="'.$hora.'"
		';
		mysql_query($query) or die(mysql_error()." ".$query);
	}
	#-----------------------------------------------------

	//echo "query tarjeta: ".$query."<br><br>";
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	
	
	$query='delete from ventas_temp where id_session="'.$id_session.'"';
	mysql_query($query) or die(mysql_error()." ".$query);

	$query='delete from ventas_temp2 where id_session="'.$id_session.'"';
	mysql_query($query) or die(mysql_error()." ".$query);


	





	
#---------------------------------------------------------------------------
function verifica_autorizacion($numero){
		$cod_descuento=get_valor(8);
		$cod_aut=($cod_descuento * 2 ) + 7;
		if($numero==$cod_aut){
			return 1;
		}else{
			return 0;
		}
}
#---------------------------------------------------------------------------


#---------------------------------------------------------------------------
function calcula_total_venta2($id_session){
	$q='select id_articulo,promocion from ventas_temp2 where id_session="'.$id_session.'"';
	$r=mysql_query($q);
	while($row=mysql_fetch_array($r)){
		if($row["promocion"]=="S"){
			//verifica_promocion			
		}
	}
}
#---------------------------------------------------------------------------




?>
</table></center>
</form>



