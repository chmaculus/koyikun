<?php
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");
include_once("seguridad_1.inc.php");

include_once("cabecera.inc.php");

$id_sucursal=$_COOKIE["id_sucursal"];

$q='select * from articulos where codigo_barra="'.$_POST["busqueda"].'"';
$result=mysql_query($q);

$total_rows=mysql_num_rows($result);

if($total_rows<1){
	include_once("index.php");
	echo '<br>No se encontraron resultados con: '.$_POST["busqueda"].' <br>';
	exit;
}

if(mysql_error()){
    echo mysql_error()." ".$SCRIPT_NAME;
}

if($total_rows==1){
	$array_articulos=mysql_fetch_array($result);
	$q2='select * from stock where id_articulo="'.$array_articulos["id"].'" and id_sucursal="'.$id_sucursal.'"';
	$res2=mysql_query($q2);
	if(mysql_error()){
   	 echo mysql_error()." ".$SCRIPT_NAME;
	}
echo '<body onLoad=document.aa.stock_nuevo.focus()>';
echo '<form name="aa" action="stock_update.php" method="post">';
echo "<center>";

echo "<br><br>";

echo '<table class="t1">';
echo "<tr>";
    echo "<th>id</th>";
    echo "<th>codigo_interno</th>";
    echo "<th>marca</th>";
    echo "<th>descripcion</th>";
    echo "<th>clasificacion</th>";
    echo "<th>subclasificacion</th>";
    echo "<th>contenido</th>";
    echo "<th>presentacion</th>";
    echo "<th>codigo_barra</th>";
    echo "<th>fecha</th>";
    echo "<th>hora</th>";
echo "</tr>";

    echo "<tr>";
    echo '<td>'.$array_articulos["id"].'</td>';
    echo '<td>'.$array_articulos["codigo_interno"].'</td>';
    echo '<td>'.$array_articulos["marca"].'</td>';
    echo '<td>'.$array_articulos["descripcion"].'</td>';
    echo '<td>'.$array_articulos["contenido"].'</td>';
    echo '<td>'.$array_articulos["clasificacion"].'</td>';
    echo '<td>'.$array_articulos["subclasificacion"].'</td>';
    echo '<td>'.$array_articulos["presentacion"].'</td>';
    echo '<td>'.$array_articulos["codigo_barra"].'</td>';
    echo '<td>'.$array_articulos["fecha"].'</td>';
    echo '<td>'.$array_articulos["hora"].'</td>';
    echo "</tr>".chr(10);
echo "</table>";

echo "<br><br>";
	echo '<table class="t1">';

	echo "<tr>";
	    echo "<th>stock</th>";
	    echo "<th>stock Nuevo</th>";
   	 echo "<th>maximo</th>";
   	 echo "<th>minimo</th>";
    	echo "<th>id_sucursal</th>";
   	 echo "<th>fecha</th>";
   	 echo "<th>hora</th>";
	echo "</tr>";

$row=mysql_fetch_array($res2);
   	 echo "<tr>";
    	echo '<td>'.$row["stock"].'</td>';
    	echo '<td><input type="text" name="stock_nuevo" size="8" /></td>';
    	echo '<td>'.$row["maximo"].'</td>';
    	echo '<td>'.$row["minimo"].'</td>';
    	echo '<td>'.$row["id_sucursal"].'</td>';
    	echo '<td>'.$row["fecha"].'</td>';
    	echo '<td>'.$row["hora"].'</td>';
    	echo "</tr>".chr(10);
}
echo "</table>";

echo '<input type="hidden" name="stock" value="'.$row["stock"].'" />';
echo '<input type="hidden" name="query" value="'.base64_encode($q).'" />';
echo '<input type="hidden" name="id_articulos" value="'.$array_articulos["id"].'" />';
echo '<input type="submit" name="ACEPTAR" value="ACEPTAR" />';
echo "</form>";
?>
