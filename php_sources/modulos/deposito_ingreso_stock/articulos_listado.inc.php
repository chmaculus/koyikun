<?php
//include("connect.php");
$query='select * from articulos where codigo_barra="'.$_POST["barras"].'"';
$result=mysql_query($query)or die(mysql_error());
?>

<center>
<table class="t1">
<tr>
    <th>id</th>
    <th>codigo_interno</th>
    <th>marca</th>
    <th>descripcion</th>
    <th>contenido</th>
    <th>presentacion</th>
    <th>codigo_barra</th>
    <th>clasificacion</th>
    <th>subclasificacion</th>
</tr>

<?php
while($row=mysql_fetch_array($result)){
    echo "<tr>";
    echo '<td>'.$row["id"].'</td>'
    echo '<td>'.$row["codigo_interno"].'</td>'
    echo '<td>'.$row["marca"].'</td>'
    echo '<td>'.$row["descripcion"].'</td>'
    echo '<td>'.$row["contenido"].'</td>'
    echo '<td>'.$row["presentacion"].'</td>'
    echo '<td>'.$row["codigo_barra"].'</td>'
    echo '<td>'.$row["clasificacion"].'</td>'
    echo '<td>'.$row["subclasificacion"].'</td>'
    echo "</tr>".chr(13);
}
?>
</center>