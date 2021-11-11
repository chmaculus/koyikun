<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type" />
  <title>Xzone modificacion de descuentos</title>
<script language="javascript" src="funciones.js"></script>
</head>
<center>


<?php

if($_POST["id_articulos"] AND $_POST["id_sucursal"]){
	// AND $_POST["id_sucursal"]
	echo "aaa: ".$_POST["id_articulos"]." ".$_POST["id_sucursal"]."<br>";
	
}

include_once("../../includes/connect.php");
include_once("../../includes/funciones_costos.php");


include("../../login/login_verifica2.inc.php");
$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="0"){
	echo "No tiene Permiso para acceder<br>";
	exit;
}


$fecha=date("Y-n-d");
$hora=date("H:i:s");






#----------------------------------------
$q='select * from stock where id_articulo="'.$_POST["id_articulos"].'" and id_sucursal="'.$_POST["id_sucursal"].'"';
$result=mysql_query($q);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
$rows=mysql_num_rows();
$array_stock=mysql_fetch_array($result);
$stock_anterior=$array_stock["stock"];

echo "rows: ".$rows;

#----------------------------------------
if($rows<1){
	$query='insert into stock set
							id_articulo="'.$_POST["id_articulos"].'",
							stock="'.$_POST["stock"].'",
							maximo="'.$_POST["maximo"].'",
							minimo="'.$_POST["minimo"].'",
							id_sucursal="'.$_POST["id_sucursal"].'",
							fecha="'.$_POST["fecha"].'",
							hora="'.$_POST["hora"].'"';
}

if($rows==1){
	$query='update stock set
							stock="'.$_POST["stock"].'",
							maximo="'.$_POST["maximo"].'",
							minimo="'.$_POST["minimo"].'",
							fecha="'.$fecha.'",
							hora="'.$hora.'"
								where id_articulo="'.$_POST["id_articulos"].'" and 
									id_sucursal="'.$_POST["id_sucursal"].'"
							';
}




mysql_query($query);
echo "q: ".$query."<br>";
	if(mysql_error()){	
   	 echo $query."<br>";
    	echo mysql_error()."<br>";
    	echo $_SERVER["SCRIPT_NAME"]."<br>";
	}

#----------------------------------------





#----------------------------------------
#seguimiento stock
#----------------------------------------
$query='insert into koyikun.stock_seguimiento set
id_articulo="'.$_POST["id_articulo"].'",
stock_anterior="'.$stock_anterior.'",
stock_nuevo="'.$_POST["stock_nuevo"].'",
tipo="MO",
usuario="'.$_POST["usuario"].'",
jerarquia="'.$_POST["jerarquia"].'",
fecha="'.$fecha.'",
hora="'.$hora.'"';

mysql_query($query);

if(mysql_error()){
    echo $query."<br>";
    echo mysql_error()."<br>";
    echo $_SERVER["SCRIPT_NAME"]."<br>";
}

#----------------------------------------















#----------------------------------------
#muestra registro ingresado
$query='select * from articulos where id="'.$_POST["id_articulos"].'"';
echo $query;
$array_articulos=mysql_fetch_array(mysql_query($query));
if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}

echo "Ultimo Ingresado<br>";
echo '<table border="1">';
    echo '<tr>';
        echo '<th>Id</th>';
        echo '<th>codigo_interno</th>';
        echo '<th>marca</th>';
        echo '<th>descripcion</th>';
        echo '<th>contenido</th>';
        echo '<th>presentacion</th>';
        echo '<th>codigo_barra</th>';
        echo '<th>clasificacion</th>';
        echo '<th>subclasificacion</th>';
    echo '</tr>';
    echo '<tr>';
        echo '<td>'.$array_articulos["id"].'</td>';
        echo '<td>'.$array_articulos["codigo_interno"].'</td>';
        echo '<td>'.$array_articulos["marca"].'</td>';
        echo '<td>'.$array_articulos["descripcion"].'</td>';
        echo '<td>'.$array_articulos["contenido"].'</td>';
        echo '<td>'.$array_articulos["presentacion"].'</td>';
        echo '<td>'.$array_articulos["codigo_barra"].'</td>';
        echo '<td>'.$array_articulos["clasificacion"].'</td>';
        echo '<td>'.$array_articulos["subclasificacion"].'</td>';
    echo '</tr>';
echo "</table>";
#----------------------------------------

echo 'Los cambios se veran aplicados cuando actualice desde el formulario de consuta (arriba)<br>';

?>