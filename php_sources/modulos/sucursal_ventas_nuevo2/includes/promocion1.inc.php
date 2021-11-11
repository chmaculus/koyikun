<?php

	if($array_precios["promocion"]=="S"){
		#echo "promo1".$array_precios["promocion"];
		$array_promo=get_promo( $id, $id_sucursal);
		$epoch_fecha_fin=strtotime($array_promo["fecha_finaliza"]);
		$epoch_fecha=strtotime($fecha);

		if($array_promo["habilitado"]=="S"){
			//echo "promo2".$array_promo["habilitado"];
			if($epoch_fecha  <= $epoch_fecha_fin  ){
				//echo "promo3".$epoch_fecha_fin;
				//echo "promo4".$epoch_fecha;
				$ppromo=1;
				//es promo
				$contado = $array_promo["precio_promocion"];
				$promocion="  **PROMO AF**";
				$tr='<tr valign="top" class="special"><jajajajaja>';
				
			}else{
				$ppromo=0;
				//promo vencida
				$qq='update precios set promocion="N" where id_articulo="'.$id.'" and id_sucursal="'.$id_sucursal.'"';
				//echo "q: ".$qq."<br>";
			}
			mysql_query($qq);
		}
	}	


?>