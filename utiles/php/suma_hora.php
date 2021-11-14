<?php
include("includes/connect.php");
$q='select id,hora from ventas where fecha="2016-09-14" and hora<"16:00:00"';
$res=mysql_query($q);
while($row=mysql_fetch_array($res)){
    $aa=explode(":",$row["hora"]);
    $bb=($aa[0]+8);
    $cc=$bb.':'.$aa[1].':'.$aa[2];
    $q2='update ventas set hora="'.$cc.'" where id="'.$row["id"].'"';
    echo $q2.";".chr(10);
    
}
?>

