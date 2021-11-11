<?php
include_once("./includes/connect.php");
include_once("./includes/funciones_costos.php");

$fecha=date("Y-n-d");
$hora=date("H_i_s");

$q='select * from articulos';
$res=mysql_query($q);
while($row=mysql_fetch_array($res)){
    $costo=calcula_precio_costo($row["id"]);
    $a_costo=array_costo($row["id"]);
    $p_venta=calcula_precio_venta($a_costo);
    $q2='insert into products set product_code="'.$row["codigo_interno"].'",
				    product_name="'.$row["descripcion"].'",
				    cost="'.$costo.'",
				    price="'.$p_venta.'"
				    
				    
    ';
    echo $q2.";".chr(10);
}

?>