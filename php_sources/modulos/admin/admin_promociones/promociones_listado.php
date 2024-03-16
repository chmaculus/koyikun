<?php
include_once("promociones_base.php");
include_once("../../includes/connect.php");
include_once("../../includes/funciones_varias.php");
#include("../../includes/funciones_articulos.php");

echo "<center>";
include("fecha_desde_hasta.inc.php");

if(!$_POST["fecha_desde"]){
    exit;
}

$query="select * from promociones order by fecha_inicio desc limit 0,100";
$result=mysql_query($query)or die(mysql_error());
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
</center>
