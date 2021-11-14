<?php

include_once("../../includes/connect.php");
include_once("../../includes/funciones_varias.php");
include_once("../../login/login_verifica.inc.php");
include_once("cabecera.inc.php");

#jrarquia 0 coresponde a administrador
if($jerarquia!="1"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 
?>


<center>
<?php
include("pedidos_base.php");
?>



<center>
<?php
$marca=base64_decode($_GET["marca"]);
include("connect.php");
$query='select * from articulos where marca="'.$marca.'" order by clasificacion, subclasificacion, contenido, presentacion';
echo $query;
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


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
	echo "<th>codigo_barra</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["codigo_interno"].'</td>';
	echo '<td>'.$row["marca"].'</td>';
	echo '<td>'.$row["descripcion"].'</td>';
	echo '<td>'.$row["clasificacion"].'</td>';
	echo '<td>'.$row["subclasificacion"].'</td>';
	echo '<td>'.$row["contenido"].'</td>';
	echo '<td>'.$row["presentacion"].'</td>';
	echo '<td>'.$row["codigo_barra"].'</td>';
    echo '<td><A HREF="pedidos_agregar_articulo_update.php?numero_pedido='.$_GET["numero_pedido"].'&id_articulo='.$row["id"].'"><button>Agregar</button></A></td>';
	
	echo "</tr>".chr(10);
}
?>
</table></center>