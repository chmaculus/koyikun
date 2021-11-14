<?php
include_once("../../includes/connect.php");
/*
include("../../login/login_verifica.inc.php");
$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="0"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 
*/
echo "<center>";
include_once("../../includes/cabecera.inc.php");
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




$id_articulo=$_GET["id_articulo"];




$array_articulos=array_articulos($id_articulo);





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
		echo '<td>'.$array_articulos["id_web"].'</td>';
	echo '</tr>';
echo "</table>";
#----------------------------------------

echo "<br>";
echo "<br>";
echo "<br>";


echo '<table class="t1">';

	echo '<tr>';
	echo '	<td>Sucursal</td>';

	echo '	<td>U Mes</td>';
	echo '	<td>$ vendidos Mes</td>';
	echo '	<td>Costo Mes</td>';
	echo '	<td>R Bruta Mes</td>';

	echo '	<td>U Tres meses</td>';
	echo '	<td>$ vendidos Tres meses</td>';
	echo '	<td>Costo Tres meses</td>';
	echo '	<td>R Bruta Tres</td>';

	echo '	<td>U Seis meses</td>';
	echo '	<td>$ vendidos Seis meses</td>';
	echo '	<td>Costo Seis meses</td>';
	echo '	<td>R Bruta Seis</td>';

	echo '	<td>U Nueve meses</td>';
	echo '	<td>$ vendidos Nueve meses</td>';
	echo '	<td>Costo Nueve meses</td>';
	echo '	<td>R Bruta Nueve</td>';

	echo '	<td>U Doce meses</td>';
	echo '	<td>$ vendidos Doce meses</td>';
	echo '	<td>Costo Doce meses</td>';
	echo '	<td>R Bruta Doce</td>';
	
	echo '</tr>';

