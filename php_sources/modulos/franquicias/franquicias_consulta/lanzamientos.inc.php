<?php
include_once("cabecera.inc.php");
include_once("../includes/connect.php");
include_once("../includes/funciones_precios.php");
echo "<center>";
$q1='select * from articulos_lanzamientos';
$res1=mysql_query($q1);
$rows1=mysql_num_rows($res1);

$id_session=$_COOKIE["id_session"];


$q2='select * from articulos_lanzamientos_rotacion where id_session="'.$id_session.'"';
$res2=mysql_query($q2);
$rows2=mysql_num_rows($res2);
if($rows2<1){
    $q3='insert into articulos_lanzamientos_rotacion set id_session="'.$id_session.'", count="'.$rows1.'", ultimo="1"';
    //echo $q3;
    mysql_query($q3);
    $ultimo=1;
}
if($rows2==1){
    $array2=mysql_fetch_array($res2);
    $ultimo=$array2["ultimo"];
    $nue=$ultimo+1;
    if($nue>$rows1){
	$nue=1;
    }
    $q3='update articulos_lanzamientos_rotacion set count="'.$rows1.'", ultimo="'.$nue.'"  where id_session="'.$id_session.'"';
    mysql_query($q3);
    //echo "<br>".$q3."<br>";
}


while($row=mysql_fetch_array($res1)){
    $array_precios=array_precios($row["id"],1);
    $count++;
    if($ultimo==$count){
    	if(file_exists ( "./lanzamientos/".$row["id"].".jpg" )==1){
    	    echo '<td><img  src="./lanzamientos/'.$row["id"].'".jpg" height="550" width="550"></td>';
    	    // width="150" height="100"
        }else{
			}
    }//end if

}//end while

?>