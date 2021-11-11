<?php
include("clientes_persona_base.php");
?>
<body onLoad=document.aa.busqueda.focus()>

<center>
<titulo>Busqueda clientes_persona</titulo>
<?php
$limite=20;
$desde=$_POST["desde"];
$hasta=$_POST["hasta"];


include('connect.php');
?>

</body>
<form name="aa" action="<?php echo $_SERVER["SCRIPT_NAME"]; ?>" method="post">
<input type="text" name="busqueda" value="<?php echo $_POST["busqueda"]; ?>">
<input type="submit" name="buscar" value="Buscar">

<?php

#en caso de una nueva busqueda resetear las variables 
if($_POST["buscar"]=="Buscar"){
	$desde="";
	$hasta="";
}
#-------------------

if (!$_POST["busqueda"]) {
	echo '<br><font1>Busqueda vacia</font1>';
	exit;
}


$query='select * from clientes_persona where titulo like "%'.$_POST["busqueda"].'%" order by genero, titulo';

#total de los resultados
$total_rows=mysql_num_rows(mysql_query($query));
if(mysql_error()){
	echo mysql_error()." ".$SCRIPT_NAME;
}
#--------------------------------------------

// control paginas
#primera busqueda cuando no existen las variables
if(!$desde || $desde==0){
	$desde="0";
	$hasta = $limite;
}
#----------------------------------------------

if($_POST["control"]=="anteriores"){
	if($desde >= $limite){ //para que no reste en la primera busqueda
		$desde = $desde - $limite;
		$hasta = $desde + $limite;
	}
}
if($_POST["control"]=="siguientes"){
	if($hasta != $total_rows){ //para que llegado al final no siga sumando
		$desde = $desde + $limite;
		$hasta = $desde + $limite;
	}
	if ($hasta > $total_rows) { $hasta = $total_rows ; }
}

$query .= " limit $desde,$limite";// establece limite al query actual

# limita que hasta no sea mayor que el total de los resultados
if ($hasta > $total_rows) { $hasta = $total_rows ; }
#---------------------------------------------------
// fin control paginas

$result = mysql_query($query);
if(mysql_error()){
	echo mysql_error()." ".$SCRIPT_NAME;
}


#crea cabecera listado
echo '<br><font1>Mostrando Resultados desde: '.($desde+1).' Hasta: '.$hasta.' de: '.$total_rows.'</font1><br>';

echo '<table class="t1">';
echo '<tr>';
	echo '<th>id</th>';
	echo '<th>apellido</th>';
	echo '<th>nombres</th>';
	echo '<th>dni</th>';
	echo '<th>estado_civil</th>';
	echo '<th>telefono</th>';
	echo '<th>celular</th>';
	echo '<th>email</th>';
	echo '<th>profesion</th>';
	echo '<th>usa_tarjeta</th>';
	echo '<th>vendedor</th>';
	echo '<th>sucursal</th>';
	echo '<th>tel_comercial</th>';
	echo '<th>dom_comercial</th>';
	echo '<th>ciudad</th>';
	echo '<th>provincia</th>';
	echo '<th>carnet</th>';
	echo '<th>codigo_barras</th>';
	echo '<th>fecha_entrega</th>';
	echo '<th>radio</th>';
	echo '<th>canal</th>';
	echo '<th>programas</th>';
	echo '<th>fecha</th>';
	echo '<th>hora</th>';
	echo "<td></td>";
	echo "<td></td>";
echo '</tr>';
#-------------------------------


#muestra resultados
while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["apellido"].'</td>';
	echo '<td>'.$row["nombres"].'</td>';
	echo '<td>'.$row["dni"].'</td>';
	echo '<td>'.$row["estado_civil"].'</td>';
	echo '<td>'.$row["telefono"].'</td>';
	echo '<td>'.$row["celular"].'</td>';
	echo '<td>'.$row["email"].'</td>';
	echo '<td>'.$row["profesion"].'</td>';
	echo '<td>'.$row["usa_tarjeta"].'</td>';
	echo '<td>'.$row["vendedor"].'</td>';
	echo '<td>'.$row["sucursal"].'</td>';
	echo '<td>'.$row["tel_comercial"].'</td>';
	echo '<td>'.$row["dom_comercial"].'</td>';
	echo '<td>'.$row["ciudad"].'</td>';
	echo '<td>'.$row["provincia"].'</td>';
	echo '<td>'.$row["carnet"].'</td>';
	echo '<td>'.$row["codigo_barras"].'</td>';
	echo '<td>'.$row["fecha_entrega"].'</td>';
	echo '<td>'.$row["radio"].'</td>';
	echo '<td>'.$row["canal"].'</td>';
	echo '<td>'.$row["programas"].'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["hora"].'</td>';
	echo '<td><A HREF="clientes_persona_ingreso.php?id_clientes_persona='.$row["id"].'"><button>Modificar</button></A></td>';
	echo '<td><A HREF="clientes_persona_eliminar.php?id_clientes_persona='.$row["id"].'"><button>Eliminar</button></A></td>';
	echo "</tr>".chr(13);
}
echo "</table>";


echo '<br><font1>Mostrando Resultados desde: '.($desde+1).' Hasta: '.$hasta.' de: '.$total_rows.'</font1><br>';

#almacena variables
echo '<input type="hidden" name="desde" value="'.$desde.'">';
echo '<input type="hidden" name="hasta" value="'.$hasta.'">';
#-----------------------

#botones de control de pagina
echo '<input type="submit" name="control" value="anteriores">';
echo '<input type="submit" name="control" value="siguientes">';
#---------------------------

?>

</form>
</center>
</body>
</html>
