<?php
include_once("index.php");
include_once("includes/connect.php");
#include_once("login/login_verifica.inc.php");
#include_once("seguridad_1.inc.php");

include_once("cabecera.inc.php");
?>
<script language="javascript" src="funciones.js"></script>
<?
echo "<center>";



$hora=time();

$ultimo_mes=$hora-(60 * 60 * 24 * 30);
$ultimo_tres=$hora-(60 * 60 * 24 * 30 * 3);
$ultimo_seis=$hora-(60 * 60 * 24 * 30 * 6);
$ultimo_nueve=$hora-(60 * 60 * 24 * 30 * 9 );
$ultimo_doce=$hora-(60 * 60 * 24 * 365);



$fecha=date("Y-n-d");

$u_mes=date("Y-n-d",$ultimo_mes);
$u_tres=date("Y-n-d",$ultimo_tres);
$u_seis=date("Y-n-d",$ultimo_seis);
$u_nueve=date("Y-n-d",$ultimo_nueve);
$u_doce=date("Y-n-d",$ultimo_doce);



$id_sucursal=$_COOKIE["id_sucursal"];

$q='select * from articulos where 	codigo_barra="'.$_POST["busqueda"].'" or 
												id="'.$_POST["busqueda"].'" 
														order by marca, clasificacion, subclasificacion, descripcion';

//$q='select * from articulos where codigo_barra="'.$_POST["busqueda"].'"';
$result=mysql_query($q);
if(mysql_error()){
	echo mysql_error();
}
$total_rows=mysql_num_rows($result);


if($total_rows<1){
	include_once("index.php");
	echo '<br>No se encontraron resultados con: '.$_POST["busqueda"].' <br>';
	exit;
}

if(mysql_error()){
    echo mysql_error()." ".$SCRIPT_NAME;
}

