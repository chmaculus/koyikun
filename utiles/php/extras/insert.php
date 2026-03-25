<?php
$server="localhost";
$user="root";
$passwd="maculuss";


$base="temp";
$id_connection=mysql_connect($server,$user,$passwd);

if(mysql_error()){
        echo "no se pudo conectar con el Servidor";
}

mysql_select_db($base,$id_connection);

if(mysql_error()){
        echo "No se pudo Abrir la Base de Datos";
}

$q='select b.marca, b.descripcion, b.clasificacion, a.barras, a.precio from temp1 a join temp2 b on a.descripcion=b.descripcion';
$q='select * from temp3';

$res=mysql_query($q);

while($row=mysql_fetch_array($res)){
    $des=str_replace('"', '\\"',$row[1]);
    $des=utf8_encode($des);


    $q='insert into koyikun.articulos set 
                            marca="'.$row[0].'",
                            descripcion="'.$des.'",
                            clasificacion="'.$row[2].'",
                            codigo_barra="'.$row[3].'"
    ';
    // echo $q.";\n";
    mysql_query($q);
    if(mysql_error()){
        echo mysql_error()   . "\n";
        echo $q. "\n";
        $id_articulo=0;
    }else{
        $id_articulo=mysql_insert_id();
    }
    
    $q='insert into koyikun.precios set id_articulo='.$id_articulo.', id_sucursal=1, precio_base='.round($row[4],0);
    // echo $q.";\n";
    mysql_query($q);
    if(mysql_error()){
        echo mysql_error()   . "\n";
        echo $q. "\n";
    }


    $q='insert into koyikun.costos set id_articulos='.$id_articulo.', precio_costo='.round($row[4],0).', fecha="2023-09-22", hora="22:33:55"';
    // echo $q.";\n";
    mysql_query($q);
    if(mysql_error()){
        echo mysql_error()   . "\n";
        echo $q. "\n";
    }

}

/*
+--------------------+-----------------------+------+-----+---------+----------------+
| Field              | Type                  | Null | Key | Default | Extra          |
+--------------------+-----------------------+------+-----+---------+----------------+
| id                 | mediumint(8) unsigned | NO   | PRI | NULL    | auto_increment |
| id_articulos       | mediumint(9)          | YES  | MUL | NULL    |                |
| precio_costo       | double(15,2)          | YES  |     | NULL    |                |
| moneda             | varchar(6)            | YES  |     | NULL    |                |
| iva                | double                | YES  |     | NULL    |                |
| margen             | double                | YES  |     | NULL    |                |
| fecha              | date                  | YES  |     | NULL    |                |
| hora               | time                  | YES  |     | NULL    |                |
| fecha_gerencia     | date                  | YES  |     | NULL    |                |
| hora_gerencia      | time                  | YES  |     | NULL    |                |
| porcentaje_tarjeta | double                | YES  |     | NULL    |                |
| margen_web         | double                | YES  |     | NULL    |                |
| modulo             | varchar(10)           | YES  |     | NULL    |                |
| tarj6              | int(11)               | YES  |     | NULL    |                |
| desc_max           | tinyint(4)            | YES  |     | NULL    |                |
+--------------------+-----------------------+------+-----+---------+----------------+

*/

?>