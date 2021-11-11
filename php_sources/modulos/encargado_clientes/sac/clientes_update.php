<?php
include_once("clientes_base.php");
include_once("connect.php");

$fecha=date("Y-n-d");
$hora=date("H:i:s");

if($_POST["id_clientes"]){
    $id_clientes=$_POST["id_clientes"];
}

if((
	!$_POST["id"] OR 
	!$_POST["razon_social"] OR 
	!$_POST["nombres"] OR 
	!$_POST["condicion_iva"] OR 
	!$_POST["cuit"] OR 
	!$_POST["tipo_cliente"] OR 
	!$_POST["carnet"] OR 
	!$_POST["direccion"] OR 
	!$_POST["ciudad"] OR 
	!$_POST["provincia"] OR 
	!$_POST["pais"] OR 
	!$_POST["codigo_postal"] OR 
	!$_POST["email"] OR 
	!$_POST["pagina_web"] OR 
	!$_POST["telefonos"] OR 
	!$_POST["fax"] OR 
	!$_POST["vendedor"] OR 
	!$_POST["informacion_contacto"] OR 
	!$_POST["observaciones"] OR 
	!$_POST["sucursal"] OR 
	!$_POST["fecha"] OR 
	!$_POST["hora"] OR 
) AND !$_POST["accion"]=="ELIMINAR")	{
		$array_clientes["id"]=$_POST["id"];
		$array_clientes["razon_social"]=$_POST["razon_social"];
		$array_clientes["nombres"]=$_POST["nombres"];
		$array_clientes["condicion_iva"]=$_POST["condicion_iva"];
		$array_clientes["cuit"]=$_POST["cuit"];
		$array_clientes["tipo_cliente"]=$_POST["tipo_cliente"];
		$array_clientes["carnet"]=$_POST["carnet"];
		$array_clientes["direccion"]=$_POST["direccion"];
		$array_clientes["ciudad"]=$_POST["ciudad"];
		$array_clientes["provincia"]=$_POST["provincia"];
		$array_clientes["pais"]=$_POST["pais"];
		$array_clientes["codigo_postal"]=$_POST["codigo_postal"];
		$array_clientes["email"]=$_POST["email"];
		$array_clientes["pagina_web"]=$_POST["pagina_web"];
		$array_clientes["telefonos"]=$_POST["telefonos"];
		$array_clientes["fax"]=$_POST["fax"];
		$array_clientes["vendedor"]=$_POST["vendedor"];
		$array_clientes["informacion_contacto"]=$_POST["informacion_contacto"];
		$array_clientes["observaciones"]=$_POST["observaciones"];
		$array_clientes["sucursal"]=$_POST["sucursal"];
		$array_clientes["fecha"]=$_POST["fecha"];
		$array_clientes["hora"]=$_POST["hora"];
		include("clientes_ingreso.php");
		echo "<center><alerta1>Debe completar todos los campos</alerta1></center>";
		exit;
	}

if($_POST["accion"]=="ingreso"){
	$query='insert into clientes set
		id="'.$_POST["id"].'",
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
		fecha="'.$_POST["fecha"].'",
		hora="'.$_POST["hora"].'",
		';
	mysql_query($query)or die(mysql_error());
	$id_clientes=mysql_insert_id($id_connection);
}


if($_POST["accion"]=="modificacion"){
		$query='update clientes set
			id="'.$_POST["id"].'",
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
			fecha="'.$_POST["fecha"].'",
			hora="'.$_POST["hora"].'",
				where id="'.$_POST["id_clientes"].'"
	';
	mysql_query($query)or die(mysql_error());
	$id_clientes=$_POST["id_clientes"];
}

#muestra registro ingresado
$query='select * from clientes where id="'.$id_clientes.'"';
$array_clientes=mysql_fetch_array(mysql_query($query));

echo "<center>";
include("clientes_muestra.inc.php");

if(!mysql_error()){
	if($_POST["accion"]=="ingreso"){
		echo '<td>Los datos se ingresaron correctamente</td>';
	}
	if($_POST["accion"]=="modificacion"){
		echo '<td>Los datos se actualizaron correctamente</td>';
	}
}

echo "</center>";

 if($_POST["accion"]=="ELIMINAR"){
 	$query='delete from clientes where id="'.$id_clientes.'"';
 	mysql_query($query)or die(mysql_error());
 }

?>
</center>
