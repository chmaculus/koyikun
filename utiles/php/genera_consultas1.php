<?php
for($i=1; $i<=8; $i++){
	$str='if($_POST["pelmarca'.$i.'"]==1){'.chr(10);
	$str.='	$q1=\'update clientes_persona_valores set valor="xx'.$i.'" where id_clientes_persona="\'.$id_clientes_persona.\'" and llave="pelmarca'.$i.'" \';'.chr(10);
	$str.='}else{'.chr(10);
	$str.='	$q1=\'update clientes_persona_valores set valor="" where id_clientes_persona="\'.$id_clientes_persona.\'" and llave="pelmarca'.$i.'" \';'.chr(10);
	$str.='}'.chr(10);
	$str.='mysql_query($q1);'.chr(10);
	$str.='if(mysql_error()){ echo mysql_error()." ".$q1; }'.chr(10);
	$str.=chr(10).chr(10);		
	echo $str;
}
?>