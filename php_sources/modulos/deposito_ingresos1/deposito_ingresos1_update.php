<?php
include_once("deposito_ingresos1_base.php");



include('../includes/connect.php');
$fecha=date("Y-n-d");
$hora=date("H:i:s");



#---------------------------------------------------------------------------------
if($_POST["accion"]=="ingreso"){

	$query='insert into deposito_ingresos1 set
		proveedor="'.$_POST["proveedor"].'",
		bultos="'.$_POST["bultos"].'",
		fecha="'.fecha_conv("/",$_POST["fecha"]).'",
		fecha_sistema="'.$fecha.'",
		hora_sistema="'.$hora.'"';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
	$id_deposito_ingresos1=mysql_insert_id($id_connection);


	#muestra registro ingresado
	$query='select * from deposito_ingresos1 where id="'.$id_deposito_ingresos1.'"';
	$array_deposito_ingresos1=mysql_fetch_array(mysql_query($query));
	include("deposito_ingresos1_muestra.inc.php");
}
#---------------------------------------------------------------------------------


#---------------------------------------------------------------------------------
if($_POST["accion"]=="modificacion"){
		$id_deposito_ingresos1=$_POST["id_deposito_ingresos1"];
		
		$query='update deposito_ingresos1 set
		proveedor="'.$_POST["proveedor"].'",
		bultos="'.$_POST["bultos"].'",
		fecha="'.fecha_conv("/",$_POST["fecha"]).'",
		fecha_sistema="'.$fecha.'",
		hora_sistema="'.$hora.'"
				where id="'.$id_deposito_ingresos1.'"
			';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}

	#muestra registro ingresado
	$query='select * from deposito_ingresos1 where id="'.$id_deposito_ingresos1.'"';
	$array_deposito_ingresos1=mysql_fetch_array(mysql_query($query));
	include("deposito_ingresos1_muestra.inc.php");
}
#---------------------------------------------------------------------------------



?>





<?php
if(!mysql_error()){
	if($_POST["accion"]=="ingreso"){
		echo '<td><font1>Los datos se ingresaron correctamente</font1></td>';
	}
	if($_POST["accion"]=="modificacion"){
		echo '<td><font1>Los datos se actualizaron correctamente</font1></td>';
	}
}
if($_POST["accion"]=="ELIMINAR"){
 	$query='delete from deposito_ingresos1 where id="'.$id_deposito_ingresos1.'"';
 	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
 	exit;
}





#---------------------------------------------------------------------------------------------
function fecha_conv($separador, $fecha){
        $f=explode($separador, $fecha);

        if($separador=="/"){
                $fecha=$f[2]."-".$f[1]."-".$f[0];
        }

        if($separador=="-"){
                $fecha=$f[2]."/".$f[1]."/".$f[0];
        }
return $fecha;
}
#---------------------------------------------------------------------------------------------









?>
</center>
</body>
</html>
