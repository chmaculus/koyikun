<?php
include_once("./includes/connect.php");
#include_once("../../login/login_verifica.inc.php");
#include_once("seguridad_1.inc.php");

include_once("cabecera.inc.php");
include_once("./includes/funciones_varias.php");
include_once("./includes/funciones_stock.php");
?>
<script language="javascript" src="funciones.js"></script>
<?php

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



$id_sucursal=1;



$len1=strlen($_POST["busqueda"]);
if($len1==8){
    $busqueda=ltrim($_POST["busqueda"], "0");
    $len=strlen($busqueda);
    $busqueda=substr($busqueda, 0,$len-1);
}else{
    $busqueda=$_POST["busqueda"];
}

$q='select * from articulos where 	codigo_barra="'.$busqueda.'" or 
					id="'.$busqueda.'" 
						order by marca, clasificacion, subclasificacion, descripcion';

echo "q: $q <br>";
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
$array_articulos=mysql_fetch_array($result);

$id_articulos=$array_articulos["id"];

echo "<br><br>";

//echo '<table>';
//echo "<tr>";
//echo "<td>";
//	echo '<table class="t1">';


echo '<table class="t1">';
echo "<tr>";
    echo "<th>id</th>";
    echo '<td>'.$array_articulos["id"].'</td>';
		echo "</tr>";
		echo "<tr>";
    echo "<th>codigo_interno</th>";
    echo '<td>'.$array_articulos["codigo_interno"].'</td>';
		echo "</tr>";
		echo "<tr>";
    echo "<th>marca</th>";
    echo '<td>'.$array_articulos["marca"].'</td>';
		echo "</tr>";
		echo "<tr>";
    echo "<th>descripcion</th>";
    echo '<td>'.$array_articulos["descripcion"].'</td>';
		echo "</tr>";
		echo "<tr>";
    echo "<th>clasificacion</th>";
    echo '<td>'.$array_articulos["clasificacion"].'</td>';
		echo "</tr>";
		echo "<tr>";
    echo "<th>subclasificacion</th>";
    echo '<td>'.$array_articulos["subclasificacion"].'</td>';
		echo "</tr>";
		echo "<tr>";
    echo "<th>contenido</th>";
    echo '<td>'.$array_articulos["contenido"].'</td>';
		echo "</tr>";
		echo "<tr>";
    echo "<th>presentacion</th>";
    echo '<td>'.$array_articulos["presentacion"].'</td>';
		echo "</tr>";
		echo "<tr>";
    echo "<th>Codigo barra</th>";
    echo '<td>'.$array_articulos["codigo_barra"].'</td>';
		echo "</tr>";
		echo "<tr>";
		echo "</tr>";
		echo "<tr>";
    echo "<th>fecha</th>";
    echo '<td>'.$array_articulos["fecha"].'</td>';
		echo "</tr>";
		echo "<tr>";
    echo "<th>hora</th>";
    echo '<td>'.$array_articulos["hora"].'</td>';
echo "</tr>";
echo "</table>";
#--------------------------------------------------------------------------------------
//echo "</td></tr><tr><td>";

		if(file_exists ( "./imagenes/miniaturas/".$array_articulos["id"].".jpg" )==1){
		 echo '<A HREF="detalle.php?id_articulo='.$array_articulos["id"].'" onClick="return popup(this, \'notes\')">
		 <img  src="./imagenes/miniaturas/'.$array_articulos["id"].'".jpg" width="500" height="500">
		 </A>';
		}



#--------------------------------------------------------------------------------------
if($total_rows==1){
	$array_articulos=mysql_fetch_array($result);
	$q2='select * from stock where id_articulo="'.$id_articulos.'" and id_sucursal="'.$id_sucursal.'"';
	//echo $q2."<br>";
	$res2=mysql_query($q2);
	if(mysql_error()){
   	 echo mysql_error()." ".$SCRIPT_NAME;
	}

	
echo '<body onLoad=document.aa.stock_nuevo.focus()>';
echo '<form name="aa" action="stock_update.php" method="post">';

echo "<br><br>";

$row=mysql_fetch_array($res2);
echo '<table class="t1">';
	echo "<tr>";
	    echo "<th>stock</th>";
    	echo '<td>'.$row["stock"].'</td>';
		echo "</tr>";
		echo "<tr>";

	    echo "<th>stock Nuevo</th>";
    	echo '<td> <div id="mainselection"><select name="stock_nuevo" >';
			echo '<option value="0" label="0" selected>SELECCIONE</option>';
			for($i=1;$i<=1000;$i++){
				echo '<option value="'.$i.'" label="'.$i.'" >'.$i.'</option>';
			}
			echo '</select></div></td>';
//<input type="text" name="stock_nuevo" size="8" class="textbox1"/>


		echo "</tr>";
		echo "<tr>";
   	 echo "<th>maximo</th>";
    	echo '<td><input type="text" name="maximo" size="8" value="'.$row["maximo"].'"  class="textbox1"/></td>';
		echo "</tr>";
		echo "<tr>";
   	 echo "<th>minimo</th>";
    	echo '<td><input type="text" name="minimo" size="8"  value="'.$row["minimo"].'"  class="textbox1"/></td>';
		echo "</tr>";
		echo "<tr>";
    	echo "<th>id_sucursal</th>";
    	echo '<td>'.$row["id_sucursal"].'</td>';
		echo "</tr>";
		echo "<tr>";
   	 echo "<th>fecha</th>";
    	echo '<td>'.$row["fecha"].'</td>';
		echo "</tr>";
		echo "<tr>";
   	 echo "<th>hora</th>";
    	echo '<td>'.$row["hora"].'</td>';
		echo "</tr>";
		echo "<tr>";
    	echo '<td>'.$row["maximo"].'</td>';
		echo "</tr>";
		echo "<tr>";
    	echo '<td>'.$row["minimo"].'</td>';
	echo "</tr>";

}
echo "</table>";
#--------------------------------------------------------------------------------------

