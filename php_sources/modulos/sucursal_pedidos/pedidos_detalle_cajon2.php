<?php


include_once("../../includes/connect.php");
include_once("../../includes/funciones_varias.php");
include_once("../../includes/funciones_articulos.php");
include_once("cabecera.inc.php");
include_once("../../login/login_verifica.inc.php");

#jrarquia 0 coresponde a administrador
if($jerarquia!="2"){
        header('Location: ../../login/login_nologin.php?nologin=6');
        exit;
} 


$id_session=$_COOKIE["id_session"];
$id_sucursal=$_COOKIE["id_sucursal"];





echo '<table class="t1">';
echo '<tr>';
echo 		'<td>Cajon</th>';
echo 		'<td>Responsable</th>';
echo 		'<td>Fecha transito</th>';
echo 		'<td>Hora transito</th>';
echo '</tr>';

$array=trae_datos($_GET["cajon"]);

echo '<tr>';
		echo '<td>'.$array["cajon"].'</td>';
		echo '<td>'.$array["responsable"].'</td>';
		echo '<td>'.$array["fecha_ped_tran"].'</td>';
		echo '<td>'.$array["hora_ped_tran"].'</td>';
echo '</tr>';
echo '</table>';
echo '<br><br><br>';





echo '<table class="t1">';
echo "<tr>";
	echo "<th>id_articulo</th>";
	echo "<th>num ped</th>";
	echo "<th>marca</th>";
	echo "<th>descripcion</th>";
	echo "<th>color</th>";
	echo "<th>contenido</th>";
	echo "<th>presentacion</th>";
	echo "<th>clasificacion</th>";
	echo "<th>subclasificacion</th>";
	echo "<th>cant solic.</th>";
	echo "<th>cant enviada</th>";
	echo "<th>fecha envio</th>";
	echo "<th>fecha envio</th>";
	if($row["estado"]=="Transito"){
			echo "<th>Cantidad recibida</th>";
	}
echo "</tr>";


$q='select * from pedidos  where (estado="Transito" or estado="Preparado") and finalizado="S" and cajon="'.$_GET["cajon"].'" order by marca, clasificacion, subclasificacion, descripcion';

echo '<form method="post" action="pedidos_detalle_update.php">' ;
echo '<input type="hidden" name="query" value="'.base64_encode($q).'">';





//echo $q."<br>";




$result=mysql_query($q);

if(mysql_error()){echo mysql_error();}





while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["id_articulo"].'</td>';
	echo '<td>'.$row["numero_pedido"].'</td>';
	echo '<td>'.$row["marca"].'</td>';
	echo '<td>'.$row["descripcion"].'</td>';

	$color=mysql_result(mysql_query('select color from articulos where id="'.$row["id_articulo"].'"'),0,0);
	echo '<td>'.$color.'</td>';
	echo '<td>'.$row["contenido"].'</td>';
	echo '<td>'.$row["presentacion"].'</td>';
	echo '<td>'.$row["clasificacion"].'</td>';
	echo '<td>'.$row["subclasificacion"].'</td>';
	echo '<td>'.$row["cantidad_solicitada"].'</td>';
	echo '<td>'.$row["cantidad_recibida"].'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["hora"].'</td>';
	if($row["estado"]=="Transito"){
			echo '<td><input type="text" name="cantidad'.$row["id"].'" size="5"></td>';
	}
	$estado=$row["estado"];
	echo "</tr>".chr(10);
}



function trae_datos($numero_cajon){
        $q='select * from pedidos where cajon="'.$numero_cajon.'" and finalizado="S" and (estado="Transito" or estado="Preparado") and cajon>0 limit 0,1';
        $array=mysql_fetch_array(mysql_query($q));
        return $array;
}



echo '</table>';
	if($estado=="Transito"){
		 echo '<input type="submit" name="ACEPTAR" value="ACEPTAR">';
	}
echo '</form>';



?>


</center>

