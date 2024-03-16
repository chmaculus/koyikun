<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link type="text/css" href="style.css" rel="stylesheet" />

	<link type="text/css" href="js/themes/base/ui.all.css" rel="stylesheet" />
	<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
	<script type="text/javascript" src="js/ui/ui.core.js"></script>
	<script type="text/javascript" src="js/ui/ui.datepicker.js"></script>
	<script type="text/javascript" src="js/ui/i18n/ui.datepicker-es.js"></script>
<!--  
	<link type="text/css" href="../demos.css" rel="stylesheet" />
-->
<meta content="text/html; charset=UTF-8" http-equiv="content-type" />
	<script type="text/javascript">
	$(function() {
		$('#desde').datepicker({
			changeMonth: true,
			changeYear: true
		});
		$('#hasta').datepicker({
			changeMonth: true,
			changeYear: true
		});
	});
	</script>

<title>Tablabla ventas By Christian Máculus</title>
</head>

<center>

<?php
#$fecha=date("d/n/Y");

if(!$_POST["ACEPTAR"]){
	$fecha_desde='01'.date("/n/Y");
	$fecha_hasta='31'.date("/n/Y");
}

?>
<form method="POST" action="<?php echo $SCRIPT_NAME ?>">

<table class="t1">
<tr>
	<td>Desde:</td><td> <input type="text" name="desde" id="desde" value="<?php if($_POST["desde"]){echo $_POST["desde"];}else{ echo $fecha_desde;} ?>"></td>
</tr> 
<tr>
	<td>Hasta:</td><td> <input type="text" name="hasta" id="hasta" value="<?php if ($_POST["hasta"]){ echo $_POST["hasta"]; }else{ echo $fecha_hasta; }?>"></td>
</tr><br>
<tr>
	<td>Activas</td>
	<td><input type="radio" name="activas" value="activas" checked></td>
</tr>
<tr>
	<td>Todas</td>
	<td><input type="radio" name="activas" value="todas"></td>
</tr>

</table><br>
<input type="submit" name="ACEPTAR" value="ACEPTAR" />
</form>
<?php

if(!$_POST["ACEPTAR"]){
		exit;
}

include_once("../../includes/connect.php");
include_once("../../includes/funciones_varias.php");

$fecha_desde=fecha_conv("/", $_POST["desde"]);
$fecha_hasta=fecha_conv("/", $_POST["hasta"]);

echo "desde: ".$fecha_desde."<br>";
echo "hasta: ".$fecha_hasta."<br>";



if($_POST["activas"]=="todas"){
	$query='select * from promociones where fecha_finaliza>="'.$fecha_desde.'" and fecha_finaliza<="'.$fecha_hasta.'" order by fecha_finaliza desc';
}
if($_POST["activas"]=="activas"){
	$query='select * from promociones where fecha_finaliza>="'.$fecha_desde.'" and fecha_finaliza<="'.$fecha_hasta.'" and habilitado="S" order by fecha_finaliza desc ';
}


echo $query."<br>";
$result=mysql_query($query);
if(mysql_error()){
	echo mysql_error();
}
?>

<center>
<table class="t1">
<tr>
	<th>ID</th>
	<th>Marca</th>
	<th>Descripcion</th>
	<th>Clasificacion</th>
	<th>subclasificacion</th>
	<th>Sucursal</th>
	<th>fecha_inicio</th>
	<th>fecha_finaliza</th>
	<th>precio_promocion</th>
	<th>habilitado</th>
	<th>Accion</font1></th>
	<th>Accion</th>
</tr>

<?php
echo chr(10);
while($row=mysql_fetch_array($result)){
	$array_detalle=array_articulos( $row["id_articulos"] );
	echo "<tr>";
	echo '<td>'.$array_detalle["id"].'</td>';
	echo '<td>'.$array_detalle["marca"].'</td>';
	echo "<td>".$array_detalle["descripcion"].'</td>';
	echo "<td>".$array_detalle["clasificacion"].'</td>';
	echo "<td>".$array_detalle["subclasificacion"].'</td>';
	echo '<td>'.nombre_sucursal( $row["id_sucursal"] ).'</td>';
	echo '<td>'.fecha_conv( "-", $row["fecha_inicio"] ).'</td>';
	echo '<td>'.fecha_conv( "-", $row["fecha_finaliza"] ).'</td>';
	echo '<td>'.$row["precio_promocion"].'</td>';
	echo '<td>'.$row["habilitado"].'</td>';
	echo '<td><A HREF="promociones_ingreso.php?id_articulos='.$row["id_articulos"].'"><button>Modificar</button></A></td>';
	echo '<td><A HREF="promociones_eliminar.php?id_promociones='.$row["id"].'"><button>Eliminar</button></A></td>';
	echo "</tr>".chr(10);
}
echo "</table>";
echo "</center>";


#-----------------------------------------
function array_articulos($id_articulos){
    $query='select * from articulos where id="'.$id_articulos.'"';
    $res=mysql_query($query);
    if(mysql_error()){
         echo mysql_error()."<br>".chr(10);
         echo $query."<br>".chr(10);
         echo $_SERVER["SCRIPT_NAME"]."<br>".chr(10);
         return "Error mysql_query";
    }
    $rows=mysql_num_rows($res);
    if($rows==1){
        $array_articulos=mysql_fetch_array($res);
        return $array_articulos;        
    }else{
        return NULL;
    }
}
#-----------------------------------------





















?>


