<?php
include("./includes/connect.php");


$q='select id from articulos where marca="KOSTUME" and clasificacion="COLORACION KOSTUME"';

$res=mysql_query($q);

while($row=mysql_fetch_array($res)){
	echo 'ln -s tinturakostume.jpg '.$row[0].'.jpg'.chr(10);
}

$q='select id from articulos where marca="KOSTUME" and clasificacion="CRAZY COLORS"';

$res=mysql_query($q);

while($row=mysql_fetch_array($res)){
	echo 'ln -s tinturakostume.jpg '.$row[0].'.jpg'.chr(10);
}

?>