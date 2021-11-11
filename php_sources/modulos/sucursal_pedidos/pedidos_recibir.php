<?php

include_once("../../includes/connect.php");
include_once("../../includes/funciones_varias.php");
include_once("../../login/login_verifica.inc.php");
include_once("cabecera.inc.php");


#jrarquia 0 coresponde a administrador
if($jerarquia!="2"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 
?>

<center>
Pedido Actual<BR>
<?php
include_once("../../includes/connect.php");
//include_once("pedidos_base.php");



//$sucursal=numbre_sucursal($id_sucursal);


//exit;



if(!$_POST["numero_pedido"]){
	if($_GET["numero_pedido"]){
		$query='select * from pedidos where numero_pedido="'.$_GET["numero_pedido"].'" and sucursal="'.$id_sucursal.'" order by marca, clasificacion, subclasificacion, contenido, presentacion, descripcion';
	}
}

if($_POST["numero_pedido"]){
$q='update pedidos set estado="Recibido" where numero_pedido="'.$_POST["numero_pedido"].'" and sucursal="'.$_POST["id_sucursal"].'"';
mysql_query($q);

exit;
}









$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}

echo '<table class="t1">';
echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>marca</th>";
    echo "<th>descripcion</th>";
    echo "<th>contenido</th>";
    echo "<th>presentacion</th>";
    echo "<th>clasificacion</th>";
    echo "<th>subclasificacion</th>";
    echo "<th>Cant.Ped</th>";
    echo "<th>Stk.Act.</th>";
    echo "<th>Cant.Env</th>";
    echo "<th>fecha</th>";
    echo "<th>hora</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	$array_stock=array_stock($row["id_articulo"],$id_sucursal);
    echo "<tr>";
    echo '<td>'.$row["id_articulo"].'</td>';
    echo '<td>'.$row["marca"].'</td>';
    echo '<td>'.$row["descripcion"].'</td>';
    echo '<td>'.$row["contenido"].'</td>';
    echo '<td>'.$row["presentacion"].'</td>';
    echo '<td>'.$row["clasificacion"].'</td>';
    echo '<td>'.$row["subclasificacion"].'</td>';
    echo '<td>'.$row["cantidad_solicitada"].'</td>';
    echo '<td>'.$array_stock["stock"].'</td>';
    echo '<td>'.$row["cantidad_recibida"].'</td>';
    echo '<td>'.$row["fecha"].'</td>';
    echo '<td>'.$row["hora"].'</td>';
    echo "</tr>".chr(10);
}

//echo '<input type="hidden" name="query" value="'.base64_encode($query).'">';
echo "</table>";


echo '<br><br><font size="8" color="#FF0000">Confirmar la recepcion del pedido actual</font><br><br>';


	 echo '<form action="'.$_SERVER["SCRIPT_NAME"].'" method="post">';
	 echo '<input type="hidden" name="numero_pedido" value="'.$_GET["numero_pedido"].'">';
	 echo '<input type="hidden" name="id_sucursal" value="'.$id_sucursal.'">';
	 echo '<input type="submit" name="ACEPTAR" value="ACEPTAR">';
	 echo '</form>';



#-----------------------------------------------------------------
function array_stock($id_articulo,$id_sucursal){
	$query='select * from stock where id_articulo="'.$id_articulo.'" and id_sucursal="'.$id_sucursal.'"';
	$res=mysql_query($query);
	if(mysql_error()){
		$array_stock["error"]=mysql_error();
		$array_stock["query"]=$query;
		return $array_stock;
	}
	$rows=mysql_num_rows($res);

	if($rows==1){
		$array_stock=mysql_fetch_array($res);
		$array_stock["rows"]=$rows;
		$array_stock["query"]=$query;
		return $array_stock;		
	}

	if($rows<1){
		$array_stock["stock"]=0;
		$array_stock["rows"]=$rows;
		$array_stock["query"]=$query;
		return $array_stock;
	}
}
#-----------------------------------------------------------------




?>

</center>