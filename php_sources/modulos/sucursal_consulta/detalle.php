<?php
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");

#jrarquia 0 coresponde a administrador
/*
if($jerarquia!="2"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 
*/
?>


<center>
<?php
include_once("cabecera.inc.php");

$id=$_GET["id_articulo"];


//if(file_exists ( './imagenes/miniaturas/videos/'.$id.'.mp4' )==1){
echo ' <video controls>   <source src="./imagenes/miniaturas/videos/'.$id.'.mp4" type="video/mp4"> </video>'; 
//}

/*
 <video width="320" height="240" controls>
  <source src="movie.mp4" type="video/mp4">
  <source src="movie.ogg" type="video/ogg">
Your browser does not support the video tag.
</video> 
*/


if(file_exists ( "./imagenes/miniaturas/".$id.".jpg" )==1){
		echo '<img  src="./imagenes/miniaturas/'.$_GET["id_articulo"].'".jpg"  width="350" height="350"></a>';
}else{
    echo '<img  src="./imagenes/miniaturas/logoaf.jpg" width="350" height="350">';
}


//echo "./imagenes/miniaturas/".$id.".jpg";

echo '<br><br>';
$q='select observaciones from articulos where id="'.$_GET["id_articulo"].'"';
$aa=mysql_result(mysql_query($q),0);
echo $aa;

?>