<?php
include("cabecera.inc.php");
?>
<body onLoad=document.aa.busqueda.focus()>

<center>
<titulo>Busqueda clientes</titulo><br><br>
<?php
$limite=50;
$desde=$_POST["desde"];
$hasta=$_POST["hasta"];


include('../includes/connect.php');
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
	echo '<br><br><font1>Seleccione cliente</font1>';
	exit;
}


$query='select * from clientes where razon_social like "%'.$_POST["busqueda"].'%" OR 
													nombres like "%'.$_POST["busqueda"].'%"
														order by razon_social, nombres';

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
echo '<br><br><font1>Mostrando Resultados desde: '.($desde+1).' Hasta: '.$hasta.' de: '.$total_rows.'</font1><br><br>';

echo '<table class="t1">';
echo '<tr>';
	echo '<th>razon_social</th>';
	echo '<th>Nombres</th>';
	echo '<th>Tipo cliente</th>';
	echo '<th>Condicion IVA</th>';
	echo '<th>D.N.I.</th>';
	echo '<th>Direccion</th>';
	echo '<th>Ciudad</th>';
echo "<td></td>";
echo "<td></td>";
echo '</tr>';
#-------------------------------


#muestra resultados
while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["razon_social"].'</td>';
	echo '<td>'.$row["nombres"].'</td>';
	echo '<td>'.$row["tipo_cliente"].'</td>';
	echo '<td>'.$row["condicion_iva"].'</td>';
	echo '<td>'.$row["cuit"].'</td>';
	echo '<td>'.$row["direccion"].'</td>';
	echo '<td>'.$row["ciudad"].'</td>';
	echo '<td>'.$row["provincia"].'</td>';
	echo '<td>'.$row["codigo_postal"].'</td>';
	echo '<td><A HREF="clientes_seleccionar.php?id_clientes='.$row["id"].'">SELECCIONAR</A></td>';
	echo "</tr>".chr(13);
}
echo "</table>";



echo '<br><font1>Mostrando Resultados desde: '.($desde+1).' Hasta: '.$hasta.' de: '.$total_rows.'</font1><br>';

#almacena variables
echo '<input type="hidden" name="desde" value="'.$desde.'">';
echo '<input type="hidden" name="hasta" value="'.$hasta.'">';
#-----------------------

#botones de control de pagina
echo '<th><input type="submit" name="control" value="anteriores"></th>';
echo '<th><input type="submit" name="control" value="siguientes"></th>';
#---------------------------

?>

</form>
</center>
</body>
</html>
