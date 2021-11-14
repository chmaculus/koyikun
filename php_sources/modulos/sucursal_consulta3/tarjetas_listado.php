<?php
include_once("../../includes/connect.php");

include("../../login/login_verifica.inc.php");
$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="2"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 

include_once("cabecera.inc.php");
include_once("includes/funciones.php");
?>


<center>
<?php


#----------------------------------------
#muestra registro ingresado
$query='select * from articulos where id="'.$_GET["id_articulo"].'"';
$array_articulos=mysql_fetch_array(mysql_query($query));
if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
#----------------------------------------

#----------------------------------------
echo '<table class="t1">';
	echo '<tr>';
		echo '<th>id</th>';
		echo '<td>'.$array_articulos["id"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>codigo_interno</th>';
		echo '<td>'.$array_articulos["codigo_interno"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>marca</th>';
		echo '<td>'.$array_articulos["marca"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>descripcion</th>';
		echo '<td>'.$array_articulos["descripcion"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>contenido</th>';
		echo '<td>'.$array_articulos["contenido"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>presentacion</th>';
		echo '<td>'.$array_articulos["presentacion"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>codigo_barra</th>';
		echo '<td>'.$array_articulos["codigo_barra"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>clasificacion</th>';
		echo '<td>'.$array_articulos["clasificacion"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>subclasificacion</th>';
		echo '<td>'.$array_articulos["subclasificacion"].'</td>';
	echo '</tr>';
echo "</table>";

echo '<br>';
echo '<br>';

#----------------------------------------

$array_costos=precio_costo($array_articulos["id"]);
$precio_venta=calcula_precio_venta( $array_costos );




$query="select * from tarjetas limit 0,1000";
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table class="t1">';
echo "<tr>";
	echo "<th>id</th>";
	echo "<th>tarjeta</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["tarjeta"].'</td>';
	echo '<td>';
//	echo '<form method="POST" action="tarjetas_listado_coheficientes.php">';
//	echo '<input type="hidden" name="precio" value="'.$precio_venta.'">';
//	echo '<button></button>';
//	echo '</form>';
	echo '<A class="w3-btn w3-purple" HREF="tarjetas_listado_coheficientes.php?id_tarjetas='.$row["id"].'&id_articulo='.$array_articulos["id"].'">Cantidad de<br>Pagos</A>';
	
	
	echo '</td>';
	echo "</tr>".chr(10);
}
?>
</table></center>

