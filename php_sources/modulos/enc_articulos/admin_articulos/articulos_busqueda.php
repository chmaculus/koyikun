<?php
include("../../login/login_verifica.inc.php");
$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="0"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 

include("articulos_base.php");?>
<body onLoad=document.aa.busqueda.focus()>

<center>

<titulo>Busqueda articulos</titulo>
<?php
$limite=20;
$desde=$_POST["desde"];
$hasta=$_POST["hasta"];


include('../../includes/connect.php');
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


$query='select * from articulos where descripcion like "%'.$_POST["busqueda"].'%" or
													clasificacion like "%'.$_POST["busqueda"].'%" or
													subclasificacion like "%'.$_POST["busqueda"].'%" or
													marca like "%'.$_POST["busqueda"].'%" or
													codigo_barra like "%'.$_POST["busqueda"].'%"
														order by marca, clasificacion, descripcion
													
';

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
	echo '<th>Codigo</th>';
	echo '<th>Marca</th>';
	echo '<th>Descripcion</th>';
	echo '<th>Contenido</th>';
	echo '<th>Presentacion</th>';
	echo '<th>Clasificacion</th>';
	echo '<th>Subclasificacion</th>';
	echo '<th>Fecha</th>';
	echo '<th></th>';
	echo '<th></th>';
echo '</tr>'.chr(13);
#-------------------------------


#muestra resultados
while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["codigo_interno"].'</td>';
	echo '<td>'.$row["marca"].'</td>';
	echo '<td>'.$row["descripcion"].'</td>';
	echo '<td>'.$row["contenido"].'</td>';
	echo '<td>'.$row["presentacion"].'</td>';
	echo '<td>'.$row["clasificacion"].'</td>';
	echo '<td>'.$row["subclasificacion"].'</td>';
	accion($row["id"]);
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


#-----------------------------------------------------------------
function accion($id_articulos){
#devuelve 2 columnas en la tabla
	echo '<td><a href="articulos_ingreso.php?id_articulos='.$id_articulos.'">Modificar</a></td>';
	echo '<td><a href="articulos_eliminar.php?id_articulos='.$id_articulos.'">Eliminar</a></td>';
	echo '<td><a href="../admin_promociones/promociones_ingreso.php?id_articulos='.$id_articulos.'">Promocion</a></td>';
}
#-----------------------------------------------------------------



?>

</form>
</center>
</body>
</html>
