<?php
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");
include_once("seguridad.inc.php");
include_once("cabecera.inc.php");

echo '<center>';

#muestra registro ingresado
$query='select * from usuarios where id="'.$_GET["id_usuarios"].'"';
    $array_usuarios=mysql_fetch_array(mysql_query($query));
if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
#----------------------------------------


echo '<table class="t1">';
echo '<tr>';
echo '<td>ID usuario</td>';
echo '<td>'.$_GET["id_usuarios"].'</td>';
echo '</tr>';
echo '<tr>';
echo '<td>Nombre</td>';
echo '<td>'.$array_usuarios["nombre"].'</td>';
echo '</tr>';
echo '<tr>';
echo '<td>Usuario</td>';
echo '<td>'.$array_usuarios["usuario"].'</td>';
echo '</tr>';
echo '</table><br>';




echo '<form action="lineas_graba.php" target="derecha" method="post">';
include("./select/select.inc.php");
echo '<input type="hidden" name="id_usuarios" value="'.$_GET["id_usuarios"].'">';
echo '<input type="submit" name="AGREGAR" value="AGREGAR">';
echo '</form>';

?>



