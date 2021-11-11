<?php
	$viejas=time()-(60 * 60 * 2);
	$q='delete from sessiones_activas where finaliza<="'.$viejas.'"';
	echo $viejas.chr(10);
	echo "time: ".microtime().chr(10);
?>
