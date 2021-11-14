<?php
include_once("facturas_compra_base.php");



include_once("../includes/connect.php");
include_once("../includes/funciones_varias.php");
$fecha=date("Y-n-d");
$hora=date("H:i:s");



#---------------------------------------------------------------------------------
if($_POST["accion"]=="ingreso"){

	$query='insert into facturas_compra set
		fecha_factura="'.fecha_conv("/",$_POST["fecha_factura"]).'",
		proveedor="'.$_POST["proveedor"].'",
		numero_factura="'.$_POST["numero_factura"].'",
		importe="'.$_POST["importe"].'",
		fecha_ingreso="'.$fecha.'",
		hora_ingreso="'.$hora.'"
		';
		echo $query."<br>";
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
	$id_facturas_compra=mysql_insert_id($id_connection);


	#muestra registro ingresado
	$query='select * from facturas_compra where id="'.$id_facturas_compra.'"';
	$array_facturas_compra=mysql_fetch_array(mysql_query($query));
	include("facturas_compra_muestra.inc.php");
}
#---------------------------------------------------------------------------------


#---------------------------------------------------------------------------------
if($_POST["accion"]=="modificacion"){
		$id_facturas_compra=$_POST["id_facturas_compra"];
		
		$query='update facturas_compra set
		fecha_factura="'.fecha_conv("/",$_POST["fecha_factura"]).'",
		proveedor="'.$_POST["proveedor"].'",
		numero_factura="'.$_POST["numero_factura"].'",
		importe="'.$_POST["importe"].'",
		fecha_ingreso="'.$fecha.'",
		hora_ingreso="'.$hora.'"
				where id="'.$id_facturas_compra.'"
			';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}

	#muestra registro ingresado
	$query='select * from facturas_compra where id="'.$id_facturas_compra.'"';
	$array_facturas_compra=mysql_fetch_array(mysql_query($query));
	include("facturas_compra_muestra.inc.php");
}
#---------------------------------------------------------------------------------



?>





<?php
if(!mysql_error()){
	if($_POST["accion"]=="ingreso"){
		echo '<td><font1>Los datos se ingresaron correctamente</font1></td>';
	}
	if($_POST["accion"]=="modificacion"){
		echo '<td><font1>Los datos se actualizaron correctamente</font1></td>';
	}
}
if($_POST["accion"]=="ELIMINAR"){
 	$query='delete from facturas_compra where id="'.$id_facturas_compra.'"';
 	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
 	exit;
}


?>
</center>
</body>
</html>
