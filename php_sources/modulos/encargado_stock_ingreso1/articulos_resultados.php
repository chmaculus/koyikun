<?php
include_once("../../includes/connect.php");
//include_once("../../includes/funciones_varias.php");
include_once("../../login/login_verifica.inc.php");
include_once("seguridad_1.inc.php");

include_once("cabecera.inc.php");
include_once("links.php");
?>
<script language="javascript" src="funciones.js"></script>
<?php
echo "<center>";




$id_sucursal=$_COOKIE["id_sucursal"];

$q='select * from articulos where 	codigo_barra="'.$_POST["busqueda"].'" or 
												id="'.$_POST["busqueda"].'" 
														order by marca, clasificacion, subclasificacion, descripcion';

$result=mysql_query($q);
if(mysql_error()){
	echo mysql_error();
}
$total_rows=mysql_num_rows($result);


if($total_rows<1 OR $total_rows>1 ){
	include_once("index.php");
	echo '<br>No se encontraron resultados con: '.$_POST["busqueda"].' <br>';
	exit;
}


if($total_rows==1){
	$array_articulos=mysql_fetch_array($result);
	$q2='select * from stock where id_articulo="'.$array_articulos["id"].'" and id_sucursal="'.$id_sucursal.'"';
	$res2=mysql_query($q2);
	if(mysql_error()){
   	 echo mysql_error()." ".$SCRIPT_NAME;
	}
}
	
echo '<body onLoad=document.aa.stock_nuevo.focus()>';
echo '<form name="aa" action="stock_update.php" method="post">';

echo "<br><br>";

echo '<table class="t1">';
echo "<tr>";
    echo "<th>id</th>";
    echo "<th>codigo_interno</th>";
    echo "<th>marca</th>";
    echo "<th>descripcion</th>";
    echo "<th>clasificacion</th>";
    echo "<th>subclasificacion</th>";
    echo "<th>contenido</th>";
    echo "<th>presentacion</th>";
    echo "<th>Codigo barra</th>";
    echo "<th>Imagen</th>";
    echo "<th>fecha</th>";
    echo "<th>hora</th>";
echo "</tr>";

    echo "<tr>";
    echo '<td>'.$array_articulos["id"].'</td>';
    echo '<td>'.$array_articulos["codigo_interno"].'</td>';
    echo '<td>'.$array_articulos["marca"].'</td>';
    echo '<td>'.$array_articulos["descripcion"].'</td>';
    echo '<td>'.$array_articulos["contenido"].'</td>';
    echo '<td>'.$array_articulos["clasificacion"].'</td>';
    echo '<td>'.$array_articulos["subclasificacion"].'</td>';
    echo '<td>'.$array_articulos["presentacion"].'</td>';
    echo '<td>'.$array_articulos["codigo_barra"].'</td>';

	if(file_exists ( "./imagenes/miniaturas/".$array_articulos["id"].".jpg" )==1){
		echo '<td><A HREF="detalle.php?id_articulo='.$array_articulos["id"].'" onClick="return popup(this, \'notes\')">
		<img  src="./imagenes/miniaturas/'.$array_articulos["id"].'".jpg" width="150" height="100">
		</A></td>';
	}else{
		echo '<td>';
//		echo "./imagenes/miniaturas/".$row["id"].".jpg";
		echo '</td>';
	}
    
    echo '<td>'.$array_articulos["fecha"].'</td>';
    echo '<td>'.$array_articulos["hora"].'</td>';
    echo "</tr>".chr(10);
echo "</table>";
#--------------------------------------------------------------------------------------


echo "<br>";
include_once("stock_ingreso.inc.php");



?>
