<?php
include_once("cabecera.inc.php");
include_once("../includes/connect.php");
include_once("../includes/funciones_precios.php");
echo "<center>";
$q1='select * from articulos where lanzamiento="S" order by fecha,hora';
$res1=mysql_query($q1);
$rows1=mysql_num_rows($res1);

$id_session=$_COOKIE["id_session"];


$q2='select * from articulos_lanzamientos where id_session="'.$id_session.'"';
$res2=mysql_query($q2);
$rows2=mysql_num_rows($res2);
if($rows2<1){
    $q3='insert into articulos_lanzamientos set id_session="'.$id_session.'", count="'.$rows1.'", ultimo="1"';
    //echo $q3;
    mysql_query($q3);
    $ultimo=1;
}
if($rows2==1){
    $array2=mysql_fetch_array($res2);
    $ultimo=$array2["ultimo"];
    $nue=$ultimo+1;
    if($nue>$rows1){
	$nue=1;
    }
    $q3='update articulos_lanzamientos set count="'.$rows1.'", ultimo="'.$nue.'"  where id_session="'.$id_session.'"';
    mysql_query($q3);
    //echo "<br>".$q3."<br>";
}

echo '<table class="t1">';

while($row=mysql_fetch_array($res1)){
    $array_precios=array_precios($row["id"],1);
    $count++;
    echo "<tr>";
    if($ultimo==$count){
    	if(file_exists ( "./lanzamientos/".$row["id"].".jpg" )==1){
    	    echo '<td><img  src="./lanzamientos/'.$row["id"].'".jpg"></td>';
    	    // width="150" height="100"
        }else{
	    echo '<td></td>';
	}
    
    echo "<td>";
    echo '<table border="1">';
	echo '<tr>';
	echo "<td>ID</td>";
	echo "<td>".$row["id"]."</td>";
	echo '</tr>';

	echo '<tr>';
	echo "<td>Marca</td>";
	echo "<td>".$row["marca"]."</td>";
	echo '</tr>';

	echo '<tr>';
	echo "<td>Clasificacion</td>";
	echo "<td>".$row["clasificacion"]."</td>";
	echo '</tr>';

	echo '<tr>';
	echo "<td>Subclasificacion</td>";
	echo "<td>".$row["subclasificacion"]."</td>";
	echo '</tr>';

	echo '<tr>';
	echo "<td>Contenido</td>";
	echo "<td>".$row["contenido"]."</td>";
	echo '</tr>';

	echo '<tr>';
	echo "<td>Presentacion</td>";
	echo "<td>".$row["presentacion"]."</td>";
	echo '</tr>';

	echo '<tr>';
	echo "<td>Contado</td>";
	echo "<td>".round($array_precios["precio_base"],2)."</td>";
	echo '</tr>';

	$tarjeta=(($array_precios["precio_base"] * 20 )/100) + $array_precios["precio_base"];
	echo '<tr>';
	echo "<td>Tarjeta</td>";
	echo "<td>".round($tarjeta,2)."</td>";
	echo '</tr>';

	echo '<tr>';
	echo "<td>Pedir</td>";
	echo "<td>";
	echo "</td>";
	echo '</tr>';


	echo '<tr>';
	echo "<td>C</td>";
	echo "<td>";
	echo $count;
	echo "</td>";
	echo '</tr>';

    echo '</table>';
    echo "</td>";

    }//end if

    echo "</tr>";
}

?>