<?php
include_once("index.php");
//include_once("cabecera.inc.php");
include_once("../../includes/connect.php");

$fecha=date("Y-n-d");
$hora=date("H:i:s");

if($_POST["id_clientes_persona"]){
    $id_clientes=$_POST["id_clientes_persona"];
}

if($_POST["profesion"]=="otro" ){
	$profesion=$_POST["otra_profesion"];
}else{
	$profesion=$_POST["profesion"];
}


if($_POST["accion"]=="ingreso"){
	$query='insert into clientes_persona set
		apellido="'.$_POST["apellido"].'",
		nombres="'.$_POST["nombres"].'",
		dni="'.$_POST["dni"].'",
		estado_civil="'.$_POST["estado_civil"].'",
		telefono="'.$_POST["telefono"].'",
		celular="'.$_POST["celular"].'",
		email="'.$_POST["email"].'",
		profesion="'.$profesion.'",
		observaciones="'.$_POST["observaciones"].'",
		usa_tarjeta="'.$_POST["usa_tarjeta"].'",
		vendedor="'.$_POST["vendedor"].'",
		sucursal="'.$_POST["sucursal"].'",
		nombre_comercio="'.$_POST["nombre_comercio"].'",
		tel_comercial="'.$_POST["tel_comercial"].'",
		dom_comercial="'.$_POST["dom_comercial"].'",
		ciudad="'.$_POST["ciudad"].'",
		provincia="'.$_POST["provincia"].'",
		carnet="'.$_POST["carnet"].'",
		codigo_barras="'.$_POST["codigo_barras"].'",
		fecha_entrega="'.$_POST["fecha_entrega"].'",
		radio="'.$_POST["radio"].'",
		canal="'.$_POST["canal"].'",
		programas="'.$_POST["programas"].'",
		fecha="'.$fecha.'",
		hora="'.$hora.'"
		';
	mysql_query($query);
	if(mysql_error()){
		echo "insert: ".mysql_error()." ".$query;
	}
	$id_clientes_persona=mysql_insert_id($id_connection);
}


if($_POST["accion"]=="modificacion"){
		$query='update clientes_persona set
		apellido="'.$_POST["apellido"].'",
		nombres="'.$_POST["nombres"].'",
		dni="'.$_POST["dni"].'",
		estado_civil="'.$_POST["estado_civil"].'",
		telefono="'.$_POST["telefono"].'",
		celular="'.$_POST["celular"].'",
		email="'.$_POST["email"].'",
		profesion="'.$profesion.'",
		observaciones="'.$_POST["observaciones"].'",
		usa_tarjeta="'.$_POST["usa_tarjeta"].'",
		vendedor="'.$_POST["vendedor"].'",
		sucursal="'.$_POST["sucursal"].'",
		nombre_comercio="'.$_POST["nombre_comercio"].'",
		tel_comercial="'.$_POST["tel_comercial"].'",
		dom_comercial="'.$_POST["dom_comercial"].'",
		ciudad="'.$_POST["ciudad"].'",
		provincia="'.$_POST["provincia"].'",
		carnet="'.$_POST["carnet"].'",
		codigo_barras="'.$_POST["codigo_barras"].'",
		fecha_entrega="'.$_POST["fecha_entrega"].'",
		radio="'.$_POST["radio"].'",
		canal="'.$_POST["canal"].'",
		programas="'.$_POST["programas"].'",
		fecha="'.$_POST["fecha"].'",
		hora="'.$_POST["hora"].'"
			where id="'.$_POST["id_clientes_persona"].'"
	';
	mysql_query($query);
	if(mysql_error()){
		echo "update: ".mysql_error()." ".$query;
	}
	$id_clientes_persona=$_POST["id_clientes_persona"];
}

#muestra registro ingresado
$query='select * from clientes_persona where id="'.$id_clientes.'"';
$array_clientes=mysql_fetch_array(mysql_query($query));


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

if($_POST["accion"]=="ingreso"){
	include("update/ingreso_tarjetas.inc.php");
	include("update/ingreso_marcas_peluqueros.inc.php");
	include("update/ingreso_marcas_cosmetologo.inc.php");
	/////profesion
	if($_POST["profesion"]=="otro"){
		$q='insert into koyikun.clientes_persona_valores set 
				id_clientes_persona="'.$id_clientes_persona.'",
				llave="otra_profesion",
				valor="'.$_POST["otra_profesion"].'"';
		mysql_query($q);
	}
	/////end profesion
}

if($_POST["accion"]=="modificacion"){
	include("update/update_marcas_cosmetologo.inc.php");
	include("update/update_tarjetas.inc.php");
	include("update/update_marcas_peluqueros.inc.php");
	
	
}




?>
</center>
