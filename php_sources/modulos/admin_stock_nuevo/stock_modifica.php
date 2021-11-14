<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type" />
  <title>Xzone modificacion de descuentos</title>
<script language="javascript" src="funciones.js"></script>
</head>



<?php
include("funciones.php");
if($_POST["id_articulos"] AND $_POST["id_sucursal"]){
    include_once("../../includes/connect.php");

    $query='select * from stock where id_articulos="'.$_POST["id_articulos"].'"';
    $array_costos=mysql_fetch_array(mysql_query($query));
    
	$query='select * from articulos where id="'.$_POST["id_articulos"].'"';
	$array_articulos=mysql_fetch_array(mysql_query($query));    
	

$id_articulos=$_POST["id_articulos"];
}
echo "<center>";
echo '<table border="1">';
    echo '<tr>';
        echo '<th>id</th>';
        echo '<th>codigo_interno</th>';
        echo '<th>marca</th>';
        echo '<th>descripcion</th>';
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
        echo '<td>'.$array_articulos["contenido"].'</td>';
        echo '<td>'.$array_articulos["presentacion"].'</td>';
        echo '<td>'.$array_articulos["codigo_barra"].'</td>';
        echo '<td>'.$array_articulos["clasificacion"].'</td>';
        echo '<td>'.$array_articulos["subclasificacion"].'</td>';
    echo '</tr>';
echo "</table>";

echo "<br>";

$query='select * from stock where id_articulo="'.$_POST["id_articulos"].'" and id_sucursal="'.$_POST["id_sucursal"].'"';
$result=mysql_query($query);
$rows=mysql_num_rows($result);
echo "rows: ".$rows."<br>";
$array_stock=mysql_fetch_array($result);

if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}

echo '<form action="stock_update.php" name="form_costos" id="form_costos" method="post">';

#----------------------------------------
echo '<table border="1">';
    echo '<tr>';
        echo '<th>stock</th>';
        echo '<th>minimo</th>';
        echo '<th>maximo</th>';
        echo '<th>fecha</th>';
        echo '<th>hora</th>';
    echo '</tr>';
       echo '<tr>';

?>
        <td><input type="text" name="stock" id="stock" value="<?php if($array_stock["stock"]){echo $array_stock["stock"];}?>" size="10"></td>
        <td><input type="text" name="minimo" id="minimo" value="<?php if($array_stock["minimo"]){echo $array_stock["minimo"];}?>" size="10"></td>
        <td><input type="text" name="maximo" id="maximo" value="<?php if($array_stock["maximo"]){echo $array_stock["maximo"];}?>" size="10"></td>
<?php        
        echo '<td>'.$array_stock["fecha"].'</td>';
        echo '<td>'.$array_stock["hora"].'</td>';
    echo '</tr>';
echo "</table>".chr(10);
#----------------------------------------



echo '<input type="hidden" name="id_articulos" value="'.$_POST["id_articulos"].'" />';
echo '<input type="hidden" name="id_sucursal" value="'.$_POST["id_sucursal"].'" />';

?>






<table class="t1" border="1">

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