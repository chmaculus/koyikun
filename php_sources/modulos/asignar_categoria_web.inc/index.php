<?php
if(!$_GET["id_articulo"]){
	exit;
}

include_once("../includes/connect.php");
include_once("./cabecera.inc.php");
echo "<center>";


#----------------------------------------
#muestra registro ingresado
$query='select * from articulos where id="'.$_GET["id_articulo"].'"';
$array_articulos=mysql_fetch_array(mysql_query($query));
if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
#----------------------------------------

echo '<form action="update.php" method="post">';
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
		echo '<th>fecha</th>';
		echo '<td>'.$array_articulos["fecha"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>hora</th>';
		echo '<td>'.$array_articulos["hora"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>clasificacion</th>';
		echo '<td>'.$array_articulos["clasificacion"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>subclasificacion</th>';
		echo '<td>'.$array_articulos["subclasificacion"].'</td>';
	echo '</tr>';

	echo '<tr>';
		echo '<th>id_web</th>';
		echo '<td>';
		include("includes/categorias_web.inc.php");
		echo '</td>';
	echo '</tr>';

	echo '<tr>';
		echo '<th>Discontinuo</th>';
		echo '<td>';
		echo '<input type="checkbox" name="discontinuo" value="S" '; if($array_articulos["discontinuo"]=="S"){ echo 'checked="checked"'; } echo '>';
		echo '</td>';
	echo '</tr>';

       ////////zona
        echo '<tr><th>Zona</th><td><select name="zona">';
        echo '<option value=""';        if($array_articulos["zona"]==""){echo ' selected ';}    echo '>Seleccione</option>';
        echo '<option value="1"';       if($array_articulos["zona"]==1){echo ' selected ';}     echo '>1</option>';
        echo '<option value="2"';       if($array_articulos["zona"]==2){echo ' selected ';}     echo '>2</option>';
        echo '<option value="3"';       if($array_articulos["zona"]==3){echo ' selected ';}     echo '>3</option>';
        echo '<option value="4"';       if($array_articulos["zona"]==4){echo ' selected ';}     echo '>4</option>';
        echo '<option value="5"';       if($array_articulos["zona"]==5){echo ' selected ';}     echo '>5</option>';
        echo '</select></td></tr>';
        ////////fin zona

echo "</table>";
#----------------------------------------

echo '<br><input type="hidden" name="id_articulos" value="'.$array_articulos["id"].'">';
echo '<input type="submit" name="ACEPTAR" value="ACEPTAR">';
echo '</form>';
?>