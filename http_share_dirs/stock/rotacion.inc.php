<?php

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


echo "<br><br>";

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
