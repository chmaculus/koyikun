<?php
#------------------------------------------
function verifica_valor($id_valor){
	$r=mysql_query('select valor from valores where id="'.$id_valor.'"');
	$rows=mysql_num_rows($r);
	if($id_valor==1 AND $rows<1){
		$q='insert into valores set id=1, descripcion="Precio Dolar", valor="4.02"';
	}
	if($id_valor==2 AND $rows<1){
		$q='insert into valores set id=2, descripcion="I.V.A. 1", valor="21"';
	}
	if($id_valor==3 AND $rows<1){
		$q='insert into valores set id=3, descripcion="I.V.A. 2", valor="10.5"';
	}
	if($id_valor==4 AND $rows<1){
		$q='insert into valores set id=4, descripcion="N. movimiento stock", valor="1"';
	}
}
#------------------------------------------

#------------------------------------------
function get_valor($id_valor){
	$r=mysql_query('select valor from valores where id="'.$id_valor.'"');
	$array=mysql_fetch_array($r);
	return $array["valor"];	
}
#------------------------------------------

#------------------------------------------
function set_valor($id_valor, $valor){
	mysql_query('update valores set valor="'.$valor.'" where id="'.$id_valor.'"');
	if(mysql_error()){
		echo mysql_error()."<br>";
		echo $_SERVER["SCRIPT_NAME"]."<br>";
	}
}
#------------------------------------------


?>