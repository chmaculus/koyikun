<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="css/style2.css" type="text/css">
  <meta content="text/html; charset=UTF-8" http-equiv="content-type" />
  <title>Tablabla articulos By Christian Máculus</title>
</head>



<center>
<?php
include("../includes/connect.php");

$fecha=date("Y-n-d");

$fecha_desde=time() - (30 * 24 * 60 * 60);
$fecha_desde=date("Y-n-d",$fecha_desde);

echo "fecha desde".$fecha_desde;
$query='select * from articulos where fecha>="'.$fecha_desde.'" and fecha<="'.$fecha.'" and id>40000 order by marca,descripcion, contenido, presentacion';

echo "query: ".$query;
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table class="t1">';
echo "<tr>";
	echo "<th>id</th>";
	echo "<th>marca</th>";
	echo "<th>descripcion</th>";
	echo "<th>Imagen</th>";
	echo "<th>contenido</th>";
	echo "<th>presentacion</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	echo "<tr>";
	
	echo '<td>';
	echo '<tableborder="1">';

	echo '<tr>';
	echo '<td>'.$row["id"].'</td>';
	echo '</tr>';

	echo '<tr>';
	echo '<td>'.$row["marca"].'</td>';
	echo '</tr>';

	echo '<tr>';
	echo '<td>'.$row["descripcion"].'</td>';
	echo '</tr>';

	echo '<tr>';
	echo '<td>'.$row["contenido"].'</td>';
	echo '</tr>';

	echo '<tr>';
	echo '<td>'.$row["presentacion"].'</td>';
	echo '</tr>';

	echo '</table>';
	echo '</td>';
	echo '<td>';
	$id=$row["id"];
	if(file_exists ( "./imagenes/miniaturas/".$id.".jpg" )==1){
	    echo '<A HREF="detalle.php?id_articulo='.$id.'" onClick="return popup(this, \'notes\')">
		    <img  src="./imagenes/miniaturas/'.$id.'".jpg" width="280" height="177">
	            </A>';
	    }else{
	    echo '<img  src="./imagenes/miniaturas/logoaf.jpg" width="280" height="198">';
	    }
	echo '</td>';

	//echo '<td>'.$row["fecha"].'</td>';
	//echo '<td>'.$row["hora"].'</td>';

	echo "</tr>".chr(10);
}
?>
</table></center>
