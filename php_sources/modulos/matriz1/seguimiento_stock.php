<?php
include("includes/cabecera.inc.php");
include_once("../../includes/connect.php");
include_once("../../includes/funciones_stock.php");
include_once("../../includes/funciones_varias.php");
?>


<center>

<?php
echo '<form action="'.$_SERVER["SCRIPT_NAME"].'" method="POST">';
if(!$_POST["id_articulo"]){
	echo '<input type="hidden" name="id_articulo" value="'.$_GET["id_articulo"].'" />';
	$id_articulo=$_GET["id_articulo"];	
}else{
	echo '<input type="hidden" name="id_articulo" value="'.$_POST["id_articulo"].'" />';
	$id_articulo=$_POST["id_articulo"];	
}
echo '<input type="submit" name="orden" value="FECHA_HORA" />';
echo '<input type="submit" name="orden" value="sucursal_origen" />';
echo '<input type="submit" name="orden" value="sucursal_destino" />';
echo '<input type="submit" name="orden" value="tipo" />';
echo '<input type="submit" name="orden" value="sucursal_tipo" />';
echo '</form>';

if($_POST["orden"]=="FECHA_HORA"){
	$query='select * from seguimiento_stock where id_articulo="'.$id_articulo.'" order by fecha, hora';
	echo "Orden fecha hora<br><br>";
}

if($_POST["orden"]=="sucursal_origen"){
	$query='select * from seguimiento_stock where id_articulo="'.$id_articulo.'" order by origen, fecha, hora';
	echo "Orden sucursal<br><br>";
}

if($_POST["orden"]=="sucursal_destino"){
	$query='select * from seguimiento_stock where id_articulo="'.$id_articulo.'" order by destino, fecha, hora';
	echo "Orden sucursal<br><br>";
}

if($_POST["orden"]=="tipo"){
	$query='select * from seguimiento_stock where id_articulo="'.$id_articulo.'" order by tipo, fecha, hora';
	echo "Orden tipo movimiento<br><br>";
}

if($_POST["orden"]=="sucursal_tipo"){
	$query='select * from seguimiento_stock where id_articulo="'.$id_articulo.'" order by origen, tipo, fecha, hora';
	echo "Orden sucursal y tipo movimiento<br><br>";
}

if(!$_POST["orden"]){
	$query='select * from seguimiento_stock where id_articulo="'.$id_articulo.'" order by fecha, hora';
	echo "Orden fecha hora<br><br>";
}

echo $query."<br>";
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table class="t1">';
echo "<tr>";
    echo "<th>id</th>";
    echo "<th>id_articulo</th>";
    echo "<th>tipo</th>";
    echo "<th>cantidad</th>";
    echo "<th>stock_anterior</th>";
    echo "<th>stock_nuevo</th>";
    echo "<th>origen</th>";
    echo "<th>destino</th>";
    echo "<th>fecha</th>";
    echo "<th>hora</th>";
    echo "<th>numero_venta</th>";
    echo "<th>vendedor</th>";
    echo "<th>envio</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
    echo "<tr>";
    echo '<td>'.$row["id"].'</td>';
    echo '<td>'.$row["id_articulo"].'</td>';
    echo '<td>'.$row["tipo"].'</td>';
    echo '<td>'.$row["cantidad"].'</td>';
    echo '<td>'.$row["stock_anterior"].'</td>';
    echo '<td>'.$row["stock_nuevo"].'</td>';
    if($row["tipo"]=="RE"){
	    echo '<td>'.nombre_sucursal($row["origen"]).' D</td>';
   	 echo '<td>'.nombre_sucursal($row["destino"]).' O</td>';
    }else{
	    echo '<td>'.nombre_sucursal($row["origen"]).'</td>';
   	 echo '<td>'.nombre_sucursal($row["destino"]).'</td>';
    }
    echo '<td>'.$row["fecha"].'</td>';
    echo '<td>'.$row["hora"].'</td>';
    echo '<td>'.$row["numero_venta"].'</td>';
    echo '<td>'.$row["vendedor"].'</td>';
    echo '<td>'.$row["envio"].'</td>';
    echo "</tr>".chr(10);
}
?>
</table></center>