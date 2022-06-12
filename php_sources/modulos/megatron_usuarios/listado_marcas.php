<?php
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");
include_once("seguridad.inc.php");

include("usuarios_base.php");


echo '<table border="1">';
echo '<tr>';
echo '<td>Marca</td>';
echo '</tr>';


$q='select distinct marca from articulos where marca !="" order by marca';
$res=mysql_query($q);
while($row=mysql_fetch_array($res)){
    echo '<tr>';
    echo '<td>'.$row["marca"].'</td>';
    echo '</tr>';
    

}





echo '</table>';








?>