<?php include("../../login/login_verifica.inc.php");

$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="2"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type" />
  <title>Sucursal control administrativo</title>
</head>
<body>
<center>
<?php
include_once("../../includes/connect.php");
$array_articulo=get_articulo($_GET["id_articulo"]);
echo "Marca: ".$array_articulo["marca"]."<br>";
echo "Descripcion: ".$array_articulo["descripcion"]."<br>";
echo "Clasificacion: ".$array_articulo["clasificacion"]."<br>";
?>
<table class="t1">
<tr>
<th>Sucursal</th>
<td>Cantidad</th>
</tr>

<?php

$id_sucursal=$_COOKIE["id_sucursal"];

$query='select * from sucursales';
$result=mysql_query($query)or die(mysql_error());
while($row=mysql_fetch_array($result)){
	$stock=get_stock( $_GET["id_articulo"], $row["id"]);
	if($id_sucursal!=$row["id"] AND $stock>"10" ){ $stock="10"; }
	echo '<tr>';
	echo '<td>'.$row["sucursal"].'</td>';
	echo '<td>'.$stock.'</td>';
	echo '</tr>';
}
echo '</table>';




#-----------------------------------------------------------------
function get_stock($id_articulo,$id_sucursal){
	$query='select * from stock where id_articulo="'.$id_articulo.'" and id_sucursal="'.$id_sucursal.'"';
	$res=mysql_query($query) or die(mysql_error()." ".$SCRIPT_NAME);
	$rows=mysql_num_rows($res);
	if($rows==1){
		$array_stock=mysql_fetch_array($res);
		return $array_stock["stock"];		
	}
	if($rows<1){
		return $array_stock["stock"]=0;		
	}
return $array_stock["stock"];
}
#-----------------------------------------------------------------


#-----------------------------------------------------------------
function get_articulo($id_articulo){
	$query='select * from articulos where id="'.$id_articulo.'"';
	$result=mysql_query($query);
	$array_articulos=mysql_fetch_array($result);
return $array_articulos;	
}
#-----------------------------------------------------------------






?>

</center>
</body>
</html>

