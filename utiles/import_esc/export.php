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

$res=mysql_query($q);

while($row=mysql_fetch_array($res)){
    echo $row[0]."|";
    echo $row[1]."|";
    echo $row[2]."|";
    echo $row[3]."|";
    echo $row[4]."\n";
    
}

?>