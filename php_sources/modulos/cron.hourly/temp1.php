<?php
include("../includes/connect.php");
include("../includes/funciones_varias.php");



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



$q='select * from pedidos where finalizado="N" ';

#$q='select * from pedidos_sucursal_estadistica_cola';
$r=mysql_query($q);
while($row=mysql_fetch_array($r)){
    $id_sucursal=id_sucursal($row["sucursal"]);
    echo "suc:".$row["sucursal"].chr(10);
    $q2='insert into pedidos_sucursal_estadistica_cola set id_articulo="'.$row["id_articulo"].'", id_sucursal="'.$row["sucursal"].'"';
    mysql_query($q2);
    echo $q2.chr(10);
    
}// end while











function estadistica_articulo_sucursal($id_articulo,$id_sucursal,$fecha){
        $q='select sum(cantidad)
                            from ventas
                        	where id_articulos="'.$id_articulo.'" and sucursal="'.$id_sucursal.'" and fecha>="'.$fecha.'"';
        echo "aa:".$q.chr(10);

        $res=mysql_query($q);
        if(mysql_error()){echo mysql_error().chr(10);}
        $tot=mysql_fetch_array($res);
        return $tot;
}







?>
