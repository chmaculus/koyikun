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
echo "<titulo>Pedidos en transito</titulo><br><br>";


/*
echo '<form method="POST" action="'.$_SERVER["SCRIPT_NAME"].'">';

include("fecha_desde_hasta.inc.php");

echo '<input type="submit" name="ACEPTAR" value="ACEPTAR">';
echo '</form>';


 

if(!$_POST["fecha_desde"]){
    exit;
}
*/




$query='select distinct numero_pedido, sucursal  from pedidos where estado="Transito"  order by sucursal, fecha desc';


$query='select distinct numero_pedido, sucursal  from pedidos, reparto_zonas where estado="Transito" 
                                                                                                and pedidos.sucursal=reparto_zonas.id_sucursal
                                 order by reparto_zonas.id_sucursal, fecha ';




$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}

echo $query."<br>".time()."<br>";

echo '<table class="t1">';
echo "<tr>";
    echo "<th>Pedido N</th>";
    echo "<th>Sucursal</th>";
    echo "<th>fecha<br>pedido</th>";
    echo "<th>hora<br>pedido</th>";
    echo "<th>fecha<br>finalizado</th>";
    echo "<th>hora<br>finalizado</th>";
    echo "<th>Dias</th>";
    echo "<th>Detalle</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
    $array_pedido=array_pedido($row["numero_pedido"], $row["sucursal"]);
    $inicio=strtotime($array_pedido["fecha"]);
    $fin=strtotime($array_pedido["fecha_envio"]);
    $nuevo=$fin-$inicio;
    $dias=round(($nuevo/60/60/24),0);
    echo "<tr>";
    echo '<td>'.$row["numero_pedido"].'</td>';
    echo '<td>'.nombre_sucursal($row["sucursal"]).'</td>';
    echo '<td>'.$array_pedido["fecha"].'</td>';
    echo '<td>'.$array_pedido["hora"].'</td>';
    echo '<td>'.$array_pedido["fecha_envio"].'</td>';
    echo '<td>'.$array_pedido["hora_envio"].'</td>';
#    echo '<td>'.$inicio." ".$fin." ".$dias.'</td>';
    if($dias>=4){
        echo '<td><font color="#ff0000" size="4">'.$dias.'</font></td>';
	
    }else{
        echo '<td>'.$dias.'</td>';
    }

        #-----------------------------------------
        echo '<td>';
                include("marcas.inc.php");
        echo '</td>';
        #-----------------------------------------

    echo '<td><A HREF="pedidos_detalle3.php?numero_pedido='.$row["numero_pedido"].'&sucursal='.$row["sucursal"].'&modulo=preparad" onClick="return popup(this, \'notes\')"><button>Detalle</button></A></td>';
    echo "</tr>".chr(10);
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



?>
</table></center>





