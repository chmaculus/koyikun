<?php
include_once("clientes_persona_base.php");
include_once("connect.php");

$fecha=date("Y-n-d");
$hora=date("H:i:s");

if($_POST["id_clientes_persona"]){
    $id_clientes_persona=$_POST["id_clientes_persona"];
}

if($_POST["accion"]=="ingreso"){
	$query='insert into clientes_persona set
		id="'.$_POST["id"].'",
		apellido="'.$_POST["apellido"].'",
		nombres="'.$_POST["nombres"].'",
		dni="'.$_POST["dni"].'",
		estado_civil="'.$_POST["estado_civil"].'",
		telefono="'.$_POST["telefono"].'",
		celular="'.$_POST["celular"].'",
		email="'.$_POST["email"].'",
		profesion="'.$_POST["profesion"].'",
		usa_tarjeta="'.$_POST["usa_tarjeta"].'",
		vendedor="'.$_POST["vendedor"].'",
		sucursal="'.$_POST["sucursal"].'",
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
		hora="'.$_POST["hora"].'",
		';
	mysql_query($query)or die(mysql_error());
	$id_clientes_persona=mysql_insert_id($id_connection);
}


if($_POST["accion"]=="modificacion"){
		$query='update clientes_persona set
		id="'.$_POST["id"].'",
		apellido="'.$_POST["apellido"].'",
		nombres="'.$_POST["nombres"].'",
		dni="'.$_POST["dni"].'",
		estado_civil="'.$_POST["estado_civil"].'",
		telefono="'.$_POST["telefono"].'",
		celular="'.$_POST["celular"].'",
		email="'.$_POST["email"].'",
		profesion="'.$_POST["profesion"].'",
		usa_tarjeta="'.$_POST["usa_tarjeta"].'",
		vendedor="'.$_POST["vendedor"].'",
		sucursal="'.$_POST["sucursal"].'",
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
		hora="'.$_POST["hora"].'",
			where id="'.$_POST["id_clientes_persona"].'"
	';
	mysql_query($query)or die(mysql_error());
	$id_clientes_persona=$_POST["id_clientes_persona"];
}

#muestra registro ingresado
$query='select * from clientes_persona where id="'.$id_clientes_persona.'"';
$array_clientes_persona=mysql_fetch_array(mysql_query($query));

echo "<center>";
include("clientes_persona_muestra.inc.php");

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
 	$query='delete from clientes_persona where id="'.$id_clientes_persona.'"';
 	mysql_query($query)or die(mysql_error());
 }

?>
</center>
