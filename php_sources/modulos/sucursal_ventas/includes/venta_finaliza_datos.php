<?php
include_once("../../includes/connect.php");
include("cabecera.inc.php"); 
include_once("../../includes/funciones_costos.php");
include_once("../../includes/funciones_promocion.php");
include_once("../../includes/funciones_precios.php");
include_once("../../includes/funciones_valores.php");
include_once("../../includes/funciones_varias.php");
include_once("../../includes/funciones_ventas.php");
include_once("../../includes/funciones_stock.php");
include_once("../../includes/funciones_articulos.php");
/*
formulario de datos de vendedor y codigo de autorizacion

*/







#-----------------------------------------------------------------------------
#verifica si existen articulos en promocion
$query='select * from ventas_temp2 where id_session="'.$id_session.'" and promocion="S"';
$res2=mysql_query($query);
$rows2=mysql_num_rows($res2);
if($rows>0){
        $promaa1=1;

}
#-----------------------------------------------------------------------------











$cod_descuento=get_valor(8);

echo '<br><table  class="t1">';
echo '<tr><td><font1>vendedor/a: </font1></td>';
echo '<td><input type="text" name="vendedor" size="5"></td></tr>';



if($promaa1!=0){
echo '<tr><td><font1>Descuento: </font1></td>';
        echo '<td><input type="text" name="descuento" size="5"></td></tr>';
        echo '<tr><td><font1>INGRESO CODIGO DE AUTORIZACION </font1></td>';
        echo '<td><input type="text" name="cod_autoriz" size="5"></td> <td>Autorizacion N°</td> <td>'.$cod_descuento.'</td></tr>';
}else{
echo '<tr><td><font1>Exixten articulos en promocion</font1></td>';
        echo '<td></td></tr>';
        echo '<tr><td><font1>Existen articulos en promocion</font1></td>';
        echo '<td></td></tr>';
}

/*
echo '<tr><td><font1>Descuento: </font1></td>';
echo '<td><input type="text" name="descuento" size="5"></td></tr>';
echo '<tr><td><font1>INGRESO CODIGO DE AUTORIZACION </font1></td>';
echo '<td><input type="text" name="cod_autoriz" size="5"></td> <td>Autorizacion N°</td> <td>'.$cod_descuento.'</td></tr>';
*/


echo '</table><br>';

?>