<?php
//este script es para asignar numero de pedido a los pedido que no se asignaron automaticamente

include("../../includes/connect.php");

$q='select id, sucursal, fecha, hora  from pedidos where numero_pedido is null order by fecha, hora, sucursal';

$suc=0;
$count=0;





#-----------------------------------------
function get_numero_pedido($id_sucursal){
        $query='select * from pedido_numero where id_sucursal="'.$id_sucursal.'"';
        $result=mysql_query($query) or die(mysql_error());
        $rows=mysql_num_rows($result);
        if($rows<"1"){
                $numero_venta="1";
                $q1='insert into pedido_numero set numero="1", id_sucursal="'.$id_sucursal.'"';
                mysql_query($q1)or die(mysql_error());
        }else{
                $array_nventa=mysql_fetch_array($result);
                $numero_venta=$array_nventa["numero"];
        }

return $numero_venta;
}
#-----------------------------------------


#-----------------------------------------
function incrementa_n_pedido($id_sucursal){
        $query='select * from pedido_numero where id_sucursal="'.$id_sucursal.'"';
        $result=mysql_query($query) or die(mysql_error());
        $array_pedido=mysql_fetch_array($result);
        $numero_pedido=$array_pedido["numero"];
        $q1='update pedido_numero set numero="'.( $numero_pedido + 1 ).'" where  id_sucursal="'.$id_sucursal.'"';
        mysql_query($q1)or die(mysql_error());
}
#-----------------------------------------


?>
