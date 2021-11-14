<?php
echo '<table class="t1">';

	$array_precios=array_precios($row["id"],1);
	echo "<tr>";
	echo '<td>ID: '.$row["id"];
	echo '<br>'.$row["marca"];
	echo '<br>'.$row["descripcion"];
	echo '<br>'.$row["color"];
	echo '<br>'.$row["contenido"];
	echo '<br>'.$row["presentacion"];
	echo '<br>count: '.$count;
	
	echo '<br><br><table><tr>';
	echo '<td>Contado</td><td><font4>$'.$array_precios["precio_base"].'</font4></td></tr>';
	echo '<tr><td>Tarjeta</td><td><font4>$'.round(($array_precios["precio_base"] * 1.2),2).'</font4></td>';
	echo '</tr></table>';

	if(file_exists ( "./imagenes/miniaturas/".$row["id"].".jpg" )==1){
	    echo '<td><img  src="./imagenes/miniaturas/'.$row["id"].'.jpg" width="200" height="200"></td>';
	 }else{
	    echo '<td><img  src="./imagenes/miniaturas/logoaf.jpg" width="200" height="200"></td>';
	 }
	 
	echo "</tr>".chr(10);
echo '</table>'.chr(10);
?>