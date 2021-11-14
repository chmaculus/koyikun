<?php
include("includes/connect.php");
include("includes/funciones_stock.php");
$q='select * from articulos where marca like "%bastardo%"';
$r=mysql_query($q);

while($row=mysql_fetch_array($r)){
    aa($row["id"], 2);
    aa($row["id"], 3);
    aa($row["id"], 4);
    aa($row["id"], 5);
    aa($row["id"], 7);
    aa($row["id"], 8);
    aa($row["id"], 9);
    aa($row["id"], 10);
}



function aa($id_articulo, $id_sucursal){
    verifica_tabla_stock($id_articulo, $id_sucursal);
    $q='update stock set fijo="2" where id_articulo="'.$id_articulo.'" and id_sucursal="'.$id_sucursal.'"';
    echo $q.";".chr(10);
}





?>