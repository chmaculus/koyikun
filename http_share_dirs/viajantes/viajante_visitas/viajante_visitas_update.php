<?php
include_once("viajante_visitas_base.php");



include_once("connect.php");
$fecha=date("Y-n-d");
$hora=date("H:i:s");



#---------------------------------------------------------------------------------
if($_POST["accion"]=="ingreso"){

	$query='insert into viajante_visitas set
		id="'.$_POST["id"].'",
		id_clientes="'.$_POST["id_clientes"].'",
		id_viajante="'.$_POST["id_viajante"].'",
		compro="'.$_POST["compro"].'",
		detalle="'.$_POST["detalle"].'",
		marcas_ofrecidas="'.$_POST["marcas_ofrecidas"].'",
		fecha_visita="'.$_POST["fecha_visita"].'",
		hora_visita="'.$_POST["hora_visita"].'",
		fecha="'.$_POST["fecha"].'",
		hora="'.$_POST["hora"].'"';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
	$id_viajante_visitas=mysql_insert_id($id_connection);


	#muestra registro ingresado
	$query='select * from viajante_visitas where id="'.$id_viajante_visitas.'"';
	$array_viajante_visitas=mysql_fetch_array(mysql_query($query));
	include("viajante_visitas_muestra.inc.php");
}
#---------------------------------------------------------------------------------


#---------------------------------------------------------------------------------
if($_POST["accion"]=="modificacion"){
		$id_viajante_visitas=$_POST["id_viajante_visitas"];
		
		$query='update viajante_visitas set
		id="'.$_POST["id"].'",
		id_clientes="'.$_POST["id_clientes"].'",
		id_viajante="'.$_POST["id_viajante"].'",
		compro="'.$_POST["compro"].'",
		detalle="'.$_POST["detalle"].'",
		marcas_ofrecidas="'.$_POST["marcas_ofrecidas"].'",
		fecha_visita="'.$_POST["fecha_visita"].'",
		hora_visita="'.$_POST["hora_visita"].'",
		fecha="'.$_POST["fecha"].'",
		hora="'.$_POST["hora"].'"
				where id="'.$id_viajante_visitas.'"
			';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}

	#muestra registro ingresado
	$query='select * from viajante_visitas where id="'.$id_viajante_visitas.'"';
	$array_viajante_visitas=mysql_fetch_array(mysql_query($query));
	include("viajante_visitas_muestra.inc.php");
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
 	$query='delete from viajante_visitas where id="'.$id_viajante_visitas.'"';
 	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
 	exit;
}


?>
</center>
</body>
</html>
