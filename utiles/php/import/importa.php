<?php
include("connect.php");



$q='select * from temp5';
$res=mysql_query($q);
    while($row=mysql_fetch_array($res)){
	$q='insert into articulos set marca="WAHL", clasificacion="'.$row[0].'",
						subclasificacion="'.$row[1].'",
						descripcion="'.$row[2].'",
						codigo_interno="'.$row[3].'"
    ';
    echo $q.chr(10);

    $res3=mysql_query($q);
    if(mysql_error()){echo mysql_error();}
    $id_articulo=mysql_insert_id($id_connection);
    echo "id_a: $id_articulo\n";
    $q2='insert into costos set id_articulos="'.$id_articulo.'", precio_costo="'.$row[4].'",iva="'.$row[5].'", margen="'.$row[6].'"';
    echo $q2.chr(10);
    mysql_query($q2);
}


?>