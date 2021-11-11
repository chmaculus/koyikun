<?php
include_once("listas_base.php");
include_once("../../includes/connect.php");

$fecha=date("Y-n-d");
$hora=date("H:i:s");

if($_POST["id_listas"]){
    $id_listas=$_POST["id_listas"];
}

if($_POST["accion"]=="ingreso"){
	$query='insert into listas set
		nombre="'.$_POST["nombre"].'",
		porcentaje="'.$_POST["porcentaje"].'"
		';
	mysql_query($query)or die(mysql_error());
	$id_listas=mysql_insert_id($id_connection);
}

if($_POST["accion"]=="modificacion"){
		$query='update listas set
			nombre="'.$_POST["nombre"].'",
			porcentaje="'.$_POST["porcentaje"].'"
				where id="'.$_POST["id_listas"].'"
	';
	mysql_query($query)or die(mysql_error());
	$id_listas=$_POST["id_listas"];
}

#muestra registro ingresado
$query='select * from listas where id="'.$id_listas.'"';
$array_listas=mysql_fetch_array(mysql_query($query));
?>

<center>
<table class="t1">


<tr>
	<td><font1>Lista</font1></td>
	<td><font1><?php echo $array_listas["nombre"]; ?></font1></td>
</tr>
<tr>
	<td><font1>Porcentaje</font1></td>
	<td><font1><?php echo $array_listas["porcentaje"]; ?></font1></td>
</tr>
</table>

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
 	$query='delete from listas where id="'.$id_listas.'"';
 	mysql_query($query)or die(mysql_error());
 }

?>
</center>
