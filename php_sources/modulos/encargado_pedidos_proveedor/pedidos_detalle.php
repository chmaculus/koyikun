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

<center>
Pedido Actual<BR>
<?php
include("../../includes/connect.php");
include("pedidos_base.php");

if($_GET["numero_pedido"]){
	$query='select * from pedidos_proveedor where numero_pedido="'.$_GET["numero_pedido"].'" order by marca, clasificacion, subclasificacion, contenido, presentacion, descripcion';
}else{
	echo "jejejje";
	exit;
}


$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}

echo '<form action="pedidos_update.php" method="post">';
echo '<table class="t1">';
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

    echo "<th>Mes</th>";
    echo "<th>Tres</th>";
    echo "<th>Seis</th>";
    echo "<th>Nueve</th>";
    echo "<th>Doce</th>";
    echo "<th>Minimo</th>";
    echo "<th>Maximo</th>";
    echo "<th>Stock</th>";

    echo "<th>Cant.Ped</th>";
    echo "<th>Stk.Act.</th>";
    echo "<th>Cant.Recibida</th>";
    echo "<th>fecha</th>";
    echo "<th>hora</th>";
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

    echo '<td>'.$array_estadistica["mes"].'</td>';
    echo '<td>'.$array_estadistica["tres"].'</td>';
    echo '<td>'.$array_estadistica["seis"].'</td>';
    echo '<td>'.$array_estadistica["nueve"].'</td>';
    echo '<td>'.$array_estadistica["doce"].'</td>';
    echo '<td>'.$array_estadistica["tres"].'</td>';
    echo '<td>'.round(($array_estadistica["tres"] * 1.2) ,0).'</td>';
    echo '<td>'.$array_estadistica["stock"].'</td>';

    echo '<td>'.$row["cantidad_solicitada"].'</td>';
    echo '<td>'.$array_stock["stock"].'</td>';
    if($row["finalizado"]=="N"){
	    echo '<td><input type="text" name="cantidad'.$row["id"].'" value="0" size="5"></td>';
    }else{
        echo '<td>'.$row["cantidad_recibida"].'</td>';
	$finalizado=1;
    }
  
    echo '<td>'.$row["fecha"].'</td>';
    echo '<td>'.$row["hora"].'</td>';
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
    echo '<input type="submit" name="ACEPTAR" value="ACEPTAR">';
}
echo '</form>';
?>


</center>