//echo "</tr></table>";



/*
#------------------------------------------------------------------------------------------------
echo '<table class="t1">';
include("costos_ingreso.inc.php");
echo '</table>';
#------------------------------------------------------------------------------------------------
*/


echo '<input type="hidden" name="stock" value="'.$row["stock"].'" />';
echo '<input type="hidden" name="query" value="'.base64_encode($q).'" />';
echo '<input type="hidden" name="id_articulos" value="'.$id_articulos.'" />';
echo '<input type="submit" name="ACEPTAR" value="ACEPTAR" class="button1"/>';
echo "</form>";











/*
$t_mes=tot($id_articulos,$u_mes);
$t_tres=tot($id_articulos,$u_tres);
$t_seis=tot($id_articulos,$u_seis);
$t_nueve=tot($id_articulos,$u_nueve);
$t_doce=tot($id_articulos,$u_doce);
$ultimo_ingreso=trae_ultima_compra($id_articulos);

echo '<table class="t1">';

echo "<tr>";
echo '<td><font size="4" style="font-weight: bold;">Fecha ultimo ingreso</font></td><td><font size="4" style="font-weight: bold;">'.$ultimo_ingreso["fecha"]."</font></td>";
echo "</tr>";

echo "<tr>";
echo '<td><font size="4" style="font-weight: bold;">Cantidad ultimo ingreso</font></td><td><font size="4" style="font-weight: bold;">'.$ultimo_ingreso["cantidad"]."</font></td>";
echo "</tr>";



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


echo "<br>";

#---------------------------------------------------------------
echo '<table class="t1">';

	echo '<tr>';
	echo '	<td>Sucursal</td>';
	echo '	<td>Stock</td>';
	echo '	<td>Ult</td>';
	echo '	<td>Mes</td>';
	echo '	<td>Tres meses</td>';
	echo '	<td>Seis meses</td>';
	echo '	<td>Nueve meses</td>';
	echo '	<td>Doce meses</td>';
	echo '</tr>';



/*
$q0='select id from sucursales order by id';
$res=mysql_query($q0);
while($row=mysql_fetch_array($res)){
	$nom_suc=nombre_sucursal($row["id"]);
	
	$mes=tot_x_suc($id_articulos,$u_mes,$nom_suc);
	$tres=tot_x_suc($id_articulos,$u_tres,$nom_suc);
	$seis=tot_x_suc($id_articulos,$u_seis,$nom_suc);
	$nueve=tot_x_suc($id_articulos,$u_nueve,$nom_suc);
	$doce=tot_x_suc($id_articulos,$u_doce,$nom_suc);

	$totmes=($totmes + $mes[0]);
	$tottres=($tottres + $tres[0]);
	$totseis=($totseis + $seis[0]);
	$totnueve=($totnueve + $nueve[0]);
	$totdoce=($totdoce + $doce[0]);



	$array_stock=array_stock($id_articulos, $row["id"]);
	echo '<tr>';
	echo '	<td>'.$nom_suc.'</td>';
	echo '	<td>'.$array_stock["stock"].'</td>';
	
////////////////////////////////////
	echo "<td>";
    echo '<table class="t1">';
    $qb='select * from ventas where id_articulos="'.$id_articulos.'" and sucursal="'.nombre_sucursal($row["id"]).'" order by id desc limit 0,1';
    $array_ult=mysql_fetch_array(mysql_query($qb));

    echo "<tr>";
        echo "<td>";
            echo "VE";
        echo "</td>";

        echo "<td>";
            echo $array_ult["fecha"];
        echo "</td>";

        echo "<td>";
            echo $array_ult["sucursal"];
        echo "</td>";

        echo "<td>";
            echo $array_ult["cantidad"];
        echo "</td>";

    echo "</tr>";
    echo "</table>";
	echo "</td>";
////////////////////////////////////	





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
*/


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



#-----------------------------------------
function trae_ultima_compra($id_articulo){
    $q='select * from seguimiento_stock where id_articulo="'.$id_articulo.'" and tipo="INGRESO POR COMPRA" order by fecha desc, hora desc limit 0,1';
    $r=mysql_query($q);
    $rows=mysql_num_rows($r);
    if($rows>0){
        $array=mysql_fetch_array($r);
        return $array;
    }else{
        return NULL;
    }
}
#-----------------------------------------


?>
