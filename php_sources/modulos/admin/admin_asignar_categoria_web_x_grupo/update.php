<?php
include_once("../includes/cabecera_utf-8.inc.php");
include_once("../../includes/connect.php");
include("../../includes/funciones_articulos.php");
include("../../includes/funciones_precios.php");
include("../../includes/funciones_promocion.php");
include("../../includes/funciones_varias.php");




echo "Base: ".$base."<br><br>";


echo '<table border="1">';
    echo '<tr>';
        echo '<th>id</th>';
        echo '<th>codigo_interno</th>';
        echo '<th>marca</th>';
        echo '<th>descripcion</th>';
        echo '<th>contenido</th>';
        echo '<th>presentacion</th>';
        echo '<th>codigo_barra</th>';
        echo '<th>fecha</th>';
        echo '<th>hora</th>';
        echo '<th>clasificacion</th>';
        echo '<th>subclasificacion</th>';
        echo '<th>precio</th>';
    echo '</tr>';

$query1=base64_decode($_POST["query"]);
echo $query1;
$result1=mysql_query($query1)or die(mysql_error());
while($row1=mysql_fetch_array($result1)){

		$query='update articulos set
		id_web="'.$_POST["id_web"].'"
				where id="'.$row1["id"].'"
			';


    echo '<tr>';
        echo '<td>'.$row1["id"].'</td>';
        echo '<td>'.$row1["codigo_interno"].'</td>';
        echo '<td>'.$row1["marca"].'</td>';
        echo '<td>'.$row1["descripcion"].'</td>';
        echo '<td>'.$row1["contenido"].'</td>';
        echo '<td>'.$row1["presentacion"].'</td>';
        echo '<td>'.$row1["codigo_barra"].'</td>';
        echo '<td>'.$row1["fecha"].'</td>';
        echo '<td>'.$row1["hora"].'</td>';
        echo '<td>'.$row1["clasificacion"].'</td>';
        echo '<td>'.$row1["subclasificacion"].'</td>';
        echo '<td>'.$array_precios["precio_base"].'</td>';
        echo '<td>'.$query.'</td>';
    echo '</tr>';
    mysql_query($query);
    if(mysql_error()){
	echo mysql_error()."<br>";
	echo $query."<br><br>";
    }
}//end while

echo "</table>";


#---------------------------------------------------------------------------------
		$id_articulos=$_POST["id_articulos"];
		
		$query='update articulos set
		id_web="'.$_POST["id_web"].'",
		discontinuo="'.$_POST["discontinuo"].'"
				where id="'.$id_articulos.'"
			';
	echo $query."<br><br>";
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}

#---------------------------------------------------------------------------------



?>





<?php
if(!mysql_error()){
	echo '<font1>Los datos se actualizaron correctamente</font1>';
}

?>
</center>
</body>
</html>
