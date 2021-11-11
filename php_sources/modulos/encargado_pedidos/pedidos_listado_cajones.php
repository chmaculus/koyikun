<?php

include_once("../../includes/connect.php");
include_once("../../includes/funciones_varias.php");
include_once("../../login/login_verifica.inc.php");
include_once("cabecera.inc.php");

#jrarquia 0 coresponde a administrador
if($jerarquia!="1"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 
?>

<center>
<?php

include("pedidos_base.php");
echo "<titulo>Pedidos preparados</titulo><br><br>";


/*
echo '<form method="POST" action="'.$_SERVER["SCRIPT_NAME"].'">';

include("fecha_desde_hasta.inc.php");

echo '<input type="submit" name="ACEPTAR" value="ACEPTAR">';
echo '</form>';


 

if(!$_POST["fecha_desde"]){
    exit;
}
*/





$fecha=date("Y-n-d");



include_once("responsable_preparado.inc.php");







/*
$query='select distinct cajon, sucursal, numero_pedido  from pedidos, reparto_zonas where estado="Preparado" 
																																								and finalizado="S" 
																																								and pedidos.sucursal=reparto_zonas.id_sucursal
				 order by reparto_zonas.id_sucursal, fecha ';
*/

$query='select distinct cajon  from pedidos, reparto_zonas where estado="Preparado" 
																																								and fecha_ped_prep is not null
																																								and fecha_ped_tran is null
																																								and cajon!=0
				 order by pedidos.sucursal, fecha ';

//echo $query."<br>";


$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}

#echo $query."<br>".time()."<br>";

echo '<table class="t1">';
echo "<tr>";
    echo "<th>Cajon</th>";
    echo "<th>Sucursal</th>";
    echo "<th>Numero pedido</th>";
    
    echo "<th>Responsable</th>";
    echo "<th>fecha<br>pedido</th>";
    echo "<th>hora<br>pedido</th>";
    echo "<th>fecha<br>finalizado</th>";
    echo "<th>hora<br>finalizado</th>";
    echo "<th>Dias</th>";
    echo "<th>Detalle</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
    $array_pedido=trae_datos($row["cajon"]);
    $inicio=strtotime($array_pedido["fecha"]);
    $fin=strtotime($array_pedido["fecha_envio"]);
    $nuevo=$fin-$inicio;
    $dias=round(($nuevo/60/60/24),0);
    echo "<tr>";
    echo '<td>'.$row["cajon"].'</td>';
    echo '<td>'.nombre_sucursal($array_pedido["sucursal"]).'</td>';
    //echo '<td>'.$array_pedido["sucursal"].'</td>';

		#---------------------------------------------------------
    echo '<td>';
    		pedidos_cajon($row["cajon"]);
    echo '</td>';
		#---------------------------------------------------------


    echo '<td>'.$array_pedido["responsable"].'</td>';
    echo '<td>'.$array_pedido["fecha"].'</td>';
    echo '<td>'.$array_pedido["hora"].'</td>';
    echo '<td>'.$array_pedido["fecha_envio"].'</td>';
    echo '<td>'.$array_pedido["hora_envio"].'</td>';
    if($dias>=4){
        echo '<td><font color="#ff0000" size="4">'.$dias.'</font></td>';
	
    }else{
        echo '<td>'.$dias.'</td>';
    }

        #-----------------------------------------
        echo chr(10).'<td>';
                //include("marcas.inc.php");
                contenido_cajon($row["cajon"]);
        echo '</td>'.chr(10);
        #-----------------------------------------

    echo '<td><A HREF="pedidos_detalle_cajon2.php?cajon='.$row["cajon"].'&modulo=preparad" onClick="return popup(this, \'notes\')"><button>Detalle</button></A></td>';
    echo '<td><A HREF="pedido_cargar_cajon.php?cajon='.$row["cajon"].'&modulo=preparad" onClick="return popup(this, \'notes\')"><button>Cargar</button></A></td>';
    echo "</tr>".chr(10).chr(10);
}








#----------------------------------------
function array_pedido($numero_pedido,$sucursal){
    $query='select * from pedidos where numero_pedido="'.$numero_pedido.'" and sucursal="'.$sucursal.'" limit 0,1';
    $array_pedidos=mysql_fetch_array(mysql_query($query));
    if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
    return $array_pedidos;
}
#----------------------------------------
        
        
#----------------------------------------
function contar1($marca, $numero_pedido, $sucursal){

        $q2='select count(*) from articulos,pedidos where       pedidos.numero_pedido="'.$numero_pedido.'" and
                                                                                                                                                                pedidos.sucursal="'.$sucursal.'" and
                                                                                                                                                                articulos.marca="'.$marca.'" and
                                                                                                                                                                articulos.id=pedidos.id_articulo';


        $res2=mysql_query($q2);
        if(mysql_error()){
                echo "<td>".mysql_error()."</td>";
        }

        //echo "<td>".$q2."</td>";
        $array=mysql_fetch_array($res2);
        //$rows=mysql_num_rows($res2);
        return $array[0];
}
#----------------------------------------



#----------------------------------------
function contenido_cajon($numero_cajon){
/*
		$query='select distinct marca,count(*) as count from pedidos, reparto_zonas where estado="Preparado" 
																																								and finalizado="S"
																																								and fecha_ped_prep is not null
																																								and fecha_ped_tran is null
																																								and cajon="'.$numero_cajon.'"
																																								and pedidos.sucursal=reparto_zonas.id_sucursal
																																								
				 order by reparto_zonas.id_sucursal, fecha ';
	*/
	
		$query='select  marca,count(*) as count from pedidos where cajon="'.$numero_cajon.'" and finalizado="S" and estado="Preparado" group by marca';
	$res=mysql_query($query);
	echo chr(10).'<table class="t1">';
	while($row=mysql_fetch_array($res)){
		echo '<tr>';
		echo '<td>'.$row["marca"].'</td>';
		echo '<td>'.$row["count"].'</td>';
		//echo '<td>'.$query.'</td>';
		echo '</tr>';
	}
	echo '</table>'.chr(10);
				 
}
#----------------------------------------


function trae_datos($numero_cajon){
	$q='select * from pedidos where cajon="'.$numero_cajon.'" and finalizado="S" and estado="Preparado" and cajon>0 limit 0,1';
	$array=mysql_fetch_array(mysql_query($q));
	return $array;
}






		#---------------------------------------------------------
function pedidos_cajon($numero_cajon){
	$q='select distinct numero_pedido from pedidos where cajon="'.$numero_cajon.'" and finalizado="S" and estado="Preparado"';
	$res=mysql_query($q);
	if(mysql_error()){echo mysql_error();}

	echo chr(10).'<table class="t1">';
	while($row=mysql_fetch_array($res)){
		echo '<tr>';
		echo '<td>Pedido</td>';
		echo '<td>'.$row["numero_pedido"].'</td>';
		echo '</tr>'.chr(10);
	}
	echo '</table>'.chr(10);

	$array=mysql_fetch_array(mysql_query($q));
}
		#---------------------------------------------------------








?>
</table></center>





