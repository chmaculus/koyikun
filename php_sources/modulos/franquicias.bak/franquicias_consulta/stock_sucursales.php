<?php include("../login/login_verifica.inc.php");

include("../includes/seguridad_franquicia.inc.php");

include("cabecera.inc.php");
 ?>


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

$query='select * from koyikun.sucursales';
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
	$query='select * from koyikun.stock where id_articulo="'.$id_articulo.'" and id_sucursal="'.$id_sucursal.'"';
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
	$query='select * from koyikun.articulos where id="'.$id_articulo.'"';
	$result=mysql_query($query);
	$array_articulos=mysql_fetch_array($result);
return $array_articulos;	
}
#-----------------------------------------------------------------






?>

</center>
</body>
</html>

