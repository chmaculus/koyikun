<?php
include_once("promociones_base.php");
include_once("../../includes/connect.php");
include("../../includes/funciones_articulos.php");
include("../../includes/funciones_precios.php");
include("../../includes/funciones_promocion.php");
include("../../includes/funciones_varias.php");

$id_articulos=$_POST["id_articulos"];
$id_sucursal=$_POST["id_sucursal"];


$fecha_inicio=fecha_conv( "/", $_POST["fecha_inicio"] );
$fecha_finaliza=fecha_conv( "/", $_POST["fecha_finaliza"] );


echo "Base: ".$base."<br><br>";

//$query='select * from sucursales';

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
echo $query1."<br>";

$result1=mysql_query($query1)or die(mysql_error());
while($row1=mysql_fetch_array($result1)){


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
    echo '</tr>';



	$array_precios=precio_sucursal( $row1["id"], 1 );
	$existe=verifica_promocion( $id_articulos, $row1["id"] );



	$query='select * from precios where id_articulo="'.$row1["id"].'" and id_sucursal="'.$id_sucursal.'"';
	$rows=mysql_num_rows( mysql_query($query) );
	echo "q3".$query." rows:".$rows."<br>";
	if($rows < 1 AND $row["id"] != 1 ){
		$q='insert into precios set
			id_articulo="'.$row1["id"].'",
			precio_base="'.$array_precios["precio_base"].'",
			porcentaje_contado="'.$array_precios["porcentaje_contado"].'",
			porcentaje_tarjeta="'.$array_precios["porcentaje_tarjeta"].'",
			id_sucursal="'.$id_sucursal.'",
			fecha="'.$array_precios["fecha"].'",
			hora="'.$array_precios["hora"].'",
			modulo="33",
			promocion="S"';
			echo "q0".$q."<br><br>";		
			mysql_query($q);
			if(mysql_error()){
				echo mysql_error();
			}
	}

		if($rows == 1 AND $row["id"] != 1 ){
			$q='update precios set
			precio_base="'.$array_precios["precio_base"].'",
			porcentaje_contado="'.$array_precios["porcentaje_contado"].'",
			porcentaje_tarjeta="'.$array_precios["porcentaje_tarjeta"].'",
			fecha="'.$array_precios["fecha"].'",
			hora="'.$array_precios["hora"].'",
			modulo="32",
			promocion="S"
				where id_articulo="'.$row1["id"].'" and
				id_sucursal="'.$id_sucursal.'"
			';
			echo "q1".$q."<br><br>";		
			mysql_query($q);
			if(mysql_error()){
				echo mysql_error();
			}
		}
	


		if( $_POST["precio_promocion".$row["id"]] == $array_precios["precio_base"] ){
			/* no es promocion */
		}
		if( $_POST["precio_promocion".$row["id"]] != $array_precios["precio_base"] ){
			$q0='delete from promociones where id_articulos="'.$row1["id"].'" and id_sucursal="'.$id_sucursal.'"';
			mysql_query($q0);
			if(mysql_error()){
				echo mysql_error();
			}
		/* es promocion */
					$query='insert into promociones set id_articulos="'.$row1["id"].'",
														id_sucursal="'.$id_sucursal.'",
														precio_promocion="'.$_POST["precio_promocion"].'",
														fecha_inicio="'.$fecha_inicio.'",
														fecha_finaliza="'.$fecha_finaliza.'",
														habilitado="S"
		';
		echo "q2: ".$query."<br><br>";
			mysql_query($query);
			if(mysql_error()){
				echo mysql_error();
			}
		}


}
echo "</table>";






?>