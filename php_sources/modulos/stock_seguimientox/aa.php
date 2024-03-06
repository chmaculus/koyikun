<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" href="style.css" type="text/css">
<meta content="text/html; charset=UTF-8" http-equiv="content-type" />
<title>Tablabla seguimiento_stock By Christian Máculus</title>
</head>



<center>
<?php
include("../../includes/connect.php");
include("../../includes/funciones_varias.php");
$id_sucursal=$_COOKIE["id_sucursal"];
$query='select * from seguimiento_stock where id_articulo="'.$_POST["id_articulos"].'"  order by fecha, hora';
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


#----------------------------------------
#muestra registro
$q2='select * from articulos where id="'.$_POST["id_articulos"].'"';
$array_articulos=mysql_fetch_array(mysql_query($q2));
if(mysql_error()){echo mysql_error()."<br>".$q2."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
echo '<table border="1">';
    echo '<tr>';
        echo '<th>id</th>';
        echo '<th>codigo_interno</th>';
        echo '<th>marca</th>';
        echo '<th>descripcion</th>';
        echo '<th>contenido</th>';
        echo '<th>presentacion</th>';
        echo '<th>codigo_barra</th>';
        echo '<th>fecha</th>';
        echo '<th>hora</th>';
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
        echo '<td>'.$array_articulos["fecha"].'</td>';
        echo '<td>'.$array_articulos["hora"].'</td>';
        echo '<td>'.$array_articulos["clasificacion"].'</td>';
        echo '<td>'.$array_articulos["subclasificacion"].'</td>';
    echo '</tr>';
echo "</table>";
#----------------------------------------
echo '<table class="t1">';
echo "<tr>";
    echo "<th>id_articulo</th>";
    echo "<th>stock_anterior</th>";
    echo "<th>stock_nuevo</th>";
    echo "<th>tipo</th>";
    echo "<th>origen</th>";
    echo "<th>destino</th>";
    echo "<th>fecha</th>";
    echo "<th>hora</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
    echo "<tr>";
    echo '<td>'.$row["id_articulo"].'</td>';
    echo '<td>'.$row["stock_anterior"].'</td>';
    echo '<td>'.$row["stock_nuevo"].'</td>';
    echo '<td>'.$row["tipo"].'</td>';
    echo '<td>'.nombre_sucursal($row["origen"]).'</td>';
    echo '<td>'.nombre_sucursal($row["destino"]).'</td>';
    echo '<td>'.$row["fecha"].'</td>';
    echo '<td>'.$row["hora"].'</td>';
    echo "</tr>".chr(10);
}
?>
</table></center>