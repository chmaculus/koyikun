<?php
include_once("../includes/connect.php");

include_once("cabecera.inc.php");
include_once("../includes/funciones_varias.php");
include_once("../includes/funciones_stock.php");

if(!$_POST["id_sucursal"]){
		echo '<center>';
		echo '<form action="'.$_SERVER["SCRIPT_NAME"].'" method="post">';
		include("sucursales.inc.php");
		echo '<br><input type="submit" name="ACEPTAR" value="ACEPTAR" />';
		echo '</form>';
		exit;	
}

$fecha=date("Y-n-d");
$hora=date("H:i:s");

?>

<body onLoad=document.aa.busqueda.focus()>
<center>

<titulo>INGRESO DE STOCK X CODIGO BARRA / ID</titulo><br>
<font1><?php echo "Sucursal: ".nombre_sucursal($_POST["id_sucursal"]);?></font1><br>
<form name="aa" action="index.php" method="post">

<input type="text" name="busqueda" <?php if($_POST["busqueda"]){echo $_POST["busqueda"];} ?>/>
<input type="hidden" name="id_sucursal" value="<?php echo $_POST["id_sucursal"];?>">
<input type="submit" name="ACEPTAR" value="ACEPTAR" />
</form>


<?php
if($_POST["busqueda"]){

	$query='select * from articulos where codigo_barra="'.$_POST["busqueda"].'" or id="'.$_POST["busqueda"].'"';

	$res1=mysql_query($query);
	$rows=mysql_num_rows($res1);
	if($rows>1){
		echo 'La busqueda devuelve mas de un resultado<br>';
	}else{
		$array_articulos=mysql_fetch_array($res1);
		$array_stock=stock_sucursal($array_articulos["id"],$_POST["id_sucursal"]);
		$q='select id from stock where id_articulo="'.$array_articulos["id"].'" and id_sucursal="'.$_POST["id_sucursal"].'"';
		//echo $q."<br>";
		$ress=mysql_query($q);
		if(mysql_error()){echo mysql_error();}
		$rows_stock=mysql_num_rows($ress);
		 //echo "rows stock: ".$rows_stock."<br>";
		//echo "a1: ".$array_articulos["id"]."b1:".$_POST["id_sucursal"]."<br>";

		include("articulo_res.inc.php");
		$stock_actual=$array_stock["stock"];


		if($stock_actual<0){
			$stock_nuevo=1;
		}else{
			$stock_nuevo=$stock_actual+1;

			if($rows_stock<1){
		 			$q2='insert into stock set stock="'.$stock_nuevo.'", fecha_modificacion="'.$fecha.'", hora_modificacion="'.$hora.'", id_articulo="'.$array_articulos["id"].'", id_sucursal="'.$_POST["id_sucursal"].'"';
					mysql_query($q2);
					//echo "a".$q2."<br>";
					if(mysql_error()){ echo mysql_error()."<br>";	}
			}


			if($rows_stock==1){
	 			$q2='update stock set stock="'.$stock_nuevo.'", fecha_modificacion="'.$fecha.'", hora_modificacion="'.$hora.'" where id_articulo="'.$array_articulos["id"].'" and id_sucursal="'.$_POST["id_sucursal"].'"';
				mysql_query($q2);
				//echo $q2."<br>";
				if(mysql_error()){ echo mysql_error()."<br>";}
			}


			if($rows_stock>1){
		 			$q2='delete from  stock  where id_articulo="'.$array_articulos["id"].'" and id_sucursal="'.$_POST["id_sucursal"].'"';
					mysql_query($q2);
					//echo $q2."<br>";
				 if(mysql_error()){ echo mysql_error()."<br>";}

		 			$q2='insert into stock set stock="'.$stock_nuevo.'", fecha_modificacion="'.$fecha.'", hora_modificacion="'.$hora.'", id_articulo="'.$array_articulos["id"].'", id_sucursal="'.$_POST["id_sucursal"].'"';
					mysql_query($q2);
					//echo "b".$q2."<br>";
					if(mysql_error()){ echo mysql_error()."<br>";}
			}
			
			
		}
				include("stock.inc.php");

	}


}else{
 	exit;
}

?>