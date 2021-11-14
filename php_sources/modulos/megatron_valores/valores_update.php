<?php
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");
include_once("../../includes/cabecera_utf-8.inc.php");


if($_POST["id_valores"]){
    $id_valores=$_POST["id_valores"];
}


if($_POST["accion"]=="modificacion"){
		$query='update valores set
		valor="'.$_POST["valor"].'"
			where id="'.$_POST["id_valores"].'"
	';
	mysql_query($query)or die(mysql_error());
	$id_valores=$_POST["id_valores"];
}

#muestra registro ingresado
$query='select * from valores where id="'.$id_valores.'"';
$array_valores=mysql_fetch_array(mysql_query($query));

echo "<center>";
include("valores_muestra.inc.php");

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
 	$query='delete from valores where id="'.$id_valores.'"';
 	mysql_query($query)or die(mysql_error());
 }

?>
</center>
