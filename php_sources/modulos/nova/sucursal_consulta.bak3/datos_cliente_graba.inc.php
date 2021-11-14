<?php


#----------------------------------------
$q3='insert into ventas_datos_clientes set 
sucursal="'.$sucursal.'",
numero_venta="'.$numero_venta.'",
sexo="'.$_POST["sexo"].'",
rango="'.$_POST["rango"].'",
nombre="'.$_POST["nombre"].'",
celular="'.$_POST["celular"].'",
localidad="'.$_POST["localidad"].'",
provincia="'.$_POST["provincia"].'",
nacionalidad="'.$_POST["pais"].'",
fecha="'.$fecha.'",
hora="'.$hora.'"';

mysql_query($q3);

if(mysql_error()){
	echo $query."<br>";
	echo mysql_error()."<br>";
	echo $_SERVER["SCRIPT_NAME"]."<br>";
}
#----------------------------------------


?>

