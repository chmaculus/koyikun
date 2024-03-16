<?php
	$queryi='insert into articulos set ';
	$queryc='codigo_interno="'.$_POST["codigo_interno"].'",
		marca="'.$marca.'",
		descripcion="'.$_POST["descripcion"].'",
		contenido="'.$_POST["contenido"].'",
		presentacion="'.$_POST["presentacion"].'",
		codigo_barra="'.$_POST["codigo_barra"].'",
		fecha="'.$fecha.'",
		hora="'.$hora.'",
		clasificacion="'.$clasificacion.'",
		subclasificacion="'.$_POST["subclasificacion"].'"
		';
	$querym='update articulos set ';
				$querymm='where id="'.$_POST["id_articulos"].'"
			';

?>