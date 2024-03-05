<?php
include_once("../../includes/connect.php");

include("../../login/login_verifica.inc.php");
$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="2"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 

include_once("cabecera.inc.php");?>

<script language="javascript" src="js/jquery-1.3.min.js"></script>
<script language="javascript" src="funciones.js"></script>


<body>

<center>
<titulo>Busqueda 2</titulo>

<?php
//include_once("../includes/funciones_costos.php");
include_once('../includes/funciones_varias.php');
include_once('../includes/funciones_precios.php');
include_once('../includes/funciones_stock.php');
include_once('../includes/funciones_promocion.php');


$fecha=date("Y-n-d");


echo '<form action="'.$_SERVER["SCRIPT_NAME"].'" method="post">';
include("select.inc.php");
echo '<input type="submit" name="ACEPTAR" value="ACEPTAR"><br>';
echo "</form>";

echo '<Titulo>CONSULTA 2</titulo><br><br>';

echo '<font1>Seleccione marca:</font1>';
#---------------------------------------------------------------
if($_POST["marca"]!="" AND $_POST["clasificacion"]=="" AND $_POST["subclasificacion"]=="" ){
	$query='select * from articulos where marca="'.$_POST["marca"].'" order by marca, clasificacion, subclasificacion, descripcion';
}

if($_POST["marca"]!="" AND $_POST["clasificacion"]!="" AND $_POST["subclasificacion"]=="" ){
	$query='select * from articulos where marca="'.$_POST["marca"].'" and clasificacion="'.$_POST["clasificacion"].'" order by marca, clasificacion, subclasificacion, descripcion';
}

if($_POST["marca"]!="" AND $_POST["clasificacion"]!="" AND $_POST["subclasificacion"]!="" ){
	$query='select * from articulos where marca="'.$_POST["marca"].'" and clasificacion="'.$_POST["clasificacion"].'" and subclasificacion="'.$_POST["subclasificacion"].'" order by marca, clasificacion, subclasificacion, descripcion';
}

$result=mysql_query($query)or die(mysql_error());
if(mysql_error()){
    echo mysql_error()."<br>".$query."<br>";
}
$numrows=mysql_num_rows($result);
#---------------------------------------------------------------

echo '<br>Cantidad de articulos: '.$numrows.'<br>';


//echo "query: ".$query."<br>";


echo '<table class="t1">';

#------------------------------------------------------
while($row=mysql_fetch_array($result)){
	$array_precios=precio_sucursal( $row["id"], $id_sucursal );
	if($array_precios["rows"]<1){
		$array_precios=precio_sucursal( $row["id"], 1 );
	}
	echo '<tr>';
	echo 	"<td>".$row["id"]."</td>";	
	echo 	"<td>".$row["marca"]."</td>";	
	echo 	"<td>".$row["descripcion"]."</td>";	
	echo 	"<td>".$row["clasificacion"]."</td>";	
	echo 	"<td>$ ".round($array_precios["precio_base"],0).",00</td>";	
	echo '<td><A HREF="articulo_vender.php?id_articulo='.$row["id"].'" ><img src="botones/vender.jpeg" alt="" width="55px" heigh="9px"></A></td>';
	echo '</tr>';
	
	// $array_articulos[]=$row;
}
#------------------------------------------------------
echo "</table>";


// $div=(($numrows / 3)+1);

// echo '<table border="1">';
// $count=0;
// for($j=1;$j<=$div;$j++){
// 	echo '<tr valign="top">';
// 	for($i=0;$i<=2;$i++){
// 		//echo "<td>".$array_articulos[$count]["id"]."</td>";
// 		echo "<td>";
// 		include("articulo_muestra.inc.php");
// 		echo "</td>".chr(10).chr(10);
// 		$count++;
// 		if($count==$rows){break;}
// 	} 
// 	echo '</tr>';
// } 
echo '</table>';





?>


</center>
</body>
</html>
