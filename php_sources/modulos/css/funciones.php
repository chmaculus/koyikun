<?php
#---------------------------------------
function hex2bin($hexstr){
	$bb='';
	$len=strlen($hexstr);
	for($i=0;$i<=($len-2);$i=($i+2)){
		$sub=substr($aa,$i,2);
		$dec=hexdec($sub);
		$bb=$bb.$dec;
	}
return $bb;
}
#---------------------------------------

?>

