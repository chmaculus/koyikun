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



echo "<titulo>Pedidos en Transito Guia de Transporte</titulo><br><br>";

if(!$_POST["id_sucursal"]){
	echo '<alerta1>Debe seleccionar sucursal</alerta1><br>';
	ECHO '<form action="'.$_SERVER["SCRIPT_NAME"].'" method="post">';

	//$q='select distinct sucursal from pedidos estado="Transito"';
	
	include("../includes/sucursal_select.inc.php");



	ECHO '<input type="submit" name="ACEPTAR" value="ACEPTAR">';
	ECHO '</form>';

	exit;
}



$id_sucursal=$_POST["id_sucursal"];


//include("pedidos_base.php");


$query='select distinct cajon  from pedidos, reparto_zonas where estado="Transito" 
																					and finalizado="S"
																					and fecha_ped_tran is not null
																					and sucursal="'.$_POST["id_sucursal"].'"
				 order by pedidos.sucursal ';

//echo $query."<br>";

$result=mysql_query($query);
$rows=mysql_num_rows($result);




echo '<table border="0"><tr><td>';
echo '<p><font size="3">Fecha: '.date("d/n/Y")."<br><br>";
echo 'Despacho:_______________________<br><br>';
echo 'Reparto:&nbsp;&nbsp;&nbsp;_______________________<br><br>';
echo 'Recibo:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_______________________<br><br>';
echo '</td>';


echo '<td>';
echo '<p><font size="3">Cantidad de bultos: '.$rows.'<br><br>';
echo 'Sucursal: '.nombre_sucursal($_POST["id_sucursal"]);
echo '</font>';
echo '</td></tr>';
echo '</table>';


echo '<center>';
$fecha=date("Y-n-d");





if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}

#echo $query."<br>".time()."<br>";

echo '<table class="t1">';
echo "<tr>";
    echo "<th>Cajon</th>";
    echo "<th>Numero pedido</th>";
    
    echo "<th>Responsable</th>";
    echo "<th>fecha<br>pedido</th>";
    echo "<th>hora<br>pedido</th>";
    echo "<th>fecha<br>finalizado</th>";
    echo "<th>hora<br>finalizado</th>";
    echo "<th>Dias</th>";
    echo "<th>Detalle</th>";
    echo "<th>Firma</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
    $array_pedido=trae_datos($row["cajon"], $id_sucursal);
    $inicio=strtotime($array_pedido["fecha"]);
    $fin=strtotime($array_pedido["fecha_envio"]);
    $nuevo=$fin-$inicio;
    $dias=round(($nuevo/60/60/24),0);
    echo "<tr>";
    echo '<td><font size="5">'.$row["cajon"].'</font></td>';

		#---------------------------------------------------------
    echo '<td>';
    		pedidos_cajon($row["cajon"],$id_sucursal);
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

   // echo '<td><A HREF="pedido_cargar_cajon.php?cajon='.$row["cajon"].'&modulo=preparad" onClick="return popup(this, \'notes\')"><button>Cargar</button></A></td>';
   echo '<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>';
    echo "</tr>".chr(10).chr(10);
}
echo '</table>';
echo '</td></tr>';
echo '</table>';




#----------------------------------------
function array_pedido($numero_pedido,$id_sucursal){
    $query='select * from pedidos where numero_pedido="'.$numero_pedido.'" and sucursal="'.$id_sucursal.'" limit 0,1';
    $array_pedidos=mysql_fetch_array(mysql_query($query));
    if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
    return $array_pedidos;
}
#----------------------------------------
        
        
#----------------------------------------
function contar1($marca, $numero_pedido, $id_sucursal){

        $q2='select count(*) from articulos,pedidos where  
        pedidos.numero_pedido="'.$numero_pedido.'" and
                                                  pedidos.sucursal="'.$id_sucursal.'" and
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
function contenido_cajon($numero_cajon,$id_sucursal){
/*
		$query='select distinct marca,count(*) as count from pedidos, reparto_zonas where estado="Preparado" 
																																								and finalizado="S"
																																								and fecha_ped_prep is not null
																																								and fecha_ped_tran is null
																																								and cajon="'.$numero_cajon.'"
																																								and pedidos.sucursal=reparto_zonas.id_sucursal
																																								
				 order by reparto_zonas.id_sucursal, fecha ';
	*/
	
		$query='select  marca,count(*) as count from pedidos where cajon="'.$numero_cajon.'" 
												and finalizado="S" 
												and estado="Transito" 
												and sucursal="'.$id_sucursal.'" 
														group by marca';
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




#---------------------------------------------------------
function trae_datos($numero_cajon,$id_sucursal){
	$q='select * from pedidos where cajon="'.$numero_cajon.'" and 
													finalizado="S" and 
													estado="Transito" and
													sucursal="'.$id_sucursal.'"
													limit 0,1';
	$array=mysql_fetch_array(mysql_query($q));
	return $array;
}

#---------------------------------------------------------





#---------------------------------------------------------
function pedidos_cajon($numero_cajon,$id_sucursal){
	$q='select distinct numero_pedido from pedidos where cajon="'.$numero_cajon.'" and 
																			finalizado="S" and 
																			estado="Transito" and
																			sucursal="'.$id_sucursal.'"
																			';
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





