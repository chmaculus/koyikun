<?php
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");
include_once("seguridad.inc.php");
include_once("funciones.php");


if($_POST["accion"]=="ingreso"){
	$q='select * from usuarios where usuario="'.$_POST["usuario"].'"';
	$rows=mysql_num_rows(mysql_query($q));
	if($rows>0){
		$post_usuario=base64_encode($_POST["usuario"]);
		header('Location: usuarios_ingreso.php?existe=1&usuario='.$post_usuario);
		exit;
	}
}


include_once("usuarios_base.php");

$fecha=date("Y-n-d");
$hora=date("H:i:s");

if($_POST["id_usuarios"]){
    $id_usuarios=$_POST["id_usuarios"];
}

if($_POST["accion"]=="ingreso"){
	$query='insert into usuarios set
		nombre="'.$_POST["nombre"].'",
		usuario="'.$_POST["usuario"].'",
		contrasena="'.$_POST["contrasena"].'",
		permisos="'.$_POST["permisos"].'",
		id_sucursal="'.$_POST["id_sucursal"].'",
		jerarquia="'.$_POST["jerarquia"].'",
		fecha="'.$fecha.'",
		hora="'.$hora.'"
		';
	mysql_query($query)or die(mysql_error());
	$id_usuarios=mysql_insert_id($id_connection);
}


if($_POST["accion"]=="modificacion"){
		$query='update usuarios set
			nombre="'.$_POST["nombre"].'",
			usuario="'.$_POST["usuario"].'",
			contrasena="'.$_POST["contrasena"].'",
			permisos="'.$_POST["permisos"].'",
			id_sucursal="'.$_POST["id_sucursal"].'",
			jerarquia="'.$_POST["jerarquia"].'",
			fecha="'.$fecha.'",
			hora="'.$hora.'"
				where id="'.$_POST["id_usuarios"].'"
	';
	mysql_query($query)or die(mysql_error());
	$id_usuarios=$_POST["id_usuarios"];
}

#muestra registro ingresado
$query='select * from usuarios where id="'.$id_usuarios.'"';
$array_usuarios=mysql_fetch_array(mysql_query($query));

echo "<center>";
include("usuarios_muestra.inc.php");

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
 	$query='delete from usuarios where id="'.$id_usuarios.'"';
 	mysql_query($query)or die(mysql_error());

 	$query2='delete from sessiones_activas where usuario="'.$_POST["usuario"].'"';
 	
 	mysql_query($query2)or die(mysql_error());
 }



?>
</center>
