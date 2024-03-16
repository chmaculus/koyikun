 <?php
$file="w3.css";
$myfile = fopen($file, "r") or die("Unable to open file!");
$size=filesize($file);
$data=fread($myfile,$size);

$data=str_replace('{','{'.chr(10),$data);
$data=str_replace('}',chr(10).'}'.chr(10).chr(10),$data);
$data=str_replace(chr(13),'',$data);
$data=str_replace(';',';'.chr(10),$data);

echo $data;
fclose($myfile);
?> 

