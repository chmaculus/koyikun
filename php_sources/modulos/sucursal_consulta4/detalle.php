<?php
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");

#jrarquia 0 coresponde a administrador
if($jerarquia!="2"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} ?>


<center>
<?php
include_once("cabecera.inc.php");


if(file_exists ( "./imagenes/miniaturas/".$id.".jpg" )==1){
		echo '<img  src="./imagenes/miniaturas/'.$_GET["id_articulo"].'".jpg"></a>';
}else{
    echo '<img  src="./imagenes/miniaturas/logoaf.jpg" width="280" height="177">';
}

echo '<br><br>';
$q='select observaciones from articulos where id="'.$_GET["id_articulo"].'"';
$aa=mysql_result(mysql_query($q),0);
echo $aa;

?>