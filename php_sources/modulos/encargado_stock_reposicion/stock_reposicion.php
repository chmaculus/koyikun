<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" href="style.css" type="text/css">
<meta content="text/html; charset=ISO-8859-1" http-equiv="content-type" />
<title>Tablabla articulos By Christian Máculus</title>
</head>



<center>
<?php

include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");
include_once("../../includes/seguridad_1.inc.php");
include_once("../../includes/funciones_stock.php");
include_once("../../includes/funciones_varias.php");
include_once("../../includes/funciones_costos.php");


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" href="style.css" type="text/css">
<meta content="text/html; charset=ISO-8859-1" http-equiv="content-type" />
<title>Tablabla articulos By Christian Máculus</title>
</head>



<center>
<?php


if($_POST["excel"]){
	include('export_excel.php');
	exit;
}

include("index.php");

if($_POST["id_sucursal"] AND $_POST["marca"]){
	$id_sucursal=$_POST["id_sucursal"];
	$marca=$_POST["marca"];
}

$id_sucursal=$_COOKIE["id_sucursal"];
#$id_sucursal=1;

echo "sucursal: ".$id_sucursal."<br>".chr(13);

echo '<form action="'.$_SERVER["SCRIPT_NAME"].'" method="post">';
echo '<input type="hidden" name="id_sucursal" value="'.$id_sucursal.'">';

echo '<table class="t1">';
	echo '<tr><td>Sucursal</td>';
	echo "<td>";echo nombre_sucursal($id_sucursal);echo "</td></tr>";

	echo '<tr><td>Marca</td>';
	echo "<td>";include("articulos_select_marca.inc.php");echo "</td></tr>";

if (!$_POST["marca"]){
	echo "</table>";
	echo '<input type="submit" name="ACEPTAR" value="ACEPTAR"><br>';
	exit;
}

if ($marca){
	echo '<tr><td>clasificacion</td>';
	echo "<td>"; include("articulos_select_clasificacion.inc.php");echo "</td></tr>";
/*
	$query='select articulos.id,
					articulos.marca, 
							articulos.descripcion, 
							articulos.clasificacion, 
							articulos.subclasificacion, 
							stock.stock, 
							stock.minimo, 
							stock.maximo, 
							articulos.contenido,
							articulos.presentacion,
							articulos.codigo_interno 
								from articulos,stock 
									where articulos.id=stock.id_articulo and
										articulos.marca="'.$marca.'" and 
										stock.stock < stock.minimo and
										stock.id_sucursal="'.$id_sucursal.'"';
*/
	$query='select * from articulos where marca="'.$_POST["marca"].'" order by marca,clasificacion,subclasificacion, descripcion';
}


if ($_POST["clasificacion"] and $_POST["clasificacion"]!="TODAS"){
	echo '<tr><td>Subclasificacion</td>';
	echo '<td>';include("articulos_select_subclasificacion.inc.php");echo "</td></tr>";
	if($_POST["clasificacion"]=="TODAS"){
		$query='select * from articulos where marca="'.$marca.'"  order by marca,clasificacion,subclasificacion, descripcion';
/*
		$query='select articulos.id,
							articulos.marca, 
							articulos.descripcion, 
							articulos.clasificacion, 
							articulos.subclasificacion, 
							stock.stock, 
							stock.minimo, 
							stock.maximo, 
							articulos.contenido,
							articulos.presentacion, 
							articulos.codigo_interno 
								from articulos,stock 
									where articulos.id=stock.id_articulo and
										articulos.marca="'.$marca.'" and 
										stock.stock < stock.minimo and
										stock.id_sucursal="'.$_POST["id_sucursal"].'"';
	*/				
	}else{
		$query='select * from articulos where marca="'.$marca.'" and clasificacion="'.$_POST["clasificacion"].'"  order by marca,clasificacion,subclasificacion, descripcion';
/*
		$query='select articulos.id,
							articulos.marca, 
							articulos.descripcion, 
							articulos.clasificacion, 
							articulos.subclasificacion, 
							stock.stock, 
							stock.minimo, 
							stock.maximo,
							articulos.contenido,
							articulos.presentacion,
							articulos.codigo_interno 
								from articulos,stock 
									where articulos.id=stock.id_articulo and
										articulos.marca="'.$marca.'" and 
										articulos.clasificacion="'.$_POST["clasificacion"].'" and 
										stock.stock < stock.minimo and
										stock.id_sucursal="'.$_POST["id_sucursal"].'"';
*/
	}
}

