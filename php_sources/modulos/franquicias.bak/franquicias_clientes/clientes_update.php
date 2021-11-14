<?php
include_once("cabecera.inc.php");
include_once("../includes/connect.php");

$fecha=date("Y-n-d");
$hora=date("H:i:s");

if($_POST["id_clientes"]){
    $id_clientes=$_POST["id_clientes"];
}

if($_POST["accion"]=="ingreso"){
	$query='insert into clientes set
		razon_social="'.$_POST["razon_social"].'",
		nombres="'.$_POST["nombres"].'",
		condicion_iva="'.$_POST["condicion_iva"].'",
		cuit="'.$_POST["cuit"].'",
		tipo_cliente="'.$_POST["tipo_cliente"].'",
		carnet="'.$_POST["carnet"].'",
		direccion="'.$_POST["direccion"].'",
		ciudad="'.$_POST["ciudad"].'",
		provincia="'.$_POST["provincia"].'",
		pais="'.$_POST["pais"].'",
		codigo_postal="'.$_POST["codigo_postal"].'",
		email="'.$_POST["email"].'",
		pagina_web="'.$_POST["pagina_web"].'",
		telefonos="'.$_POST["telefonos"].'",
		fax="'.$_POST["fax"].'",
		vendedor="'.$_POST["vendedor"].'",
		informacion_contacto="'.$_POST["informacion_contacto"].'",
		observaciones="'.$_POST["observaciones"].'",
		sucursal="'.$_POST["sucursal"].'",
		fecha="'.$fecha.'",
		hora="'.$hora.'"
		';
	mysql_query($query)or die(mysql_error());
	$id_clientes=mysql_insert_id($id_connection);
}


if($_POST["accion"]=="modificacion"){
		$query='update clientes set
			razon_social="'.$_POST["razon_social"].'",
			nombres="'.$_POST["nombres"].'",
			condicion_iva="'.$_POST["condicion_iva"].'",
			cuit="'.$_POST["cuit"].'",
			tipo_cliente="'.$_POST["tipo_cliente"].'",
			carnet="'.$_POST["carnet"].'",
			direccion="'.$_POST["direccion"].'",
			ciudad="'.$_POST["ciudad"].'",
			provincia="'.$_POST["provincia"].'",
			pais="'.$_POST["pais"].'",
			codigo_postal="'.$_POST["codigo_postal"].'",
			email="'.$_POST["email"].'",
			pagina_web="'.$_POST["pagina_web"].'",
			telefonos="'.$_POST["telefonos"].'",
			fax="'.$_POST["fax"].'",
			vendedor="'.$_POST["vendedor"].'",
			informacion_contacto="'.$_POST["informacion_contacto"].'",
			observaciones="'.$_POST["observaciones"].'",
			sucursal="'.$_POST["sucursal"].'",
			fecha="'.$fecha.'",
			hora="'.$hora.'"
				where id="'.$_POST["id_clientes"].'"
	';
	mysql_query($query)or die(mysql_error());
	$id_clientes=$_POST["id_clientes"];
}

#muestra registro ingresado
$query='select * from clientes where id="'.$id_clientes.'"';
$array_clientes=mysql_fetch_array(mysql_query($query));

if($array_clientes["condicion_iva"]=="DNI"){
	include("clientes_muestra_persona.inc.php");
}else{
	include("clientes_muestra_empresa.inc.php");
}


if(!mysql_error()){
	echo '<center>';
	if($_POST["accion"]=="ingreso"){
		echo '<td>Los datos se ingresaron correctamente</td>';
	}
	if($_POST["accion"]=="modificacion"){
		echo '<td>Los datos se actualizaron correctamente</td>';
	}
	echo '</center>';
}

 if($_POST["accion"]=="ELIMINAR"){
 	$query='delete from clientes where id="'.$id_clientes.'"';
 	mysql_query($query)or die(mysql_error());
 }

?>
</center>
