<?php
$count=0;



		$costo_anterior=calcula_precio_costo( $id_articulos );
		verifica_tabla_costos( $id_articulos );
		verifica_tabla_precios( $id_articulos, 1 );
$array_costos=array_costos($id_articulos);
$precio_venta=calcula_precio_venta($array_costos);

		#---------------------------------------------------------------------------------------------
			$query='update costos set 	precio_costo="'.$_POST["precio_costo"].'",
											descuento1="'.$_POST["des0a"].'",
											descuento2="'.$_POST["des0b"].'",
											descuento3="'.$_POST["des0c"].'",
											descuento4="'.$_POST["des0d"].'",
											descuento5="'.$_POST["des0e"].'",
											descuento6="'.$_POST["des0f"].'",
											descuento7="'.$_POST["des0g"].'",
											descuento8="'.$_POST["des0h"].'",
											descuento9="'.$_POST["des0i"].'",
											descuento10="'.$_POST["des0j"].'",
											iva="'.$_POST["iva"].'",
											margen="'.$_POST["margen"].'",
											fecha="'.$fecha.'",
											hora="'.$hora.'",
											modulo="13"
												where id_articulos="'.$id_articulos.'"
											';
		#---------------------------------------------------------------------------------------------

		//echo "query: ".$query."<br>".chr(13);
		mysql_query($query)or die(mysql_error());
		if ($_POST["precio_costo".$id_articulos] > 0){
			$query='update precios set precio_base="'.$precio_venta.'",
												porcentaje_contado="0", 
												porcentaje_tarjeta="'.$precio_venta*1.2.'", 
												fecha="'.$fecha.'",
												hora="'.$hora.'",
												modulo="15"
													where id_articulo="'.$id_articulos.'"
												';
		}else{
			$query='update precios set precio_base="0",
												porcentaje_contado="0", 
												porcentaje_tarjeta="'.$_POST["tarjeta".$id_articulos].'", 
												fecha="1998-09-22",
												hora="11:22:33" 
													where id_articulo="'.$id_articulos.'"
												';
		}
		//echo "query: ".$query."<br>".chr(13);
		mysql_query($query)or die(mysql_error());




?>
