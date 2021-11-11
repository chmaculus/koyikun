<?php


		/* es promocion */
					$query='update promociones set 	precio_promocion="'.$_POST["precio_promocion"].'",
																fecha_inicio="'.$fecha_inicio.'",
																fecha_finaliza="'.$fecha_finaliza.'",
																habilitado="S"
																	where id_articulos="'.$row1["id"].'"and
																		id_sucursal="'.$value["id"].'"
					
					';
			echo "q2: ".$query."<br>";
			mysql_query($query);
			if(mysql_error()){echo mysql_error();}

			$query='update precios set promocion="S" where id_articulo="'.$row1["id"].'" and id_sucursal="'.$value["id"].'"';
			echo "q2: ".$query."<br>";
			mysql_query($query);
			if(mysql_error()){echo mysql_error();}

?>