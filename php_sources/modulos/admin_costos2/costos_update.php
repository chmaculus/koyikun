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


#-----------------------------------------------------
#obtiene la variables almacenadas
$array1=mysql_fetch_array(mysql_query('select * from variables_temporales where id_session="'.$id_session.'" and descripcion="costo_tipo_cambio"'));
$array2=mysql_fetch_array(mysql_query('select * from variables_temporales where id_session="'.$id_session.'" and descripcion="costo_detalle"'));
#-----------------------------------------------------



$q1='select * from costos where id_articulos="'.$_POST["id_articulos"].'"';
$rows=mysql_num_rows(mysql_query($q1));

if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
if($rows>0){
        $query='update costos set
        precio_costo="'.$_POST["precio_costo"].'",
        moneda="'.$_POST["moneda"].'",
        descuento1="'.$_POST["descuento1"].'",
        descuento2="'.$_POST["descuento2"].'",
        descuento3="'.$_POST["descuento3"].'",
        descuento4="'.$_POST["descuento4"].'",
        descuento5="'.$_POST["descuento5"].'",
        descuento6="'.$_POST["descuento6"].'",
        iva="'.$_POST["iva"].'",
        modulo="18",
        margen="'.$_POST["margen"].'",';

	if($array1["valor"]=="fabrica"){
        $query.='fecha="'.$fecha.'",
        hora="'.$hora.'"';
   }     
	if($array1["valor"]=="gerencia"){
        $query.='fecha_gerencia="'.$fecha.'",
        hora_gerencia="'.$hora.'"';
	}
              $query.='  where id_articulos="'.$_POST["id_articulos"].'"';

//    echo "aa: ".$query."<br><br>";

    mysql_query($query);
    if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
}else{

	    $query='insert into costos set
        id_articulos="'.$_POST["id_articulos"].'",
        precio_costo="'.$_POST["precio_costo"].'",
        moneda="'.$_POST["moneda"].'",
        descuento1="'.$_POST["descuento1"].'",
        descuento2="'.$_POST["descuento2"].'",
        descuento3="'.$_POST["descuento3"].'",
        descuento4="'.$_POST["descuento4"].'",
        descuento5="'.$_POST["descuento5"].'",
        descuento6="'.$_POST["descuento6"].'",
        iva="'.$_POST["iva"].'",
        margen="'.$_POST["margen"].'",
        ';

	if($_POST["tipo_cambio"]=="fabrica"){
        $query.='fecha="'.$fecha.'",
        hora="'.$hora.'"';
   }     

	if($_POST["tipo_cambio"]=="gerencia"){
        $query.='fecha_gerencia="'.$fecha.'",
        hora_gerencia="'.$hora.'"';
	}
   $query.='  where id_articulos="'.$_POST["id_articulos"].'"';


  //      echo $query."<br><br>";


    mysql_query($query);
    if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
    $id_costos=mysql_insert_id($id_connection);
}

#-----------------------------------------
# calcular nuevo precio de venta
$array_costos=array_costo($_POST["id_articulos"]);
$precio_venta=calcula_precio_venta( $array_costos );

echo "Precio de venta: $precio_venta<br>";
# actualizar tabla precios


$rows=mysql_num_rows(mysql_query('select * from precios where id_articulo="'.$_POST["id_articulos"].'"'));
if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}

if($rows>0){
	$q='update precios set precio_base="'.$precio_venta.'", fecha="'.$fecha.'", hora="'.$hora.'", porcentaje_tarjeta="'.$_POST["tarjeta"].'" where id_articulo="'.$_POST["id_articulos"].'"';
	mysql_query($q);
	if(mysql_error()){echo mysql_error()."<br>".$q."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
//	echo "q: $q<br>";
}else{
	$q='insert into precios set precio_base="'.$precio_venta.'", id_sucursal=1, fecha="'.$fecha.'", hora="'.$hora.'", porcentaje_tarjeta="'.$_POST["tarjeta"].'"   , id_articulo="'.$_POST["id_articulos"].'"';
	mysql_query($q);
	if(mysql_error()){echo mysql_error()."<br>".$q."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
//	echo "q: $q<br>";
}


#-----------------------------------------






#-----------------------------------------
# detalle de costos
if($array2["valor"]!=""){
	    $query='insert into costos_detalle set
        marca="'.$_POST["marca"].'",
        detalle="'.$array2["valor"].'",
        fecha="'.$fecha.'",
        hora="'.$hora.'"';
        
       echo $query."<br><br>";
  mysql_query($query);
    if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
    $id_costos_detalle=mysql_insert_id($id_connection);


}
#-----------------------------------------




#-----------------------------------------
# seguimiento de costos

    $query='insert into costos_seguimiento set
        id_costos_detalle="'.$id_costos_detalle.'",
        id_articulo="'.$_POST["id_articulos"].'",
        costo="'.$_POST["costo"].'",
        moneda="'.$_POST["moneda"].'",
        descuento1="'.$_POST["descuento1"].'",
        descuento2="'.$_POST["descuento2"].'",
        descuento3="'.$_POST["descuento3"].'",
        descuento4="'.$_POST["descuento4"].'",
        descuento5="'.$_POST["descuento5"].'",
        descuento6="'.$_POST["descuento6"].'",
        iva="'.$_POST["iva"].'",
        margen="'.$_POST["margen"].'",
        fecha="'.$fecha.'",
        hora="'.$hora.'",
        tipo="'.$array1["valor"].'"';


    //    echo $query."<br><br>";

    mysql_query($query);
    if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}


#----------------------------------------
#muestra registro ingresado
$query='select * from articulos where id="'.$_POST["id_articulos"].'"';
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



?>