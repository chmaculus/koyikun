<?php include("../../login/login_verifica.inc.php");

include_once("../seguridad.inc.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
  <meta content="text/html; charset=UTF-8" http-equiv="content-type" />
  <title>Koyi Kun control administrativo</title>
</head>
<body>

<center>
<titulo>Modificacion de precios</titulo>
<?php
include("../../includes/connect.php");
include("../includes/funciones_costos.php");

echo '<form action="'.$SCRIPT_NAME.'" method="post">';
echo '<table class="t1"';
	echo '<tr><td>marca</td>';
	echo "<td>";include("articulos_select_marca.inc.php");echo "</td></tr>";

if ($_POST["marca"]==""){
	echo "</table>";
	echo '<input type="submit" name="ACEPTAR" value="ACEPTAR"><br>';
	exit;
}

if ($_POST["marca"]){
	echo '<tr><td>clasificacion</td>';
	echo "<td>"; include("articulos_select_clasificacion.inc.php");echo "</td></tr>";
	$query='select * from articulos where marca="'.$_POST["marca"].'"';
}

if ($_POST["clasificacion"] and $_POST["clasificacion"]!="TODAS"){
	echo '<tr><td>Subclasificacion</td>';
	echo '<td>';include("articulos_select_subclasificacion.inc.php");echo "</td></tr>";
	if($_POST["clasificacion"]=="TODAS"){
		$query='select * from articulos where marca="'.$_POST["marca"].'"';
	}else{
		$query='select * from articulos where marca="'.$_POST["marca"].'" and clasificacion="'.$_POST["clasificacion"].'"';
	}
}

echo "</table>";

echo '<input type="submit" name="ACEPTAR" value="ACEPTAR"><br>';
#--------------------------------------------------------------------







$result=mysql_query($query)or die(mysql_error());
$numrows=mysql_num_rows($result);

if($_POST["marca"]){echo 'Marca: '.$_POST["marca"].'<br>';}
if($_POST["clasificacion"]){echo 'Clasificacion: '.$_POST["clasificacion"].'<br>';}
if($_POST["subclasificacion"]){echo 'Sublasificacion: '.$_POST["subclasificacion"].'<br>';}

echo '<br>Cantidad de articulos: '.$numrows.'<br>';
echo "</form>";
?>
<form action="update.php" method="post">

<input type="hidden" name="marca" value="<?php echo $_POST["marca"]; ?>">
<input type="hidden" name="clasificacion" value="<?php echo $_POST["clasificacion"]; ?>">
<input type="hidden" name="subclasificacion" value="<?php echo $_POST["subclasificacion"]; ?>">
<input type="hidden" name="query" value="<?php echo base64_encode($query); ?>">

<?php
include("listas.inc.php");

$qa='select * from listas';
$resb=mysql_query($qa);
if(mysql_error()){echo mysql_error()." ".$qa."<br>";}
while($rowss=mysql_fetch_array($resb)){
	$array_listas[]=$rowss;
}

?>

<input type="submit" name="APLICAR" value="APLICAR">
</form>
<table class="t1">
<tr>
	<th>descripcion</th>
	<th>clasificacion</th>
	<th>subclasificacion</th>
	<th>Costo</th>
	<th>Margen</th>
	<th>Precio<br>venta</th>
	<?php
		foreach($array_listas as $value){
			echo '<th>'.$value["nombre"].'</th>';
		}
	?>
	<th>fecha</th>
</tr>

<?php
while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["descripcion"].'</td>';
	echo '<td>'.$row["clasificacion"].'</td>';
	echo '<td>'.$row["subclasificacion"].'</td>';

	$array_costo=array_costo($row["id"]);
	$costo=calcula_precio_costo($row["id"]);
	$array_precios=precio_sucursal($row["id"],"1");

	echo '<td>$'.round($costo,2).'</td>';
	echo '<td>'.$array_costo["margen"].'%</td>';
	echo '<td>$'.$array_precios["precio_base"].'</td>';

	////////////////////////////////////////
	foreach($array_listas as $value){
		$array1=trae_valor_lista($value["id"], $array_precios["id_articulo"]);
		$precio1=(($array_precios["precio_base"] * $array1["porcentaje"])/100) + $array_precios["precio_base"];
		$margen1=((($precio1 / $costo)*100)-100);
		echo '<td><table border="1">';
		echo "<tr>";
		echo '<td>% desc</td>';
		echo '<td>'.$array1["porcentaje"].'%</td>';
		echo "</tr>";
		echo "<tr>";
		echo '<td>Precio</td>';
		echo '<td>$'.round($precio1,2).'</td>';
		echo "</tr>";
		echo "<tr>";
		echo '<td>Margen</td>';
		echo '<td>'.round($margen1,2).'%</td>';
		echo "</tr>";
		echo '</table></td>';
	}
	////////////////////////////////////////
	///vsphere
	
	echo '<td>'.$array_precios["fecha"].'</td>';
	
	echo "</tr>";
}

function precio_sucursal($id_articulo,$id_sucursal){
	$query='select * from precios where id_articulo="'.$id_articulo.'" and id_sucursal="'.$id_sucursal.'"';
	$res=mysql_query($query) or die(mysql_error()." ".$SCRIPT_NAME);
	$rows=mysql_num_rows($res);
	if($rows==1){
		$array_precios=mysql_fetch_array($res);
		return $array_precios;		
	}
	if($rows<1){
		$array_precios["precio_base"]="0";
		$array_precios["porcentaje_contado"]="0";
		$array_precios["porcentaje_tarjeta"]="0";
		return $array_precios;		
	}
return $array_precios;
}


function trae_valor_lista($id_lista, $id_articulo){
	$q='select * from listas_porcentaje where id_lista="'.$id_lista.'" and id_articulos="'.$id_articulo.'"';
	$res=mysql_query($q);
	//if(mysql_error()){echo "<td>".mysql_error()."</td>";}
	$rows=mysql_num_rows($res);
	//echo "<td>".$q."<br>";
	//echo "rows: ".$rows."</td>";
	if($rows==1){
		$array=mysql_fetch_array($res);
		return $array;
	}else{
		return NULL;
	}
}




?>
</center>
</body>
</html>
