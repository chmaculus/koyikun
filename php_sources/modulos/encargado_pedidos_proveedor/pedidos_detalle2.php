<?php

include_once("../../includes/connect.php");
include_once("../../includes/funciones_varias.php");
include_once("../../includes/funciones_articulos.php");
include_once("../../login/login_verifica.inc.php");

#jrarquia 0 coresponde a administrador
if($jerarquia!="1"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 
?>



<?php
//include("pedidos_base.php");

if($_GET["numero_pedido"]){
	$query='select * from pedidos_proveedor where numero_pedido="'.$_GET["numero_pedido"].'" order by marca, clasificacion, subclasificacion, contenido, presentacion, descripcion';
}else{
	echo "jejejje";
	exit;
}
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


//inicio cabecera
echo '<table><tr><td>';
echo 'San Martin 1418 - Mendoza - Argentina<br>
administracion@almacendefragancias.com<br>
www.almacendefragancias.com<br>
Cel: +54 261 722 5115<br>
Rot: +54 261 420 1845<br>
<br>';

$q='select marca from pedidos_proveedor where numero_pedido="'.$_GET["numero_pedido"].'" limit 0,1';
$a=mysql_fetch_array(mysql_query($q));
echo "Marca: ".$a[0]."<br>";


$q='select sum(cantidad_solicitada) from pedidos_proveedor where numero_pedido="'.$_GET["numero_pedido"].'"';
$a=mysql_fetch_array(mysql_query($q));
echo "Cantidad de articulos: ".$a[0]."<br>";

echo "Fecha: ".date("Y-n-d")."<br>";
echo "Hora: ".date("H:i:s")."<br>";
echo "<br><br>";
echo '</td>';
echo '<td>';
echo ' <img src="af.jpg" height="200" width="200"> ';
echo ' <img src="ap.jpg" height="200" width="200"> ';
echo '</td>';

echo "</tr></table>";
//fin cabecera

echo "<center>";
echo '<table border="1">';
echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Cod Interno</th>";
    echo "<th>marca</th>";
    echo "<th>descripcion</th>";
    echo "<th>contenido</th>";
    echo "<th>presentacion</th>";
    echo "<th>clasificacion</th>";
    echo "<th>subclasificacion</th>";
    echo "<th>barras</th>";

    echo "<th>Cant.Ped</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	$array_stock=array_stock($row["id_articulo"],$id_sucursal);
	$array_articulo=array_articulos($row["id_articulo"]);
	$array_estadistica=array_estadistica($row["id_articulo"]);
    echo "<tr>";
    echo '<td>'.$row["id_articulo"].'</td>';
    echo '<td>'.$array_articulo["codigo_interno"].'</td>';
    echo '<td>'.$row["marca"].'</td>';
    echo '<td>'.$row["descripcion"].'</td>';
    echo '<td>'.$row["contenido"].'</td>';
    echo '<td>'.$row["presentacion"].'</td>';
    echo '<td>'.$row["clasificacion"].'</td>';
    echo '<td>'.$row["subclasificacion"].'</td>';
    echo '<td>'.$row["barras"].'</td>';


    echo '<td>'.$row["cantidad_solicitada"].'</td>';
    echo "</tr>".chr(10);
}

echo '<input type="hidden" name="query" value="'.base64_encode($query).'">';


#-----------------------------------------------------------------
function array_stock($id_articulo,$id_sucursal){
	$query='select * from stock where id_articulo="'.$id_articulo.'" and id_sucursal="'.$id_sucursal.'"';
	$res=mysql_query($query);
	if(mysql_error()){
		$array_stock["error"]=mysql_error();
		$array_stock["query"]=$query;
		return $array_stock;
	}
	$rows=mysql_num_rows($res);

	if($rows==1){
		$array_stock=mysql_fetch_array($res);
		$array_stock["rows"]=$rows;
		$array_stock["query"]=$query;
		return $array_stock;		
	}

	if($rows<1){
		$array_stock["stock"]=0;
		$array_stock["rows"]=$rows;
		$array_stock["query"]=$query;
		return $array_stock;
	}
}
#-----------------------------------------------------------------


#----------------------------------------
function array_estadistica($id_articulo){
    $query='select * from ventas_estadistica where id_articulo="'.$id_articulo.'"';
    $array=mysql_fetch_array(mysql_query($query));
    if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
    return $array;
}
#----------------------------------------
        


echo '</table>';

if($finalizado!=1){
    //echo '<input type="submit" name="ACEPTAR" value="ACEPTAR">';
}
echo '</form>';
?>


</center>