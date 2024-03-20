<?php
include_once("../../includes/connect.php");
//include_once("../login/login_verifica.inc.php");
//include_once("seguridad.inc.php");
include_once("cabecera.inc.php");
?>

<table class="t1">
	<tr>
		<th>Cod Int</th>
		<th>Marca</th>
		<th>Descripcion</th>
		<th>Contenido</th>
		<th>Presentacion</th>
		<th>Cod Barra</th>
		<th>Clasificacion</th>
		<th>Sub clasificacion</th>
		<th>Seguimiento</th>
		<th>Costo</th>
		<th>Des1</th>
		<th>Des2</th>
		<th>Des3</th>
		<th>Des4</th>
		<th>Des5</th>
		<th>Des6</th>
		<th>IVA</th>
		<th>Margen</th>
		<th>Fecha</th>
		<th>Hora</th>
	</tr>



<?php
$query='select articulos.codigo_interno,
articulos.marca,
articulos.descripcion,
articulos.contenido,
articulos.presentacion,
articulos.codigo_barra,
articulos.clasificacion,
articulos.subclasificacion,
costos_seguimiento.costo,
costos_seguimiento.descuento1,
costos_seguimiento.descuento2,
costos_seguimiento.descuento3,
costos_seguimiento.descuento4,
costos_seguimiento.descuento5,
costos_seguimiento.descuento6,
costos_seguimiento.iva,
costos_seguimiento.margen,
costos_seguimiento.fecha,
costos_seguimiento.hora
from articulos, costos_seguimiento 
where costos_seguimiento.id_articulo=articulos.id and
costos_seguimiento.id_costos_detalle="'.$_GET["id_costos_detalle"].'" order by articulos.marca, 
articulos.clasificacion, 
articulos.subclasificacion, 
articulos.descripcion, 
articulos.contenido, 
articulos.presentacion ';

$result=mysql_query($query);

if(mysql_error()){
    echo $query."<br>";
    echo mysql_error()."<br>";
}
while($row=mysql_fetch_array($result)){
	echo '	<tr>';
	echo '<td>'.$row[0].'</td>'; 
	echo '<td>'.$row[1].'</td>'; 
	echo '<td>'.$row[2].'</td>'; 
	echo '<td>'.$row[3].'</td>'; 
	echo '<td>'.$row[4].'</td>'; 
	echo '<td>'.$row[5].'</td>'; 
	echo '<td>'.$row[6].'</td>'; 
	echo '<td>'.$row[7].'</td>'; 
	echo '<td><button>Seguimiento</button></td>';
	echo '<td>'.$row[8].'</td>'; 
	echo '<td>'.$row[9].'</td>'; 
	echo '<td>'.$row[10].'</td>'; 
	echo '<td>'.$row[11].'</td>'; 
	echo '<td>'.$row[12].'</td>'; 
	echo '<td>'.$row[13].'</td>'; 
	echo '<td>'.$row[14].'</td>'; 
	echo '<td>'.$row[15].'</td>'; 
	echo '<td>'.$row[16].'</td>'; 
	echo '<td>'.$row[17].'</td>'; 
	echo '<td>'.$row[18].'</td>'; 
	echo '	</tr>'.chr(10);
}
echo "</table>";
?>