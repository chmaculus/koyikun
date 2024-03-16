<?php

include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");
include_once("../../includes/seguridad_0.inc.php");

if($_POST["excel"]){
	include('export_excel.php');
	exit;
}

include("index.php");
include("../../includes/connect.php");

if($_POST["id_sucursal"] AND $_POST["marca"]){
	$id_sucursal=$_POST["id_sucursal"];
	$marca=$_POST["marca"];
}
echo "sucursal: ".$id_sucursal."<br>".chr(13);

echo '<form action="'.$_SERVER["SCRIPT_NAME"].'" method="post">';
echo '<input type="hidden" name="id_sucursal2" value="'.$_POST["id_sucursal"].'">';

echo '<table class="t1">';
	echo '<tr><td>Sucursal</td>';
	echo "<td>";include("sucursal_select.inc.php");echo "</td></tr>";

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
		$query='select articulos.marca, 
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
}


if ($_POST["clasificacion"] and $_POST["clasificacion"]!="TODAS"){
	echo '<tr><td>Subclasificacion</td>';
	echo '<td>';include("articulos_select_subclasificacion.inc.php");echo "</td></tr>";
	if($_POST["clasificacion"]=="TODAS"){
		$query='select articulos.marca, 
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
	}else{
		$query='select articulos.marca, 
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

$result=mysql_query($query)or die(mysql_error());
$numrows=mysql_num_rows($result);

echo '<br>Cantidad de articulos: '.$numrows.'<br>';

echo "</form>";
?>

<table class="t1">
<tr>
	<td>Codigo</td>
	<td>Marca</td>
	<td>Descripcion</td>
	<td>Contenido</td>
	<td>Presentacion</td>
	<td>clasificacion</td>
	<td>sub-clasificacion</td>
	<td>Stock</td>
	<td>Minimo</td>
	<td>Maximo</td>
	<td>Reponer</td>
</tr>

<?php
while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row[9].'</td>';
	echo '<td>'.$row[0].'</td>';
	echo '<td>'.$row[1].'</td>';
	echo '<td>'.$row[7].'</td>';
	echo '<td>'.$row[8].'</td>';
	echo '<td>'.$row[2].'</td>';
	echo '<td>'.$row[3].'</td>';
	echo '<td>'.$row[4].'</td>';
	echo '<td>'.$row[5].'</td>';
	echo '<td>'.$row[6].'</td>';
	echo '<td>'.($row[6] - $row[4] ).'</td>';
	
	echo "</tr>";
}
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