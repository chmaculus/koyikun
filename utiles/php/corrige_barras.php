<?php
include("./includes/connect.php");

$q='select id, codigo_barra from articulos where codigo_barra>0';
$res=mysql_query($q);

while($row=mysql_fetch_array($res)){
    $barra=$row["codigo_barra"];
    $barra=str_replace(" ","",$barra);
    $barra=str_replace(chr(9),"",$barra);
    $barra=str_replace(chr(10),"",$barra);
    $barra=str_replace(chr(13),"",$barra);
    $q2='update articulos set codigo_barra="'.$barra.'" where id="'.$row["id"].'";'.chr(10);
    echo $q2;

}



?>