<?php

include_once("../../includes/connect.php");
include_once("../../includes/funciones_varias.php");
include_once("../../includes/funciones_stock.php");
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
echo "Pedidos finalizados<br><br>";






$query='select stock.*,articulos.* from stock,articulos where stock.fijo>0 and      
																stock.stock<stock.fijo and 
                                                articulos.id=stock.id_articulo and
                                                articulos.discontinuo!="S" 
                                                	order by stock.id_sucursal, articulos.marca, articulos.zona ,articulos.clasificacion, articulos.subclasificacion, articulos.descripcion';


$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}
$rows=mysql_num_rows($result);
//echo $query."<br>".time()."<br>";



echo "rows: ".$rows."<br>";
#----------------------------------------
echo '<table border="1">';
	echo '<tr>';
		echo '<th>id</th>';
		echo '<th>codigo_interno</th>';
		echo '<th>marca</th>';
		echo '<th>descripcion</th>';
		echo '<th>color</th>';
		echo '<th>contenido</th>';
		echo '<th>presentacion</th>';
		echo '<th>codigo_barra</th>';
		echo '<th>clasificacion</th>';
		echo '<th>subclasificacion</th>';
		echo '<th>discontinuo</th>';
		echo '<th>Fijo</th>';
		echo '<th>Stk</th>';
		echo '<th>Stk Dep</th>';
		echo '<th>Pedir</th>';
		echo '<th>zona</th>';
	echo '</tr>';
	echo '<tr>';
	
while($row=mysql_fetch_array($result)){
	$arr_dep=stock_sucursal($row["id"],1);
	$stk_dep=$arr_dep["stock"];
	if($row["stock"]<0){$stock=0;}else{$stock=$row["stock"];}
	$pedir=($row["fijo"]-$stock);
	if($pedir>=$stk_dep){$pedir=$stk_dep;}
		echo '<td>'.$row["id"].'</td>';
		echo '<td>'.$row["codigo_interno"].'</td>';
		echo '<td>'.$row["marca"].'</td>';
		echo '<td>'.$row["descripcion"].'</td>';
		echo '<td>'.$row["color"].'</td>';
		echo '<td>'.$row["contenido"].'</td>';
		echo '<td>'.$row["presentacion"].'</td>';
		echo '<td>'.$row["codigo_barra"].'</td>';
		echo '<td>'.$row["clasificacion"].'</td>';
		echo '<td>'.$row["subclasificacion"].'</td>';
		echo '<td>'.$row["discontinuo"].'</td>';
		echo '<td>'.$row["fijo"].'</td>';
		echo '<td>'.$row["stock"].'</td>';
		echo '<td>'.$arr_dep["stock"].'</td>';
		echo '<td>'.$pedir.'</td>';
		echo '<td>'.$row["zona"].'</td>';
	echo '</tr>';
}
echo "</table>";
#----------------------------------------






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





