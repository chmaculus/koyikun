<?php
include("cabecera2.inc.php");
//include("../includes/funciones_varias.php");
include_once("./includes/funciones_varias.inc.php");
include_once("./includes/funciones_tabla_gastos.php");
include_once("./includes/funciones_vendedor.php");
include_once("./includes/funciones_sucursal.php");
include_once("./includes/funciones_calculo.php");
include("connect.php");

$hora=date("H:i:s");
$fecha=date("Y-n-d");


echo '<center>';
echo '<table class="t1">';
$q='select distinct sucursal,id from sucursales where id="0" or 
																id="1" or 
																id="2" or 
																id="3" or 
																id="4" or 
																id="5" or 
																id="7" or 
																id="8" or 
																id="9" or 
																id="10" or 
																id="25" or 
																id="26" limit 9,3';


/*
$q='select 	distinct (sucursales.id),
				sucursales.sucursal,
				asistencias.vendedor
					from sucursales,asistencias
						where sucursales.id=asistencias.id_sucursal and 
							fecha="'.$fecha.'"
';
*/
$res3=mysql_query($q);
if(mysql_error()){
	echo mysql_error()."<br><br>";	
	echo $q."<br><br>";	
}
while($row3=mysql_fetch_array($res3)) {
	echo '<tr>';
	echo '<td>'.$row3["sucursal"].'</td>';
	trae_asistencias($fecha, $row3["id"] );
	echo '</tr>';
}

echo "</table>";



#-----------------------------------------------------------
function trae_asistencias($fecha, $id_sucursal ){
	$hora=date("H:i:s");
	if($hora>="0:00:00" and $hora<="13:00:00"){
		$q='select * from asistencias where id_sucursal="'.$id_sucursal.'" and fecha="'.$fecha.'" and hora>="0:00:00" and hora<="12:59:59"
		';
	}
	
	if($hora>="12:59:59" and $hora<="23:59:59"){
		$q='select * from asistencias where id_sucursal="'.$id_sucursal.'" and fecha="'.$fecha.'" and hora>="13:00:00" and hora<="23:59:59"
		';
	}
	//echo '<td>'.$q.'</td>';
	$res=mysql_query($q);
	while($row=mysql_fetch_array($res)){
		$vendedor=$row["vendedor"];
		$id_vendedor=get_id_vendedor($vendedor);
		echo '<td>';
		echo '<table class="t1">';
		echo 	'<tr>';
		echo 		'<td>'.$row["vendedor"].'</td>';
		 if(file_exists ( "./vendedores/".$id_vendedor.".jpg" )==1){
                echo '<td><A HREF="detalle.php?id_articulo='.$id_vendedor.'" onClick="return popup(this, \'notes\')">
                <img  src="./vendedores/'.$id_vendedor.'".jpg" width="150" height="150">
                </A><br>'.$row["hora"].'
                </td>';
        }else{
        echo '<td>'.$id_vendedor.'<br>'.$row["hora"].'</td>';
        }

		echo 	'<tr>';
		echo '</table>';
		echo '</td>';
	}
}
#-----------------------------------------------------------



#-----------------------------------------------------------
function get_id_vendedor($vendedor){
	$q='select id from vendedores where numero="'.$vendedor.'"';
	//echo $q."<br>";
	$res=mysql_query($q);

	if(mysql_error()){
	echo mysql_error()."<br><br>";	
	//echo $q."<br><br>";	
}

	$array=mysql_fetch_array($res);
	//echo $array[0]."<br>";
	return $array[0];
}
#-----------------------------------------------------------



?>