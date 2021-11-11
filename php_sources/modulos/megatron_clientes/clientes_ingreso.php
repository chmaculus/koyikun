<?php
if($_GET["id_clientes"]){
	include("connect.php");
	$query='select * from clientes where id="'.$_GET["id_clientes"].'"';
	$array_clientes=mysql_fetch_array(mysql_query($query));

	if($array_clientes["condicion_iva"]=="DNI"){
		header('Location: clientes_ingreso_persona.php?id_clientes='.$array_clientes["id"]);
	}else{
		header('Location: clientes_ingreso_empresa.php?id_clientes='.$array_clientes["id"]);
	}
}else{
	include("clientes_base.php");
	echo '<center><table><tr>';
	echo '<td><A href="clientes_ingreso_persona.php"><button>Persona</button></a></td>';

	echo '<td><A href="clientes_ingreso_empresa.php"><button>Empresa</button></a></td>';

	echo '<td><A href="clientes_ingreso_empleado.php"><button>Empleado</button></a></td>';
	echo '</tr></table></center>';

}

?>
