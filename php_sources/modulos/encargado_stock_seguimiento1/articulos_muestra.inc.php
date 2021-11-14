<?php

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
    echo "<th>Stock</th>";
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
    
    echo '<td>'.$array_stock["stock"].'</td>';
    echo '<td>'.$array_stock["fecha"].'</td>';
    echo '<td>'.$array_stock["hora"].'</td>';
    echo "</tr>".chr(10);
echo "</table>";
#--------------------------------------------------------------------------------------

?>