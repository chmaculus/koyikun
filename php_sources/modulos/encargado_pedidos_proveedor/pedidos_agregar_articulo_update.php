<?php

include_once("../../includes/connect.php");
include_once("../../includes/funciones_varias.php");
include_once("../../login/login_verifica.inc.php");
include_once("cabecera.inc.php");

#jrarquia 0 coresponde a administrador
if($jerarquia!="1"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 
?>


<center>
<?php
include("pedidos_base.php");



#----------------------------------------
#muestra registro ingresado
$query='select * from articulos where id="'.$id_articulos.'"';
$array_articulo=mysql_fetch_array(mysql_query($query));
if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
#----------------------------------------


	    $query='insert into pedidos_proveedor set 
								id_articulo="'.$row["id_articulo"].'",
								numero_pedido="'.$numero_pedido.'",
								marca="'.addslashes($row["marca"]).'",
								descripcion="'.addslashes($array_articulo["descripcion"]).'",
								contenido="'.addslashes($array_articulo["contenido"]).'",
								presentacion="'.addslashes($array_articulo["presentacion"]).'",
								clasificacion="'.addslashes($array_articulo["clasificacion"]).'",
								subclasificacion="'.addslashes($array_articulo["subclasificacion"]).'",
								cantidad_solicitada="'.$_POST["reponer".$row["id_articulo"]].'",
								fecha="'.$fecha2.'",
								hora="'.$hora.'",
								finalizado="N",
								stock="'.$stock["stock"].'",
								costo="'.$_POST["costo".$row["id_articulo"]].'",
								total_pedir="'.$total_pedir.'"';
			

echo $query."<br>";





?>