$q0='select id from sucursales order by id';
$res=mysql_query($q0);
while($row=mysql_fetch_array($res)){
	$nom_suc=nombre_sucursal($row["id"]);
	
	$mes=tot($id_articulo,$u_mes,$nom_suc);
	$tres=tot($id_articulo,$u_tres,$nom_suc);
	$seis=tot($id_articulo,$u_seis,$nom_suc);
	$nueve=tot($id_articulo,$u_nueve,$nom_suc);
	$doce=tot($id_articulo,$u_doce,$nom_suc);

	$totmes=($totmes + $mes[0]);
	$tottres=($tottres + $tres[0]);
	$totseis=($totseis + $seis[0]);
	$totnueve=($totnueve + $nueve[0]);
	$totdoce=($totdoce + $doce[0]);

	$pesostotmes=($pesostotmes + $mes[1]);
	$pesostottres=($pesostottres + $tres[1]);
	$pesostotseis=($pesostotseis + $seis[1]);
	$pesostotnueve=($pesostotnueve + $nueve[1]);
	$pesostotdoce=($pesostotdoce + $doce[1]);

	$costototmes=($costototmes + $mes[2]);
	$costotottres=($costotottres + $tres[2]);
	$costototseis=($costototseis + $seis[2]);
	$costototnueve=($costototnueve + $nueve[2]);
	$costototdoce=($costototdoce + $doce[2]);


	$R_brutaMes=($R_brutaMes + ($mes[1] - $mes[2]) );
	$R_brutaTres=($R_brutaTres + ($tres[1] - $tres[2]) );
	$R_brutaSeis=($R_brutaSeis + ($seis[1] - $seis[2]) );
	$R_brutaNueve=($R_brutaNueve + ($nueve[1] - $nueve[2]) );
	$R_brutaDoce=($R_brutaDoce + ($doce[1] - $doce[2]) );

	echo '<tr>';
	echo '	<td>'.$nom_suc.'</td>';

	echo '	<td class="special1">'.round($mes[0],2).'U</td>';
	echo '	<td class="special3">$'.round($mes[1],2).'</td>';
	echo '	<td>$'.round($mes[2],2).'</td>';
	echo '	<td class="special2">$'.round(($mes[1] - $mes[2]),2).'</td>';

	echo '	<td class="special1">'.round($tres[0],2).'U</td>';
	echo '	<td class="special3">$'.round($tres[1],2).'</td>';
	echo '	<td>$'.round($tres[2],2).'</td>';
	echo '	<td class="special2">$'.round(($tres[1] - $tres[2]),2).'</td>';

	echo '	<td class="special1">'.round($seis[0],2).'U</td>';
	echo '	<td class="special3">$'.round($seis[1],2).'</td>';
	echo '	<td>$'.round($seis[2],2).'</td>';
	echo '	<td class="special2">$'.round(($seis[1] - $seis[2]),2).'</td>';

	echo '	<td class="special1">'.round($nueve[0],2).'U</td>';
	echo '	<td class="special3">$'.round($nueve[1],2).'</td>';
	echo '	<td>$'.round($nueve[2],2).'</td>';
	echo '	<td class="special2">$'.round(($nueve[1] - $nueve[2]),2).'</td>';
	
	echo '	<td class="special1">'.round($doce[0],2).'U</td>';
	echo '	<td class="special3">$'.round($doce[1],2).'</td>';
	echo '	<td>$'.round($doce[2],2).'</td>';
	echo '	<td class="special2">$'.round(($doce[1] - $doce[2]),2).'</td>';
	
	echo '</tr>';
	
}

	echo '<tr>';
	echo '	<td>Totales</td>';
	echo '	<td class="special1">'.round($totmes,2).'U</td>';
	echo '	<td class="special3">'.round($pesostotmes,2).'</td>';
	echo '	<td>'.round($costototmes,2).'</td>';
	echo '	<td class="special2">'.round($R_brutaMes,2).'</td>';
	

	echo '	<td class="special1">'.round($tottres,2).'U</td>';
	echo '	<td class="special3">'.round($pesostottres,2).'</td>';
	echo '	<td>'.round($costotottres,2).'</td>';
	echo '	<td class="special2">'.round($R_brutaTres,2).'</td>';

	echo '	<td class="special1">'.round($totseis,2).'U</td>';
	echo '	<td class="special3">'.round($pesostotseis,2).'</td>';
	echo '	<td>'.round($costototseis,2).'</td>';
	echo '	<td class="special2">'.round($R_brutaSeis,2).'</td>';

	echo '	<td class="special1">'.round($totnueve,2).'U</td>';
	echo '	<td class="special3">'.round($pesostotnueve,2).'</td>';
	echo '	<td>'.round($costototnueve,2).'</td>';
	echo '	<td class="special2">'.round($R_brutaNueve,2).'</td>';
	
	echo '</tr>';




echo '</table>';







#-----------------------------------------
function tot($id,$fecha,$sucursal){
	$q='select sum(cantidad), sum(cantidad * precio_unitario), sum(cantidad * costo) from ventas where id_articulos="'.$id.'" and fecha>="'.$fecha.'" and sucursal="'.$sucursal.'"';
	$res=mysql_query($q);
	$tot=mysql_fetch_array($res);
	return $tot;
}
#-----------------------------------------







#-----------------------------------------
function array_articulos($id_articulos){
    $query='select * from articulos where id="'.$id_articulos.'"';
    $res=mysql_query($query);
    if(mysql_error()){
         echo mysql_error()."<br>".chr(10);
         echo $query."<br>".chr(10);
         echo $_SERVER["SCRIPT_NAME"]."<br>".chr(10);
         return "Error mysql_query";
    }
    $rows=mysql_num_rows($res);
    if($rows==1){
        $array_articulos=mysql_fetch_array($res);
        return $array_articulos;        
    }else{
        return NULL;
    }
}
#-----------------------------------------



#-----------------------------------------------------------------
function nombre_sucursal($id_sucursal){
        $query='select * from sucursales where id="'.$id_sucursal.'"';
        $array_suc=mysql_fetch_array(mysql_query($query));
return $array_suc["sucursal"];
}
#-----------------------------------------------------------------







?>