if($total_rows==1){
	$array_articulos=mysql_fetch_array($result);
	$q2='select * from stock where id_articulo="'.$array_articulos["id"].'" and id_sucursal="'.$id_sucursal.'"';
	$res2=mysql_query($q2);
	if(mysql_error()){
   	 echo mysql_error()." ".$SCRIPT_NAME;
	}

	
echo '<body onLoad=document.aa.stock_nuevo.focus()>';
echo '<form name="aa" action="stock_update.php" method="post">';

echo "<br><br>";

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
    
    echo '<td>'.$array_articulos["fecha"].'</td>';
    echo '<td>'.$array_articulos["hora"].'</td>';
    echo "</tr>".chr(10);
echo "</table>";
#--------------------------------------------------------------------------------------
$t_mes=tot($array_articulos["id"],$u_mes);
$t_tres=tot($array_articulos["id"],$u_tres);
$t_seis=tot($array_articulos["id"],$u_seis);
$t_nueve=tot($array_articulos["id"],$u_nueve);
$t_doce=tot($array_articulos["id"],$u_doce);

/*
echo '<table class="t1">';
echo "<tr>";
echo "<td>Rotacion ultimo mes</td><td>".$t_mes[0]."</td>";
echo "</tr>";
echo "<tr>";

echo "<td>Rotacion ultimos tres meses</td><td>".$t_tres[0]."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Rotacion ultimos seis meses</td><td>".$t_seis[0]."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Rotacion ultimos nueve meses</td><td>".$t_nueve[0]."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Rotacion ultimos doce meses</td><td>".$t_doce[0]."</td>";
echo "</tr>";
echo "</table>";
*/

echo "<br><br>";

#---------------------------------------------------------------
echo '<table class="t1">';

	echo '<tr>';
	echo '	<td>Sucursal</td>';
	echo '	<td>Mes</td>';
	echo '	<td>Tres meses</td>';
	echo '	<td>Seis meses</td>';
	echo '	<td>Nueve meses</td>';
	echo '	<td>Doce meses</td>';
	echo '</tr>';

$q0='select id from sucursales order by id';
$res=mysql_query($q0);
while($row=mysql_fetch_array($res)){
	$nom_suc=nombre_sucursal($row["id"]);
	
	$mes=tot_x_suc($array_articulos["id"],$u_mes,$nom_suc);
	$tres=tot_x_suc($array_articulos["id"],$u_tres,$nom_suc);
	$seis=tot_x_suc($array_articulos["id"],$u_seis,$nom_suc);
	$nueve=tot_x_suc($array_articulos["id"],$u_nueve,$nom_suc);
	$doce=tot_x_suc($array_articulos["id"],$u_doce,$nom_suc);

	$totmes=($totmes + $mes[0]);
	$tottres=($tottres + $tres[0]);
	$totseis=($totseis + $seis[0]);
	$totnueve=($totnueve + $nueve[0]);
	$totdoce=($totdoce + $doce[0]);

	echo '<tr>';
	echo '	<td>'.$nom_suc.'</td>';
	echo '	<td>'.$mes[0].'</td>';
	echo '	<td>'.$tres[0].'</td>';
	echo '	<td>'.$seis[0].'</td>';
	echo '	<td>'.$nueve[0].'</td>';
	echo '	<td>'.$doce[0].'</td>';
	echo '</tr>';
	
}

	echo '<tr>';
	echo '	<td>Totales</td>';
	echo '	<td>'.$totmes.'</td>';
	echo '	<td>'.$tottres.'</td>';
	echo '	<td>'.$totseis.'</td>';
	echo '	<td>'.$totnueve.'</td>';
	echo '	<td>'.$totdoce.'</td>';
	echo '</tr>';

echo '</table>';
#---------------------------------------------------------------

echo "<br><br>";
	echo '<table class="t1">';

	echo "<tr>";
	    echo "<th>stock</th>";
	    echo "<th>stock Nuevo</th>";
   	 echo "<th>maximo</th>";
   	 echo "<th>minimo</th>";
    	echo "<th>id_sucursal</th>";
   	 echo "<th>fecha</th>";
   	 echo "<th>hora</th>";
	echo "</tr>";

$row=mysql_fetch_array($res2);
   	 echo "<tr>";
    	echo '<td>'.$row["stock"].'</td>';
    	echo '<td><input type="text" name="stock_nuevo" size="8" /></td>';
    	echo '<td><input type="text" name="minimo" size="8"  value="'.$row["minimo"].'"/></td>';
    	echo '<td><input type="text" name="maximo" size="8" value="'.$row["maximo"].'" /></td>';
    	echo '<td>'.$row["maximo"].'</td>';
    	echo '<td>'.$row["minimo"].'</td>';
    	echo '<td>'.$row["id_sucursal"].'</td>';
    	echo '<td>'.$row["fecha"].'</td>';
    	echo '<td>'.$row["hora"].'</td>';
    	echo "</tr>".chr(10);
}
echo "</table>";

#------------------------------------------------------------------------------------------------
echo '<table class="t1">';
include("costos_ingreso.inc.php");
echo '</table>';


#------------------------------------------------------------------------------------------------


echo '<input type="hidden" name="stock" value="'.$row["stock"].'" />';
echo '<input type="hidden" name="query" value="'.base64_encode($q).'" />';
echo '<input type="hidden" name="id_articulos" value="'.$array_articulos["id"].'" />';
echo '<input type="submit" name="ACEPTAR" value="ACEPTAR" />';
echo "</form>";




function tot($id,$fecha){
	#$q='select sum(cantidad), sum(cantidad * precio_unitario) from ventas where id_articulos="'.$id.'" and fecha>="'.$fecha.'"';
	$q='select sum(cantidad) from ventas where id_articulos="'.$id.'" and fecha>="'.$fecha.'"';
	//echo $q."<br>";
	$res=mysql_query($q);
	$tot=mysql_fetch_array($res);
	#$tot=mysql_result($res,1,0);
	//echo "tod: ".$tot[0]."<br>";
	return $tot;
}

#-----------------------------------------
function tot_x_suc($id,$fecha,$sucursal){
	$q='select sum(cantidad), sum(cantidad * precio_unitario) from ventas where id_articulos="'.$id.'" and fecha>="'.$fecha.'" and sucursal="'.$sucursal.'"';
	$res=mysql_query($q);
	$tot=mysql_fetch_array($res);
	return $tot;
}
#-----------------------------------------



?>
