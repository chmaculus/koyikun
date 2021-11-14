<?php
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");

$jerarquia=$_COOKIE["jerarquia"];

#jrarquia 0 coresponde a administrador
if($jerarquia!="7"){
        header('Location: ../../login/login_nologin.php?nologin=6');
        exit;
} 

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
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
$id_usuario=$_COOKIE["id_usuario"];
$fecha=date("Y-n-d");


include_once('../../includes/funciones_varias.php');
include_once('../../includes/funciones_precios.php');
include_once('../../includes/funciones_stock.php');
include_once('../../includes/funciones_promocion.php');


$array_usuario=mysql_fetch_array(mysql_query('select * from usuarios where id="'.$id_usuario.'"'));


echo '<font1>Nombre: '.$array_usuario["nombre"].'</font1><br>';

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
        echo '<br><font1>Busqueda vacia</font1>';
        echo "<br><br>";
        include_once("lanzamientos.inc.php");
        exit;
}


$query='select articulos.* from articulos,usuarios_lineas where 
													(articulos.descripcion like "%'.$_POST["busqueda"].'%" or 
													articulos.clasificacion like "%'.$_POST["busqueda"].'%" or 
													articulos.subclasificacion like "%'.$_POST["busqueda"].'%" or 
													articulos.marca like "%'.$_POST["busqueda"].'%" or 
													articulos.codigo_barra="'.$_POST["busqueda"].'" or 
													articulos.codigo_interno="'.$_POST["busqueda"].'" or 	
													articulos.id="'.$_POST["busqueda"].'") and  
													articulos.marca=usuarios_lineas.marca and 
													usuarios_lineas.id_usuario="99999" 
														order by marca, clasificacion, subclasificacion, descripcion';


//echo $query."<br>";

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
	echo '<th>ID</th>';
	echo '<th>CODIGO</th>';
	echo '<th>MARCA</th>';
	echo '<th>DESCRIPCION</th>';
	echo '<th>COLOR</th>';
	echo '<th>CLASIFICACION</th>';
	echo '<th>SUBCLASIFICACION</th>';
	echo '<th>CONTENIDO</th>';
	echo '<th>PRESENTACION</th>';
	echo '<th>EAN</th>';
	echo '<th>CONTADO</th>';
	echo '<th>TARJETA</th>';
	echo '<th>Imagen</th>';
	echo '<th>STOCK</th>';
	echo '<th>STK Deposito</th>';
	echo '<th></th>';
	echo '<th></th>';
echo '</tr>';
#-------------------------------


#muestra resultados
while($row=mysql_fetch_array($result)){
	$array_precios=precio_sucursal( $row["id"], $id_sucursal );
	if($array_precios["rows"]<1){
		$array_precios=precio_sucursal( $row["id"], 1 );
	}
	$array_stock=stock_sucursal( $row["id"], $id_sucursal );
	$array_stock2=stock_sucursal( $row["id"], 1 );
	//$contado=$array_precios["precio_base"] * ( $array_precios["porcentaje_contado"] / 100 ) + $array_precios["precio_base"];
	$contado=$array_precios["precio_base"];
	$tarjeta=$array_precios["precio_base"] * ( $array_precios["porcentaje_tarjeta"] / 100 ) + $array_precios["precio_base"];
	
	$promocion="";
	$tr='<tr>';

	#------------------------------------------------------------
	if($array_precios["promocion"]=="S"){
		$array_promo=get_promo( $row["id"], $id_sucursal);
		$epoch_fecha_fin=strtotime($array_promo["fecha_finaliza"]);
		$epoch_fecha=strtotime($fecha);
/*
		echo "a: ".$fecha."<br>";
		echo "b: ".$array_promo["fecha_finaliza"]."<br>";
		echo "c: ".$array_promo["habilitado"]."<br>";
		echo "fecha: ".strtotime($fecha)."<br>";
		echo "fecha_fin: ".strtotime($array_promo["fecha_finaliza"])."<br>";
		if($epoch_fecha_fin > $epoch_fecha ){echo "see<br>";
		}else{ echo "promo vencida<br>"; }
*/
		if($array_promo["habilitado"]=="S"){
			//echo "habilitado<br>";
			if($epoch_fecha_fin > $epoch_fecha ){
			$contado = $array_promo["precio_promocion"];
			$promocion="  **PROMO AF**";
			$tr='<tr class="special">';
			}else{
			//es promo
			//promo vencida
			$qq='update precios set promocion="N" where id_articulo="'.$row["id"].'" and id_sucursal="'.$id_sucursal.'"';
			//echo "q: ".$qq."<br>";
			}
			mysql_query($qq);
		}
	}	
	#------------------------------------------------------------

	echo $tr;

	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["codigo_interno"].'</td>';
	echo '<td>'.$row["marca"].'</td>';
	echo '<td>'.$row["descripcion"].$promocion.'</td>';
	echo '<td>'.$row["color"].'</td>';
	echo '<td>'.$row["clasificacion"].'</td>';
	echo '<td>'.$row["subclasificacion"].'</td>'.chr(13);
	echo '<td>'.$row["contenido"].'</td>';
	echo '<td>'.$row["presentacion"].'</td>';
	echo '<td>'.$row["codigo_barra"].'</td>';
	echo '<td>'.$contado.'</td>';
#	echo '<td><A HREF="tarjetas_listado.php?id_articulo='.$row["id"].'" onClick="return popup(this, \'notes\')"><button>Tarjetas</button></A></td>';
	echo '<td>'.round(($contado * 1.2),2).'</td>';
	
	if(file_exists ( "./imagenes/miniaturas/".$row["id"].".jpg" )==1){
	    echo '<td><A HREF="detalle.php?id_articulo='.$row["id"].'" onClick="return popup(this, \'notes\')">
		    <img  src="./imagenes/miniaturas/'.$row["id"].'".jpg" width="150" height="100">
	            </A></td>';
	    }else{
		echo '<td></td>';
	    }
	                                                                                
	
	echo '<td>'.$array_stock["stock"].'</td>'.chr(13);
	echo '<td>'.$array_stock2["stock"].'</td>'.chr(13);
//	accion($row["id"]);
	echo "</tr>";
}
echo "</table>";


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
	echo '<td><A HREF="articulo_vender.php?id_articulo='.$id_articulo.'" target="FrameVenta"><button>Vender</button></A></td>';
	echo '<td><A HREF="stock_sucursales.php?id_articulo='.$id_articulo.'" onClick="return popup(this, \'notes\')"><button>stock</button></A></td>';
	echo '<td><A HREF="listas.php?id_articulo='.$id_articulo.'" onClick="return popup(this, \'notes\')"><button>Listas</button></A></td>';
	echo '<td><A HREF="articulo_pedir.php?id_articulo='.$id_articulo.'" onClick="return popup(this, \'notes\')"><button>Pedir</button></A></td>';
}
#-----------------------------------------------------------------





?>


</center>
</body>
</html>
