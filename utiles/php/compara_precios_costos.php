<?php
//utilidad para comparar si los precios tan tabla precios coincido con tabla costos
include("./includes/connect.php");
include("./includes/funciones_costos.php");
include("./includes/funciones_precios.php");

$q='select * from costos where precio_costo>0 order by id_articulos';
$res=mysql_query($q);
echo "#rows: ".mysql_num_rows($res).chr(10);
if(mysql_error()){echo mysql_error();}
while($row=mysql_fetch_array($res)){
    $array_costo=array_costo($row["id_articulos"]);
    $precio_venta=calcula_precio_venta($array_costo);
    $array_precio=precio_sucursal($row["id_articulos"],1);
    $precio=round($array_precio["precio_base"],2);
    $pcosto=round($precio_venta,2);
    if($precio!=$pcosto){
	echo "#".$row["id_articulos"]."		".$precio."		".$pcosto.chr(10);
	$q3='update precios set precio_base="'.$pcosto.'" where id_articulo="'.$row["id_articulos"].'"';
	mysql_query($q3);
	echo $q3.";".chr(10);
	$count++;
    }
/*
    $q2='select * from precios where id_articulo="'.$row["id_articulos"].'"';
    echo $q2.chr(10);
    $rows=mysql_num_rows(mysql_query($q2));
    if($rows<1){
	echo $row["id_articulos"]." ".$q2.chr(10);
    }
*/

}
echo "#count: ".$count.chr(10);

?>