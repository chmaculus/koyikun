<?php
include_once("../includes/connect.php");


include_once("cabecera.inc.php");?>

<script language="javascript" src="js/jquery-1.3.min.js"></script>
<script language="javascript" src="funciones.js"></script>


<body>

<center>
<titulo>Modificacion de promociones</titulo>

<?php
include_once("../includes/funciones_costos.php");
include_once("../includes/funciones_precios.php");

$fecha=date("Y-m-d");


echo '<form action="'.$_SERVER["SCRIPT_NAME"].'" method="post">';
include("select.inc.php");
echo 'activas<input type="radio" name="activas" value="activas"'; if(!$_POST["activas"]){
	echo 'checked';}
	elseif($_POST["activas"]=="activas") 
	{ echo 'checked';}echo '><br>';
echo 'Todas<input type="radio" name="activas" value="todas" '; 
if($_POST["activas"]=="activas") { 
echo 'checked';}echo '><br>';
echo '<input type="submit" name="ACEPTAR" value="ACEPTAR"><br>';
echo "</form>";


if(!$_POST["marca"]){
	echo '<br>No se ha seleccionado marca<br>';
	exit;
}


$query='select articulos.id,
articulos.codigo_interno,
articulos.marca,
articulos.descripcion,
articulos.color,
articulos.contenido,
articulos.presentacion,
articulos.clasificacion,
articulos.subclasificacion,
articulos.codigo_barra,
promociones.id_sucursal,
promociones.fecha_inicio,
promociones.fecha_finaliza,
promociones.precio_promocion,
promociones.habilitado,
promociones.req_verif
 	from articulos,promociones 
 		where articulos.id=promociones.id_articulos and
 		articulos.marca="'.$_POST["marca"].'" ';
 		if($_POST["activas"]=="todas"){$query.=' and fecha_finaliza<="'.$fecha.'" ';}	
 			$query.=' order by articulos.marca, articulos.clasificacion, articulos.subclasificacion, articulos.descripcion';

echo "<br>".$query."<br>";

$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table class="t1">';
echo "<tr>";
	echo "<th>id</th>";
	echo "<th>codigo_interno</th>";
	echo "<th>marca</th>";
	echo "<th>descripcion</th>";
	echo "<th>color</th>";
	echo "<th>contenido</th>";
	echo "<th>presentacion</th>";
	echo "<th>clasificacion</th>";
	echo "<th>subclasificacion</th>";
	echo "<th>Codigo barra</th>";
	echo "<th>id suc</th>";
	echo "<th>fecha inicio</th>";
	echo "<th>fecha finaliza</th>";
	echo "<th>precio promocion</th>";
	echo "<th>habilitado</th>";
	echo "<th>req aprob</th>";
echo "</tr>";
/*
$query='select articulos.id,
articulos.codigo_interno,
articulos.marca,
articulos.descripcion,
articulos.color,
articulos.contenido,
articulos.presentacion,
articulos.clasificacion,
articulos.subclasificacion,
articulos.codigo_barra,
promociones.id_sucursal,
promociones.fecha_inicio,
promociones.fecha_finaliza,
promociones.precio_promocion,
promociones.habilitado,
promociones.req_verif

*/
while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["0"].'</td>';
	echo '<td>'.$row["1"].'</td>';
	echo '<td>'.$row["2"].'</td>';
	echo '<td>'.$row["3"].'</td>';
	echo '<td>'.$row["4"].'</td>';
	echo '<td>'.$row["5"].'</td>';
	echo '<td>'.$row["6"].'</td>';
	echo '<td>'.$row["7"].'</td>';
	echo '<td>'.$row["8"].'</td>';
	echo '<td>'.$row["9"].'</td>';
	echo '<td>'.$row["10"].'</td>';
	echo '<td>'.$row["11"].'</td>';
	echo '<td>'.$row["12"].'</td>';
	echo '<td>'.$row["13"].'</td>';
	echo '<td>'.$row["14"].'</td>';
	echo "</tr>".chr(10);
}
?>
</table></center>
