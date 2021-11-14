

<?php
include("includes/connect.php");

//$str=mystring("í");
//$str="etílico";
//$str="SEÑA";

$str="LINEA D´ACUA";
$str="º";
$str="'";
$str="Y VES DÒRGEVAL";
$str="cosmetica cientifica";


//$str=mb_convert_encoding($str, "iso-8859-1");

echo "#str: ".$str.chr(10);

$q='select * from articulos where marca like "%'.$str.'%" or 
			    descripcion like "%'.$str.'%" or 
			    clasificacion like "%'.$str.'%" or 
			    subclasificacion like "%'.$str.'%" or 
			    contenido like "%'.$str.'%" or 
			    presentacion like "%'.$str.'%" or 
			    color like "%'.$str.'%" limit 0,10';

$q='select * from articulos where marca="COSMETICA CIENTIFICA"';

$res=mysql_query($q);
#echo "#".$q.chr(10);

while($row=mysql_fetch_array($res)){
	#echo mystring($row["descripcion"])).chr(10);
	$q='update articulos set descripcion="'.mystring($row["descripcion"]).'", 
			marca="'.mystring($row["marca"]).'", 
			clasificacion="'.mystring($row["clasificacion"]).'", 
			subclasificacion="'.mystring($row["subclasificacion"]).'", 
			contenido="'.mystring($row["contenido"]).'", 
			presentacion="'.mystring($row["presentacion"]).'", 
			color="'.mystring($row["color"]).'" 
			where id="'.$row["id"].'"';
	echo $q.";".chr(10);
	//mysql_query($q);
	if(mysql_error()){
		echo mysql_error().chr(10);
	}
}


function mystring($str) {
	//$str=str_replace("´","'",$str);
	$str=mb_convert_encoding($str, "iso-8859-1");
//	$str=utf8_encode($str);
	$str=mysql_real_escape_string($str);	
	return $str;
}


?>