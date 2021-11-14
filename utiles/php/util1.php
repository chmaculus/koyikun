<?php

include("./includes/connect.php");


$show=1;
$exec=1;



#------------------------------------------------------------------------------------------------------------------
if($show==1){echo "#enumera los pedidos por sucursal zona 0\n";}
$q='select id, sucursal from pedidos where numero_pedido is null or numero_pedido="" order by sucursal';
$res=mysql_query($q);
if(mysql_error()){echo mysql_error();}
$suc=0;

$count1=0;


                incrementa_n_pedido($row["id_sucursal"]);
                $npedid=get_numero_pedido($row["id_sucursal"]);



while($row=mysql_fetch_array($res)){
        if($suc!=$row["id_sucursal"]){
                $count1=30;
                $suc=$row["id_sucursal"];
                incrementa_n_pedido($row["id_sucursal"]);
                $npedid=get_numero_pedido($row["id_sucursal"]);
        }
        if($count1>=30){
                if($show==1){echo "#--------------".chr(10);}

                incrementa_n_pedido($row["id_sucursal"]);
                $npedid=get_numero_pedido($row["id_sucursal"]);
                $count1=0;
        }
        $q='update pedidos set numero_pedido="'.$npedid.'" where id="'.$row["id"].'"';

        if($show==1){echo $q.";#".$count1.chr(10);}
        if($exec==1){mysql_query($q);}
        if(mysql_error()){echo mysql_error().chr(10);}


        $count1++;
}
#------------------------------------------------------------------------------------------------------------------



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