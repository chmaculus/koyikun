<?php
include_once("../includes/connect.php");
include_once("../login/login_verifica.inc.php");

include_once("../includes/seguridad_franquicia.inc.php");

//echo "jerarquia: ".$jerarquia;echo "<br>";
//echo "jerarquia: ".$_COOKIE["jerarquia"];echo "<br>";
//exit;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="css/style2.css" type="text/css">
  <meta content="text/html; charset=UTF-8" http-equiv="content-type" />
  <title>Sucursal control administrativo</title>
</head>

<SCRIPT TYPE="text/javascript">
<!--
function popup(mylink, windowname)
{
if (! window.focus)return true;
var href;
if (typeof(mylink) == 'string')
   href=mylink;
else
   href=mylink.href;
window.open(href, windowname, 'width=600,height=400,scrollbars=yes');
return false;
}
//-->
</SCRIPT>

<body onLoad=document.aa.busqueda.focus()>
<center>

<?php
$limite=100;
$desde=$_POST["desde"];
$hasta=$_POST["hasta"];
$id_sucursal=$_COOKIE["id_sucursal"];
$fecha=date("Y-n-d");


include_once('../../includes/funciones_varias.php');
include_once('../../includes/funciones_precios.php');
include_once('../../includes/funciones_stock.php');
include_once('../../includes/funciones_promocion.php');

echo '<font1>Sucursal: '.nombre_sucursal($id_sucursal).'</font1><br>';

?>

</body>
<form name="aa" action="<?php echo $SCRIPT_NAME; ?>" method="post">
<input type="text" name="busqueda" value="<?php echo $_POST["busqueda"]; ?>">
<input type="submit" name="buscar" value="Buscar">
</form>

<?php

#en caso de una nueva busqueda resetear las variables 
if($_POST["buscar"]=="Buscar"){
	$desde="";
	$hasta="";
}
#-------------------

if (!$_POST["busqueda"]) {
        echo '<font1>Busqueda vacia</font1>';
        echo "<br>";
        echo '<iframe height="555" width="555" src="slideshow_imagenes.php"></iframe>';
        //include("lanzamientos.inc.php");
        exit;
}


$query='select id from koyikun.articulos where descripcion like "%'.$_POST["busqueda"].'%" or clasificacion like "%'.$_POST["busqueda"].'%" or subclasificacion like "%'.$_POST["busqueda"].'%" or marca like "%'.$_POST["busqueda"].'%" or codigo_barra="'.$_POST["busqueda"].'" or codigo_interno="'.$_POST["busqueda"].'" or 	id="'.$_POST["busqueda"].'" order by marca, clasificacion, subclasificacion, descripcion';

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

$query='select * from koyikun.articulos where descripcion like "%'.$_POST["busqueda"].'%" or clasificacion like "%'.$_POST["busqueda"].'%" or subclasificacion like "%'.$_POST["busqueda"].'%" or marca like "%'.$_POST["busqueda"].'%" or codigo_barra="'.$_POST["busqueda"].'" or codigo_interno="'.$_POST["busqueda"].'" or 	id="'.$_POST["busqueda"].'" order by marca, clasificacion, subclasificacion, descripcion';
$query .= " limit $desde,$limite";// establece limite al query actual

# limita que hasta no sea mayor que el total de los resultados
if ($hasta > $total_rows) { $hasta = $total_rows ; }
#---------------------------------------------------
// fin control paginas

$result = mysql_query($query);
$rows=mysql_num_rows($result);

if(mysql_error()){
	echo mysql_error()." ".$SCRIPT_NAME;
}

#------------------------------------------------------
while($row=mysql_fetch_array($result)){
        $array_articulos[]=$row;
}
#------------------------------------------------------



$div=(($rows / 3)+1);

echo '<table border="1">';
$count=0;
for($j=1;$j<=$div;$j++){
	echo '<tr valign="top">';
	for($i=0;$i<=2;$i++){
		//echo "<td>".$array_articulos[$count]["id"]."</td>";
		echo "<td>";
		include("articulo_muestra.inc.php");
		echo "</td>".chr(10).chr(10);
		$count++;
		if($count==$rows){break;}
	} 
	echo '</tr>';
} 
echo '</table>';




echo '<br><font1>Mostrando Resultados desde: '.($desde+1).' Hasta: '.$hasta.' de: '.$total_rows.'</font1><br>';

#almacena variables
echo '<input type="hidden" name="desde" value="'.$desde.'">';
echo '<input type="hidden" name="hasta" value="'.$hasta.'">';
#-----------------------

#botones de control de pagina
echo '<form action="'.$SCRIPT_NAME.'" method="post">';

echo '<input type="hidden" name="busqueda" value="'.$_POST["busqueda"].'">';
echo '<input type="hidden" name="desde" value="'.$desde.'">';
echo '<input type="hidden" name="hasta" value="'.$hasta.'">';

echo '<td><input type="submit" name="control" value="anteriores"></td>';
echo '<td><input type="submit" name="control" value="siguientes"></td>';
echo '</form>';
#---------------------------



#-----------------------------------------------------------------
function accion($id_articulo){
#devuelve 4 columnas en la tabla
//<link rel="parent" href="wildcats.htm" target="_blank">
	echo '<td><A HREF="articulo_vender.php?id_articulo='.$id_articulo.'" ><button>Vender</button></A></td>';
	echo '<td><A HREF="stock_sucursales.php?id_articulo='.$id_articulo.'" onClick="return popup(this, \'notes\')"><button>stock</button></A></td>';
	echo '<td><A HREF="listas.php?id_articulo='.$id_articulo.'" onClick="return popup(this, \'notes\')"><button>Listas</button></A></td>';
//	echo '<td><A HREF="articulo_pedir.php?id_articulo='.$id_articulo.'" onClick="return popup(this, \'notes\')"><button>Pedir</button></A></td>';
}
#-----------------------------------------------------------------





?>


</center>
</body>
</html>
