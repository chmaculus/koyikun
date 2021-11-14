<?php
include_once("../../includes/connect.php");

include("../../login/login_verifica.inc.php");
$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="0"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 

include_once("cabecera.inc.php");?>

<script language="javascript" src="js/jquery-1.3.min.js"></script>
<script language="javascript" src="funciones.js"></script>


<body>

<center>
<titulo>Modificacion de costos</titulo>

<?php
include_once("../includes/funciones_costos.php");
include_once("../includes/funciones_precios.php");

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

echo '<form method="post" action="costos_update.php" name="form_costos" target="_self" id="form_costos">';
?>

<table class="t1">
<tr>
	<th>ID</th>
	<th>Cod Int</th>
	<th>CDO</th>
	<th>Descripcion</th>
	<th>Color</th>
	<th>Contenido</th>
	<th>Pesentacion</th>
	<th>Clasificacion</th>
	<th>Sub-clasificacion</th>
	<th>cod barra</th>
	<th>Imagen</th>
	<th>Accion</th>
	<th>EPMR</th>
	<th>P./costo</th>
	<th>Desc1</th>
	<th>Desc2</th>
	<th>IVA</th>
	<th>Margen</th>
	<th>Margen<br>Web</th>
	<th>% Tarj.</th>
	<th>P./venta</th>
	<th>P./Web</th>
	<th>Fecha Fab</th>
	<th>Fecha Ger</th>
</tr>

