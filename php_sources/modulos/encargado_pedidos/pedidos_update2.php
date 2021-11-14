<?php

include_once("../../includes/connect.php");
include_once("../../includes/funciones_varias.php");
include_once("../../login/login_verifica.inc.php");
//include_once("../../includes/funciones_stock.php");

#jrarquia 0 coresponde a administrador
if($jerarquia!="1"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 

echo "<center>";
echo "Sucursal: ".nombre_sucursal($id_sucursal)."<br>";


$fecha=date("Y-n-d");
$hora=date("H:i:s");


include_once("pedidos_base.php");


$q='update pedidos set estado="'.$_POST["estado"].'" where sucursal="'.$_POST["id_sucursal"].'" and numero_pedido="'.$_POST["numero_pedido"].'"';
mysql_query($q);
if(mysql_error()){echo mysql_error()."<br>".$q."<br>";}


echo $q."<br><br>";

$q='insert into pedidos_seguimiento set id_sucursal="'.$_POST["id_sucursal"].'", numero_pedido="'.$_POST["numero_pedido"].'", ubicacion="'.$_POST["estado"].'", fecha="'.$fecha.'", hora="'.$hora.'" ';
mysql_query($q);
if(mysql_error()){echo mysql_error()."<br>".$q."<br>";}

echo $q."<br><br>";

/*


drop table if pedidos_seguimiento;
create table pedidos_seguimiento(
        id  MEDIUMINT,
        id_sucursal MEDIUMINT,
        numero_pedido MEDIUMINT,
        ubicacion varchar(20),
        fecha date,
        hora time,
        PRIMARY KEY (id)
);
alter table pedidos_seguimiento add index id_sucursal(id_sucursal);
alter table pedidos_seguimiento add index numero_pedido(numero_pedido);
alter table pedidos_seguimiento add index fecha(fecha);
alter table pedidos_seguimiento add index hora(hora);

*/


?>