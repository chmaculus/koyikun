<?php
include("../../includes/connect.php");
$query="select * from sucursales order by sucursal";
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}
?>


<table class="t1">
<tr>
    <th>id</th>
    <th>sucursal</th>
</tr>

<?php
while($row=mysql_fetch_array($result)){
    echo "<tr>";
    echo '<td>'.$row["sucursal"].'</td>';
    echo '<td><input type="checkbox" name="id_suc'.$row["id"].'" value="si" /></td>';
    echo "</tr>".chr(10);
}
?>
</table></center>
