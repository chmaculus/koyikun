<?php


		/* es promocion */
					$query='update promociones set 	
																habilitado="N"
																	where id_articulos="'.$row1["id"].'"and
																		id_sucursal="'.$value["id"].'"
					
					';
			echo "q2: ".$query."<br>";
			mysql_query($query);
			if(mysql_error()){echo mysql_error();}

			$query='update precios set promocion="N" where id_articulo="'.$row1["id"].'" and id_sucursal="'.$value["id"].'"';
			echo "q2: ".$query."<br>";
			mysql_query($query);
			if(mysql_error()){echo mysql_error()."<br>q: ".$query."<br>";}

?>