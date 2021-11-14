<?php

include_once("pedidos_base.php");
include_once("../includes/connect.php");
include_once("../includes/funciones_varias.php");



$aaa=explode("|",base64_decode($_GET["var"]));


//echo $_GET["var"]."<br>";
//echo base64_decode($_GET["var"])."<br>";

echo '<font2>Detalle de articulos dados de baja con cantidad 0 de la marca '.$aaa[2].' desde: '.$aaa[0].' hasta: '.$aaa[1].'</font2><br><br>';


$q='select id_articulo, descripcion, color, clasificacion, subclasificacion, count(*) as cantidad from pedidos where fecha>="'.$aaa[0].'" and fecha<="'.$aaa[1].'" and marca="'.$aaa[2].'" and finalizado="S" and cantidad_recibida=0 group by id_articulo';
$res=mysql_query($q);

echo '<table border="1">';

echo '<tr>';
echo '<td>id</td>';
echo '<td>Descripcion</td>';
echo '<td>Color</td>';
echo '<td>Clasificacion</td>';
echo '<td>Sub-clasificacion</td>';
echo '<td>Cantidad solicitada</td>';
echo '<td>Sucursal / cantidad</td>';
echo '</tr>';


while($row=mysql_fetch_array($res)) {
	echo '<tr>';
	echo '<td>'.$row[0].'</td>';
	echo '<td>'.$row[1].'</td>';
	echo '<td>'.$row[2].'</td>';
	echo '<td>'.$row[3].'</td>';
	echo '<td>'.$row[4].'</td>';
	$q='select sum(cantidad_solicitada) from pedidos where fecha>="'.$aaa[0].'" and fecha<="'.$aaa[1].'" and id_articulo="'.$row[0].'"';	
	echo '<td>'.mysql_result(mysql_query($q),0,0).'</td>';
		echo '<td>';
		echo chr(10).'<table border="1">';
		aaaa($row[0],$aaa[0],$aaa[1]);
		echo "</table>".chr(10);
		echo '</td>';
	echo '</tr>'.chr(10);
}
echo '</table>';


function aaaa($id_articulo,$fecha_desde,$fecha_hasta){
	$q='select distinct sucursal from pedidos where fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'" and id_articulo="'.$id_articulo.'"';
	//echo $q;
	$res=mysql_query($q);
	if(mysql_error()){echo mysql_error();}
	
		
		while($row=mysql_fetch_array($res)){
			$q2='select sum(cantidad_solicitada) from pedidos where fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'" and id_articulo="'.$id_articulo.'" and sucursal="'.$row[0].'"';
			$r1=mysql_query($q2);
			if(mysql_error()){echo mysql_error();}
			echo '<tr>';
			echo '<td>'.nombre_sucursal($row[0]).'</td>';
			//echo '<td>'.$row[0].'</td>';
			echo '<td>'.mysql_result($r1,0,0).'</td>';
			//echo '<td>'.$q2.'</td>';
			echo '</tr>';
		}
		

}



?>