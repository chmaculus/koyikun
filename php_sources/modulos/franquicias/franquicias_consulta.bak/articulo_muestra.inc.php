<?php
echo '<table>';

	$id=$array_articulos[$count]["id"];
	
	$array_precios=precio_sucursal( $id, $id_sucursal );
	if($array_precios["rows"]<1){
		$array_precios=precio_sucursal( $id, 1 );
	}
	$array_stock=stock_sucursal( $id, $id_sucursal );
	$array_stock2=stock_sucursal( $id, 1 );
	//$contado=$array_precios["precio_base"] * ( $array_precios["porcentaje_contado"] / 100 ) + $array_precios["precio_base"];
	$contado=$array_precios["precio_base"];
	$tarjeta=$array_precios["precio_base"] * ( $array_precios["porcentaje_tarjeta"] / 100 ) + $array_precios["precio_base"];
	
	$promocion="";
	$tr='<tr valign="top"><jejejeje>';

	#------------------------------------------------------------
	if($array_precios["promocion"]=="S"){
		#echo "promo1".$array_precios["promocion"];
		$array_promo=get_promo( $id, $id_sucursal);
		$epoch_fecha_fin=strtotime($array_promo["fecha_finaliza"]);
		$epoch_fecha=strtotime($fecha);

		if($array_promo["habilitado"]=="S"){
			//echo "promo2".$array_promo["habilitado"];
			if($epoch_fecha_fin > $epoch_fecha ){
				//echo "promo3".$epoch_fecha_fin;
				//echo "promo4".$epoch_fecha;
				
				//es promo
				$contado = $array_promo["precio_promocion"];
				$promocion="  **PROMO AF**";
				$tr='<tr valign="top" class="special"><jajajajaja>';
				
			}else{
				//promo vencida
				$qq='update koyikun.precios set promocion="N" where id_articulo="'.$id.'" and id_sucursal="'.$id_sucursal.'"';
				//echo "q: ".$qq."<br>";
			}
			mysql_query($qq);
		}
	}	
	#------------------------------------------------------------
	echo $tr.'<td><table>';
	echo $tr.'<td><img src="circulo.png" width="10" height="10" alt=""> '.$id.'</td></tr>';
	echo $tr.'<td><img src="circulo.png" width="10" height="10" alt=""> '.$array_articulos[$count]["marca"].'</td></tr>';
	echo $tr.'<td><img src="circulo.png" width="10" height="10" alt=""> '.$array_articulos[$count]["codigo_interno"].'</td></tr>';
	echo $tr.'<td><img src="circulo.png" width="10" height="10" alt=""> '.$array_articulos[$count]["descripcion"].$promocion.'</td>';
	echo $tr.'<td><img src="circulo.png" width="10" height="10" alt=""> '.$array_articulos[$count]["color"].'</td></tr>';
	echo $tr.'<td><img src="circulo.png" width="10" height="10" alt=""> '.$array_articulos[$count]["clasificacion"].'</td></tr>';
	echo $tr.'<td><img src="circulo.png" width="10" height="10" alt=""> '.$array_articulos[$count]["subclasificacion"].'</td>'.chr(13);
	echo $tr.'<td><img src="circulo.png" width="10" height="10" alt=""> '.$array_articulos[$count]["contenido"].'</td></tr>';
	echo $tr.'<td><img src="circulo.png" width="10" height="10" alt=""> '.$array_articulos[$count]["presentacion"].'</td></tr>';
	echo $tr.'<td><img src="circulo.png" width="10" height="10" alt=""> '.$array_articulos[$count]["codigo_barra"].'</td></tr>';
	echo $tr.'<td>'.$contado.' / '.round(($contado * 1.2),2).'</td>';
#	echo $tr.'<td><A HREF="tarjetas_listado.php?id_articulo='.$id.'" onClick="return popup(this, \'notes\')"><button>Tarjetas</button></A></td>';
	//echo $tr.'<td>Tarj.$ '.round(($contado * 1.2),2).'</td>';
	//echo $tr.'<td>'.$array_stock["stock"].'</td>'.chr(13);
	//echo $tr.'<td>'.$array_stock2["stock"].'</td>'.chr(13);
	echo '</table></td>';
	echo '<td>';
	if(file_exists ( "./imagenes/miniaturas/".$id.".jpg" )==1){
	    echo '<A HREF="detalle.php?id_articulo='.$id.'" onClick="return popup(this, \'notes\')">
		    <img  src="./imagenes/miniaturas/'.$id.'".jpg" width="280" height="177">
	            </A>';
	    }else{
	    echo '<A HREF="detalle.php?id_articulo='.$id.'" onClick="return popup(this, \'notes\')">
		    <img  src="./imagenes/miniaturas/logoaf.jpg" width="280" height="177">
	            </A>';
	    }
	echo '<br>';

	echo '<A HREF="articulo_vender.php?id_articulo='.$id.'" ><img src="botones/vender.jpeg" alt="""></A>';
	echo '<A HREF="stock_sucursales.php?id_articulo='.$id.'" onClick="return popup(this, \'notes\')"><img src="botones/stock.jpeg" alt=""></A>';
	echo '<A HREF="listas.php?id_articulo='.$id.'" onClick="return popup(this, \'notes\')"><img src="botones/listas.jpeg" alt=""></A>';
//	echo '<A HREF="articulo_pedir.php?id_articulo='.$id.'" onClick="return popup(this, \'notes\')"><img src="botones/pedir.jpeg" alt=""></A>';
	
/*
	echo '<A HREF="articulo_vender.php?id_articulo='.$id.'" ><button class="boton1">Vender</button></A>';
	echo '<A HREF="stock_sucursales.php?id_articulo='.$id.'" onClick="return popup(this, \'notes\')"><button class="boton2">stock</button></A>';
	echo '<A HREF="listas.php?id_articulo='.$id.'" onClick="return popup(this, \'notes\')"><button class="boton2">Listas</button></A>';
	echo '<A HREF="articulo_pedir.php?id_articulo='.$id.'" onClick="return popup(this, \'notes\')"><button class="boton2">Pedir</button></A>';
*/
	echo '</td>';
	                                                                                

	//accion($id);
echo '</table>';	


?>