<?php
while($row=mysql_fetch_array($result)){

	$array_precios=precio_sucursal($row["id"],"1");
	$array_costos=array_costo( $row["id"] );
	
	if( $array_costos=="0" OR $array_costos["precio_costo"]=="" OR $array_costos["precio_costo"]==NULL OR $array_costos["precio_costo"]=="0"  ){
		$fecha=$array_precios["fecha"];
		$array_costos["precio_costo"]="0";
		$precio_venta=$array_precios["precio_base"];
	}else{
		//$array_costos["precio_costo"]=rand("101","999");
		$precio_venta=calcula_precio_venta( $array_costos );
		$precio_web=calcula_precio_web( $array_costos );
		$fecha=$array_costos["fecha"];
	}

	$costo_ultima_actualizacion=costo_ultima_actualizacion($row["id"], $fecha );
	if($costo_ultima_actualizacion==0){
		echo "<tr>";
	}
	
	if($costo_ultima_actualizacion==1){
		echo '<tr class="precaucion">';
	}
	
	if($costo_ultima_actualizacion==2){
		echo '<tr class="grave">';
	}
	
	
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["codigo_interno"].'</td>';
	echo '<td>'.$row["codigo_af"].'</td>';
	echo '<td>'.$row["descripcion"].'</td>';
	echo '<td>'.$row["color"].'</td>';
	echo '<td>'.$row["contenido"].'</td>';
	echo '<td>'.$row["presentacion"].'</td>';
	echo '<td>'.$row["clasificacion"].'</td>';
	echo '<td>'.$row["subclasificacion"].'</td>';
	echo '<td>'.$row["codigo_barra"].'</td>';

	if(file_exists ( "./imagenes/miniaturas/".$row["id"].".jpg" )==1){
		echo '<td><A HREF="detalle.php?id_articulo='.$row["id"].'" onClick="return popup(this, \'notes\')">
		<img  src="./imagenes/miniaturas/'.$row["id"].'".jpg" width="150" height="100">
		</A></td>';
	}else{
		echo '<td></td>';
	}


/*	if($row["id_web"]>0){
		$qq='select * from categorias_web where id="'.$row["id_web"].'"';
		$arr1=mysql_fetch_array(mysql_query($qq));
	}else{
		$arr1[1]="SIN ASIGNAR";
		$arr1[2]="";
	}
	*/
	
	/////EPMR /*
	$qa='select * from stock_epmr where id_articulo="'.$row["id"].'"';
	$ra=mysql_query($qa);
	$rowa=mysql_num_rows($ra);
	if($rowa>0){
		$array_epmr=mysql_fetch_array($ra);
		
	}else{
		$array_epmr["estanteria"]="NO";
		$array_epmr["piso"]="NO";
		$array_epmr["modulo"]="NO";
		$array_epmr["reserva"]="NO";
	}
	/////EPMR */
		
	
	
/*
	echo '<td><A HREF="../admin_articulos/articulos_ingreso.php?id_articulos='.$row["id"].'" onClick="return popup(this, \'notes\')"><button>Modif.</button></A></td>';
	echo '<td><A HREF="../admin_articulos/articulos_eliminar.php?id_articulos='.$row["id"].'" onClick="return popup(this, \'notes\')"><button>Elim</button></A></td>';
	echo '<td><A HREF="../admin_promociones/promociones_ingreso.php?id_articulos='.$row["id"].'" onClick="return popup(this, \'notes\')"><button>Prom</button></A></td>';
   echo '<td><A HREF="../asignar_categoria_web.inc/index.php?id_articulo='.$row["id"].'" onClick="return popup(this, \'notes\')"><font3>'.$arr1[1].'<BR>'.$arr1[2].'</font3></A><br>';
*/

	echo '<td><A HREF="../admin_articulos/articulos_ingreso.php?id_articulos='.$row["id"].'" onClick="return popup(this, \'notes\')"><button>Modif.</button></A><br>';
	echo '<A HREF="../admin_articulos/articulos_eliminar.php?id_articulos='.$row["id"].'" onClick="return popup(this, \'notes\')"><button>Elim</button></A><br>';
	echo '<A HREF="../admin_promociones/promociones_ingreso.php?id_articulos='.$row["id"].'" onClick="return popup(this, \'notes\')"><button>Prom</button></A><br>';

  echo '<A HREF="./tarjetas_listado?id_articulo='.$row["id"].'" onClick="return popup(this, \'notes\')"><font3><button>Margenes Tarjeta</button></font3></A><br>';

   echo '<A HREF="../asignar_categoria_web.inc/index.php?id_articulo='.$row["id"].'" onClick="return popup(this, \'notes\')"><button>Cat Web</button></A> z:'.$row["zona"].'</td>';

	/////EPMR /*
   echo '<td><A HREF="../admin_stock_epmr/stock_epmr_ingreso.php?id_articulo='.$row["id"].'" onClick="return popup(this, \'notes\')"><font3>';
   echo '<table border="1">';

   echo "<tr>";
   echo '<td>E</td>';
   echo '<td>'.$array_epmr["estanteria"].'</td>';
   echo "<tr>";

   echo "<tr>";
   echo '<td>P</td>';
   echo '<td>'.$array_epmr["piso"].'</td>';
   echo "<tr>";

   echo "<tr>";
   echo '<td>M</td>';
   echo '<td>'.$array_epmr["modulo"].'</td>';
   echo "<tr>";

   echo "<tr>";
   echo '<td>R</td>';
   echo '<td>'.$array_epmr["reserva"].'</td>';
   echo "<tr>";

   echo '</table>';
   echo '</font3></A></td>'.chr(10).chr(10);
	/////EPMR */






	
   echo '<td>';
   if($row["discontinuo"]=="S"){
   	echo "Discontinuo";
   }else{
   	echo "Vigente";
   }
	echo '<br><br>';
	 echo '<input type="text" name="precio_costo'.$row["id"].'" id="precio_costo'.$row["id"].'" size="4" onchange="cal2('.$row["id"].');" value="'.$array_costos["precio_costo"].'"></td>';

	echo '<td>1';
/*	echo '<select name="des0a'.$row["id"].'" onchange="cal2('.$row["id"].');" >';
	for($i=0;$i<=200;$i++){
		if($array_costos["descuento1"]==$i){
			echo '<option value="'.$i.'" selected>'.$i.'</option>';
		}else{
			echo '<option value="'.$i.'">'.$i.'</option>';
		}
	}
	echo '</select>';
*/

	echo '<input type="text" name="des0a'.$row["id"].'" id="des0a'.$row["id"].'" size="4" onchange="cal2('.$row["id"].');" value="'.$array_costos["descuento1"].'">';
	echo '<br>';

	echo '2<input type="text" name="des0b'.$row["id"].'" id="des0b'.$row["id"].'" size="4" onchange="cal2('.$row["id"].');" value="'.$array_costos["descuento2"].'"><br>';
	echo '3<input type="text" name="des0c'.$row["id"].'" id="des0c'.$row["id"].'" size="4" onchange="cal2('.$row["id"].');" value="'.$array_costos["descuento3"].'"></td>';

	echo '<td>4<input type="text" name="des0d'.$row["id"].'" id="des0d'.$row["id"].'" size="4" onchange="cal2('.$row["id"].');" value="'.$array_costos["descuento4"].'"><br>';
	echo '5<input type="text" name="des0e'.$row["id"].'" id="des0e'.$row["id"].'" size="4" onchange="cal2('.$row["id"].');" value="'.$array_costos["descuento5"].'"><br>';
	echo '6<input type="text" name="des0f'.$row["id"].'" id="des0f'.$row["id"].'" size="4" onchange="cal2('.$row["id"].');" value="'.$array_costos["descuento6"].'"></td>';

	echo '<td><input type="text" name="iva'.$row["id"].'" id="iva'.$row["id"].'" size="4" onchange="cal2('.$row["id"].');" value="'.$array_costos["iva"].'"></td>';
	echo '<td><input type="text" name="margen'.$row["id"].'" id="margen'.$row["id"].'" size="4" onchange="cal2('.$row["id"].');" value="'.$array_costos["margen"].'"></td>';
	echo '<td><input type="text" name="margen_web'.$row["id"].'" id="margen_web'.$row["id"].'" size="4" onchange="cal2('.$row["id"].');" value="'.$array_costos["margen_web"].'"></td>';
	echo '<td><input type="text" name="tarjeta'.$row["id"].'" id="tarjeta'.$row["id"].'" size="4" value="'.$array_precios["porcentaje_tarjeta"].'"></td>';
	echo '<td><input type="text" name="precio_venta'.$row["id"].'" id="precio_venta'.$row["id"].'" size="8" value="'.$precio_venta.'"></td>';
	echo '<td><input type="text" name="precio_web'.$row["id"].'" id="precio_web'.$row["id"].'" size="8" value="'.$precio_web.'"></td>';
	echo '<td>'.$array_costos["fecha"].'</td>';
	echo '<td>'.$array_costos["fecha_gerencia"].'</td>';
	echo "</tr>".chr(13);
}
?>
</table>

<table class="t1">
	<tr>
	<td>
	<table class="t1">
		<tr>
		<td>Fabrica</td>
		<td><input type="radio" name="tipo_cambio" value="fabrica" checked ></td>
		</tr>
		<tr>
		<td>Gerencia</td>
		<td><input type="radio" name="tipo_cambio" value="gerencia"></td>
		</tr>
	</table>
	</td>
	<td>
	<font1>Detalle</font1><br>
	<textarea name="detalle" rows="4" cols="20"></textarea>
	</td>
	</tr>
</table>

<input type="hidden" name="marca" value="<?php echo $_POST["marca"]; ?>">
<input type="hidden" name="query" value="<?php echo base64_encode($query); ?>">
<input type="submit" name="APLICAR" value="APLICAR">
</form>

</center>
</body>
</html>
