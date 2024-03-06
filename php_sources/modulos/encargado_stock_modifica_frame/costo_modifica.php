<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
  <meta content="text/html; charset=UTF-8" http-equiv="content-type" />
  <title>Xzone modificacion de descuentos</title>
<script language="javascript" src="funciones.js"></script>
</head>



<?php
include("funciones.php");
if($_POST["id_articulos"]){
    include_once("../../includes/connect.php");
    $query='select * from costos where id_articulos="'.$_POST["id_articulos"].'"';
    $array_costos=mysql_fetch_array(mysql_query($query));
    
	$query='select * from articulos where id="'.$_POST["id_articulos"].'"';
	$array_articulos=mysql_fetch_array(mysql_query($query));    
	
	$array_costos=array_costos($_POST["id_articulos"]);
	$precio_venta=calcula_precio_venta( $array_costos );
	  if(mysql_error()){
    	echo mysql_error();
    }

$id_articulos=$_POST["id_articulos"];
}
echo "<center>";
echo '<table border="1">';
    echo '<tr>';
        echo '<th>id</th>';
        echo '<th>codigo_interno</th>';
        echo '<th>marca</th>';
        echo '<th>descripcion</th>';
        echo '<th>Color</th>';
        echo '<th>contenido</th>';
        echo '<th>presentacion</th>';
        echo '<th>codigo_barra</th>';
        echo '<th>clasificacion</th>';
        echo '<th>subclasificacion</th>';
    echo '</tr>';
    
    
    echo '<tr>';
        echo '<td>'.$array_articulos["id"].'</td>';
        echo '<td>'.$array_articulos["codigo_interno"].'</td>';
        echo '<td>'.$array_articulos["marca"].'</td>';
        echo '<td>'.$array_articulos["descripcion"].'</td>';
        echo '<td>'.$array_articulos["color"].'</td>';
        echo '<td>'.$array_articulos["contenido"].'</td>';
        echo '<td>'.$array_articulos["presentacion"].'</td>';
        echo '<td>'.$array_articulos["codigo_barra"].'</td>';
        echo '<td>'.$array_articulos["clasificacion"].'</td>';
        echo '<td>'.$array_articulos["subclasificacion"].'</td>';
    echo '</tr>';
echo "</table>";

echo "<br>";

?>





<form action="costos_update.php" name="form_costos" id="form_costos" method="post">

<table class="t1" border="1">
    <tr>
        <th>p/costo</th>
        <th>d1</th>
        <th>d2</th>
        <th>d3</th>
        <th>d4</th>
        <th>d5</th>
        <th>d6</th>
        <th>iva</th>
        <th>margen</th>
        <th>P.venta</th>
        <th>fecha</th>
        <th>fecha ger</th>
    </tr>
    <tr>
        <td><input type="text" OnChange="calcular();" name="precio_costo" id="precio_costo" value="<?php if($array_costos["precio_costo"]){echo $array_costos["precio_costo"];}?>" size="5"></td>
        <td><input type="text" OnChange="calcular();" name="descuento1" id="descuento1" value="<?php if($array_costos["descuento1"]){echo $array_costos["descuento1"];}?>" size="5"></td>
        <td><input type="text" OnChange="calcular();" name="descuento2" id="descuento2" value="<?php if($array_costos["descuento2"]){echo $array_costos["descuento2"];}?>" size="5"></td>
        <td><input type="text" OnChange="calcular();" name="descuento3" id="descuento3" value="<?php if($array_costos["descuento3"]){echo $array_costos["descuento3"];}?>" size="5"></td>
        <td><input type="text" OnChange="calcular();" name="descuento4" id="descuento4" value="<?php if($array_costos["descuento4"]){echo $array_costos["descuento4"];}?>" size="5"></td>
        <td><input type="text" OnChange="calcular();" name="descuento5" id="descuento5" value="<?php if($array_costos["descuento5"]){echo $array_costos["descuento5"];}?>" size="5"></td>
        <td><input type="text" OnChange="calcular();" name="descuento6" id="descuento6" value="<?php if($array_costos["descuento6"]){echo $array_costos["descuento6"];}?>" size="5"></td>
        <td><input type="text" OnChange="calcular();" name="iva" id="iva" value="<?php if($array_costos["iva"]){echo $array_costos["iva"];}?>" size="5"></td>
        <td><input type="text" OnChange="calcular();" name="margen" id="margen" value="<?php if($array_costos["margen"]){echo $array_costos["margen"];}?>" size="5"></td>
        <td><input type="text" OnChange="calcular();" name="precio_venta" id="precio_venta" value="<?php echo $precio_venta; ?>" size="5"></td>
        <td><?php echo $array_costos["fecha"];?></td>
        <td><?php echo $array_costos["fecha_gerencia"];?></td>
    </tr>

</table>
<?php
if($_GET["id_costos"] OR $array_costos["id"]){
    echo '<input type="hidden" name="accion" value="modificacion">';
    echo '<input type="hidden" name="id_articulos" value="'.$_POST["id_articulos"].'">';
    echo '<input type="hidden" name="uuid_costos" value="'.$array_costos["uuid"].'">';
}else{
    echo '<input type="hidden" name="accion" value="ingreso">';
}
?>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>