if($marca){echo 'Marca: '.$marca.'<br>';}
if($sucursal){echo 'Marca: '.$sucursal.'<br>';}
//if($_POST["clasificacion"]){echo 'Clasificacion: '.$_POST["clasificacion"].'<br>';}
//if($_POST["subclasificacion"]){echo 'Sublasificacion: '.$_POST["subclasificacion"].'<br>';}


echo "</table>";
echo '<input type="hidden" name="query" value="'.base64_encode($query).'">';
echo '<input type="submit" name="ACEPTAR" value="ACEPTAR"><br>';
echo '<input type="submit" name="excel" value="EXPORTAR A EXCEL"><br>';

#echo id_sucursal($sucursal);

$result=mysql_query($query);
if(mysql_error()){echo mysql_error()." ".$query."<br>";}
$numrows=mysql_num_rows($result);

echo '<br>Cantidad de articulos: '.$numrows.'<br>';

echo "</form>";


echo '<table class="t1">';
echo "<tr>";
    echo "<th>id</th>";
    echo "<th>codigo_interno</th>";
    echo "<th>marca</th>";
    echo "<th>descripcion</th>";
    echo "<th>contenido</th>";
    echo "<th>presentacion</th>";
    echo "<th>codigo_barra</th>";
    echo "<th>clasificacion</th>";
    echo "<th>subclasificacion</th>";
    echo "<th>Stock</th>";
    echo "<th>Maximo</th>";
    echo "<th>Reponer</th>";
    echo "<th>Costo</th>";
    echo "<th>Costo X Un</th>";
echo "</tr>";


while($row=mysql_fetch_array($result)){
	$array_stock=array_stock($row["id"], $id_sucursal);
	$reponer=($array_stock["maximo"] - $array_stock["stock"] );
	if($reponer<0){
		$reponer=0;
	}
	if($reponer>0){
		$costo=calcula_precio_costo( $row["id"] );
		$valor_reponer=round (($reponer * $costo),2);
		$tot_reponer = $tot_reponer+$valor_reponer;
		$tot_costo= $tot_costo+$costo;
		echo "<tr>";
		echo '<td>'.$row["id"].'</td>';
		echo '<td>'.$row["codigo_interno"].'</td>';
		echo '<td>'.$row["marca"].'</td>';
		echo '<td>'.$row["descripcion"].'</td>';
		echo '<td>'.$row["contenido"].'</td>';
		echo '<td>'.$row["presentacion"].'</td>';
		echo '<td>'.$row["codigo_barra"].'</td>';
		echo '<td>'.$row["clasificacion"].'</td>';
		echo '<td>'.$row["subclasificacion"].'</td>';
		echo '<td>'.$array_stock["stock"].'</td>';
		echo '<td>'.$array_stock["maximo"].'</td>';
		echo '<td><input type="text" name="reponer" value="'.$reponer.'" size="5"></td>';
		echo '<td>$'.str_replace(".",",",round($costo,2)).'</td>';
		echo '<td>$'.str_replace(".",",",$valor_reponer).'</td>';
		echo "</tr>".chr(10);
		$count++;
	}
}

echo "cantidad de articulos a reponer: ".$count."<br>";
echo "Total costo x unidades a reponer: $".str_replace(".",",",$tot_reponer)."<br>";
echo "</table>";
#-------------------------------------------------------------------
function get_articulo($id_articulo){
	$query='select * from articulos where id="'.$id_articulo.'"';
	$result=mysql_query($query);
	$array_articulos=mysql_fetch_array($result);
return $array_articulos;	
}
#-------------------------------------------------------------------


?>
</center>
</body>
</html>