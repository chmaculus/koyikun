<?php
echo '<input type="hidden" name="marca" value="'.$marca.'">';
$result=mysql_query("select distinct marca from articulos order by marca")or die(mysql_error());
?>
<SELECT name=marca> 
<?php
echo '<OPTION value="">SELECCIONE MARCA</OPTION>  ';
while ($row= mysql_fetch_array($result)) {
    if($row["marca"]==$marca){
        echo '<OPTION selected value="'.$row["marca"].'">'.$row["marca"].'</OPTION>'.chr(13);
    }
	if($row["marca"]!=$marca){
        echo '<OPTION value="'.$row["marca"].'">'.$row["marca"].'</OPTION>'.chr(13);
   }
}
mysql_free_result($result);
?>
</select>
