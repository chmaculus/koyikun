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




$q='select * from pedidos_sucursal_estadistica_cola';
$r=mysql_query($q);
while($row=mysql_fetch_array($r)){
    $nombre_sucursal=nombre_sucursal($row["id_sucursal"]);
    
    $mes=estadistica_articulo_sucursal($row["id_articulo"],$nombre_sucursal,$u_mes);
    
    echo "id_articulo: ".$row["id_articulo"]."suc: ".$nombre_sucursal.chr(10);
    //echo "mes:".$mes[0].chr(10);

    $tres=estadistica_articulo_sucursal($row["id_articulo"],$nombre_sucursal,$u_tres);
    //echo "tres:".$tres[0].chr(10);

    $seis=estadistica_articulo_sucursal($row["id_articulo"],$nombre_sucursal,$u_seis);
    //echo "seis:".$seis[0].chr(10);
    
    $q='insert into pedidos_sucursal_estadistica set id_articulo="'.$row["id_articulo"].'", id_sucursal="'.$row["id_sucursal"].'", mes="'.$mes[0].'", tres="'.$tres[0].'", seis="'.$seis[0].'" ';
    mysql_query($q);
    
    echo $q.chr(10);
    
    
}
$q='truncate table pedidos_sucursal_estadisticas_cola';
mysql_query($q);

/*
#----------------------------------------------------------------
DROP TABLE IF EXISTS pedidos_sucursal_estadistica; create table pedidos_sucursal_estadistica (
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	id_articulo MEDIUMINT,
	id_sucursal MEDIUMINT,
	mes MEDIUMINT,
	tres MEDIUMINT,
	seis MEDIUMINT,
	PRIMARY KEY (id) ?> ); alter table pedidos_sucursal_estadistica add index id_articulo(id_articulo);
#----------------------------------------------------------------
*/










function estadistica_articulo_sucursal($id_articulo,$id_sucursal,$fecha){
        $q='select sum(cantidad)
                            from ventas
                        	where id_articulos="'.$id_articulo.'" and sucursal="'.$id_sucursal.'" and fecha>="'.$fecha.'"';
//        echo "aa:".$q.chr(10);

        $res=mysql_query($q);
        if(mysql_error()){echo mysql_error().chr(10);}
        $tot=mysql_fetch_array($res);
        return $tot;
}













