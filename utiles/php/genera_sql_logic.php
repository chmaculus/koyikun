<?php
include("./includes/connect.php");
include("./includes/funciones_precios.php");

$q='select * from articulos';
$res=mysql_query($q);
while($row=mysql_fetch_array($res)){
$array_precio=precio_sucursal($row["id"],1);


$query='insert into logic_production.articulos set 
codarticulo="'.$row["id"].'",
referencia="'.$row["marca"].'",
descripcion="'.$row["descripcion"].'",
impuesto="21",
datos_producto="'.$row["clasificacion"].'-'.$row["subclasificacon"].'-'.$row["contenido"].'-'.$row["presentacion"].'",
precio_almacen="'.$array_precio["precio_base"].'",
precio_tienda="'.$array_precio["precio_base"].'",
precio_pvp="'.$array_precio["precio_base"].'",
precio_iva="'.$array_precio["precio_base"].'",
codigobarras="'.$row["codigo_barra"].'"
';

echo $query.";".chr(10);
}
?>